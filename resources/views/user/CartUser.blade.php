<!DOCTYPE html>
<html lang="en">

<head>
    <title>PolyTech - Đơn hàng</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('asset-userr/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset-userr/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('asset-userr/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-userr/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-userr/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-admin/css/kaiadmin.min.css') }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('asset-userr/css/fontawesome.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('asset-userr/css/fontawesome.min.css') }}">

    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    @include('layouts.user.nav')

    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Giỏ hàng của bạn</h2>
            @if ($cart && $cart->cartItems->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="select-all" onchange="toggleSelectAll(this)">
                                </th>
                                <th>Image</th>
                                <th>Name Product</th>
                                <th>Color</th>
                                <th>Battery</th>
                                <th>Variant</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->cartItems as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="product-checkbox"
                                            data-price="{{ $item->product->price + $item->variant->price + $item->battery->price + ($item->color->price ?? 0) }}"
                                            onchange="updateGrandTotal()">
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->product->productImages->where('colour_id', $item->color_id)->first()->image_path) }}"
                                            alt="{{ $item->product->name_sp }}" width="100">
                                    </td>
                                    <td>{{ $item->product->name_sp }}</td>
                                    <td>{{ $item->color->name ?? 'Không có màu' }}</td>
                                    <td>{{ $item->battery ? $item->battery->capacity : 'Không có' }}</td>
                                    <td>{{ $item->variant ? $item->variant->ram_smartphone : 'Không có' }}</td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" onclick="updateQuantity({{ $item->id }}, -1)"
                                            style="font-size: 0.8em; padding: 0.2rem 0.5rem;">-</button>
                                        <span id="quantity-{{ $item->id }}">{{ $item->quantity }}</span>
                                        <button class="btn btn-secondary btn-sm" onclick="updateQuantity({{ $item->id }}, 1)"
                                            style="font-size: 0.8em; padding: 0.2rem 0.5rem;">+</button>
                                    </td>
                                    <td data-price="{{ $item->product->price + $item->variant->price + $item->battery->price + ($item->color->price ?? 0) }}">
                                        {{ number_format($item->product->price + $item->variant->price + $item->battery->price + ($item->color->price ?? 0), 0, ',', '.') }} ₫
                                    </td>
                                    <td id="total-{{ $item->id }}" data-quantity="{{ $item->quantity }}">
                                        {{ number_format(($item->product->price + $item->variant->price + $item->battery->price + ($item->color->price ?? 0)) * $item->quantity, 0, ',', '.') }} ₫
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="confirmRemoveFromCart({{ $item->id }})">Xóa</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>Tổng thanh toán: <span id="grand-total">0</span> ₫</h4>
                </div>
            @else
                <p>Giỏ hàng của bạn hiện đang trống.</p>
            @endif
        </div>
    </section>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateQuantity(itemId, change) {
            const quantityElement = document.getElementById(`quantity-${itemId}`);
            let quantity = parseInt(quantityElement.innerText) + change;
    
            if (quantity < 1) {
                quantity = 1;
            }
    
            quantityElement.innerText = quantity;
    
            const row = $(`#total-${itemId}`).closest('tr');
            const pricePerUnit = parseFloat(row.find('td[data-price]').data('price'));
            const totalElement = document.getElementById(`total-${itemId}`);
            const newTotal = Math.round(pricePerUnit * quantity);
    
            totalElement.innerText = numberWithCommas(newTotal) + ' ₫';
            totalElement.setAttribute('data-quantity', quantity);
    
            $.ajax({
                url: '/cart/update',
                type: 'POST',
                data: {
                    item_id: itemId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    updateGrandTotal();
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
    
            updateGrandTotal();
        }
    
        function updateGrandTotal() {
            let grandTotal = 0;
            $('.product-checkbox:checked').each(function() {
                const row = $(this).closest('tr');
                const price = parseFloat(row.find('td[data-price]').data('price'));
                const quantity = parseInt(row.find('span[id^="quantity-"]').text());
                grandTotal += price * quantity;
            });
            $('#grand-total').text(numberWithCommas(Math.round(grandTotal)));
        }
    
        function toggleSelectAll(selectAllCheckbox) {
            const checkboxes = $('.product-checkbox');
            checkboxes.prop('checked', selectAllCheckbox.checked);
            updateGrandTotal();
        }
    
        function confirmRemoveFromCart(itemId) {
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?")) {
                removeFromCart(itemId);
            }
        }
    
        function removeFromCart(itemId) {
            $.ajax({
                url: '/cart/remove',
                type: 'POST',
                data: {
                    item_id: itemId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(xhr) {
                    console.error(xhr);
                    alert('Có lỗi xảy ra!');
                }
            });
        }
    
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    



    @include('layouts.user.footer')
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{ asset('asset-userr/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('asset-userr/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('asset-userr/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset-userr/js/templatemo.js') }}"></script>
    <script src="{{ asset('asset-userr/js/custom.js') }}"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="{{ asset('asset-userr/js/slick.min.js') }}"></script>

</body>

</html>
<style>
    .container h2 {
        font-size: 1.5rem;
    }

    .table th,
    .table td {
        font-size: 0.875rem;
    }

    #grand-total {
        font-size: 1rem;
    }

    .btn {
        font-size: 0.875rem;
    }
</style>

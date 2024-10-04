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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('asset-userr/css/fontawesome.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('layouts.user.nav')

    <div class="w-100 pt-1 mb-5 text-right">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img id="mainImage" class="img-fluid" src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name_sp }}">
                        <div class="mt-3">
                            <div class="d-flex flex-wrap">
                                @if ($product->productImages && $product->productImages->count() > 0)
                                    @foreach ($product->productImages as $image)
                                        <div class="me-2">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Variant Colour"
                                                style="width: 150px; height: 150px; border: 1px solid #ccc;cursor: pointer;"
                                                class="thumbnail-image"
                                                onmouseenter="changeMainImage('{{ asset('storage/' . $image->image_path) }}')"
                                                onclick="changeMainImage('{{ asset('storage/' . $image->image_path) }}')">

                                        </div>
                                    @endforeach
                                @else
                                    <p>Không có hình ảnh nào.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3><strong>Name:</strong> {{ $product->name_sp }}</h3>
                        <p><strong>Description:</strong> {{ $product->description }}</p>

                        <div class="mt-3">
                            <strong>Choose Variant:</strong>
                            <div class="d-flex flex-wrap">
                                @foreach ($variants as $variant)
                                    <div class="me-2">
                                        <button class="btn btn-outline-primary variant-button"
                                            data-price="{{ $variant->price }}" data-id="{{ $variant->id }}">
                                            {{ $variant->ram_smartphone }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3">
                            <strong>Choose Battery:</strong>
                            <div class="d-flex flex-wrap">
                                @foreach ($batterys as $battery)
                                    <div class="me-2">
                                        <button class="btn btn-outline-primary battery-button"
                                            data-price="{{ $battery->price }}" data-id="{{ $battery->id }}">
                                            {{ $battery->capacity }}
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-3">
                            <strong>Colour:</strong>
                            <div class="d-flex flex-wrap">
                                @if ($product->productImages && $product->productImages->count() > 0)
                                    @foreach ($product->productImages->groupBy('colour_id') as $colour_id => $images)
                                        @php
                                            $colour = \App\Models\Colour::find($colour_id);
                                            $firstImage = $images->first();
                                        @endphp
                                        <div class="me-2">
                                            <button class="btn btn-outline-primary colour-button"
                                                data-id="{{ $colour_id }}" data-price="{{ $colour->price ?? 0 }}"
                                                onmouseenter="changeMainImage('{{ asset('storage/' . $firstImage->image_path) }}')"
                                                onclick="selectColor('{{ $colour->name ?? 'Unknown Colour' }}', '{{ asset('storage/' . $firstImage->image_path) }}', this)">
                                                {{ $colour->name ?? 'Unknown Colour' }}
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <p>Không có màu nào.</p>
                                @endif
                            </div>
                        </div>
                        <p class="text-left mb-0"><strong>Price:</strong> <span
                                id="totalPrice">{{ number_format($product->price, 0, ',', '.') }} ₫</span></p>

                        <div class="mt-3">
                            <button id="decrease" class="btn btn-secondary">-</button>
                            <input type="number" id="quantity" value="1" min="1" style="width: 60px;"
                                class="text-center">
                            <button id="increase" class="btn btn-secondary">+</button>
                        </div>

                        <div class="mt-3">
                            <a id="addToCart" class="btn btn-success text-white" href="#">
                                <i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng
                            </a>
                            <a class="btn btn-danger text-white" href="#">
                                <i class="far fa-heart"></i> Thêm vào danh sách yêu thích
                            </a>
                        </div>
                    </div>
                </div>

                <h4 class="mt-5">Sản phẩm liên quan</h4>
                <div class="row">
                    @foreach ($relatedProducts as $related)
                        <div class="col-md-3">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid"
                                        src="{{ asset('storage/' . $related->image) }}">
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li><a class="btn btn-success text-white"
                                                    href="{{ route('product.show', $related->id) }}"><i
                                                        class="far fa-heart"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2"
                                                    href="{{ route('product.show', $related->id) }}"><i
                                                        class="far fa-eye"></i></a></li>
                                            <li><a class="btn btn-success text-white mt-2"
                                                    href="{{ route('product.show', $related->id) }}"><i
                                                        class="fas fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('product.show', $related->id) }}"
                                            class="h3 text-decoration-none"><strong>Name:</strong>
                                            {{ $related->name_sp }}</a>
                                        <p class="text-left mb-0"><strong>Price:</strong>
                                            {{ number_format($related->price, 0, ',', '.') }} ₫</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @include('layouts.user.footer')

        <script src="{{ asset('asset-userr/js/jquery-1.11.0.min.js') }}"></script>
        <script src="{{ asset('asset-userr/js/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ asset('asset-userr/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('asset-userr/js/templatemo.js') }}"></script>
        <script src="{{ asset('asset-userr/js/custom.js') }}"></script>
        <script>
            $(document).ready(function() {
                let qtyInput = $('#quantity');
                let basePrice = {{ $product->price }};
                let totalPriceElement = $('#totalPrice');
                let selectedVariantPrice = 0;
                let selectedBatteryPrice = 0;
                let selectedColourPrice = 0;
                let selectedColourId = null;
                let selectedVariantId = null;
                let selectedBatteryId = null;

                $('.variant-button').click(function() {
                    selectedVariantPrice = parseFloat($(this).data('price')) || 0;
                    selectedVariantId = $(this).data('id');
                    $('.variant-button').removeClass('active');
                    $(this).addClass('active');
                    updatePrice();
                });


                $('.colour-button').click(function() {
                    selectedColourPrice = parseFloat($(this).data('price')) || 0;
                    selectedColourId = $(this).data('id');
                    $('.colour-button').removeClass('active');
                    $(this).addClass('active');
                    updatePrice();
                });


                $('.battery-button').click(function() {
                    selectedBatteryPrice = parseFloat($(this).data('price')) || 0;
                    selectedBatteryId = $(this).data('id');
                    $('.battery-button').removeClass('active');
                    $(this).addClass('active');
                    updatePrice();
                });

                function updatePrice() {
                    let totalPrice = basePrice + selectedVariantPrice + selectedBatteryPrice + selectedColourPrice;
                    totalPriceElement.text(totalPrice.toLocaleString('vi-VN') + ' ₫');
                }


                $('#increase').click(function() {
                    let currentQty = parseInt(qtyInput.val());
                    qtyInput.val(currentQty + 1);
                });

                $('#decrease').click(function() {
                    let currentQty = parseInt(qtyInput.val());
                    if (currentQty > 1) {
                        qtyInput.val(currentQty - 1);
                    }
                });


                $('#addToCart').click(function(e) {
                    e.preventDefault();

                    let productId = {{ $product->id }};
                    let qty = qtyInput.val();


                    if (!{{ Auth::check() ? 'true' : 'false' }}) {
                        alert('Quý khách vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
                        window.location.href = '/login';
                        return;
                    }


                    if (!selectedVariantId) {
                        alert('Vui lòng chọn dung lượng máy!');
                        return;
                    }

                    if (!selectedBatteryId) {
                        alert('Vui lòng chọn dung lượng pin!');
                        return;
                    }


                    if (!selectedColourId) {
                        alert('Vui lòng chọn màu sắc!');
                        return;
                    }


                    $.ajax({
                        url: '{{ route('cart.add') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productId,
                            quantity: qty,
                            battery_id: selectedBatteryId,
                            variant_id: selectedVariantId,
                            color_id: selectedColourId
                        },
                        success: function(response) {
                            alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
                            window.location.href = '{{ route('cart.show') }}';
                        },
                        error: function(xhr) {
                            alert('Đã xảy ra lỗi khi thêm vào giỏ hàng: ' + xhr.responseText);
                        }
                    });
                });
            });

            function changeMainImage(imageSrc) {
                document.getElementById('mainImage').src = imageSrc;
            }


            function selectColor(colourName, imageSrc, button) {
                $('.color-button').removeClass('active');
                $(button).addClass('active');
                changeMainImage(imageSrc);
            }
        </script>


</body>

</html>
<style>
    #mainImage {
        width: 600px;
        height: 500px;
    }
</style>

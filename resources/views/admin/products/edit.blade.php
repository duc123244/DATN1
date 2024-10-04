<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    <!-- Fonts and icons -->
    <script src="{{ asset('asset-admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["../../asset-admin/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset-admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset-admin/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset-admin/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('asset-admin/css/demo.css') }}" />
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    @include('layout.admin.sitebar')
    <!-- End Sidebar -->

    <div class="main-panel">

        @include('layout.admin.header')
        <div class="container">
            <div class="container mt-4">
                <h1>Edit Product</h1>

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="form-label" for="name_sp">Product Name</label>
                        <input class="form-control" type="text" name="name_sp" value="{{ old('name_sp', $product->name_sp) }}" required>
                    </div>
                    <div>
                      <label class="form-label" for="image">Product Image</label>
                      <input class="form-control" type="file" name="image" accept="image/*">
                      @if($product->image)
                          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_sp }}" width="100" style="margin-top: 10px;">
                      @endif
                  </div>

                    <div>
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" name="description" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div>
                        <label class="form-label" for="price">Price</label>
                        <input class="form-control" type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" required>
                    </div>

                    <div>
                        <label class="form-label" for="category_id">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="form-label" for="supplier_id">Supplier</label>
                        <select class="form-control" name="supplier_id" required>
                            <option value="">Select a supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="form-label" for="variant_id">Ram</label>
                        <select class="form-control" name="variant_id" required>
                            <option value="">Select a variant</option>
                            @foreach ($variants as $variant)
                                <option value="{{ $variant->id }}" {{ $product->variant_id == $variant->id ? 'selected' : '' }}>
                                    {{ $variant->ram_smartphone }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button style="margin-top: 20px" class="btn btn-primary" type="submit">Update Product</button>
                </form>
            </div>
        </div>

        @include('layout.admin.footer')
    </div>
</div>

<!-- Core JS Files -->
<script src="{{ asset('asset-admin/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('asset-admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Other JS Libraries -->
<script src="{{ asset('asset-admin/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/plugin/jsvectormap/world.js') }}"></script>
<script src="{{ asset('asset-admin/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/kaiadmin.min.js') }}"></script>
<script src="{{ asset('asset-admin/js/setting-demo.js') }}"></script>
<script src="{{ asset('asset-admin/js/demo.js') }}"></script>

</body>
</html>

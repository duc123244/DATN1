
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
   

    <!-- Fonts and icons -->
    <script src="{{asset('asset-admin/js/plugin/webfont/webfont.min.js')}}"></script>
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
    <link rel="stylesheet" href="{{asset('asset-admin/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset-admin/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset-admin/css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('asset-admin/css/demo.css')}}" />
  </head>
  <body>
  

    <div class="wrapper">
      <!-- Sidebar -->
      @include('layout.admin.sitebar')
      <!-- End Sidebar -->

      <div class="main-panel">
        
        @include('layout.admin.header')
        <div class="container">
          <!-- resources/views/categories/index.blade.php -->

<div class="container mt-4">

  <div class="container mt-4">
    <h1>{{ $product->name_sp }}</h1>

    <div class="card">
        <div class="card-body">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_sp }}" class="img-fluid mb-3">
            @endif
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> {{ number_format($product->price, 2) }} VNĐ</p>
            <p><strong>Colour:</strong> {{ $product->colour->name ?? 'N/A' }}</p>
            <p><strong>Screen:</strong> {{ $product->screen->name ?? 'N/A' }}</p>
            <p><strong>Ram:</strong> {{ $product->variant->ram_smartphone ?? 'N/A' }}</p>
            <p><strong>Battery:</strong> {{ $product->battery->capacity ?? 'N/A' }}</p>
            <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
            <p><strong>Supplier:</strong> {{ $product->supplier->brand ?? 'N/A' }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </div>
</div>

</div>
        </div>
        @include('layout.admin.footer')
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('asset-admin/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('asset-admin/js/core/popper.min.js')}}"></script>
    <script src="{{asset('asset-admin/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('asset-admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('asset-admin/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('asset-admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('asset-admin/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('asset-admin/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('asset-admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset('asset-admin/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{asset('asset-admin/js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('asset-admin/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('asset-admin/js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset('asset-admin/js/setting-demo.js')}}"></script>
    <script src="{{asset('asset-admin/js/demo.js')}}"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>

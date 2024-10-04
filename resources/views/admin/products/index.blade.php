<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Product</title>
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
  <h1>Products</h1>

  <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
  
  @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  
  <table style="margin-top: 20px" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Variant</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name_sp }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_sp }}" width="50" height="50">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $product->variant ? $product->variant->ram_smartphone : 'Không có' }}<br>
                {{ $product->battery ? $product->battery->capacity : 'Không có' }}
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>
              @if($product->stock >= 5)
                  <span style="color: green; font-weight: bold;">Còn hàng</span>
              @elseif($product->stock > 0 && $product->stock < 5)
                  <span style="color: orange; font-weight: bold;">Sắp hết hàng</span>
              @else
                  <span style="color: red; font-weight: bold;">Hết hàng</span>
              @endif
          </td>
            <td>
              <div class="d-flex flex-column gap-2">
                <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Show</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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

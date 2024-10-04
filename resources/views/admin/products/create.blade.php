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

  <h1>Add Product</h1>
  
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="name_sp">Product Name</label>
          <input type="text" name="name_sp" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" required>
    </div>
      <div class="form-group">
          <label for="stock">Stock</label>
          <input type="number" name="stock" class="form-control" required>
      </div>
  
      <div class="form-group">
          <label class="form-label" for="category_id">Category</label>
          <select class="form-control" name="category_id" required>
              <option value="">Select a category</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
      </div>
  
      <div class="form-group">
          <label class="form-label" for="supplier_id">Supplier</label>
          <select class="form-control" name="supplier_id" required>
              <option value="">Select a supplier</option>
              @foreach ($suppliers as $supplier)
                  <option value="{{ $supplier->id }}">{{ $supplier->brand }}</option>
              @endforeach
          </select>
      </div>
  
      <div class="row">
          <div class="col">
              <label class="form-label" for="ram_variant">RAM</label>
              <select class="form-control" name="variant_id" required>
                  <option value="">Select RAM</option>
                  @foreach ($variants as $variant) 
                      <option value="{{ $variant->id }}">{{ $variant->ram_smartphone }}</option>
                  @endforeach
              </select>
          </div>
          <div class="col">
              <label class="form-label" for="colours">Colour</label>
              <select class="form-control" name="colour_id" required>
                  <option value="">Select colour</option>
                  @foreach ($colours as $colour) 
                      <option value="{{ $colour->id }}">{{ $colour->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="col">
              <label class="form-label" for="battery">Battery</label>
              <select class="form-control" name="battery_id" required>
                  <option value="">Select Battery</option>
                  @foreach ($batterys as $battery) 
                      <option value="{{ $battery->id }}">{{ $battery->capacity }}</option>
                  @endforeach
              </select>
          </div>
          <div class="col">
              <label class="form-label" for="screen_id">Screen</label>
              <select class="form-control" name="screen_id" required>
                  <option value="">Select Screen</option>
                  @foreach($screens as $screen)
                      <option value="{{ $screen->id }}">{{ $screen->name }}</option>
                  @endforeach
              </select>
          </div>
      </div>
  
      <button style="margin-top: 20px" type="submit" class="btn btn-primary">Save</button>
  </form>
  
  

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

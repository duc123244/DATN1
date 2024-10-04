<!doctype html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <!-- /fonts -->
    <!-- css -->
    <link href="asset-loginn/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="asset-loginn/css/style.css" rel='stylesheet' type='text/css' media="all" />
    <!-- /css -->
</head>
<body>
    <style>
        input.login {
            width: 335px;
            margin: 30px auto;
            display: block;
            height: 50px;
            text-align: center;
            font-size: 17px;
            font-weight: normal;
            color: #fff;
            background-color:#3970b0;
            border-color: transparent;
            font-family: 'Raleway', sans-serif;
            transition:all 0.5s ease-in-out;
            cursor:pointer;
        }
        input.login:hover {
            color: #fff;
            background-color:#3970b0;
        }
        .error-message {
            color: red;
            text-align: center;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>

    <h1 class="w3ls">Login</h1>
    <div class="content-w3ls">
        <div class="content-w3ls">
            <div class="content-agile1"></div>
            <div class="content-agile2">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h3 class="w3ls" style="font-size: 24px;text-align: end;color: white">Vui lòng đăng nhập</h3>

                    <!-- Hiển thị lỗi cho trường email -->
                    <div class="form-control w3layouts">
                        <input type="email" name="email" id="email" placeholder="Nhập email" required value="{{ old('email') }}">
                        @error('email')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-control agileinfo">
                        <input type="password" name="password" id="password1" placeholder="Nhập mật khẩu" required>
                        @error('password')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-control w3layouts forgot-password" style="text-align: center;">
                        <a href="#">Quên mật khẩu?</a>
                        <br>
                        <a href="{{ route('register') }}">Bạn chưa có tài khoản ?</a>
                    </div>

                    <input type="submit" class="login" value="Đăng nhập">
                </form>

                <ul class="social-agileinfo wthree2">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
</body>
</html>

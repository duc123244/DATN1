<!doctype html>
<html>
<head>
    <title>Register</title>
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
    <link href="{{ asset('asset-loginn/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('asset-loginn/css/style.css') }}" rel='stylesheet' type='text/css' media="all" />
    <!-- /css -->
</head>
<body>
    <h1 class="w3ls">Register</h1>
    <div class="content-w3ls">
        <div class="content-w3ls">
            <div class="content-agile1">
                <!-- <h2 class="agileits1">Official</h2> -->
                <!-- <p class="agileits2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
            </div>
            <div class="content-agile2">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <h3 class="w3ls" style="font-size: 24px;text-align: end;color: white">Đăng ký tài khoản</h3>
                    <div class="form-control w3layouts">
                        <input type="text" id="firstname" name="name_user" placeholder="Nhập tên" required>
                    </div>
                    <div class="form-control w3layouts">
                        <input type="email" name="email" id="email" placeholder="Nhập email" required>
                    </div>
                    <div class="form-control agileinfo">
                        <input type="password" name="password" id="password1" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="form-control agileinfo">
                        <input type="password" class="lock" name="password_confirmation" placeholder="Xác nhận mật khẩu" id="password2" required>
                    </div>                    
                    <div class="form-control w3layouts forgot-password " style="text-align: center;">
                        <a href="{{ route('login') }}">Bạn đã có tài khoản ?</a>
                    </div>                    
			        <input type="submit" class="register" value="Đăng ký">
                </form>
                <script type="text/javascript">
                    window.onload = function() {
                        document.getElementById("password1").onchange = validatePassword;
                        document.getElementById("password2").onchange = validatePassword;
                    }

                    function validatePassword() {
                        var pass2 = document.getElementById("password2").value;
                        var pass1 = document.getElementById("password1").value;
                        if (pass1 != pass2)
                            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                        else
                            document.getElementById("password2").setCustomValidity('');
                        //empty string means no validation error
                    }
                </script>
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

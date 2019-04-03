<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login NAN reservation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('public/images/logonan.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assetlogi/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>


<div class="container-login100" style="background-image: url('images/bg-01.jpg');">

    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">


        <form class="login100-form validate-form" method="POST" action="{{ route('passwordreset') }}">
            {{ csrf_field() }}
            <span class="login100-form-title p-b-37">
					Modifier votre password
				</span>

            @if (session('success'))
                <div class="text-center alert alert-success input100">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-center input100">
                    {{ session('error') }}
                </div>
            @endif

            <div class="wrap-input100 validate-input m-b-20{{ $errors->has('email') ? ' has-error' : '' }}" data-validate="Entrez  votre  email">
                <input class="input100" type="email" name="email" value="{{ old('email') }}" placeholder=" email">
                <span class="focus-input100"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="wrap-input100 validate-input m-b-25{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Entrer un nouveau  password">
                <input class="input100" type="password" name="password" placeholder="password">
                <span class="focus-input100"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Modifier
                </button>
            </div>
            <a href="{{url('login')}}">Login </a>






        </form>


    </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('public/assetlogi/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/assetlogi/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/assetlogi')}}"></script>
<script src="{{asset('public/assetlogi/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/assetlogi')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/assetlogi/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('public/assetlogi')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/assetlogi/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('public/assetlogi/js/main.js')}}"></script>

</body>
</html>
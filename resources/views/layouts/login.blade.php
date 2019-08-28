<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- sweetalert -->
    <link href="{{ URL::asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Main CSS-->
    <link href="{{ URL::asset('css/main-login.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font-icon css-->
    <link href="{{ URL::asset('font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet" type="text/css" />
    <title>ระบบบริหารจัดการฐานข้อมูล The Prime Real Estate</title>
    <link href="{{URL::asset('/img/favicon.ico')}}" rel="shortcut icon" type="image/x-icon" />
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="row justify-content-center">
            <img src="{{URL::asset('/img/logoprime.png')}}" class="img-thumbnail" alt="profile Pic" height="100px"
                width="100px">
        </div>
        <div class="logo">
            <h1 align="center">The Prime Real Estate</h1>
        </div>
        <div class="login-box">
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <h3 class="login-head">
                    <i class="fas fa-key"></i>
                    เข้าสู่ระบบ
                </h3>
                @if($errors->any())
              
                <font color="red"><center>{{ 'Username หรือ Password ไม่ถูกต้อง!' }}</center></font>
               
                @endif
                <div class="form-group">
                    <label class="control-label">Username:</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="username" value=""
                            class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
                            placeholder="Username">
                       
                    </div>
                </div>
                <div class="form-group">

                    <label class="control-label">Password:</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>

                        <input type="password" name="password" value=""
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                            placeholder="Password">
                    </div>
                </div>
                <div class="form-group row ">





                    <div class="form-check">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('จดจำรหัสผ่าน!') }}
                            </label>
                        </div>

                    </div>
                    <div class="col">

                        {{-- @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="text-decoration: none;">
                        {{ __('ลืมรหัสผ่าน?') }}
                        </a>
                        @endif --}}
                    </div>

                </div>
                <div class="form-group btn-container text-center">
                    <button type="submit" class="btn btn-primary ">
                        <i class="fas fa-sign-in-alt"></i> {{ __('เข้าสู่ระบบ') }}
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('js/sweetalert2.all.min.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
</body>

</html>
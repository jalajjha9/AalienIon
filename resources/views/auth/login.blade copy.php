<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="../assets/img/apple-icon.png"
        />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Saikat-Admin
        </title>
        <meta
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
            name="viewport"
        />
        <!--     Fonts and icons     -->
        <link
            rel="stylesheet"
            type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
        />
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
        />
        <!-- CSS Files -->
        <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
    </head>
    <body class="login-body">
        <div class="login-wrapper">
            <img
                src="../assets/img/company-logo.png"
                alt=""
                class="company-logo"
            />
            <div class="login-box">
                <span class="login-text">Login Here</span>
                <form action="{{ route('login') }}" method="POST">
                @csrf
                    <div class="login-input-section">
                        <label class="login-input-label">Username:</label>
                        <div class="login-inputbox-section">
                            <i class="fa fa-user login-input-icon"></i>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control login-input @error('email') is-invalid @enderror"
                                placeholder="username"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                            />
                        </div>
                        @error('email')
                            <span class="invalid-feedback" style="display: block !important;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login-input-section">
                        <label class="login-input-label">Password:</label>
                        <div class="login-inputbox-section">
                            <i class="fa fa-lock login-input-icon"></i>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control login-input @error('password') is-invalid @enderror"
                                placeholder="password"
                                required autocomplete="current-password"
                            />
                        </div>
                        @error('password')
                            <span class="invalid-feedback" style="display: block !important;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login-forgot">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: #ffffff !important; font-size: 15px;">Forgot Password?</a>
                        @endif
                        <p style="color: #ffffff;font-size: 15px;"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</p>
                    </div>
                    <input
                        type="submit"
                        name="login"
                        value="Login"
                        class="login-submit"
                    />
                    <!-- <button type="submit" class="login-submit">Login</button> -->
                </form>
            </div>
        </div>
    </body>
</html>

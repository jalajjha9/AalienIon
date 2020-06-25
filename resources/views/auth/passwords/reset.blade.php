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
        <link
            href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/css/style.css') }}"
            rel="stylesheet"
            media="screen"
        />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <!-- <link href="../assets/demo/demo.css" rel="stylesheet" /> -->
    </head>
    <body class="login-body">
        <div class="login-wrapper">
            <img
                src="../../assets/img/company-logo.png"
                alt=""
                class="company-logo"
            />
            <div class="login-box">
                <span class="login-text">{{ __('Reset Password') }}</span>
                <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                    <div class="login-input-section">
                        <label class="login-input-label">E-Mail Address:</label>
                        <div class="login-inputbox-section">
                            <i class="fa fa-user login-input-icon"></i>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control login-input @error('email') is-invalid @enderror"
                                placeholder="username"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
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
                                required autocomplete="new-password"
                            />
                        </div>
                        @error('password')
                            <span class="invalid-feedback" style="display: block !important;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login-input-section">
                        <label class="login-input-label">Confirm Password:</label>
                        <div class="login-inputbox-section">
                            <i class="fa fa-lock login-input-icon"></i>
                            <input
                                id="password-confirm"
                                type="password" 
                                class="form-control login-input" 
                                name="password_confirmation" 
                                placeholder="confirm password"
                                required autocomplete="new-password"
                            />
                        </div>
                        @error('password')
                            <span class="invalid-feedback" style="display: block !important;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                   
                    <button
                    type="submit"
                        name="login"
                        class="login-submit"
                    >{{ __('Reset Password') }}</button>
                    
                </form>
            </div>
        </div>
    </body>
</html>

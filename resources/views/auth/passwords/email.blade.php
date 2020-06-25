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
                src="../assets/img/company-logo.png"
                alt=""
                class="company-logo"
            />
            <div class="login-box">
                <span class="login-text">{{ __('Reset Password') }}</span>
                @if (session('status'))
                    <div class="alert alert-success" style="margin-top:10px" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="POST">
                @csrf
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
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                            />
                        </div>
                        @error('email')
                            <span class="invalid-feedback" style="display: block !important;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <button
                        type="submit"
                        class="login-submit"
                    >{{ __('Send Password Reset Link') }}</button>
                    
                </form>
            </div>
        </div>
    </body>
</html>

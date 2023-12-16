<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../webpanel/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('webpanel/img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('webpanel/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('webpanel/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('webpanel/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('webpanel/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('webpanel/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('webpanel/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('webpanel/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('webpanel/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('webpanel/js/config.js') }}"></script>
</head>

<body>
    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <div class="card p-2">
                    <div class="app-brand justify-content-center mt-5">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-text demo text-heading fw-semibold">Komiksea</span>
                        </a>
                    </div>
                    <div class="card-body mt-2">
                        <h4 class="mb-2">KomikSea! 👋</h4>
                        <p class="mb-4">Login untuk mengelola komik</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('login.process') }}" method="POST">
                            @csrf
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('name') }}"
                                    placeholder="Enter your email or username" autofocus />
                                <label for="email">Email</label>
                            </div>
                            <div class="mb-3">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password" class="form-control"
                                                name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="mdi mdi-eye-off-outline"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <img src="{{ asset('webpanel/img/illustrations/tree-3.png') }}" alt="auth-tree"
                    class="authentication-image-object-left d-none d-lg-block" />
                <img src="{{ asset('webpanel/img/illustrations/auth-basic-mask-light.png') }}"
                    class="authentication-image d-none d-lg-block" alt="triangle-bg"
                    data-app-light-img="illustrations/auth-basic-mask-light.png') }}"
                    data-app-dark-img="illustrations/auth-basic-mask-dark.png') }}" />
                <img src="{{ asset('webpanel/img/illustrations/tree.png') }}" alt="auth-tree"
                    class="authentication-image-object-right d-none d-lg-block" />
            </div>
        </div>
    </div>
    <script src="{{ asset('webpanel/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('webpanel/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('webpanel/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('webpanel/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('webpanel/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('webpanel/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('webpanel/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>

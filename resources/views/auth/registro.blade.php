<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Talento F5 | Login </title><!--begin::Primary Meta Tags-->    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Register Page v2">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <link rel="icon" href="{{asset('img/f5.png')}}" type="image/x-icon">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../../../dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)-->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head> <!--end::Head--> <!--begin::Body-->

<body class="register-page bg-body-secondary">
    <div class="register-box"> <!-- /.register-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header"> <a href="{{route('register')}}" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"> <b>Talento</b>F5
                    </h1>
                </a> </div>
            <div class="card-body register-card-body">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="form-floating"> 
                            <input id="registerFullName" type="text" class="form-control @error('name') is-invalid
                            @enderror" placeholder="" name="name" value="{{old('name')}}"> 
                            <label for="registerFullName">Nombres</label> 
                        </div>
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                        @error('name')
                            <div class="invalid-feedback d-block text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-1">
                        <div class="form-floating"> 
                            <input id="registerFullName" type="text" class="form-control @error('apellidos') is-invalid
                            @enderror" placeholder="" name="apellidos" value="{{old('apellidos')}}"> 
                            <label for="registerFullName">Apellidos</label> 
                        </div>
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                        @error('apellidos')
                            <div class="invalid-feedback d-block text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-1">
                        <div class="form-floating"> 
                            <input id="registerFullName" type="text" class="form-control @error('tel') is-invalid
                            @enderror" placeholder="" name="tel" value="{{old('tel')}}"> 
                            <label for="registerFullName">Telefono</label> 
                        </div>
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                        @error('tel')
                            <div class="invalid-feedback d-block text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-1">
                        <div class="form-floating"> 
                            <input id="registerEmail" type="email" class="form-control @error('email') is-invalid
                            @enderror" placeholder="" name="email" value="{{old('email')}}"> 
                            <label for="registerEmail">Email</label> 
                        </div>
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                        @error('email')
                            <div class="invalid-feedback d-block text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-1">
                        <div class="form-floating"> 
                            <input id="registerPassword" type="password" class="form-control @error('password') is-invalid
                            @enderror" placeholder="" name="password"> 
                            <label for="registerPassword">Password</label> 
                        </div>
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                        @error('password')
                            <div class="invalid-feedback d-block text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> <!--begin::Row-->

                    <div class="row">
                        <div class="col-4 mx-auto mt-2">
                            <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Sign In</button> </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </form>
                <div class="social-auth-links text-center mb-3 d-grid gap-2">
                    <p>- OR -</p> <a href="#" class="btn btn-primary"> <i class="bi bi-facebook me-2"></i> Sign in using Facebook
                    </a> <a href="#" class="btn btn-danger"> <i class="bi bi-google me-2"></i> Sign in using Google+
                    </a>
                </div> <!-- /.social-auth-links -->
                <p class="mb-0"> <a href="login.html" class="link-primary text-center">
                        I already have a membership
                    </a> </p>
            </div> <!-- /.register-card-body -->
        </div>
    </div> <!-- /.register-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!--end::Script-->
</body><!--end::Body-->

</html>
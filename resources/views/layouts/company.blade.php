<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('include.backend.header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
@stack('css')

<body>
    <!-- begin: header  -->
    <header>
        <!--begin: top navbar -->

        <nav class="navbar navbar-expand top-nav-bg px-3 px-lg-5">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3 text-white">
                    <img class="sidebar_toggle_img" src="/Assets/right-arrow (1).png"
                        style="height: 26px;filter: invert(1);">
                </button>
                <div class="collapse navbar-collapse justify-content-end px-0" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-none d-lg-flex">
                        <li class="nav-item">
                            <a class="nav-link ps-0 text-white " aria-current="page" href="#">
                                <img class="img-fluid" src="/Assets/ri_facebook-fill.svg" alt="fb icon" width="20"
                                    height="" />
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0 text-white" href="#">
                                <img class="img-fluid" src="/Assets/ri_twitter-x-fill.svg" alt="twitter icon" width="17"
                                    height="" />
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0 text-white" href="#">
                                <img class="img-fluid" src="/Assets/iconoir_instagram.svg" alt="insta icon" width="21"
                                    height="" />
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0 text-white" href="#">
                                <img class="img-fluid" src="/Assets/basil_linkedin-solid.svg" alt="linkedin icon"
                                    width="20" height="" />
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-0 text-white" href="#">
                                <img class="img-fluid" src="/Assets/formkit_youtube.svg" alt="youtube icon" width="19"
                                    height="" />
                            </a>
                        </li>
                    </ul>
                    <span class="navbar-text d-flex gap-3">

                        @auth

                        <a class="text-decoration-none d-flex align-items-center" href="/login">
                            <img class="img-fluid pe-2 pb-1" src="/Assets/new-icons/solar_user-line-duotone.svg"
                                alt="youtube icon" width="27" height="" />
                            <span class="text-white">{{auth()->user()->name}}</span>
                        </a>
                        <div style="color: rgba(217, 217, 217, 0.42)" class="vr"></div>

                        <form method="post" action="{{asset('logout')}}" id="logout-id" style="margin-bottom:0;">
                            @csrf
                            <a class="text-decoration-none d-flex align-items-center" href="javascript:;"
                                onclick="document.getElementById('logout-id').submit();">
                                <img class="img-fluid pe-2 pb-1" src="/Assets/logout 1.svg" alt="youtube icon"
                                    width="23" height="" />
                                <span class="text-white">Logout</span>
                            </a>
                        </form>
                        @else

                        <a class="text-decoration-none d-flex align-items-center" href="/login-new">
                            <img class="img-fluid pe-2 pb-1" src="/Assets/new-icons/solar_lock-line-duotone.svg"
                                alt="youtube icon" width="27" height="" />
                            <span class="text-white">Login</span>
                        </a>
                        <div style="color: rgba(217, 217, 217, 0.42)" class="vr"></div>

                        <a class="text-decoration-none d-flex align-items-center" href="/register-new">
                            <img class="img-fluid pe-2 pb-1" src="/Assets/new-icons/solar_user-line-duotone.svg"
                                alt="youtube icon" width="28" height="" />
                            <span class="text-white">Sign Up</span>
                        </a>

                        @endauth

                    </span>
                </div>
            </div>
        </nav>
        <!--end: top navbar -->

        <!--begin: bottom navbar -->
        @yield('bottom_navbar')

        <!--end: bottom navbar -->
    </header>
    <!--end: header-->

    @yield('sidebar')
    <!--begin: main content-->
    @yield('content')
    <!--end: main content-->

    <!--Start: Login first modal-->
    <x-AuthenticationModal message="To Make A Donation Please Sing UP Now" id="AuthantictionModal" />

    <x-AuthenticationModal message="Your are not enabled to donate" id="donateModal" />
<!--End: Login first modal-->

    <footer>
        @yield('footer')
    </footer>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/users_profile.js?token=').time() }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    
    <script type="text/javascript" src="{{asset('js/costom.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>

    <!--begin:js-->
    <!-- slider JS -->
    @yield('scripts')
    <!--end:js-->
</body>
@stack('js')
<script>
</script>
</html>
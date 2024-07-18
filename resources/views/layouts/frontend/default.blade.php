<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
          @include('include.header')
    </head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <link href="{{asset('css/user_profile/style.css?token=').time()}}" rel="stylesheet">
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
                <div class="collapse navbar-collapse justify-content-end px-0" id="navbarText">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-none d-lg-flex">
                    <li class="nav-item">
                      <a class="nav-link ps-0 text-white " aria-current="page" href="#">
                        <img class="img-fluid" src="/Assets/ri_facebook-fill.svg" alt="fb icon" width="20" height="" />
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link ps-0 text-white" href="#">
                        <img class="img-fluid" src="/Assets/ri_twitter-x-fill.svg" alt="twitter icon" width="17" height="" />
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link ps-0 text-white" href="#">
                        <img class="img-fluid" src="/Assets/iconoir_instagram.svg" alt="insta icon" width="21" height="" />
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link ps-0 text-white" href="#">
                        <img class="img-fluid" src="/Assets/basil_linkedin-solid.svg" alt="linkedin icon" width="20" height="" />
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link ps-0 text-white" href="#">
                        <img class="img-fluid" src="/Assets/formkit_youtube.svg" alt="youtube icon" width="19" height="" />
                      </a>
                    </li>
                  </ul>
                  <span class="navbar-text d-flex gap-3">
                   
                    @auth
                    
                    <a class="text-decoration-none d-flex align-items-center" href="/login">
                      <img class="img-fluid pe-2 pb-1" src="/Assets/new-icons/solar_user-line-duotone.svg" alt="youtube icon" width="27" height="" />
                      <span class="text-white">{{auth()->user()->name}}</span>
                    </a>
                    <div style="color: rgba(217, 217, 217, 0.42)" class="vr"></div>
                    
                    <form method="post" action="{{asset('logout')}}" id="logout-id" style="margin-bottom:0;">
                        @csrf
                    <a class="text-decoration-none d-flex align-items-center"  href="javascript:;" onclick="document.getElementById('logout-id').submit();">
                      <img class="img-fluid pe-2 pb-1" src="/Assets/logout 1.svg" alt="youtube icon" width="23" height="" />
                      <span class="text-white">Logout</span>
                    </a>
                    </form>
                    @else
                    
                     <a class="text-decoration-none d-flex align-items-center" href="/login-new">
                      <img class="img-fluid pe-2 pb-1" src="/Assets/new-icons/solar_lock-line-duotone.svg" alt="youtube icon" width="27" height="" />
                      <span class="text-white">Login</span>
                    </a>
                    <div style="color: rgba(217, 217, 217, 0.42)" class="vr"></div>
                    
                    <a class="text-decoration-none d-flex align-items-center" href="/register-new">
                      <img class="img-fluid pe-2 pb-1" src="/Assets/new-icons/solar_user-line-duotone.svg" alt="youtube icon" width="28" height="" />
                      <span class="text-white">Sign Up</span>
                    </a>
                    
                    @endauth
                    
                  </span>
                </div>
              </div>
            </nav>
             <!--end: top navbar -->
             @include('include.NotifictionModal')
             </header>
            <!--begin: bottom navbar -->
            @yield('bottom_navbar') 
            
             <!--end: bottom navbar -->
        
        <!--end: header-->
        
        <!--begin: main content-->
        @yield('content')
        <!--end: main content-->
        
    <footer>
        @yield('footer')
    </footer>
    
<!--Start: Login first modal-->
    <x-AuthenticationModal message="Login First Before Invite" id="AuthenticationModalForInvite" />
<!--End: Login first modal-->
<!--Start: Login first modal-->
    <x-AuthenticationModal message="To Make A Donation Please Sing UP Now" id="AuthantictionModal" />

    <x-AuthenticationModal message="Your are not enabled to donate" id="donateModal" />
<!--End: Login first modal-->
    <!--begin:js-->
    <!-- slider JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        @yield('scripts')
        @if ($message = Session::get('success'))
        <script>
        $('#NotifictionModal').modal('show');
        </script>
        @endif
        @if ($message = Session::get('error'))
        <script>
        $('#NotifictionModal').modal('show');
        </script>
        @endif
        
        @if ($message = Session::get('successEmail'))
        <script>
        $('#NotifictionModal').modal('show');
        </script>
        @endif
        <script>
        function facebook_open()
        {
            event.preventDefault();
            var    url = 'https://www.facebook.com/sharer/sharer.php?u={{route('index')}}&display=popup&amp%3Bsrc=sdkpreparse';
             window.open(url);
        }
          
           $('.close-modal-custom').on('click', function(event) {
                $('.modal').modal('hide');
            });
            
        $('.modal-dialog').addClass('modal-dialog-centered');
         
        </script>
        <script type="text/javascript" src="{{asset('js/costom.js?id=').time()}}"></script>
    <!--end:js-->
    @stack('js')
  </body>
</html>

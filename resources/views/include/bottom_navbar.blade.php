  
  
   @php
   $home ="";
   $commemoration ="";
   $Events ="";
   $donations ="";
   $Mission ="";
    $commemorations = "";

   @endphp
@if (Request::path() == '/')
   @php
   $home ="active";
   @endphp
@endif
@if (Request::path() == 'commemoration')

    @php
   $commemoration ="active";
   @endphp
@endif
@if (Request::path() == 'events')
    @php
   $Events ="active";
   @endphp
@endif
@if (Request::path() == 'donations')
   @php
   $donations ="active";
   @endphp
@endif
@if (Request::path() == 'mission')
   @php
   $Mission ="active";
   @endphp
@endif
@if (Request::path() == 'commemorations')
@php
$commemorations = 'active';
@endphp
@endif




<nav class="navbar navbar-expand-lg py-3 px-3 px-lg-5 position-absolute w-100">
    <div class="container-fluid">
        <a class="navbar-brand navbar-brand-1 " href="/">
            <img class="img-fluid Logo_vettoriale me-3" src="{{asset('/Assets/Logo_vettoriale.svg')}}" alt="fb icon" width="200" height="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  margin-left-3" id="navbarNavAltMarkup">
            <div class="navbar-nav align-items-start justify-content-between w-100">
                <a class="navbar-brand navbar-brand-2" href="/">
                    <img class="img-fluid Logo_vettoriale me-3" src="{{asset('/Assets/Logo_vettoriale.svg')}}" alt="fb icon" width="200" height="" />
                </a>
                <a class="nav-link text-capitalize " aria-current="page" href="/"><span class="{{$home}} ">Home</span> </a>
                {{-- <a class="nav-link text-capitalize  " href="/commemoration"><span class="{{$commemoration}} ">commemoration</span></a> --}}
                <a class="nav-link text-capitalize  " href="/commemorations"><span class="{{$commemorations}} ">commemorations</span></a>
                <a class="nav-link text-capitalize  " href="/events"><span class="{{$Events}} ">Events</span></a>
                <a class="nav-link text-capitalize  " href="/donations"><span class="{{$donations}} ">donations</span></a>
                <a class="nav-link text-capitalize  " href="/mission"><span class="{{$Mission}} ">Mission </span></a>
                @include("partials/donationBtn")
            </div>
        </div>
    </div>
</nav>
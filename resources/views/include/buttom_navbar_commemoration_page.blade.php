<link rel="stylesheet" type="text/css" href="{{ asset('css/user_profile/comm.css?token=').time() }}" />
@php
$home ="";
$commemoration ="";
$Events ="";
$donations ="";
$Mission ="";
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
@if (Request::path() == 'Mission')
@php
$Mission ="active";
@endphp
@endif



<nav class="navbar navbar-expand-lg py-3 px-3 px-lg-5 position-absolute w-100 mt-2 mt-lg-5 mt-md-5 mt-sm-4">
    <div class="container-fluid container-fluid-comm d-block" style="">
        <div class="navbar-brand-com">
            <a class="navbar-brand" href="/" style="z-index:0;">
                <img class="img-fluid Logo_vettoriale" src="{{asset('/Assets/Logo_vettoriale.svg')}}" alt="fb icon"
                    width="200" />
            </a>
        </div>
        <div class=" d-flex flex-row-reverse" style="z-index:1; ">
            <button class="navbar-toggler d-flex" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup1" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation" style="z-index:1;">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
        <div class="collapse  margin-left-3 p-3 navbar-collapse-comm w-100" id="navbarNavAltMarkup1"
            style="flex-basis: 100%;flex-grow: 1;position: absolute;right: 0px;top: 62px;">
            <div class="navbar-nav navbar-nav-comm align-items-center flex-column w-100 ">
                <a class="nav-link text-capitalize " aria-current="page" href="/"><span class="{{$home}} ">Home</span>
                </a>
                <a class="nav-link text-capitalize  " href="/commemoration"><span
                        class="{{$commemoration}} ">commemoration</span></a>
                <a class="nav-link text-capitalize  " href="/events"><span class="{{$Events}} ">Events</span></a>
                <a class="nav-link text-capitalize  " href="/donations"><span
                        class="{{$donations}} ">donations</span></a>
                <a class="nav-link text-capitalize  " href="/mission"><span class="{{$Mission}} ">Mission</span></a>
                <a class="nav-link text-capitalize hero-btn px-4 d-flex align-items-center" @auth href="/payment-method"
                    @else data-toggle="modal" data-target="#AuthantictionModal" @endauth>
                    <span1 class="me-2">DONATE</span1>
                    <img class="img-fluid" src="{{asset('/Assets/AdobeStock_398524235 1 (1).svg')}}" alt="donate heart"
                        width="24" height="22" />
                </a>
            </div>
        </div>

    </div>
</nav>
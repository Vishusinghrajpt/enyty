@extends('layouts.frontend.default')

@section('title') Donations - {{env('APP_NAME')}} @endsection

@section('bottom_navbar') @include('include.bottom_navbar') @endsection

@section('content')
@include('include.InviteEmailModal')
<link rel="stylesheet" href="{{ url('public/css/frontend/customstyle.css') }}">
<main>
    <style>
    .n-page-section {
        background-image: url(/Assets/Donations_background_1.svg);
        background-repeat: no-repeat;
        /*background-position:center;*/
        background-size: cover;
    }

    .bg-Ellipse_13 {
        min-height: 100px !important;
        position: relative;
        display: flex;
        align-items: center;
    }

    .bg-Ellipse_13 img {
        position: absolute;
        left: -50px;
    }

    .n-page-section2 {
        background-image: url(./Assets/Background_donation.svg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    .image-first {
        background-image: url(/Assets/Group\ 16.png);
        background-size: contain;
        >
    }

    .second-section {
        background-color: #F8FBFD;
    }

    .cards-bg1 {
        background: #F8FBFD;
        box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.09);
    }

    .fred_clr {
        color: #465A7B;
    }

    .card-image1 {
        margin-top: -4rem;
    }

    .n-pagination {
        pointer-events: none;
        background: #456297;
    }

    .section2-bg {
        background: rgba(179, 212, 231, 0.10);
    }

    .input_img {
        background: gainsboro;
        height: 270px;
        width: 270px;
        border-radius: 50%;
        box-shadow: 0px 0px 20px -2px #2565f54f;
        position: relative;

    }
    .donate_today .nav-link{
        height: 128px;
        font-size: 25px;
        font-weight: 200 !important;
        width: 209px;
        flex-direction: column;
        justify-content: center;
    }
    .donate_today .nav-link img{
        width: 42px !important;
    }
    </style>
    <section
        class="top_section container-fluid home-hero-desk-h home-hero-mob-h px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4 n-page-section py-5">

        <h1 class="mt-5 pt-5 text-center text-capitalize col-12 col-lg-6 col-md-7 col-sm-8">
            Help Us To Make {{env('APP_NAME')}} Eternal
        </h1>
        <p class="text-center txt-light  h5 col-12 col-lg-6 col-md-7 col-sm-8 ">
            To make this happen we need your help. {{env('APP_NAME')}} will revolutionize the concept of remembering
            people who are gone, and will make every effort to ensure that they are not forgotten.
        </p>
        <a class="cursor-pointer" @auth href="/payment-method" @else data-toggle="modal"
            data-target="#AuthantictionModal" @endauth>
            <button class="btn hero-btn px-4 fw-bold h5">
                Contribute

            </button>
        </a>
    </section>

    <section class="p-3 p-lg-5">
        <div class="container">
            <div class="row justify-content-around py-5">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 bg-white rounded-5  d-flex align-items-center  flex-column p-4"
                    style="box-shadow: 0px 0px 26px -2px #297afe38;">
                    <img class="img-fluid mx-auto mx-lg-0 py-4" width="82"
                        src="{{asset('Assets/AdobeStock_3985242352.svg')}}" alt="">
                    <h1 class="pb-4 text-center ">Donate To Create A Profile</h1>

                    <p class="col-12 txt-light text-center new_donate_para_1 h5 px-5 pb-4">

                        To maintain the authenticity and ethical integrity of our commemorative

                        platform, we need users to make a donation, which not only helps support our

                        mission but also ensures a respectful environment disincentivizing

                        the creation of inappropriate profiles
                    </p>
                    <!-- </p> ending of single para -->
                </div>

            </div>

        </div>
    </section>


    <section class=" p-4 p-lg-5 n-page-section2">
        <div class="container d-flex flex-column align-items-center">
            <div class="row text-center pb-5">
                <h1>
                    Help The Project <br> if you believe in the cause
                </h1>
                <p class="new_helptheproject h5">
                    The donations you make, will go towards the future development and improvement <br> of the website
                    and overall experience of {{env('APP_NAME')}} as mentioned below
                </p>
            </div>
            <div class="row py-0 py-md-5 py-sm-5 py-lg-5 justify-content-between">
                <div class="col-11 co-sm-4 col-lg-4 col-md-4">
                    <h2 class="text-capitalize bg-Ellipse_13">
                        <img src="{{asset('Assets/Ellipse_13.svg')}}" height="93">
                        Machine <br> Learning

                    </h2>
                    <p class="h5">
                        Implement machine learning to help memorialized people not to be forgotten
                    </p>
                </div>
                <div class="col-11 co-sm-4 col-lg-4 col-md-4">
                    <h2 class="text-capitalize bg-Ellipse_13">
                        <img src="{{asset('Assets/Ellipse_13.svg')}}" height="93">
                        User <br> Authentication
                    </h2>
                    <p class="h5">
                        Creating a system to authenticate people by avoiding possible false profiles out of respect for
                        the people commemorated
                    </p>
                </div>
            </div>
            <div class="row py-0 py-md-5 py-sm-5 py-lg-5 justify-content-between">
                <div class="col-11 co-sm-4 col-lg-4 col-md-4">
                    <h2 class="text-capitalize bg-Ellipse_13">
                        <img src="{{asset('Assets/Ellipse_13.svg')}}" height="93">
                        Application <br> Development
                    </h2>
                    <p class="h5">
                        We would like to create a gorgeous application for both IOS and ANDROID devices
                    </p>
                </div>
                <div class="col-11 co-sm-4 col-lg-4 col-md-4">
                    <h2 class="text-capitalize bg-Ellipse_13">
                        <img src="{{asset('Assets/Ellipse_13.svg')}}" height="93">
                        Custom <br>Themes
                    </h2>
                    <p class="h5">
                        Creation of themes that you can choose to match your memorial profile, even according to your
                        religion
                    </p>
                </div>
            </div>

            <p class="h5">And much more</p>

        </div>
    </section>


    <section class="p-3 p-lg-5">
        <div class="container">
            <div class="row justify-content-center py-5 donate_today">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 rounded-5  d-flex align-items-center  flex-column py-5"
                    style="box-shadow: 0px 0px 26px -2px #297afe38;
                            background:url(/Assets/donation_bg.svg);
                            background-position: center;
                            background-repeat: no-repeat;
                            height: 500px;
                            justify-content: center;">
                    <h1 class="pb-4">Donate Today </h1>
                      @include("partials/donationBtn")
                    <p class="mt-3 h5 px-4">Donate in a secure way, via Stripe connected with ENYTY.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="recent_donar">
        <div>
            <h2 class="text-capitalize mb-4 mb-lg-5 text-center">
                Recent Donor
            </h2>
        </div>
        <div class="container-fluid text-center my-3 px-1 px-lg-5 px-md-5 px-sm-5">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide px-5" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">

                        @foreach($users as $user)
                        <div class="carousel-item active" style="min-height: 417px;">
                            <div class="col-md-3 px-3">
                                <div class="slide-col1 p-3 p-lg-4 box-shadow1 my-3">
                                    <img src="{{$user->user->avatar ?? ''}}" class="img-fluid rounded mb-3 n-memory-image"
                                        width="200" height="200" style="border-radius: 50% !important;" />
                                    <h1 style="color:#456297;"><strong>@if($user->currency != 'inr') $  @else ₹ @endif{{$user->amount ?? ''}}</strong> </h1>
                                    <h4 class="font-league text-uppercase">
                                        {{$user->user->name ?? ''}}
                                    </h4>
                                    <p class="mb-1 text-uppercase n-font-text">
                                        {{$user->user->country->name  ?? ''}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach


                        @foreach($posts as $user)
                        <div class="carousel-item " style="min-height: 417px;">
                            <div class="col-md-3 px-3">
                                <div class="slide-col1 p-3 p-lg-4 box-shadow1 my-3">
                                    <img src="{{$user->user->avatar ?? ''}}" class="img-fluid rounded mb-3 n-memory-image"
                                        width="200" height="200" style="border-radius: 50% !important;" />
                                    <h1 style="color:#456297;"><strong>@if($user->currency != 'inr') $  @else ₹ @endif {{$user->amount ?? ''}}</strong> </h1>
                                    <h4 class="font-league text-uppercase">
                                        {{$user->user->name ?? ''}}
                                    </h4>
                                    <p class="mb-1 text-uppercase n-font-text">
                                        {{$user->user->country->name ?? ''}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="prev">
                        <img class="img-fluid" src="./Assets/new-icons/ic_twotone-play-arrow@2x.svg" alt=""
                            width="60" />
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="next">
                        <img class="img-fluid" src="./Assets/new-icons/ic_twotone-play-arrow.svg" alt="" width="60" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-0">
        <div class="p-4 p-lg-5 n-page-section2">
            <div>
                <h2 class="text-capitalize mb-4 mb-lg-5 text-center">
                    Invite Others to {{env('APP_NAME')}} website
                </h2>
            </div>
            <div class="d-flex flex-wrap flex-md-nowrap gap-5 justify-content-center align-items-center">
                <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1 email_invite" @auth
                    data-toggle="modal" data-target="#InviteEmailModal" @else data-toggle="modal"
                    data-target="#AuthenticationModalForInvite" @endauth>
                    <img class="img-fluid" width="25" src="./Assets/ic_round-email.png" alt="" />
                    <span class="text-capitalize text-black">Invite by email</span>
                </a>
                <a href="#" class="facebook_open text-decoration-none d-flex flex-column align-items-center gap-1" @auth
                    onclick="facebook_open()" @else data-toggle="modal" data-target="#AuthenticationModalForInvite"
                    @endauth>
                    <img class="img-fluid" width="25" src="./Assets/gg_facebook.png" alt="" />
                    <span class="text-capitalize text-black">Share on facebook</span>
                </a>
            </div>
        </div>
    </section>


</main>

@endsection

@section('footer') @include('include.footer') @endsection

@section('scripts')
<script>
let items = document.querySelectorAll(".carousel .carousel-item");

items.forEach((el) => {
    const minPerSlide = 4;
    let next = el.nextElementSibling;
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = items[0];
        }
        let cloneChild = next.cloneNode(true);
        el.appendChild(cloneChild.children[0]);
        next = next.nextElementSibling;

    }
});

$('.btn_amount').on('click', function() {
    var vl = $(this).attr('data-id');
    $('.man_amount').val(vl);
})
//logout function
</script>
<script src="{{asset('js/index.js')}}"></script>
@endsection
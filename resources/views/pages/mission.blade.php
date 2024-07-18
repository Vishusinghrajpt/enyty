@extends('layouts.frontend.default')

@section('title') Commemoration - {{env('APP_NAME')}} @endsection

@section('bottom_navbar') @include('include.bottom_navbar') @endsection

@section('content')
@include('include.InviteEmailModal')
<main>
    <style>
    .n-page-section {
        background-image: url(/Assets/mission-top-bg.svg);
        background-repeat: no-repeat;
        background-position: bottom center;
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
        background-image: url(./Assets/Rectangle\ 27.png);
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

    .mission_aboutbg {
        background: gainsboro;
        height: 270px;
        width: 270px;
        border-radius: 50%;
        box-shadow: 0px 0px 20px -2px #2565f54f;
        position: relative;

    }
    </style>
    <section
        class="container-fluid home-hero-desk-h home-hero-mob-h px-3 px-lg-5 d-flex flex-column align-items-center gap-3 gap-lg-4 n-page-section justify-content-around py-5">
        <h1 class="my-5 py-5 text-center text-capitalize">Our Mission</h1>
    </section>

    <section class="p-3 p-lg-5">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 co-sm-4 col-lg-4 col-md-4">
                    <h2 class="text-capitalize bg-Ellipse_13">
                        <img src="{{asset('Assets/Ellipse_13.svg')}}" height="93">
                        Accessibility

                    </h2>
                    <p class="h5">
                        {{env('APP_NAME')}} can be accessible from anywhere in the world, allowing family and friends to
                        memorialize their loved ones even if they are physically far away.
                    </p>
                </div>
                <div class="col-12 co-sm-4 col-lg-4 col-md-4 pe-3">
                    <h2 class="text-capitalize bg-Ellipse_13">
                        <img src="{{asset('Assets/Ellipse_13.svg')}}" height="93">
                        Preservation of Memory
                    </h2>
                    <p class="h5">
                        {{env('APP_NAME')}} can serve as an Eternal place to preserve the memory of people who are gone.
                        This can help preserve their memory through time.
                    </p>
                </div>
                <div class="col-12 co-sm-4 col-lg-4 col-md-4">
                    <h2 class="text-capitalize bg-Ellipse_13">
                        <img src="{{asset('Assets/Ellipse_13.svg')}}" height="93">
                        Digitalization
                    </h2>
                    <p class="h5">
                        In the future, generations born in a purely digital age may find {{env('APP_NAME')}} useful, in
                        addition to the traditional approach, to have an online space to memorialize their loved ones.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="p-3 p-lg-5" style="background: #b3d4e724;">
        <div class="container">
          <div class="row py-5 d-flex justify-content-around">
             <h2 class="text-center mb-5">Stay up to date</h2>
             <p class="text-center">Nowadays there is so much technology and yet something is missing. There is no portal where we can see if some distant relative or some relative of a close friend of ours has passed away. We are left behind. This is still handled by "word of mouth" which is not reliable and appropriate for such an important issue that affects all of us. Therefore Eternity in the Events section wants to make up for this lack and perhaps, one day replace the waste of paper that surrounds our cities so that we can have at our fingertips the latest news regarding funerals or related memorial ceremonies (based on the person's religion).</p>
          </div>
        </div>
    </section>


    <section class="p-3 p-lg-5">
        <div class="container">
          <div class="row py-5 d-flex justify-content-around">
             <h2 class="text-center mb-5">Eco-friendly</h2>
             <p class="text-center">
                 Enyty supports the nature.<br><br> Still in many countries around the world there is the custom of putting up funeral posters on the walls. Just imagine how much paper, ink and adhesive glue is used to spread the news in cities. Through the Events section, the funeral posters will not only simplify and make dissemination more efficient but also be eco-friendly.
             </p>
          </div>
        </div>
    </section>


    <section class="p-3 p-lg-5" style="background: #b3d4e724;">
        <div class="container">
          <div class="row py-5 d-flex justify-content-around">
             <h2 class="text-center mb-5">Do you have any segregation?</h2>
             <p class="text-center">
                Enyty wants to propose globally, so we are all welcome here. Your opinion is crucial for us, if you have a thought to dedicate to this project, we welcome it with great pleasure and respect. Whoever you are, whatever beliefs you have, it will be important.
             </p>
          </div>
        </div>
    </section>


    <section class="p-3 p-lg-5">
        <div class="container">
            <div class="row py-5 d-flex justify-content-around">
                <div class="col-12 d-flex justify-content-around py-3">
                    <h1 >About Founder</h1>
                </div>
                <div class="col-12 d-flex justify-content-around py-3">
                    <div class="mission_aboutbg d-flex align-items-center justify-content-around"
                        style="cursor: pointer; ">
                        <img src="https://enyty.com/Assets/Vector.svg" id="pro_img" height="100px">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-around py-3">
                    <p class="h5 text-center">
                        My name is Ludovico, I am a Mechanical Engineer. I always wanted to create
                        something could be useful for the world. Something that could stay and
                        endure forever, but more than anything, something that could help all of
                        us to leave a trace of our passage here on earth. I strongly believe that
                        every single person is special and we all have the same privilege.
                    </p>
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

@section('scripts') @endsection
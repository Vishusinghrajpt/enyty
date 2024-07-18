@extends('layouts.frontend.default')

@section('title') Events - Event @endsection
<link href="{{ asset('css/user_profile/events.css?token=').time() }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
@section('bottom_navbar') @include('include.bottom_navbar') @endsection

@section('content')
@include('include.InviteEmailModal')
<style>

/* events css end   */
</style>


<section style="
      background-image: linear-gradient(#ffffff00, #ffffff), url(/images/events_background.png);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    " id="section-events" class="container-fluid px-3 px-lg-5 py-5 section-events">
    <div class="d-flex flex-column align-items-center gap-3">
        <h1 class="mt-5 pt-5 text-center text-capitalize">Events</h1>
        @if(auth()->user())
             <p class="text-center txt-light col-12 col-md-8 col-lg-4 h5">
                 Hello {{auth()->user()->name}} below you will find the latest posters published in {{auth()->user()->city->name ?? ''}}, {{auth()->user()->state->name ?? ''}}, {{auth()->user()->country->name ?? ''}} Otherwise search all over the world!
             </p>
        @else
        <p class="text-center txt-light col-12 col-md-8 col-lg-4 h5">
            Here you can view funeral posters published by the funeral home.
        </p>
        <p class="text-center txt-light col-12 col-md-8 col-lg-4 h5"> <b> Create your personal account </b> and you will
            be able to automatically view the latest posters in your country. </p>

        @endif
    </div>
    <div></div>
    <!-- section 2 start  -->
    <section id="events_containt" class="container px-3 px-lg-5 py-2 d-flex   flex-column mt-2"
        style=" position: relative;    max-width: 1180px;">
          @include("partials/search",[ 'dataTable' => "#event_poster", 'dataFor' => "events"])
        <div class="events_buttons d-flex flex-column align-items-center" id="events_buttons">
            <div class="mt-3">
                <br>
                <!-- Nav pills -->
                <ul class="nav nav-pills justify-content-center mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase  active ms-0" data-bs-toggle="pill" onclick="searchdata('#input_section','recent')" href="#recent">Recent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" data-bs-toggle="pill" onclick="searchdata('#input_section','weekly')" href="#weekly">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" data-bs-toggle="pill" onclick="searchdata('#input_section','monthly')" href="#monthly">Monthly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase me-0" data-bs-toggle="pill" onclick="searchdata('#input_section','anniversary')" href="#anniversary">Anniversary</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content" style="max-width: 799px;display:flex;min-height: 250px;flex-direction: column;justify-content: center;">
                    <table id="event_poster" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <!-- Add more table headers as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table body rows will be populated by DataTables -->
                        </tbody>
                    </table>
                </div>
                <button class="btn submit_btn_ rounded-4 mb-3 mt-2 text-white py-2 d-none" id="loadMoreEvent" style="display:none;background-color: #456297; font-size:23px;">Load More Event</button>
                <button class="btn submit_btn_ rounded-4 mb-3 mt-2 text-white py-2" id="showLessEvent" style="display:none;background-color: #456297; font-size:23px;">Show Less Event</button>
             
            </div>
        </div>

    </section>
</section>

<!-- section 2 end  -->

<!-- sectio  end  -->

<section class="py-4">
    <div class="p-4 p-lg-5" style="
            background-image: url({{asset('/Assets/posterInviteBack.svg')}});
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
          ">
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
            <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1 facebook_open" @auth
                onclick="facebook_open()" @else data-toggle="modal" data-target="#AuthenticationModalForInvite"
                @endauth>
                <img class="img-fluid" width="25" src="./Assets/gg_facebook.png" alt="" />
                <span class="text-capitalize text-black">Share on facebook</span>
            </a>
        </div>
    </div>
</section>

<section class="p-4 p-lg-5">
    <form id="subscribe-form">
        <div class="mb-3">
            <h1 class="text-capitalize mb-4 text-center h1 ">Newsletter</h1>
            <p class="txt-light text-center text-capitalize mb-4 h5">
                receive updates on the {{env('APP_NAME')}} project
            </p>
            <div class="text-center email-msg mb-1 d-none">
                <small class=" bg-danger p-1 text-light rounded "></small>
            </div>
            <div class="col-12 col-md-8 col-lg-5 mx-auto d-flex position-relative">
                <input type="email" class="form-control txt-light rounded-pill n-input-border" id="subscribe-email"
                    value="" placeholder="Enter Your Email" />
                <button style="background-color: #456297"
                    class="end-0 btn position-absolute text-white px-4 rounded-pill text-uppercase" @guest
                    data-toggle="modal" data-target="#login-first-to-subscribe" @endguest>
                    SUBSCRIBE
                    <img class="img-fluid ms-1" src="{{asset('Assets/pepicons-print_paper-plane.svg')}}" width="20"
                        alt="" />
                </button>
            </div>
        </div>
    </form>
</section>


<!--Start: show-newletter-subscribe-modal-->
<x-subscribe-modal message="Successfully subscribe to our news letters !!" id="subscribe-modal" />
<!--End: show-newletter-subscribe-modal-->

<!--Start: Login first modal-->
<x-AuthenticationModal message="To Subscribe Our NewLetters Please Sing UP Now" id="login-first-to-subscribe" />
<!--End: Login first modal-->

@endsection

@section('footer') @include('include.footer') @endsection

@section('scripts')
<script>
     $(document).ready(function() {
        setupTable('#event_poster', '/events?section="recent"', '#loadMoreEvent', '#showLessEvent',"THERE ARE NO RECENT POSTERS IN YOUR CITY");
    });
</script>

@endsection
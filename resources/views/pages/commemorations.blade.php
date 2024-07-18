@extends('layouts.frontend.default')

@section('title') Commemorations - {{env('APP_NAME')}} @endsection
<link href="{{ asset('css/user_profile/events.css?token=').time() }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>

@section('bottom_navbar') @include('include.bottom_navbar') @endsection


@section('content')
@include('include.InviteEmailModal')

<style>

</style>
<main>
    <section style="
            background-image: linear-gradient(#255da300, #ffffffd1), url(/images/Background_Commemorations.svg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
	    " id="section-events" class="container-fluid px-3 px-lg-5 py-5 section-events">
        <div class="d-flex flex-column align-items-center gap-3">
            <h1 class="mt-5 pt-5 text-center text-capitalize">Commemorations</h1>
            @if(auth()->user())
            <p class="text-center txt-light col-12 col-md-8 col-lg-4 h5">
                Hello {{auth()->user()->name ?? ''}} below you will find the latest Commemorations published in
                {{auth()->user()->city->name ?? ''}}, {{auth()->user()->state->name ?? ''}},
                {{auth()->user()->country->name ?? ''}} Otherwise search all over the world!
            </p>
            @else
            <p class="text-center txt-light col-12 col-md-8 col-lg-4 h5">
                Here you can stay up-to-date on all new arrivals in Enyty and you can search for anyone added to this eternal place!</p>
            <p class="text-center txt-light col-12 col-md-8 col-lg-4 h5 m-0 p-0"> Create your personal account and you will be able to automatically view the latest commemorations in your country.!</p>
            @endif
        </div>
        <div></div>
        <section id="events_containt" class="container px-3 px-lg-5 py-2 d-flex  flex-column mb-5"
            style=" position: relative;max-width: 1180px;">
            @include("partials/search")
            @php
            $condition = $yesterday = $count=1;
            @endphp
            <div class="d-flex flex-column align-items-center" id="main-data">
                <div style="width:100%;">
                    <div class="tab-content" style="display:flex;min-height: 250px;flex-direction: column;justify-content: center;">
                        <table id="user_poster" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                      <div class="d-flex justify-content-center" id="button-sec">
                    <button style="background-color: #456297; font-size:23px; display: none;" id="loadMoreUser"
                        class="btn submit_btn_ rounded-4 mb-3 mt-2 text-white py-2 me-2" >
                        <p style="    margin: 6px;">
                            <strong> Load More</strong>
                            <!-- <img src="{{asset('Assets/Icon_arrow-down.svg')}}" height="30" width="30"> -->
                        </p>
                    </button>

                    <button style="background-color: #456297; font-size:23px;display:none;" id="showLessUser"
                        class="btn submit_btn_ rounded-4 mb-3 mt-2 text-white py-2">
                        <p style="    margin: 6px;">
                            <strong>Show Less</strong>
                            <!-- <img src="{{asset('Assets/Icon_arrow-down.svg')}}" height="30" width="30"
                                style="transform:rotateZ(180deg); margin-bottom: 6px;"> -->
                        </p>
                    </button>
                </div>
                    </div>

                </div>
            </div>

        </section>
    </section>

    <section class="py-4">
        <div class="p-4 p-lg-5" style="
            background-image: url({{asset('/Assets/Rectangle\ 27.png')}});
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
</main>
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
    
</script>

@endsection
@push('js')
<script>
    $(document).ready(function() {
        setupTable('#user_poster', '/commemorations', '#loadMoreUser', '#showLessUser',"THERE ARE NO RECENT MEMORIAL PROFILES IN YOUR CITY");
        
    });
</script>
@endpush
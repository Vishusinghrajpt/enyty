@extends('layouts.frontend.default')

@section('title') Home - Eternity @endsection

@section('bottom_navbar') 
@include('include.bottom_navbar') @endsection

@section('content')


<style>
     .n-font-text {
      font-size: 15px;
     }
     .n-memory-font {
      font-size: 32px;
     }
     .n-memory-image {
      width:"200";
      height:"200";
      min-height: 196.92px;
     }
     .n-image-w {
      margin-bottom: 0.65rem;
     }
     .n-form-width {
      width: 100%;
     }
     .n-div-border {
      border: 2px solid rgba(0, 0, 0, 0.1);
     }
   .paypal-btn {
     background-color: #eff6fa;
     }
     .other-method-btn{
      border: 2px solid #e5e5e5;
     }
     .n-input-border{
      border: 1px solid rgba(0, 0, 0, 0.12);
     }
     .anchor-class{
        color: inherit;
        text-decoration: none;
    }
    #subscribe-email{
        height:auto !important;
    }
   .background-url-home{
        background: rgb(179 212 231 / 8%);
        box-shadow: 13px 19px 30px -2px #EFF6FA;
   }
   .Supporting{
           box-shadow: 0px 0px 20px -2px #297afe36;
   }
</style>
<!--begin: main homepage content  -->


@include('include.AuthantictionModal')
@include('include.InviteEmailModal')

@php
$paypal = "payment_not_allow";
$other_payment ="";
@endphp
@auth
@php
$paypal = "";
$other_payment ="other_payment";
@endphp
@endauth
<main>
  


    <section
        class="top_section container-fluid home-hero-desk-h home-hero-mob-h px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4 py-5">
        <h1 class="mt-5 pt-5 text-center text-capitalize">
            Celebrating a Life: <br />The Privilege To Preserve Their legacy
        </h1>
        <p class="text-center txt-light   h5">
            Here you can honor and share the stories of people that have left an
            unforgettable imprint on our lives. <br />Join us in the eternal
            celebration of lives lived.
        </p>
        <a href="/mission">
        <button class="btn hero-btn px-4 fw-bold h5">
            Learn More
            <img class="ms-1" src="{{asset('Assets/new-icons/solar_arrow-up-outline.svg')}}" alt="learn more arrow" width="18"
                height="" />
        </button>
        </a>
    </section>

    <section class="p-3 p-lg-5">
        <h1 class="text-center text-capitalize h1">
            love, remembrance and tribute
        </h1>
        <p class="text-center txt-light mt-4 mb-5 h5">
            Here you can see the latest people who have joined Eternity
        </p>

        <!-- slider  -->
        <div class="container-fluid text-center my-3">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner py-5 px-3 " role="listbox">
                        @foreach($users as $user)
                        <div class="carousel-item active ">

                            <div class="col-md-4 col-sm-4 col-lg-3 col-12 px-3 ">
                                <a href="/commemoration/{{$user->slug}}" class="anchor-class ">
                                <div class="slide-col p-3 p-lg-4  background-url-home" style="">
                                
                                    <p class="slide-top-section">In The Loving</p>
                                    <img class="img-fluid mb-2 mx-auto slide-top-section" src="{{asset('Assets/new-icons/Layer_1.svg')}}" alt="heart"
                                        width="50" height="" />
                                    <h4 class="mb-3 font-galada n-memory-font slide-top-section">
                                        Memory
                                    </h4>
                                    <img src="{{$user->profile_picture}}" class="img-fluid rounded mb-3 n-memory-image" width="200" height="200"  />
                                
                                    <div class="font-league text-uppercase">
                                        {{$user->frist_name}} {{$user->last_name}}
                                    </div>
                                    <p class="mb-1 text-uppercase n-font-text">
                                        {{date('D m, Y', strtotime($user->birth_date))}} -
                                        {{date('D m, Y', strtotime($user->departure_date))}}
                                    </p>
                                </div>
                                </a>
                            </div>

                        </div>
                        @endforeach
                        
                        @foreach($posts as $user)
                        <div class="carousel-item ">

                            <div class="col-md-4 col-sm-4 col-lg-3 col-12 px-3 ">
                                <a href="/commemoration/{{$user->slug}}" class="anchor-class ">
                                <div class="slide-col p-3 p-lg-4  background-url-home" style="">
                               
                                    <p class="slide-top-section">In The Loving</p>
                                    <img class="img-fluid mb-2 mx-auto slide-top-section" src="{{asset('Assets/new-icons/Layer_1.svg')}}" alt="heart"
                                        width="50" height="" />
                                    <h4 class="mb-3 font-galada n-memory-font slide-top-section">
                                        Memory
                                    </h4>
                                    <img src="{{$user->profile_picture}}" class="img-fluid rounded mb-3 n-memory-image" width="200" height="200"  />
                                
                                    <div class="font-league text-uppercase">
                                        {{$user->frist_name}} {{$user->last_name}}
                                    </div>
                                    <p class="mb-1 text-uppercase n-font-text">
                                        {{date('D m, Y', strtotime($user->birth_date))}} -
                                        {{date('D m, Y', strtotime($user->departure_date))}}
                                    </p>
                                </div>
                                </a>
                            </div>

                        </div>
                        @endforeach


                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="prev">
                        <img class="img-fluid" src="{{asset('Assets/new-icons/ic_twotone-play-arrow@2x.svg')}}" alt=""
                            width="60" />
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                        data-bs-slide="next">
                        <img class="img-fluid" src="{{asset('Assets/new-icons/ic_twotone-play-arrow.svg')}}" alt="" width="60" />
                    </a>
                </div>
            </div>
        </div>
        <!-- slider end  -->

        <div class="mt-5 mb-1 d-flex justify-content-center">
            <a class="txt-light text-decoration-none text-center h5" href="/events">
                Find your commemorated person in Eternity
                <img class="ms-1" src="{{asset('Assets/new-icons/solar_arrow-up-outline.svg')}}" alt="donate heart" width="18"
                    height="" />
            </a>
        </div>
    </section>

    <section class="p-2 p-lg-5 p-md-4 p-sm-5 commemoration_section">
        <div class="p-1 p-lg-5 d-flex flex-column align-items-center justify-content-center gap-3 ">
            <h1 class="text-center h1">Commemoration</h1>
            <p class="text-center txt-light col-12 col-md-9 col-lg-6 mx-auto h5">
                Create a profile of the person memorialized, describing the aspects
                that most distinguished him or her in the journey of life faced here
                on earth, post photos and more!
            </p>
     <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3">
                <div class="my-auto">
                    <h5 class="text-uppercase text-center text-md-end font-bold font-size">
                        November
                    </h5>
                    <h5 class="text-uppercase text-center text-md-end font-size"><span class="border_bottom font-size">07-1970</span></h5>
                </div>
                <div class="col-6 ">
                    <div class="p-4 p-sm-3  p-md-4 img_border_in">
                        <img class="img-fluid" src="{{asset('Assets/AdobeStock_6410838122_1.svg')}}" alt="" height=""
                            width="250" />
                    </div>
                    <h2 class="text-uppercase my-3 my-md-4 font-league text-center ">
                        Fred B. Johnson
                    </h2>
                </div>
                <div class="my-auto">
                    <h5 class="text-uppercase text-center text-md-start font-bold me-0  font-size">
                        November
                    </h5>
                    <h5 class="text-uppercase text-center text-md-start "><span class="border_bottom font-size">20-2023</span>
                    </h5>
                </div>
            </div> 
            
            <a href="/commemoration">
            <button class="btn hero-btn px-4">
                Learn More
                <img class="ms-1" src="{{asset('Assets/new-icons/solar_arrow-up-outline.svg')}}" alt="donate heart" width="18"
                    height="" />
            </button>
            </a>
        </div>
    </section>

    <section class="p-3 p-lg-5 ">
        <div class="p-1 p-lg-5 d-flex justify-content-around payment-section-index">
            <div class="p-4 p-lg-5 rounded-5 d-flex flex-wrap flex-lg-nowrap justify-content-between gap-3 Supporting" style="max-width: 1365px;">
             
                <div class="d-flex flex-column justify-content-center col-12 col-lg-6 payment_div_1">
                
                    <div class="d-flex align-items-end mb-2">
                        <h1 class="text-capitalize mb-1 h1">
                            Supporting <br />a Legacy of L
                        </h1>
                        <img class="img-fluid n-image-w" src="{{asset('Assets/AdobeStock_398524235 1.svg')}}"
                            alt="donate heart" width="30" height="" />
                        <h2 class="mb-1">VE</h2>
                    </div>

                    <p class="txt-light mb-3 col-12 col-md-6 col-lg-8 col-sm-8 h5">If you believe in this project and
                        find it valuable for
                        remembering a loved one and granting them Eternity, your support
                        will be crucial for us.</p>
                    <a href="/donations" class="txt-light text-decoration-none fw-bolder mb-3 ">LEARN MORE
                        <img class="img-fluid mb-1" src="{{asset('Assets//new-icons/ic_twotone-play-arrow.svg')}}" alt=""
                            width="22" />
                    </a>
                    <div class="d-flex align-items-center col-12 col-md-6 col-lg-8 col-sm-8">
                        <form action="{{route('payment')}}" methode="post" class="mb-3 n-form-width">
                            <div class="d-flex flex-lg-nowrap align-items-center rounded-3 btn-group mb-3 n-div-border" role="group"
                                aria-label="Amount options">
                                <input type="button" class="btn_amount btn txt-light" data-id="10" value="$10" />
                                <div class="vr"></div>
                                <input type="button" class="btn_amount btn txt-light" data-id="15" value="$15" />
                                <div class="vr"></div>
                                <input type="button" class="btn_amount btn txt-light" data-id="25" value="$25" />
                                <div class="vr"></div>
                                <input type="button" class="btn_amount btn txt-light" data-id="35" value="$35" />
                                <div class="vr"></div>
                                <input type="number" class="man_amount border-0 form-control txt-light" name="amount"
                                    placeholder="Other amount" />
                                <input type="hidden" class=" border-0 form-control txt-light" name="route" value="index"
                                    placeholder="Other amount" />
                            </div>

                            <button class="btn w-100 rounded-3 mb-3 {{$paypal}} paypal-btn"
                                type="submit" id="paypal-button">
                                <img class="img-fluid" src="{{asset('/Assets/entypo-social_paypal.svg')}}" alt="paypal btn" width="">
                                <img class="img-fluid" src="{{asset('Assets/new-icons/Group 13.svg')}}" alt="paypal btn"
                                    width="110" />
                            </button>

                            <button class="btn w-100 bg-white rounded-3 {{$paypal}} other-method-btn"
                                id="{{$other_payment}}">
                                <img class="img-fluid me-1" src="{{asset('Assets/new-icons/credit-card 1 (1).svg')}}"
                                    alt="paypal btn" width="23" />
                                <span class="txt-light">Use Other Methods</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!--<div class="d-flex flex-column align-items-end justify-content-center overflow-hidden col-12 col-lg-6 tree-container payment_div_2">-->
                <div
                    class="d-flex flex-column justify-content-center overflow-hidden col-12 col-lg-6 tree-container payment_div_2 pb-3">
                    <div class=" tree-sequence mb-4">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 ">
        <div class="p-4 p-lg-5 Invite_section">
            <div>
                <h1 class="text-capitalize mb-4 mb-lg-5 text-center h1">
                    Invite Others to eternity website
                </h1>
            </div>
            <div class="d-flex flex-wrap flex-md-nowrap gap-5 justify-content-center align-items-center">
                <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1 email_invite"
                  @auth 
                  data-toggle="modal" data-target="#InviteEmailModal"
                  @else 
                  data-toggle="modal" data-target="#AuthenticationModalForInvite"
                  @endauth>
                    <img class="img-fluid" width="25" src="{{asset('Assets/new-icons/ic_round-email.svg')}}" alt="" />
                    <span class="text-capitalize text-black">Invite by email</span>
                </a>
                <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1 facebook_open"
                  @auth 
                  onclick="facebook_open()"
                  @else 
                  data-toggle="modal" data-target="#AuthenticationModalForInvite"
                  @endauth
                  >
                    <img class="img-fluid" width="25" src="{{asset('Assets/new-icons/gg_facebook.svg')}}" alt="" />
                    <span class="text-capitalize text-black">Share on facebook</span>
                </a>
            </div>
        </div>
    </section>

    <section class="p-4 p-lg-5">
        <form id="subscribe-form">
        <div class="mb-3">
            <h1 class="text-capitalize mb-4 text-center h1">Newsletter</h1>
            <p class="txt-light text-center text-capitalize mb-4 h5">
                receive updates on the Eternity project
            </p>
            <div class="text-center email-msg mb-1 d-none">
                <small class=" bg-danger p-1 text-light rounded "></small>
            </div>
            <div class="col-12 col-md-8 col-lg-5 mx-auto d-flex position-relative">
                <input type="email" class="form-control txt-light rounded-pill n-input-border" id="subscribe-email" value="" placeholder="Enter Your Email" />
                <button style="background-color: #456297"
                    class="end-0 btn position-absolute text-white px-4 rounded-pill text-uppercase" 
                    @guest  data-toggle="modal" data-target="#login-first-to-subscribe" @endguest
                    
                    >
                    SUBSCRIBE
                    <img class="img-fluid ms-1" src="{{asset('Assets/pepicons-print_paper-plane.svg')}}" width="20" alt="" />
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

<!--End: main homepage content  -->
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
//logout function
</script>
<!-- paypal input select script -->

<script>
$(document).ready(function() {
    $(".btn").click(function() {
        $(".btn").removeClass("selected");
        $(this).toggleClass("selected");
        $('input[type="text"]').val("");
    });

    $('input[type="text"]').on("input", function() {
        // Allow only numbers
        $(this).val(function(_, value) {
            return value.replace(/\D/g, "");
        });
    });

    $('input[type="text"]').focus(function() {
        $(".btn").removeClass("selected");
    });
});


$('.btn_amount').on('click', function() {
    var vl = $(this).attr('data-id');
    $('.man_amount').val(vl);
})

$('.payment_not_allow').on('click', function(event) {
    event.preventDefault();
    $('#AuthantictionModal').modal('show');
})
$('#other_payment').on('click', function(event) {
    event.preventDefault();
    window.location = 'payment-method'
});
$('.AuthantictionModal_close').on('click', function(event) {
    $('.modal').modal('hide');
});




// Start:subscribe to newletter
$(document).ready(function () {
    $('#subscribe-form').submit(function (event) {
        event.preventDefault();
        if (validateEmail()) {
             var email = $('#subscribe-email').val().trim();
            $.ajax({
                url: '{{ route("subscribe") }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'email': email
                },
                dataType: 'json',
                success: function (data) {
                    $("#subscribe-modal").modal('show');
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    if (errors) {
                        console.log(errors.email);
                        $('.email-msg').removeClass('d-none').find('small').html(errors.email);
                        setTimeout(()=>{
                             $('.email-msg').addClass('d-none');
                        },4000);
                    }
                }
            });
        } else {
            // You might want to display an error message to the user
        }
    });
    function validateEmail() {
        var email = $('#subscribe-email').val().trim();
        if (email === '') {
            return false;
        }
        if (!email.replace(/\s/g, '').length) {
            return false;
        }
        return true;
    }
});
// End:subscribe to newletter


</script>
<script src="{{asset('js/index.js')}}"></script>
@endsection
@extends('layouts.frontend.default')
@php

@endphp
@section('title') Commemoration of {{$name}} - {{env('APP_NAME')}} @endsection

@section('bottom_navbar') @include('include.buttom_navbar_commemoration_page') @endsection

@section('content')
@include('include.InviteEmailModal')
<link rel="stylesheet" href="{{ url('public/css/frontend/customstyle.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/css/swiper.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
<link rel="stylesheet" href="{{ url('public/css/frontend/CarouselGallery.css') }}">
<style>
textarea#message {
    resize: none;
}

.pagination-class {
    gap: 1rem !important;
}

@media screen and (max-width: 320px) {
    .pagination-class {
        gap: 0.25rem !important;
        --bs-pagination-padding-x: 0.59rem !important;
    }
}

@media screen and (max-width: 425px) and (min-width: 320px) {
    .pagination-class {
        gap: 0.3rem !important;
    }

    .font-size {
        font-size: 13px !important;
    }

    .profile-section {
        flex-direction: row !important;
    }

}

.image-first1 {
    background-size: cover;
    background-position: center;
    background-position: center;
    background-repeat: no-repeat;
    height: 262px;
    width: 270px;
    box-shadow: 0px 5px 6px #297afe40 !important;
    margin: 10px !important;
}

@media (max-width: 767px) {
    .d-flex.flex-wrap.flex-md-nowrap.justify-content-center.gap-3 {

        flex-direction: row !important;

    }

}

.form-group1 {
    position: relative;
}

textarea {

    min-height: 150px;
    resize: vertical;
    position: relative;
}

.placeholder {
    bottom: 50%;
    color: black;
    position: absolute;
    text-align: center;
    z-index: 1;
    left: 41%;
    background: transparent;

}
</style>

<main>
    <section style="
          background-image: url({{asset('/Assets/Rectangle\ 45.png')}});
          background-repeat: no-repeat;
          background-position: bottom center;
          background-size: cover;
        "
        class="container-fluid home-hero-desk-h home-hero-mob-h px-3 px-lg-5 d-flex flex-column align-items-center gap-3 gap-lg-4 py-5">
        <h1 class="mt-5 pt-5 text-center text-capitalize">Commemoration of {{$user->frist_name}} {{$user->last_name}}
        </h1>

        <div class="d-flex gap-1 flex-wrap align-items-center cursor-pointer like" @auth
            onclick="like({{Auth::user()->id}},{{$user->id}})" @else data-toggle="modal"
            data-target="#AuthenticationModalForLike" @endauth style="position:relative;height: 58px;">

            <img class="img-fluid mx-auto mx-lg-0  " width="82" src="{{asset('/Assets/AdobeStock_3985242352.svg')}}"
                alt="">
            <p style=" position: absolute; left: 0px; right:0; bottom:-7px; font-size: 20px;font-weight: 600;     text-align: center;"
                class="count-like">{{$like}}</p>
        </div>


        <!--testing-->
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3">
            <div class="my-auto me-4">
                <h5 class="text-uppercase text-center text-md-end font-bold font-size">
                    {{date('M', strtotime($user->birth_date))}}
                </h5>
                <h5 class="text-uppercase text-center text-md-end ">
                    <span class="border_bottom font-size">{{date('j-Y', strtotime($user->birth_date))}}</span>
                </h5>
            </div>
            <div class="col-6 col-lg-7 col-md-7 d-flex flex-column align-items-center">
                <div class="p-4 p-sm-3  p-md-4 img_border_in">
                    <div class="test main-poter" style="height: 222px; width: 257px; 
                        background-image: url({{asset($user->profile_picture)}});
                        background-position: center;
                        background-size: cover;">

                    </div>
                    <!--<img class="img-fluid" src="{{asset($user->profile_picture)}}" alt="" height="" width="301">-->
                </div>
                <h2 class="text-uppercase my-3 my-md-4 font-league text-center ">
                    {{$user->frist_name}} {{$user->last_name}}
                </h2>
            </div>
            <div class="my-auto ms-4">
                <h5 class="text-uppercase text-center text-md-start font-bold me-0  font-size">
                    {{date('M', strtotime($user->departure_date))}}
                </h5>
                <h5 class="text-uppercase text-center text-md-start ">
                    <span class="border_bottom font-size">{{date('j-Y', strtotime($user->departure_date))}}</span>
                </h5>
            </div>
        </div>
        <!--endtesting-->
        <!-- <h3 class="font-seaweed txt-light text-center mb-4 mb-lg-5 col-12 col-md-8 col-lg-4 new_font_seaseed"> -->
        @if($user->symbolic)
        <h3 class="font-seaweed txt-light text-center mb-4 mb-lg-5 col-12 col-md-8 col-lg-6 new_font_seaseed">
            {{--<sup class="new_superlativ_"><img src="{{url('/images/double-quotes.png')}}">--}}
            </sup>" {{$user->symbolic}} "<sup class="new_superlativ_">
                {{--<img src="{{url('/images/double-quotes-2.png')}}"></sup>--}}
        </h3>
        @endif
    </section>

    <section style="background-color: #F8FBFD;" class="p-3 p-lg-5">
        <div class="d-flex flex-column align-items-center gap-4">
            <div>
                <h4 style="color: #465A7B;" class="text-center text-uppercase mb-2 font-bold">
                    {{$user->frist_name}} {{$user->last_name}}
                </h4>
                <h4 class="text-center text-uppercase">{{date('j-Y', strtotime($user->birth_date))}} to
                    {{date('j-Y', strtotime($user->departure_date))}}</h4>
            </div>
            @if($user->biography)
            <p class="text-center text-black col-12 col-lg-6 h5">
                <em>{{$user->biography}}.</em>
            </p>
            @endif
            <div
                class="d-flex flex-wrap flex-xl-nowrap justify-content-center justify-content-lg-between gap-4 mb-4 overflow-hidden row">
                @if(json_decode($user->additional_picture))
                @foreach(json_decode($user->additional_picture) as $picture)
                <a class="image-first1" href="{{asset($picture)}}" data-fancybox="gallery" style="
                 background-image: url({{asset('Assets/White_Frame_1.svg')}}),url({{asset($picture)}});">
                    <div class="image ">
                        <div class="overlay">
                            <em class="mdi mdi-magnify-plus"></em>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>

        </div>

        <p class="text-end mt-4 px-3 loc-sec"><span class="fw-bold">By {{$user->name}}, {{$user->connection}} </span> 
            {{$page->country->name ?? ''}}, {{$page->state->name ?? ''}},{{$page->city->name ?? ''}} </p>
        <p class="text-end  px-5 loc-sec"> </p>

    </section>

    <section class="p-3 p-lg-5">
        <div class="d-flex flex-column align-items-center gap-4">
            <h2 class="text-capitalize text-center">Tributes</h2>
            <p class="txt-light text-center h5 text-uppercase " id="noTribute" style="display:none;">
                There are no tributes for {{$user->frist_name}}. <br /> Be the first to memorialize this page.
            </p>

        </div>

        <!-- tribute cards  -->


        <div class="d-flex flex-column align-items-center mt-5" id="main-data">
            <div style="width:100%;">
                <div class="tab-content" style="display:flex;flex-direction: column;justify-content: center;">
                    <table id="user_tributes" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="row">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
      
        <div class="massege row d-flex justify-content-center my-5 py-5">
            <div class="col-10 col-md-6 col-lg-4 mb-5">
                <div class="rounded-4 p-4 d-flex flex-column align-items-center gap-lg-3 gap-1" style="background: rgb(179 212 231 / 8%);
                box-shadow: 0px 0px 20px -2px #2565f54f;">
                    <img style="margin-top: -4rem;" class="img-fluid " width="80"
                        src="{{asset('Assets/Untitled-62.png')}}" alt="user image">
                    <h1 class="txt-dark text-center mx-1 mb-0">Leave A Tribut</h1>
                    <span id="publish-msg" class="text-white p-1 rounded d-none"></span>
                    <p class="txt-light text-center mx-1 mb-0 w-100 px-3 px-lg-5 px-sm-5 px-md-5 py-3 form-group1">
                        <!--<label class="placeholder">TEXT HERE</label>-->
                        <textarea type="text" class="form-control rounded-3 feedback-input px-2 px-lg-5 px-md-5"
                            maxlength="150" id="message" placeholder="TEXT HERE" style="max-height: 165px;min-height: 165px; box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.09);    
                      padding-top: 66px;
                      padding-bottom: 66px;
                  text-align: center;"></textarea>
                    </p>
                    <h6 class="txt-light text-center font-bold mb-2">
                        <button class="rounded-2 text-white py-2 px-3" @auth
                            onclick="publish({{Auth::user()->id}},{{$post_id}})" @else data-toggle="modal"
                            data-target="#AuthenticationModalForTribut" @endauth
                            style="background: #456297;     border: 2px solid #456297;">
                            PUBLISH
                        </button>
                    </h6>
                </div>
            </div>

        </div>

    </section>

    <section class=""style="
            background-image: url('/Assets/Rectangle 27.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
          ">
        <div class="p-4 p-lg-5" >
            <div>
                <h2 class="text-capitalize mb-4 mb-lg-5 text-center">
                    Invite Others to {{env('APP_NAME')}} website
                </h2>
            </div>
            <div class="d-flex flex-wrap flex-md-nowrap gap-5 justify-content-center align-items-center">
                <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1 email_invite" @auth
                    data-toggle="modal" data-target="#InviteEmailModal" @else data-toggle="modal"
                    data-target="#AuthenticationModalForInvite" @endauth>
                    <img class="img-fluid" width="25" src="{{asset('Assets/ic_round-email.png')}}" alt="" />
                    <span class="text-capitalize text-black">Invite by email</span>
                </a>
                <a href="#" class="facebook_open text-decoration-none d-flex flex-column align-items-center gap-1" @auth
                    onclick="facebook_open()" @else data-toggle="modal" data-target="#AuthenticationModalForInvite"
                    @endauth>
                    <img class="img-fluid" width="25" src="{{asset('Assets/gg_facebook.png')}}" alt="" />
                    <span class="text-capitalize text-black">Share on facebook</span>
                </a>
            </div>
        </div>
    </section>

</main>



<!--Start: Login first modal-->
<x-AuthenticationModal message="Login First Before Like" id="AuthenticationModalForLike" />
<!--End: Login first modal-->

<!--Start: Login first modal-->
<x-AuthenticationModal message="To Make A Tribut Please Sing UP Now" id="AuthenticationModalForTribut" />
<!--End: Login first modal-->
<!--Start: elete-eternity-page-modal-->
<x-delete-tribut-modal message="Are you sure you want to delete your Tribute?" id="{{$user->id}}"
    onclick="deleteTribut({{$user->id}})" />
<!--End: elete-eternity-page-modal-->
@endsection

@section('footer') @include('include.footer') @endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js">
</script>
<script>
$(document).ready(function() {
    // Get the current URL
    var currentUrl = window.location.href;
    var path = new URL(currentUrl).pathname;
    $.fn.dataTable.ext.pager.numbers_length = 2;

            $('#user_tributes').DataTable({
                searching: true,
                serverSide: true,
                processing: true,
                dom: 'tp',
                language: {
                    paginate: {
                        previous: '<<',
                        next: '>>',
                        zeroRecords: "Nothing found - sorry",
                    },
                },
                ajax: {
                    url: path, 
                    type: "GET"
                },
                paging: true,
                pageLength: 9, 
                createdRow: function(row, data, dataIndex) {
                    $(row).addClass('col-12 col-md-6 col-lg-4');
                    $('td', row).addClass('d-flex');
                },
                drawCallback: function(settings) {
                    var api = this.api();
                    console.log('sdf');
                    if(settings.json.recordsTotal == 0){
                        $('.dataTables_empty').hide();
                        $('#noTribute').show();
                    }else{
                        $('#noTribute').hide();
                    }
                    if (settings.json.recordsTotal <= 9) {
                        $(api.table().container()).find('.dataTables_paginate').hide();
                    } else {
                        $(api.table().container()).find('.dataTables_paginate').show();
                    }
                },
                columns: [
                    { data: 'details', name: 'details', orderable: false, searchable: true }
                ]
            });
});

function publish(login_user_id, post_id) {
    var messageValue = $('#message').val().trim();
    if (messageValue == '') {
        $('#publish-msg').removeClass('d-none bg-success').addClass('bg-danger').html('Field should not be empty !');
        setTimeout(function() {
            $('#publish-msg').removeClass('bg-danger bg-success').html('').addClass('d-none');
        }, 3000);
    } else {
        console.log("The message field is not empty");
        var csrf_token = "{{csrf_token()}}";
        $.ajax({
            url: `${post_id}/comment`,
            method: 'POST',
            data: {
                _token: csrf_token,
                user_id: login_user_id,
                profile_id: post_id,
                comment: messageValue

            },
            success: function(response) {
              $('#user_tributes').DataTable().ajax.reload(null, false);   
              $('#message').val('');            
            }

        });
    }


}

function like(user_id, profile_id) {

    var user_id = user_id;
    var profile_id = profile_id;
    var csrf_token = "{{csrf_token()}}";
    $.ajax({
        url: `${profile_id}/like`,
        method: 'post',
        data: {
            _token: csrf_token,
            user_id: user_id,
            profile_id: profile_id
        },
        success: function(response) {
            $('.count-like').html(response);
        }
    });
}


function editTribut(tribut) {
    $('#message').val(tribut);
    $('html, body').animate({
        scrollTop: $(".massege").offset().top
    });

}

function deleteTribut(profile_id) {
    var counttribut = $('#tributes-container .col-12.col-md-6.col-lg-4.mb-5').length;
    if (counttribut == 1) {
        $('ul.pagination.pagination-class').hide();
    }
    console.log(counttribut);
    var csrf_token = "{{csrf_token()}}";
    $.ajax({
        url: "{{route('deleteTribut')}}",
        method: 'post',
        data: {
            _token: csrf_token,
            profile_id: profile_id
        },
        success: function(response) {

            $('.tribut-modal').click();
            $('#user_tributes').DataTable().ajax.reload(null, false); 
            $('#' + response).remove();
        }
    });
}




$(document).ready(function() {
    $('.feedback-input').on('input', function() {
        if ($(this).val().length > 0) {
            $(this).siblings().css("opacity", "0");
        } else {
            $(this).siblings().css("opacity", "1");
        }
    });
});


// Carousel Gallery

$(function() {

    var swiper = new Swiper('.carousel-gallery .swiper-container', {
        effect: 'slide',
        speed: 900,
        slidesPerView: 5,
        spaceBetween: 20,
        simulateTouch: true,
        autoplay: {
            delay: 5000,
            stopOnLastSlide: false,
            disableOnInteraction: false
        },
        pagination: {
            el: '.carousel-gallery .swiper-pagination',
            clickable: true
        },
        breakpoints: {
            // when window width is <= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 5
            },
            // when window width is <= 480px
            425: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // when window width is <= 640px
            768: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            1080: {
                slidesPerView: 1,
                spaceBetween: 20
            }
        }
    });
});

var textarea = document.getElementById('message');

textarea.addEventListener('keydown', function(event) {
    if (event.key === 'Backspace') {
        var scrollHeight = textarea.scrollHeight;
        yourFunctionHere(scrollHeight, 'Backspace');
    }
});

textarea.addEventListener('keypress', function(event) {
    var text = textarea.value;
    var centerScroll = (textarea.scrollHeight) / 2;
    textarea.scrollTop = centerScroll;
    var scrollHeight = textarea.scrollHeight;
    if (event.key === 'Enter' || scrollHeight === 188 || scrollHeight === 212 || scrollHeight === 236 ||
        scrollHeight === 260) {
        yourFunctionHere(scrollHeight, 'Enter');
    }
});

function yourFunctionHere(scrollHeights, test) {
    console.log(scrollHeights);
    var paddingtop = "66px";
    if (scrollHeights === 164 && test == 'Enter') {
        paddingtop = '46px';
        $('#message').css('paddingTop', paddingtop);
        $('#message').css('padding-bottom', paddingtop);
    }
    if (scrollHeights === 188 && test == 'Enter') {
        paddingtop = '30px';
        $('#message').css('paddingTop', paddingtop);
        $('#message').css('padding-bottom', paddingtop);
    }
    if (scrollHeights === 106 && test == 'Enter') {
        paddingtop = '30px';
        $('#message').css('paddingTop', paddingtop);
        $('#message').css('padding-bottom', paddingtop);
    }
    if (scrollHeights === 163 && test == 'Backspace') {
        paddingtop = '66px';
        $('#message').css('paddingTop', paddingtop);
        $('#message').css('padding-bottom', paddingtop);
    }
    if (scrollHeights === 106 && test == 'Backspace') {
        paddingtop = '41px';
        $('#message').css('paddingTop', paddingtop);
        $('#message').css('padding-bottom', paddingtop);
    }



}
</script>


@endsection
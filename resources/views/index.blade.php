@extends('layouts.frontend.default')

@section('title') Home - Enyty @endsection

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
   .donation-sec .nav-link{
     height: 55px;
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

<style type="text/css">
    .cards-bg1 {
    background: #F8FBFD;
    box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.09);
}

/* events css start   */

#profile-section-images .profile-section-images {
    position: relative; /* Ensure the container is relatively positioned */
    background-image: url(./Assets/background.png);
    background-repeat: no-repeat !important;
    background-position: center !important;
    background-size: cover !important;
    background-color: #b3d4e780;
}

#profile-section-images .profile-section-images::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #4d7f9c1f; /* Adjust color and opacity as needed */
    z-index: 1; /* Ensure the overlay is above the background image */
}
#profile-section-images .content-section .content-test {
    font-size: 23px;
    margin: 0px 17px;
}

#profile-section-images .Invite_section-images {
    position: relative; /* Ensure the container is relatively positioned */
    background-image: url(./Assets/background_images_types.png);
    background-repeat: no-repeat !important;
    background-position: center !important;
    background-size: cover !important;
}

#profile-section-images .Invite_section-images::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #4d7f9c0a; /* Adjust opacity and color as needed */
    z-index: 1; /* Ensure the overlay is above the background image */
}
/* events css end   */
</style>

<main>
  


    <section
        class="top_section container-fluid home-hero-desk-h home-hero-mob-h px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4 py-5">
        <h1 class="mt-5 pt-5 text-center text-capitalize">
             Celebrating a Life<br /> The Privilege To Preserve Their legacy

        </h1>
        <p class="text-center txt-light   h5">
            Here you can honor and share the stories of people that have left an unforgettable imprint <br /> on our lives. Join us in the eternal celebration of lives lived.
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
           Here you can see the latest people who have joined Enyty
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
                Find your commemorated person in Enyty
                <img class="ms-1" src="{{asset('Assets/new-icons/solar_arrow-up-outline.svg')}}" alt="donate heart" width="18"
                    height="" />
            </a>
        </div>
    </section>

    <section class="p-2 p-lg-5 p-md-4 p-sm-5 commemoration_section">
        <div class="p-1 p-lg-5 d-flex flex-column align-items-center justify-content-center gap-3 ">
            <h1 class="text-center h1">Commemorations</h1>
            <p class="text-center txt-light col-12 col-md-9 col-lg-6 mx-auto h5">
               Create a profile of the person memorialized, describing the aspects that most distinguished him or her in the journey of life faced here on earth, post photos and more!
            </p>
            <p class="text-center txt-light col-12 col-md-9 col-lg-6 mx-auto h5 d-none">Express your tribute to the commemorated profile. Leave a heart. <img class="img-fluid" src="{{asset('Assets/images_hard.svg')}}" alt="" height="" width="" /></p>
            <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3">
                <div class="my-auto">
                    <h5 class="text-uppercase text-center text-md-end font-bold font-size">
                        NoVEMBER 
                    </h5>
                    <h5 class="text-uppercase text-center text-md-end font-size"><span class="border_bottom font-size">7-30-1970</span></h5>
                </div>
                <div class="col-6" >
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
                        JUNE
                    </h5>
                    <h5 class="text-uppercase text-center text-md-start "><span class="border_bottom font-size"> 2-14-2023</span>
                    </h5>
                </div>
            </div> 
            <div class="w-100 d-flex justify-content-center">
                <h4 style="color: #000000;font-size: 32px !important;margin:0px !important;" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5 d-none">“Life is a gift, and with it comes the <br/>responsibility to make it extraordinary”</h4>
            </div>
         
        </div>
    </section>
    <!-- start -->
    <section  class="p-3 p-lg-5 second-section">
      <div class="d-flex flex-column align-items-center gap-4">
        <div>
          <h4 style="color:#465A7B;font-size: 2rem;" class="text-center text-uppercase mb-2 font-bold fred_clr">
            Fred B. Johnson 
          </h4>
          <h4 class="text-center text-uppercase">7-30-1970 to 2-14-2023</h4>
        </div>
        <p class="text-center text-black col-12 col-lg-6 h5">
         You can mention any notable traits or early interests. Also mention <br/> significant life events, experiences, or challenges they faced.
        </p>
        <div class="d-flex flex-wrap flex-xl-nowrap justify-content-center justify-content-lg-between gap-4 mb-4 overflow-hidden">
          <div class="p-4 image-first1" style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_641095061_1.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                  height: 330px;
                  width: 342px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                  border: 10px solid #fff;
                  margin: 10px;">
            
          </div>
          <div class="p-4 image-first1"style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_689068927_1.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                 height: 330px;
                  width: 342px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                  border: 10px solid #fff;
                  margin: 10px;">
          </div>
          <div class="p-4 image-first1" style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_641095113_1.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                height: 330px;
                  width: 342px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                    border: 10px solid #fff;
                  margin: 10px;">
          </div>
          <div class="p-4 image-first1" style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_641083839_11.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                 height: 330px;
                  width: 342px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                  margin: 10px;
                  border: 10px solid #fff;
">
          </div>
        </div>

      </div>
      <div class="  d-flex justify-content-end ">
            <p class="text-end mt-4 px-3 loc-sec">
        <span class="fw-bold">  By James Johnson, Son.</span>   United States, Texas, Houston</p>
      </div>
      
    </section>
   <!-- end -->


   <!-- start_second_content -->


    <section class="p-1 p-lg-5">
      <div class="d-flex flex-column align-items-center gap-4">
        <h2 class="text-capitalize text-center">Tributes</h2>
        <p class="txt-light text-center h5">
          You can leave your tribute to the <br/> person commemorated.
        </p>
      </div>

      <!-- tribute cards  -->
      <div class="row mt-5 mx-1 mx-lg-3 mx-md-3 mx-lg-5 g-5">
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1" >
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 1.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              Your kindness will continue to shine in our hearts. 
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Gregory L. Montes</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1">
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 2.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              The echo of your laughter, the warmth of your smiles, painting a portrait of joy and happiness that withstands the test of time. 
            </p>
            <h6 class="txt-light text-center font-bold mb-2">James P. Davis</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1" >
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 3.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              We'll miss you deeply, but your love still envelops us. 
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Fay M. Thoman</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1" >
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 6.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              Your wisdom continues to inspire our lives
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Mary C. Shepherd</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1">
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 5.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              Your smiles will forever remain in our memories. 
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Mike B. Rich</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1" >
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 7.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              Your virtues guide us, a precious legacy. 
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Amber C. Lee</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1" >
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 8.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              Your impact is indelible, your memory everlasting.
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Clark N. Williams</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1">
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 9.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              Your kindness, a legacy that endures always. 
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Clark N. Williams</h6>
          </div>
        </div>
        <div class="col-6 col-md-6 col-lg-4 mb-5 px-1 px-lg-4 px-md-4 px-sm-4 ">
          <div class="rounded-4 p-1 p-sm-4 p-md-4 plg-4 d-flex flex-column align-items-center gap-3 cards-bg1">
            <img class="img-fluid mb-3 card-image1" width="80" src="./Assets/Ellipse 10.png" alt="user image">
            <p class="txt-light text-center mx-1 mb-0">
              Though your physical presence is a void we keenly feel, the embrace of your love encircles us still. 
            </p>
            <h6 class="txt-light text-center font-bold mb-2">Martha R. Moore</h6>
          </div>
        </div>
      </div>

      <div class="d-none justify-content-center mt-3 ">
        <nav aria-label="Page navigation example">
          <ul class="pagination gap-3">
            <li class="page-item">
              <a class="page-link rounded-2 n-pagination" href="#" aria-label="Previous">
                <!-- <span aria-hidden="true">&laquo;</span> -->
                <img src="./Assets/pagination-arrow(1).svg" width="15" alt="">
              </a>
            </li>
            <li class="page-item"><a class="page-link com-pagination-shadow border-0 rounded-2 txt-light" href="#">1</a></li>
            <li class="page-item"><a class="page-link com-pagination-shadow border-0 rounded-2 txt-light" href="#">2</a></li>
            <li class="page-item"><a class="page-link com-pagination-shadow border-0 rounded-2 txt-light" href="#">3</a></li>
            <li class="page-item"><a class="page-link com-pagination-shadow border-0 rounded-2 txt-light" href="#">4</a></li>
            <li class="page-item"><a class="page-link com-pagination-shadow border-0 rounded-2 txt-light" href="#">5</a></li>
            <li class="page-item"><a class="page-link com-pagination-shadow border-0 rounded-2 txt-light" href="#">6</a></li>
            <li class="page-item">
              <a class="page-link rounded-2 n-pagination" href="#" aria-label="Next">
                <!-- <span aria-hidden="true">&raquo;</span> -->
                <img src="./Assets/pagination-arrow.svg" width="15" alt="">
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </section>
 <!-- end_second_content -->


<!-- Events section  start  -->
    <section class="py-4  " id="profile-section-images">
        <div class="p-4 p-lg-5 Invite_section-images">

            <div class="container">
                <div class="d-flex flex-column align-items-center gap-4 mb-5">
                    <h1 class="text-capitalize mb-4 mb-lg-1 text-center h1">Events</h1>
                    <p class="txt-light text-center h5 p-0 text-capitalize"> Your funeral home will help you in </br> commemorating and making your loved </br>one's celebration unique.
                    </p>
                </div>

                <div class="d-flex flex-wrap flex-md-nowrap gap-5 ">
                    <div class="w-75 mx-auto">
                        <div class="border border-dark border-2 p-3">
                            <div class="border border-dark border-2 p-3 profile-section-images">
                                
                                <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3">
                                    
                                     <div class="my-auto">
                                        <h5 class="text-uppercase text-center text-secondary text-md-end font-bold font-size">
                                            Fred b. jonson
                                        </h5>
                                        <h5 class="text-uppercase text-center text-md-end font-size"><span class=" text-secondary font-size">age 54</span></h5>
                                    </div>
                                    <div style="width: 43% ;" class="col-6 profile-image-post ">
                                        <div class="p-sm-3   w-75 mx-auto img_border_in">
                                            <img style="padding: 10px;background: #fff;" class="img-fluid w-100" src="{{asset('Assets/AdobeStock_6410838122_1.svg')}}" alt="" height=""
                                                width="250" />
                                        </div>
                                    </div>

                                    <div class="my-auto">
                                        <h5 class="text-uppercase text-center  text-secondary  text-md-start font-bold me-0  font-size">
                                           7-30-1970
                                        </h5>
                                        <h5 class="text-uppercase text-center text-md-start "><span class="font-size text-secondary ">2-14-2023</span>
                                        </h5>
                                    </div>
                                     <div class="company-logo">
                                        <img  class="img-fluid w-100" src="{{asset('Assets/Group 51.png')}}" alt="" height="">
                                    </div>
                                </div> 

                                <div class="content-section pt-2 pb-2">
                                    <h5 class="txt-light  text-center h5 text-secondary p-0 text-capitalize d-flex justify-content-center"> <b class="font-size text-dark">Funeral celebration  </b> <p class="content-test"> 65 Bartlett Rd WinthropMassachusetts(MA),02152</p></h5>
                                    <h5 class="txt-light  text-center h5 p-0 text-capitalize text-secondary d-flex justify-content-center"> <b class="font-size text-dark">Location of body </b> <p class="content-test"></p>33 Virginia Ave Ft Mitchell,Kentucky(KY),41017</h5>
                                </div>
                                 <div class="content-section pt-2 pb-2">
                                    <h5 class="envet-heading text-center text-dark h5 p-0 text-capitalize">
                                        This was announced by wife Elizabeth  <br/>and sons Chris and Alex.</h5>
                                    
                                </div>

                            </div>  
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap flex-md-nowrap gap-5 justify-content-center align-items-center pt-3">

                    <div class="content-section pt-5 pb-3">
                        <p class="txt-light text-center h5 p-0 text-capitalize"> Digital poster, commemorative page and </br> qr code associated with it!</p>
                        <div class="clarity-img w-50 mx-auto">
                            <img class="img-fluid mb-3 " width="285px" height="285px"  src="{{asset('Assets/clarity_qr-code-line.png')}}" alt="user image">
                        </div>
                        <p class="txt-light text-center h5 p-0 text-capitalize">Ask your agency if it can access eternity and commemorate </br> your loved one in an authentic and lasting way.</p>
                    </div>
                        
                </div>
            </div>
        </div>
    </section>
<!-- Events section end  -->


   <!-- third_content_start -->
<!-- <div class="d-flex flex-column align-items-center gap-3">
        <h1 class="mt-5 pt-5 text-center text-capitalize">Events</h1>
        <p class="text-center txt-light col-12 col-md-8 col-lg-4 h5" >
          Here you can stay up-to-date on all new arrivals in eternity and you can search for anyone added to this
            eternal
            place!
        </p>
      </div>
 -->
   <!-- end_third -->


<!-- fourth_content_start -->

<!-- <section class="p-2 p-lg-5 p-md-4 p-sm-5 commemoration_section" >
         <div class="p-1 p-lg-5 d-flex flex-column align-items-center justify-content-center gap-3" style="border:5px solid black;" > -->
            <!-- <div class="p-1 p-lg-6 d-flex flex-column align-items-center justify-content-center gap-3" style="border:5px solid black;"> -->
        <!--  <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3 ">
                <div class="my-auto">
                    <h5 class="text-uppercase text-center text-md-start font-bold font-size">
                       Jessica Drew
                    </h5>
                    <h5 class="text-uppercase text-center text-md-start font-size"><span class="border_bottom font-size">age :79</span></h5>
                </div>
                <div class="col-6 ">
                    <div class="p-4 p-sm-3  p-md-4 img_border_in">
                        <img class="img-fluid" src="{{asset('Assets/AdobeStock_6410838122_1.svg')}}" alt="" height=""
                            width="250" />
                    </div>
                    
                </div> 
                <div class="my-auto">
                    <h5 class="text-uppercase text-center text-md-end font-bold me-0  font-size">
                        MARCH 12,1946
                    </h5>
                    <h5 class="text-uppercase text-center text-md-end "><span class="border_bottom font-size">april 22,2024</span>
                    </h5>
                </div>
            </div> 
                <div class="row mt-5">
                    <div class="col-6 ">
                        <h4 class="text-uppercase ">
                            Funeral celebration
                        </h4></div>
                       <div class="col-6 ">
                        <span class="text-uppercase pb-3 ">123 Main Street, Anytown, USA, 12345</span></div>
                </div>
                 <div class="row mt-5">
                    <div class="col-6 ">
                        <h4 class="text-uppercase ">
                            Location of body
                        </h4></div>
                       <div class="col-6 ">
                        <span class="text-uppercase pb-3 ">456 Elm Avenue, Anytown, USA, 12345</span></div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 ">
                        <h2 class="text-uppercase ">
                            This was announced by husband <br>
                            Charlie and sons Chris and Alex.
                        </h2>
                    </div>
                       
                </div>

            </div> -->
           <!-- </div>      -->
            <!-- <a href="/commemoration">
            <button class="btn hero-btn px-4">
                Learn More
                <img class="ms-1" src="{{asset('Assets/new-icons/solar_arrow-up-outline.svg')}}" alt="donate heart" width="18"
                    height="" />
            </button>
            </a>-->
      <!--   </div> 
    </section> -->

 

<!-- end_content_fourth -->
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

                    <p class="txt-light mb-3 col-12 col-md-6 col-lg-8 col-sm-8 h5">If you believe in this project and find it valuable for remembering a loved one and granting them Enyty, your support will be crucial for us.</p>
                    <a href="/donations" class="txt-light text-decoration-none fw-bolder mb-3 ">LEARN MORE
                        <img class="img-fluid mb-1" src="{{asset('Assets//new-icons/ic_twotone-play-arrow.svg')}}" alt=""
                            width="22" />
                    </a>
                    <div class="d-flex align-items-center col-12 col-md-6 col-lg-8 col-sm-8 donation-sec mt-4">
                    @include("partials/donationBtn")
                    
                    </div>
                    <div class="d-flex align-items-center col-12 col-md-5 col-lg-4 col-sm-4 mt-2">
                         <p>Donate in a secure way, via Stripe connected with ENYTY.</p>
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
                    Invite Others to {{env('APP_NAME')}} website
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
                receive updates on the {{env('APP_NAME')}} project
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
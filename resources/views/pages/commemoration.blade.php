@extends('layouts.frontend.default')

@section('title') Commemoration - Eternity @endsection

@section('bottom_navbar') @include('include.bottom_navbar')  @endsection

@section('content')
@include('include.InviteEmailModal')
  <main>
<style>
.n-page-section{
    background-image: url(/Assets/Rectangle\ 45.png);
    background-repeat: no-repeat;
    background-position: bottom center;
    background-size: cover;
}
.n-page-section2 {
    background-image: url(./Assets/Rectangle\ 27.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}

.image-first{
  background-image: url(/Assets/Group_16.svg);
      background-size: cover;
    background-position: center;
}
.image-first1{
  /*background-image: url(/Assets/White_Frame.svg);*/
      background-size: cover;
    background-position: center;
}
.second-section{
background-color: #F8FBFD;
}
.cards-bg1{
  background: #F8FBFD; box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.09);
}
.fred_clr{
  color: #465A7B;
}

.card-image1{
  margin-top: -4rem;
}
.n-pagination{
  pointer-events: none;
  background: #456297;
}
.section2-bg{
  background: rgba(179, 212, 231, 0.10);
}
</style>
    <section 
      class="container-fluid home-hero-desk-h home-hero-mob-h px-3 px-lg-5 d-flex flex-column align-items-center gap-3 gap-lg-4 n-page-section py-5">
      <h1 class="mt-5 pt-5 text-center text-capitalize">Commemoration of Fred B. johnson</h1>
      <p class="text-center txt-light col-12 col-md-8 col-lg-5 h5">
        Create a profile of the person memorialized, describing the aspects that most distinguished him or her in the
        journey of life faced here on earth, post photos and more!
      </p>
      <div class="d-flex gap-1 flex-wrap align-items-center">
        <p class="text-center txt-light mb-0 h5">Express your tribute to the commemorated profile. Leave a heart.</p>
        <img class="img-fluid mx-auto mx-lg-0" width="20" src="/Assets/AdobeStock_398524235 1.png" alt="">
      </div>
    {{--  <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3">
        <div class="my-auto">
          <h5 class="text-uppercase text-center text-md-end font-bold">
            September
          </h5>
          <h5 class="text-uppercase text-center text-md-end">07-1970</h5>
        </div>
        <div class="">
          <div class="p-4 image-first">
            <img class="img-fluid" width="250" src="/Assets/AdobeStock_6410838122_1.svg" alt="" />
          </div>
          <h2 class="text-uppercase mt-3 mt-md-4 font-league text-center">
            Fred B. Johnson
          </h2>
        </div>
        <div class="my-auto">
          <h5 class="text-uppercase text-center text-md-start font-bold me-0 me-md-5">
            September
          </h5>
          <h5 class="text-uppercase text-center text-md-start">20-2023</h5>
        </div>
      </div>--}}
      
      <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3" bis_skin_checked="1">
                <div class="my-auto" bis_skin_checked="1">
                    <h5 class="text-uppercase text-center text-md-end font-bold font-size">
                        September
                    </h5>
                    <h5 class="text-uppercase text-center text-md-end ">
                        <span class="border_bottom font-size">07-1970</span>
                    </h5>
                </div>
                <div class="col-6 d-flex flex-column align-items-center" bis_skin_checked="1">
                    <div class="p-4 p-sm-3  p-md-4 img_border_in" bis_skin_checked="1">
                        <img class="img-fluid" src="/Assets/AdobeStock_6410838122_1.svg" alt="" height="" width="301">
                    </div>
                    <h2 class="text-uppercase my-3 my-md-4 font-league text-center ">
                       Fred B. Johnson
                    </h2>
                </div>
                <div class="my-auto" bis_skin_checked="1">
                    <h5 class="text-uppercase text-center text-md-start font-bold me-0  font-size">
                        September
                    </h5>
                    <h5 class="text-uppercase text-center text-md-start ">
                        <span class="border_bottom font-size">20-2023</span>
                    </h5>
                </div>
            </div>
            
      <h3 class="font-seaweed txt-light text-center mb-4 mb-lg-5 col-12 col-md-8 col-lg-4">" Life is a gift, and with it comes the responsibility to make it extraordinary. "</h3>

    </section>

    <section class="p-3 p-lg-5 second-section">
      <div class="d-flex flex-column align-items-center gap-4">
        <div>
          <h4 class="text-center text-uppercase mb-2 font-bold fred_clr">
            Fred B. Johnson
          </h4>
          <h4 class="text-center text-uppercase">07-1970  to 20-2023</h4>
        </div>
        <p class="text-center text-black col-12 col-lg-6 h5">
         Here you can mention any notable traits or early interests. Also mention <br>
         significant life events, experiences, or challenges they faced.
        </p>
        <div class="d-flex flex-wrap flex-xl-nowrap justify-content-center justify-content-lg-between gap-4 mb-4 overflow-hidden">
          <div class="p-4 image-first1" style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_641095061_1.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                  height: 300px;
                  width: 312px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                  margin: 10px;">
            
          </div>
          <div class="p-4 image-first1"style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_689068927_1.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                  height: 300px;
                  width: 312px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                  margin: 10px;">
          </div>
          <div class="p-4 image-first1" style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_641095113_1.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                  height: 300px;
                  width: 312px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                  margin: 10px;">
          </div>
          <div class="p-4 image-first1" style="
          background-image: url({{asset('Assets/White_Frame_1.svg')}}),
          url({{asset('Assets/AdobeStock_641083839_11.svg')}});
                  background-position: center;
                  background-repeat: no-repeat;
                  height: 300px;
                  width: 312px;
                  box-shadow: 0px 5px 6px #297afe40 !important;
                  margin: 10px;">
          </div>
        </div>

      </div>
      
      <p class="text-end mt-4 px-5">By James Johnson, Son</p>

    </section>
<!-- end -->
    <section class="p-1 p-lg-5">
      <div class="d-flex flex-column align-items-center gap-4">
        <h2 class="text-capitalize text-center">Tributes</h2>
        <p class="txt-light text-center h5">
          Here you can leave your tribute to <br/>the person commemorated.
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

    <section class="p-3 p-lg-5 section2-bg">
      <div class="d-flex flex-column align-items-center gap-4">
        <h2 class="text-capitalize text-center">Forever Legacy</h2>
        <h4 class="text-capitalize text-center txt-light">to make your own commemorative page</h4>
        <p class="txt-light text-center col-12 col-md-9 col-lg-6 h5">
          A timeless space to commemorate, share stories, and create a lasting legacy that spans generations. 
          Craft your own profile now to eternally preserve cherished memories.
          <br/>Make donation and help this project
        </p>
        <a class="cursor-pointer"
                @auth 
                  href="/payment-method"
                  @else 
                  data-toggle="modal" data-target="#AuthantictionModal"
                  @endauth
                >
            <button class="btn hero-btn px-4 n-pagination">
              <span class="me-1 text-white">DONATE</span>
              <img class="img-fluid mb-1" src="./Assets/AdobeStock_398524235 1.png" alt="donate heart" width="20" height="" />
            </button>
        </a>
      </div>
    </section>

    <section class="">
      <div class="p-4 p-lg-5 n-page-section2">
        <div>
          <h2 class="text-capitalize mb-4 mb-lg-5 text-center">
            Invite Others to eternity website
          </h2>
        </div>
        <div class="d-flex flex-wrap flex-md-nowrap gap-5 justify-content-center align-items-center">
          <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1 email_invite"
          @auth 
          data-toggle="modal" data-target="#InviteEmailModal"
          @else 
          data-toggle="modal" data-target="#AuthenticationModalForInvite"
          @endauth>
            <img class="img-fluid" width="25" src="./Assets/ic_round-email.png" alt="" />
            <span class="text-capitalize text-black">Invite by email</span>
          </a>
          <a href="#" class="facebook_open text-decoration-none d-flex flex-column align-items-center gap-1"
          @auth 
          onclick="facebook_open()"
          @else 
          data-toggle="modal" data-target="#AuthenticationModalForInvite"
          @endauth
          >
            <img class="img-fluid" width="25" src="./Assets/gg_facebook.png" alt="" />
            <span class="text-capitalize text-black">Share on facebook</span>
          </a>
        </div>
      </div>
    </section>

  </main>
 
@endsection

@section('footer') @include('include.footer') @endsection

@section('scripts')  @endsection 
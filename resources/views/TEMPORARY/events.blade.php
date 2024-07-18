    @include('testing/header')
     <!-- main homepage content  -->
  <main>
    <section style="
      background-image: url(./Assets/vertical\ 1.png);
      background-repeat: no-repeat;
      background-position: bottom center;
      background-size: cover;
    " class="container-fluid px-3 px-lg-5">
    
      <div class="d-flex flex-column align-items-center gap-3">
        <h1 class="mt-5 pt-5 text-center text-capitalize">Events</h1>
        <p class="text-center txt-light col-12 col-md-8 col-lg-4">
          <em>Here you can stay up-to-date on all new arrivals in eternity and you can search for anyone added to this
            eternal
            place!</em>
        </p>
      </div>

      <div>

      </div>

    </section>


    <section class="py-4">
      <div class="p-4 p-lg-5" style="
            background-image: url(./Assets/Rectangle\ 27.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
          ">
        <div>
          <h2 class="text-capitalize mb-4 mb-lg-5 text-center">
            Invite Others to eternity website
          </h2>
        </div>
        <div class="d-flex flex-wrap flex-md-nowrap gap-5 justify-content-center align-items-center">
          <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1">
            <img class="img-fluid" width="25" src="./Assets/ic_round-email.png" alt="" />
            <span class="text-capitalize text-black">Invite by email</span>
          </a>
          <a href="#" class="text-decoration-none d-flex flex-column align-items-center gap-1">
            <img class="img-fluid" width="25" src="./Assets/gg_facebook.png" alt="" />
            <span class="text-capitalize text-black">Share on facebook</span>
          </a>
        </div>
      </div>
    </section>

    <section class="p-4 p-lg-5">
      <div class="mb-3">
        <h2 class="text-capitalize mb-4 text-center">Newsletter</h2>
        <p class="txt-light text-center text-capitalize mb-4">
          receive updates on the Eternity project
        </p>
        <div class="col-12 col-md-8 col-lg-5 mx-auto d-flex position-relative">
          <input type="text" style="border: 2px solid rgba(0, 0, 0, 0.12)" class="form-control txt-light rounded-pill"
            placeholder="Enter Your Email" />
          <button style="background-color: #456297"
            class="end-0 btn position-absolute text-white px-4 rounded-pill text-uppercase">
            SUBSCRIBE
            <img class="img-fluid ms-1" src="./Assets/pepicons-print_paper-plane.png" width="20" alt="" />
          </button>
        </div>
      </div>
    </section>

  </main>

    @include('testing/footer')
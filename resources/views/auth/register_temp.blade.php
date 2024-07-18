<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/jpg" href="{{asset('Assets/fav-icon.jpg')}}">
  <title>Register - Eternity</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=DM Serif Display|Galada|League Gothic|Freehand|Seaweed Script"
    rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="styles.css" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>

<body>
  <!-- header  -->
  <header>
    <!-- top navbar -->
    <nav class="navbar navbar-expand top-nav-bg px-3 px-lg-5">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-none d-lg-flex">
            <li class="nav-item">
              <a class="nav-link ps-0 text-white active" aria-current="page" href="#">
                <img class="img-fluid" src="./Assets/facebook-fill.png" alt="fb icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="./Assets/twitter-x-fill.png" alt="twitter icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="./Assets/icon-insta.png" alt="insta icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="./Assets/linkedin-solid.png" alt="linkedin icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="./Assets/kit_youtube.png" alt="youtube icon" width="20" height="" />
              </a>
            </li>
          </ul>
          <span class="navbar-text d-flex gap-3">
            <a class="text-decoration-none d-flex align-items-center" href="/login">
              <img class="img-fluid pe-2" src="./Assets/solar_lock.png" alt="youtube icon" width="27" height="" />
              <span class="text-white">Login</span>
            </a>
            <div style="color: rgba(217, 217, 217, 0.42)" class="vr"></div>
            <a class="text-decoration-none d-flex align-items-center" href="/register">
              <img class="img-fluid pe-2" src="./Assets/solar_user.png" alt="youtube icon" width="28" height="" />
              <span class="text-white">Sign Up</span>
            </a>
          </span>
        </div>
      </div>
    </nav>
  </header>

  <!-- main login content  -->
  <main>
    <section class="container-fluid px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center" style="
          background-image: url(./Assets/login-page-bg.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        ">
      <div class="p-3 p-md-4 p-lg-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4">
        <img class="img-fluid mt-4" width="450" src="./Assets/eternity-logo-login.png" alt="" />
        <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
          Eternity will help you remember your existence on the journey made
          here on earth, whatever your beliefs are.
        </h2>
        <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-5" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
          <h2 class="text-capitalize text-center mb-5">register now</h2>
          <form action="" class="">
            <input type="text" name="" placeholder="First Name"
              class="bg-white text-uppercase form-control mb-3 rounded-3" />
            <input type="text" name="" placeholder="Last Name"
              class="bg-white text-uppercase form-control mb-3 rounded-3" />
            <input type="email" placeholder="Your Email" class="bg-white text-uppercase form-control mb-3 rounded-3" />
            <input type="password" placeholder="Password" class="bg-white text-uppercase form-control mb-3 rounded-3" />
            <input type="password" placeholder="Repeat Password"
              class="bg-white text-uppercase form-control mb-3 rounded-3" />
            <button style="background-color: #456297" class="btn text-uppercase rounded-3 mb-3 mt-2 text-white w-100 py-2" type="submit">
              Register Now
            </button>
          </form>
          <div class="fw-bold d-flex flex-wrap flex-lg-nowrap justify-content-center gap-1 mb-3">
            <span class="txt-lighter">Already have an account? </span>
            <a href="/login" style="color: #456297" class="text-decoration-none">
              Login
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>

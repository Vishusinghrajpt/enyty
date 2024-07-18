<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Eternity</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=DM Serif Display|Galada|League Gothic|Freehand|Seaweed Script"
    rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('public/styles.css') }}" />

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

    <!-- bottom navbar -->
    <nav class="navbar navbar-expand-lg py-3 px-3 px-lg-5 position-absolute w-100">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img class="img-fluid me-3" src="./Assets/Eternity-Logo.png" alt="fb icon" width="200" height="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav align-items-start justify-content-between w-100">
            <a class="nav-link text-capitalize active" aria-current="page" href="/">Home</a>
            <a class="nav-link text-capitalize" href="/commemoration">commemoration</a>
            <a class="nav-link text-capitalize" href="events">Events</a>
            <a class="nav-link text-capitalize" href="#">donations</a>
            <a class="nav-link text-capitalize" href="#">Mission</a>
            <a class="nav-link text-capitalize hero-btn px-4 d-flex align-items-center" href="#">
              <span class="me-2">DONATE</span>
              <img class="img-fluid" src="./Assets/AdobeStock_398524235 1.png" alt="donate heart" width="24"
                height="" />
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>
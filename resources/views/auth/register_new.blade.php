<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/jpg" href="{{asset('Assets/fav-icon.jpg')}}">
  <title>Register - Enyty</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=DM Serif Display|Galada|League Gothic|Freehand|Seaweed Script"
    rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="styles.css" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


   <style>
		nav.navbar.navbar-expand.top-nav-bg.px-3.px-lg-5 {
		    background: #465a7b;
		}
	.font-freehand {
	    font-family: Freehand;
	}
  #user_section img.img-fluid.ms-1 {
    height: 150px !important;
    object-fit: contain;
  }
  #sign-heading {
    font-family: "DM Serif Display" !important;
  }
  </style>
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
                <img class="img-fluid" src="{{asset('Assets/facebook-fill.png')}}" alt="fb icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="{{asset('Assets/twitter-x-fill.png')}}" alt="twitter icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="{{asset('Assets/icon-insta.png')}}" alt="insta icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="{{asset('Assets/linkedin-solid.png')}}" alt="linkedin icon" width="20" height="" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link ps-0 text-white" href="#">
                <img class="img-fluid" src="{{asset('Assets/kit_youtube.png')}}" alt="youtube icon" width="20" height="" />
              </a>
            </li>
          </ul>
          <span class="navbar-text d-flex gap-3">
            <a class="text-decoration-none d-flex align-items-center" href="/login-new">
              <img class="img-fluid pe-2" src="{{asset('Assets/solar_lock.png')}}" alt="youtube icon" width="27" height="" />
              <span class="text-white">Login</span>
            </a>
            <div style="color: rgba(217, 217, 217, 0.42)" class="vr"></div>
            <a class="text-decoration-none d-flex align-items-center" href="/register-new">
              <img class="img-fluid pe-2" src="{{asset('Assets/solar_user.png')}}" alt="youtube icon" width="28" height="" />
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
          height: 93vh;
        ">
      <div class="p-3 p-md-4 p-lg-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4">
        <a href='/'> <img class="img-fluid mt-4"  src="{{asset('Assets/Logo_vettoriale.svg')}}" width="240" alt="logo" /></a>
        <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
          Enyty will help you remember your existence on the journey made
          here on earth, whatever your beliefs are.
        </h2>
        <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-5" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
          <h1 id="sign-heading" class="mb-4 text-center text-capitalize">Sign Up</h1>

          <div class="row" id="user_section">
          	<div class="col-md-6">
          		<a href="/register">
	          		<div class="user-sec w-50 mx-auto">
	      				<img class="img-fluid ms-1 w-100" src="./Assets/user_new_resg.png" width="20" alt="" />
	          		</div>
          		</a>
          	</div>
          	<div class="col-md-6"> 
          		<a href="/company-register">
	          		<div id="agency-sec" class="agency-sec w-50 mx-auto">
						      <img class="img-fluid ms-1 w-100" src="./Assets/agency_images.png" width="20" alt="" />
	          		</div>
          		</a>
          	</div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>

</html>

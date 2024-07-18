@extends('layouts.frontend.default')

@section('title') Forgot Password - Eternity @endsection

@section('css')  @endsection

@section('content')
<link href="https://fonts.googleapis.com/css?family=DM Serif Display|Galada|League Gothic|Freehand|Seaweed Script"
    rel="stylesheet" />
 <!-- main login content  -->
  <main>
    <section class="container-fluid px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center" style="
          background-image: url(/Assets/login-page-bg.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        ">
      <div class="p-3 p-md-4 p-lg-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4">
        <a href="{{route('index')}}"> <img class="img-fluid mt-4"  src="{{asset('Assets/Logo_vettoriale.svg')}}" width="240" alt="logo" /></a>
        <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
          Eternity will help you remember your existence on the journey made
          here on earth, whatever your beliefs are.
        </h2>
        <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-5 msg-success" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
     
            <!--<div class="email-verify-page alert alert-danger" style = "color:red"><b>{{ session('message') }}</b></div>-->
     
            <p class="text-center txt-light">
             Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>
            <div class="mb-4 font-medium text-sm text-success txt-light " id="verification-mass" style="display:none;">
           
               
            </div>
            <div class="fw-bold  flex-wrap flex-lg-nowrap justify-content-center gap-1 mb-3">
                 <form id = "myForm" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <input type="email" id = "email"  class="block mt-1 w-full m-2 bg-white  form-control mb-3 rounded-3"  placeholder="YOUR EMAIL" name="email" :value="old('email')" required autofocus>
                    <br>
                    <button type='sumbit' class="btn text-uppercase rounded-3 mt-1 mb-3 text-white w-100 py-2" id="resend-v" style="background-color: #456297;">Email Password Reset Link</button>
                </form
            </div>
    
        </div>
      </div>
    </section>
  </main>

@endsection


@section('scripts') 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script>

   //Resend Verification Email
   
  
  $('#resend-v').click(function(e){
        e.preventDefault();
         $("#resend-v").html('<i class="fas fa-spinner fa-pulse"></i>please wait...');
    var csrf_token =  "{{csrf_token()}}";
    // console.log(token);
     var email = $('#email').val();
    var action =  $('#myForm').attr('action');
     var method =  $('#myForm').attr('method');
    console.log(method);
     $.ajax({
                    url: "{{route('password.email')}}",
                    method: 'post',
                    data: {
                       email:email,
                       _token :csrf_token
                    
                    },
                    success: function(response) {
                          $("#resend-v").html('Email Password Reset Link');
                        console.log('success');
                        console.log(response);
                        if(response=="true"){
                            var templet =`<div class="alert alert-success">
                                      Password reset email has been sent.
                                    </div>`;
                        }else{
                            templet =`<div class="alert alert-danger">
                                      Your email is not rester.
                                    </div>`;
                        }
                         setTimeout(myGreeting, 5000);
                          $("#verification-mass").html(templet);

                        $('#verification-mass').show();
                       function myGreeting() {
                          $('#verification-mass').hide();
                       }
                        // $('#resend-v').html(response);
                    }
     });
  });

      
  </script>


@endsection


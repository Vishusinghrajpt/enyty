@extends('layouts.frontend.default')


@section('title') Verify Email - Enyty @endsection

@section('css')  @endsection

@section('content')

 <!-- main login content  -->
  <main>
    <section class="container-fluid px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center" style="
          background-image: url(/Assets/login-page-bg.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
              height: 95vh;
        ">
      <div class="p-3 p-md-4 p-lg-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4">

        <a href="/">
        <img class="img-fluid mt-4 " src="https://enyty.com/Assets/Logo_vettoriale.svg" alt="">

        </a>
      
        <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
        Enyty will help you remember your existence on the journey made
          here on earth, whatever your beliefs are.
        </h2>
        <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-5 msg-success" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
        @if ($status == 'verification-link-sent')  
         @if (session('message'))
            <div class="email-verify-page alert alert-danger" style = "color:red"><b>{{ session('message') }}</b></div>
        @endif
            <p class="text-center txt-light">
              Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </p>
            <div class="mb-4 font-medium text-sm text-success txt-light" id="verification-mass">
                
            </div>
            <div class="fw-bold d-flex flex-wrap flex-lg-nowrap justify-content-center gap-1 mb-3">
                 <form id = "myForm" method="POST" action="{{ route('postverify') }}">
                    @csrf
                    <input type="hidden" id = "token" name="token" value="{{$token}}">
                    <button type='sumbit' class="btn btn-success px-4" id="resend-v">Resend Verification Email</button>
                </form
            </div>
        @endif  
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
    var csrf_token =  "{{csrf_token()}}";
    // console.log(token);
    var action =  $('#myForm').attr('action');
     var method =  $('#myForm').attr('method');
    console.log(method);
     $.ajax({
        url: "{{route('postverify')}}",
        method: 'post',
        data: {
           _token:csrf_token,
           token :"{{$token}}"
        
        },
        success: function(response) {
            console.log('success');
             console.log(response);
             setTimeout(myGreeting, 5000);

            $('#verification-mass').html("A new verification link has been sent to the your email address.");
           function myGreeting() {
               $('#verification-mass').html("");
           }
            // $('#resend-v').html(response);
        } 
     });
  });

      
  </script>

@endsection

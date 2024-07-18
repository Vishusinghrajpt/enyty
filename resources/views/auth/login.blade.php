@extends('layouts.frontend.default')

@section('title') Login - Eternity @endsection

@section('content')

<!-- main login content  -->
  <main>
    <section class="container-fluid px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center" style="
          background-image: url(./Assets/login-page-bg.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        ">
      <div class="p-3 p-md-4 p-lg-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4">
        <a href="{{route('index')}}"><img class="img-fluid mt-4 w-100"  src="./Assets/Logo_vettoriale.svg" alt="" /></a>
        <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
          Enyty will help you remember your existence on the journey made
          here on earth, whatever your beliefs are.
        </h2>
        <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-4" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
          <h2 class="text-capitalize text-center mb-5">Sign in User</h2>
                @if(isset($_GET['msg']))
                    <p  class="error mb-1 text-success " id='temp-email-sent-msg' for="email">{{$_GET['msg']}}</p>
                @endif
            @foreach($errors->get('status') as $error)
                <p  class="error mb-1 text-danger" for="email">{{$error}}</p>
            @endforeach 
            
            @foreach($errors->get('invalid_credentials') as $error)
                <p  class="error mb-1 text-danger" for="email">{{$error}}</p>
            @endforeach
             
          <form action="{{route('login_store')}}" method="post" id="login-form"> 
              @csrf
            <input type="email" id="email" placeholder="YOUR EMAIL" name="email" class="bg-white  form-control mb-3 rounded-3" required />
             @foreach($errors->get('email') as $error)
                <label id="email-error" class="error mb-1 text-danger" for="email">{{$error}}</label>
            @endforeach 
            <input type="password" id="password" placeholder="PASSWORD" name="password" class="bg-white  form-control mb-3 rounded-3" required />
            <button style="background-color: #456297" class="btn text-uppercase rounded-3 mt-1 mb-3 text-white w-100 py-2" type="submit">
              SIGN IN
            </button>
          </form>
 
          <div class="mb-5 d-flex flex-column align-items-center">
            <a href="{{ route('password.request') }}" class="form-text txt-light text-center text-decoration-none">Forgot your password?</a>
          </div>
          <div class="fw-bold d-flex flex-wrap flex-lg-nowrap justify-content-center gap-1 mb-3">
            <span class="txt-lighter">Don't you have an account?  </span>
            <a href="{{ route('register') }}" style="color: #456297" class="text-decoration-none">
              Register Now!
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>


@endsection


@section('scripts')  

<script>
     window.onload = function() {
        history.replaceState({}, '', '/login');
    };
    
</script>

@endsection 

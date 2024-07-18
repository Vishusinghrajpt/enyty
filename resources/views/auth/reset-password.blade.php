


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
        <a href="{{route('index')}}"> <img class="img-fluid mt-4"  src="{{asset('Assets/Logo_vettoriale.svg')}}" width="240" alt="logo" /></a>
        <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
          Eternity will help you remember your existence on the journey made
          here on earth, whatever your beliefs are.
        </h2>
        <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-4" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
          <h2 class="text-capitalize text-center mb-5 msg-success"></h2>
         
          
          
          
          <form  method="POST" action="{{ route('password.store') }}" id="reset_form"> 
              @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="email" id="email" value="{{old('email', $request->email)}}" placeholder="YOUR EMAIL" name="email" class="bg-white  form-control mb-3 rounded-3" />
                 @foreach($errors->get('email') as $error)
                    <label class="error" for="email">{{$error}}</label>
                @endforeach
            <input type="password" id="password" placeholder="PASSWORD" name="password" class="bg-white  form-control mb-3 rounded-3" />
            @foreach($errors->get('password') as $error)
            <label class="error" for="password">{{$error}}</label>
          @endforeach
             <input type="password" id="password_confirmation" placeholder="CONFIRM PASSWORD" name="password_confirmation" required autocomplete="new-password" class="bg-white  form-control mb-3 rounded-3" />
             @foreach($errors->get('password_confirmation') as $error)
            <label class="error" for="password_confirmation">{{$error}}</label>
          @endforeach
            <button style="background-color: #456297" id="reset_pass" class="btn text-uppercase rounded-3 mt-1 mb-3 text-white w-100 py-2" type="submit">
              Reset Password
            </button>
          </form>
         
        </div>
      </div>
    </section>
  </main>


@endsection


@section('scripts')  

@endsection 



@extends('layouts.company')
@section('title') Create Page - Enyty @endsection
@section('css')

@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.company.sidebar') @endsection
@section('content')


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section id="hero" class="d-flex flex-column justify-content-center ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="">Company Profile</h2>

                <form action="{{route('company.c_p_update')}}"  id="change-password" method="post"
                    onsubmit="add_update_data(this, event, this.id);">
                    @csrf
                    <div class="form-group">
                        {{ html()->text('name',$user->name)->required()->placeholder('Company name')->class('bg-white form-control mb-3 rounded-3') }}
                    </div>
                    <div class="form-group">
                        {{ html()->email('email',$user->email)->required()->placeholder('Email')->class('bg-white form-control mb-3 rounded-3') }}
                    </div>
                    <div class="form-group">
                        {{ html()->number('t_number',$user->agencie->number)->required()->placeholder('Phone number')->class('bg-white form-control mb-3 rounded-3') }}
                    </div>
                    <div class="form-group">
                        {{ html()->text('vat_number',$user->agencie->vat_number)->required()->placeholder('Vat number')->class('bg-white form-control mb-3 rounded-3') }}
                    </div>

                    <div class="row " id="selectpicker-input">
                        <div class="col-4 col-md-4 ">
                            <select class="selectpicker bg-white   form-control mb-3 rounded-3 location" id="location"
                                onChange="getLoctions('province',$(this).val())" name="country_id"
                                aria-label="Default select example" data-live-search="true" required>
                                <option value="">COUNTRY</option>
                                @foreach($countries as $countrie)
                                <option value="{{$countrie->id}}" @if(auth()->user()->country_id==$countrie->id)
                                    selected @endif>{{$countrie->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 col-md-4 selectpicker-input px-2">
                            <div class="province">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3" id="location"
                                    onChange="getLoctions('city',$(this).val())" name="province_id"
                                    aria-label="Default select example" data-live-search="true" required>
                                    <option value="">Province</option>
                                    @if($states)
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" @if(auth()->user()->state_id==$state->id)
                                        selected @endif >{{$state->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-md-4  selectpicker-input">
                            <div class="city">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3 " id="location" name="city_id"
                                    aria-label="Default select example" data-live-search="true" required>
                                    <option value="">Cities</option>
                                    @if($cities)
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}" @if(auth()->user()->city_id==$city->id)
                                        selected @endif >{{$city->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <button style="background-color: #456297; height: 65px;" id="submit-btn"
                        class="btn submit_btn_ rounded-3 mb-3 mt-2 text-white w-100 py-2" type="submit">
                        Save Setting
                    </button>
                </form>
            </div>
        </section>
        <!-- End Hero -->
    </div>
</div>
</div>
<!-- End of Content Wrapper -->
@endsection

@push('js')

<script>
$(document).ready(function() {
    var check_code = true;
    var verified_code = false;
    $("#update_profile").validate({
        rules: {
            email: {
                required: true,
                email: true,
                emailcheck: true,
            },
            password: {
                required: true,
                minlength: 8,
                pwcheck: true,
            },
            repeat_password: {
                required: true,
                minlength: 8,
                equalTo: "#password",
            },
        },


        messages: {
            email: {
                required: "Email is required",
                email: "Email is not valid",
                emailcheck: "Email is not valid",
            },
            password: {
                required: "Password is required",
                minlength: "Minimum Length should be 8 Characters",
                pwcheck: "Password must contain at-least a lowercase letter,upparcase and number",
            },
            repeat_password: {
                required: "Confirmation of password is required",
                minlength: "Minimum Length should be 8 Characters",
                equalTo: "Password did not match",
            },
        },
        submitHandler: function(form) {
            console.log('form submitted !!');
            console.log($('#submit-btn'));
            $("#submit-btn").html('<i class="fas fa-spinner fa-pulse"></i>please wait...');
            form.submite();

        }
    });

    $.validator.addMethod("startwith", function(value) {
        return /^[A-Za-z]/i.test(value); // start with letter only
    });
    $.validator.addMethod("letternumberonly", function(value) {
        return /^[A-Za-z0-9 ]+$/.test(value); // letters, numbers, and spaces only
    });



    $.validator.addMethod("pwcheck", function(value) {
        return /[a-z]/.test(value) // has a lowercase letter
            &&
            /[A-Z]/.test(value) // has an uppercase letter
            &&
            /\d/.test(value) // ha // has a symbol
    });

    $.validator.addMethod("emailcheck", function(value) {
        return /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value); // has a digit
    });

});
</script>
@endpush
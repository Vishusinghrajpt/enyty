@extends('layouts.backend.default')

@section('title') Register - Agency @endsection

@section('content')
@push('css')
<style>
    .input_img {
    background-image: url(/Assets/Ellipse_19.svg);
    background-repeat: no-repeat;
    background-size: cover;
    width: 30px !important;
    height: 30px !important;
    padding: 2px;
    position: absolute;
    margin: 8px;
    padding: 4px;
    top:6px;
    right: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.tooltip-inner {
    padding:15px;
    max-width: 300px;
    background-color: #FFFFFF;
    border: 1px solid #DBDBDB;
    color: gray; 
    }
.custom-tooltip .tooltip-email {
    margin-top: 10px;
    display: block;
    white-space: pre-wrap;
}
</style>
@endpush
<!-- main login content  -->
<main>
    <section id="register-form"
        class="container-fluid px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center" style="
          background-image: url(./Assets/login-page-bg.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        ">
        <div class="p-3 p-md-4 p-lg-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4">
            <div class="page-logo-section">
                <a href="{{route('index')}}"><img class="img-fluid mt-4 w-100" src="./Assets/Logo_vettoriale.svg"
                        alt="" /></a>
            </div>
            <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
                Enyty will help you remember your existence on the journey made
                here on earth, whatever your beliefs are.
            </h2>
            <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-5 msg-success" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
                <h2 class="text-capitalize text-center mb-5">Register your company</h2>
                <form method="POST" action="{{route('register_store')}}" class="" id="agency_signup">
                    @csrf
                    <input type="text" id="name" name="name" placeholder="Company Name"
                        class="bg-white  form-control mb-3 rounded-3" />
                    <input type="hidden" id="user_id" class="" name="role_id" value="3">

                    <input type="text" id="c_number" name="c_number" placeholder="Phone Number"
                        class="bg-white  form-control mb-3 rounded-3" />
                    <input type="number" name="vat_number" id="vat_number" placeholder="Vat Number"
                        class="bg-white  form-control mb-3 rounded-3">


                    {{ html()->select('country_id', $country_arr['name'])
                    ->placeholder('Country')
                    ->class('selectpicker form-select bg-white form-control mb-3 rounded-3')
                    ->required()
                    ->attribute('data-live-search', 'true')
                    ->attribute('id', 'country')
                    }}
	             <div class="province" id="provinceSec">
				     <input type="text"placeholder="Province"class="bg-white  form-control mb-3 rounded-3"onclick="$('.err_province').show();" readonly />
					 <label  class="error err_province" style="display:none">Select Country first</label>
				 </div>
				 <div class="city" id="">
				     <input type="text"placeholder="City"class="bg-white  form-control mb-3 rounded-3" onclick="$('.err_city').show();" readonly/>
					 <label  class="error err_city" style="display:none">Select Province First</label>
				 </div>

                    <input type="email" id="email" name="email" placeholder="Email"
                        class="bg-white  form-control mb-3 rounded-3" />
                    <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>

                    <input type="password" placeholder="Password" name="password" id="password"
                        class="bg-white  form-control mb-3 rounded-3" />
                    <input type="password" placeholder="Repeat Password" name="password_confirmation"
                        id="password_confirmation" class="bg-white  form-control mb-3 rounded-3" />
                   <div class="position-relative">
                        <input type="text" name="eternity_cod" id="eternity_cod" placeholder="Eternity code"
                            class="bg-white  form-control mb-3 rounded-3">
                            <div class="input_img" data-toggle="tooltip"data-bs-html="true" data-placement="top" data-bs-placement="right" data-bs-offset="[-10,100]" style="cursor: pointer;border: 1px solid #757575;border-radius: 50%;"  data-bs-original-title="<div class=''>If you don't have an Eternity Code to register your company, propose your Company by sending an email to <br> <br> <span class=''>info@enyty.com</span> </div>" aria-describedby="tooltip134655">
                                <p class="m-0 fw-bold" style="color:gray;padding-top: 4px;">?</p>
                            </div>
                       
                   </div>
                    <button style="background-color: #456297" id="agency-btn"
                        class="btn  rounded-3 mb-3 mt-2 text-white w-100 py-2" type="submit">
                        Register Now
                    </button>
                </form>
                <div class="fw-bold d-flex flex-wrap flex-lg-nowrap justify-content-center gap-1 mb-3">
                    <span class="txt-lighter">Already have an account? </span>
                    <a href="/agency_login" style="color: #456297" class="text-decoration-none">
                        Agency Login
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection

@section('scripts')

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script> -->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function() {
    var check_code = true;
    var verified_code = false;
    $("#agency_signup").validate({
        rules: {
            name: {
                required: true,
                startwith: true,
                minlength: 3,
                maxlength: 50,
                letternumberonly: true

            },

            c_number: {
                required: true,


            },

            vat_number: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
            eternity_cod: {
                required: true,


            },
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
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#password",
            }
        },


        messages: {
            name: {
                required: "Company  name is required",
                minlength: "Minimum length should be 3 characters",
                maxlength: "Maximum length should be 50 characters",
                letternumberonly: 'Letter and number',
                startwith: 'Company Name character letter please'
            },

            c_number: {
                required: "Phone number name is required",
            },
            vat_number: {
                required: "Vat number name is required",
                minlength: "Minimum length should be 3 characters",
                maxlength: "Maximum length should be 50 characters",
            },
            eternity_cod: {
                required: "Eternity code  name is required",
            },
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

            password_confirmation: {
                required: "Confirmation of password is required",
                minlength: "Minimum Length should be 8 Characters",
                equalTo: "Password did not match",
            }
        },
        submitHandler: function(form) {
            console.log('form submitted !!');
            console.log($('#agency-btn'));
            $("#agency-btn").html('<i class="fas fa-spinner fa-pulse"></i>please wait...');

            var companyName = $('#company_name').val();
            var eternityCode = $('#eternity_cod').val();

            if (eternityCode && ['A5b##1', 'e@3J%5', '#43Cs*', '89H#@l'].includes(eternityCode)) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),

                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        if (response.status == false) {
                            $("#email-exists").html('Email is Already Exists');
                            $("#agency-btn").html('register now');
                        } else {
                            console.log('testig', response, response.status);

                            $("#email-exists").html('');
                            content = `<h2 class="text-capitalize text-center text-success">Registration Successfully !!</h2>
                            <div class="fw-bold d-flex flex-wrap flex-lg-nowrap justify-content-center gap-1 mb-3">
                              <span class="txt-lighter">Redirection to Email Verification page... </span>
                            </div>`;
                            $(".msg-success").html(content);
                            console.log('fgfg', $(".msg-success"), content);

                            window.setTimeout(function() {
                                window.location.href = "/verify/" + response
                                    .status + "/" + response.token;
                            }, 3000);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                        alert('Registration failed. Please try again.');
                    }
                });
            } else {
                // Handle invalid eternity code
                alert('Invalid eternity code');
            }
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


@endsection
@extends('layouts.backend.default')

@section('css') 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

@endsection


@section('content')
@push('css')
<style>
.form-select {
    color: #828d99 !important;
}
#selectpicker-input .selectpicker-input {
    margin: 0px 0px 0px 11px !important;
}
#selectpicker-input .col-4 {
    width: 32% !important;
}
button.btn.dropdown-toggle.btn-light{
	color: gray;
    height: 65px;
    background: #fff;
    border: var(--bs-border-width) solid var(--bs-border-color);
    border-radius: var(--bs-border-radius);
    font-size: 20px;
    color: gray;
}
.bootstrap-select .dropdown-toggle .filter-option{
	display: flex;
    align-items: center;
}
.dropdown-menu.show {
    max-height: 200px;
}
</style>
@endpush


 <!-- main login content  -->
  <main>
    <section class="container-fluid px-3 px-lg-5 d-flex flex-column align-items-center justify-content-center" style="
          background-image: url(./Assets/login-page-bg.png);
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
        ">
      <div class="p-3 p-md-4 p-lg-5 mb-5 d-flex flex-column align-items-center justify-content-center gap-3 gap-lg-4">
      	<div class="page-logo-section">
        	<a href="{{route('index')}}"><img class="img-fluid mt-4 w-100"  src="./Assets/Logo_vettoriale.svg" alt="" /></a>
        </div>
        <h2 style="color: #465a7b" class="text-center font-freehand mb-4 mb-lg-5 col-12 col-md-8 col-lg-5">
          Enyty will help you remember your existence on the journey made
          here on earth, whatever your beliefs are.
        </h2>
        <div class="rounded-4 p-4 p-lg-5 col-12 col-md-8 col-lg-5 msg-success" style="
              background: #f8fbfd;
              box-shadow: 0px 0px 33px 5.7px rgba(0, 0, 0, 0.09);
            ">
          <h2 class="text-capitalize text-center mb-5">User registration</h2>
          <form action="{{route('register_store')}}" class="" id="signup" method="post">
              @csrf
            <input type="text" id="first_name" name="first_name" placeholder="FIRST NAME"
              class="bg-white  form-control mb-3 rounded-3" />
            <input type="text" id="last_name" name="last_name" placeholder="LAST NAME"
              class="bg-white  form-control mb-3 rounded-3" />
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
            <input type="email" id="email" placeholder="YOUR EMAIL" name="email" class="bg-white  form-control mb-3 rounded-3" />
            <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>
            <input type="password" id="password" id="password" placeholder="PASSWORD" name="password" class="bg-white  form-control mb-3 rounded-3" />
            <input type="password" id="password_confirm" placeholder="REPEAT PASSWORD" name="password_confirmation"
              class="bg-white  form-control mb-3 rounded-3" />
            <button style="background-color: #456297" id="submit-btn" class="btn rounded-3 mb-3 mt-2 text-white w-100 py-2" type="submit">
              REGISTER NOW
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
 
 
@endsection


@section('scripts')  


<script>
	$(document).ready(function () {
        var check_code=true;
        var verified_code=false;
		$("#signup").validate({
			rules: {
				first_name: {
					required: true,
					startwith:true,
					minlength: 3,
					maxlength: 50,
					letternumberonly:true
				
				},
				last_name: {
					required: true,
					startwith:true,
					minlength: 3,
					maxlength: 50,
					letternumberonly:true
				
				},
				coutry: {
					required: true,
					
				
				},
				province: {
					required: true,
					
				
				},
				city: {
					required: true,
					
				
				},
				email: {
					required: true,
					email: true,
					emailcheck:true,
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
			
		
			messages:{
				first_name: {
					required: "First name is required",
					minlength: "Minimum length should be 3 characters",
					maxlength: "Maximum length should be 50 characters",
					letternumberonly:'Letter and number', 
					startwith:'First character letter please'
				},
				last_name: {
					required: "Last name is required",
					minlength:  "Minimum Length should be 3 characters",
					maxlength: "Maximum Length should be 50 characters",
					letternumberonly:'Letter and number',
					startwith:'first character Letter please'
				},
				coutry: {
					required: "Coutry name is required",
					
				},
				province: {
					required: "Province name is required",
					
				},
				city: {
					required: "City name is required",
					
				},
				email: {
					required:"Email is required",
					email: "Email is not valid",
					emailcheck:"Email is not valid",
				},
				password: {
					required: "Password is required",
					minlength:"Minimum Length should be 8 Characters",
					pwcheck:  "Password must contain at-least a lowercase letter,upparcase and number",
				},
				password_confirmation: {
					required: "Confirmation of password is required",
					minlength: "Minimum Length should be 8 Characters",
					equalTo:  "Password did not match",
				}
			},
			submitHandler: function(form) {
			    console.log('form submitted !!');
			    console.log($('#submit-btn'));
			    $("#submit-btn").html('<i class="fas fa-spinner fa-pulse"></i>please wait...');

			    $.ajax({
			        url: form.action,
			        type: form.method,
			        data: $(form).serialize(),
			        success: function(response) {
			            console.log('success123', response, response.status);
			            if (response.status == false) {
			                $("#email-exists").html('Email is Already Exists');
			                $("#submit-btn").html('register now');
			            } else {
			                $("#email-exists").html('');
			                var content = `
			                    <h2 class="text-capitalize text-center text-success">Registration SuccessFully !</h2>
			                    <div class="fw-bold d-flex flex-wrap flex-lg-nowrap justify-content-center gap-1 mb-3">
			                        <span class="txt-lighter">Redirection to Email Verification page... </span>
			                    </div>
			                `;
			                $(".msg-success").html(content);

			                setTimeout(function() {
			                    window.location.href = "/verify/" + response.status + "/" + response.token;
			                }, 3000);
			            }
			        },
			        error: function(xhr, status, error) {
			            console.log('error', xhr, status, error);
			            // Handle error if necessary
			        }
			    });
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
                && /[A-Z]/.test(value) // has an uppercase letter
                && /\d/.test(value) // ha // has a symbol
        });

		$.validator.addMethod("emailcheck", function(value) {
		return /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value); // has a digit
		});
        
	});
</script>  

@endsection

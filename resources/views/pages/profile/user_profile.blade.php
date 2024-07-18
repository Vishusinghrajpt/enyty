@extends('layouts.backend.default')
@section('title') User Profile - Enyty @endsection
@section('css')
@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.backend.sidebar') @endsection
@section('content')

<style>
#selectpicker-input .selectpicker-input {
    margin: 0px 0px 0px 11px !important;
}

#selectpicker-input .col-4 {
    width: 32% !important;
}
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section id="hero" class="d-flex flex-column justify-content-center " style="
                      
                    ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="">My Profile</h2>

                <form action="" class="" id="update-info" method="post">
                    @csrf
                    <div class="alert alert-danger" id="page_error" role="alert" style="display:none;">
                        This is a danger alert—check it out!
                    </div>
                    <input type="text" id="first_name" name="first_name" value="{{auth()->user()->first_name}}"
                        placeholder="FIRST NAME" class="bg-white  form-control mb-3 rounded-3" required />
                    <input type="text" id="last_name" name="last_name" value="{{auth()->user()->last_name}}"
                        placeholder="LAST NAME" class="bg-white  form-control mb-3 rounded-3" required />
                    <input type="email" id="email" placeholder="EMAIL ADDRESS" name="email"
                        value="{{auth()->user()->email}}" class="bg-gray  form-control mb-3 rounded-3" required />
                    <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>

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
                        <div class="col-4 col-md-4 selectpicker-input ">
                            <div class="province">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3" id="location"
                                    onChange="getLoctions('city',$(this).val())" name="province_id"
                                    aria-label="Default select example" data-live-search="true" required>
                                    <option value="">Province</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" @if(auth()->user()->state_id==$state->id)
                                        selected @endif >{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-md-4  selectpicker-input">
                            <div class="city">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3 " id="location" name="city_id"
                                    aria-label="Default select example" data-live-search="true" required>
                                    <option value="">Cities</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}" @if(auth()->user()->city_id==$city->id)
                                        selected @endif >{{$city->name}}</option>
                                    @endforeach
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
@section('scripts')

<script>
// update profile
$("#update-info").submit(function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Serialize the form data
    var formData = $(this).serialize();
    var csrf_token = "{{csrf_token()}}";

    // Perform an AJAX post request
    $.ajax({
        type: "POST",
        method: 'post',
        url: "{{route('profile_update')}}", // Replace with the actual server-side script URL
        data: formData,
        header: {
            'X-CSRF-Token': csrf_token
        },
        success: function(response) {
            // Handle the successful response from the server
            console.log("Success:", response);
            if (response.error) {
                $('#page_error').html(response.msg);
                $('#page_error').show();
            }

            if (response.email_updated) {
                $('#submit-btn').css({
                    "backgroundColor": "green"
                });
                $('#submit-btn').html('Email Verification Link Sent ...');
                window.setTimeout(function() {
                    window.location.href = "/login?msg=" + response.status;
                }, 3000);

            }
            if (response.email_updated == 0) {
                $('#submit-btn').css({
                    "backgroundColor": "green"
                });
                $('#submit-btn').html(response.msg);
                setTimeout(() => {
                    $('#submit-btn').html('Save Setting');
                    $('#submit-btn').css({
                        "backgroundColor": "#456297"
                    });
                }, 4000);
            }
        },
        error: function(error) {
            // Handle the error response from the server
            console.log("Error:", error);
        }
    });
});
</script>
@endsection
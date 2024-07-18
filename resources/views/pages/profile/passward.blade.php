@extends('layouts.backend.default')
@section('title') Change Password - Enyty @endsection
@section('css')
@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.backend.sidebar') @endsection
@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section id="hero" class="d-flex flex-column justify-content-center " style="">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="    ">Change Password</h2>
                <div class="alert alert-success" id="changed_succ" role="alert" style="display:none">
                    Your password has been changed successfully.
                </div>
                <form action="{{route('password_update')}}" class="" id="change-password" method="post"  onsubmit="add_update_data(this, event, this.id);">
                    @csrf
                    <div class="alert alert-danger" id="crunnet_password_mass" role="alert" style="display:none">
                        Current password doesn`t matched !!
                    </div>
                    <input type="password" id="crunnet_password" name="crunnet_password" value=""
                        placeholder="CURRENT PASSWORD" class="bg-white  form-control mb-3 rounded-3" required />
                    <div class="alert alert-danger" id="new_password_mass" role="alert" style="display:none">
                        Password Not Matched !!
                    </div>
                    <input type="password" id="new_password" name="new_password" value="" placeholder="NEW PASSWORD"
                        class="bg-white  form-control mb-3 rounded-3" required minlength="8" />
                    <input type="password" id="repeat_password" placeholder="REPEAT PASSWORD" name="repeat_password"
                        value="" class="bg-gray  form-control mb-3 rounded-3" required minlength="8" />
                    <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>
                    <button style="background-color: #456297;" id="submit-btn-pass"
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
$("#change-password").submit(function(event) {
    // Prevent the default form submission
    event.preventDefault();

    $('#crunnet_password_mass').hide();
    $('#changed_succ').hide();
    $('#new_password_mass').hide();

    // Serialize the form data
    var formData = $(this).serialize();
    var csrf_token = "{{csrf_token()}}";

    // Perform an AJAX post request
    $.ajax({
        type: "POST",
        method: 'post',
        url: "{{route('password_update')}}", // Replace with the actual server-side script URL
        data: formData,
        header: {
            'X-CSRF-Token': csrf_token
        },
        success: function(response) {
            // Handle the successful response from the server
            console.log("Success:", response.status);
            // $('#submit-btn-pass').css({"backgroundColor":"green"});
            if (response.status == 1) {
                console.log("test 1:", response.status1);
                $('#new_password_mass').show();

            }
            if (response.status == 2) {
                $('#changed_succ').show();
                console.log("test 2:", response.status2);
            }
            if (response.status == 3) {
                $('#crunnet_password_mass').show();
                console.log("test 3:", response.status3);
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
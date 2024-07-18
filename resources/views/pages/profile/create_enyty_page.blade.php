@extends('layouts.backend.default')
@section('title') Create Page - Enyty @endsection
@section('css')

@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.backend.sidebar') @endsection
@section('content')

<style>

.input_tooltip {
    position: absolute;
    cursor: pointer;
    border-radius: 50%;
    right: -33px;
    bottom: 170px;
    background-color: #FFFFFF;
    border: 1px solid #DBDBDB;
    width: 48px !important;
    height: 48px !important;
}

.tooltip-inner {
    padding: 15px;
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


<!--modal-->
<div class="modal fade cropImageModal" id="cropImageprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content" style="height: auto !important;">

            <div class="modal-body p-0">
                <div class="modal-header-bg">
                    <button type="button" class="close-modal-custom pt-3" data-dismiss="modal" aria-label="Close"
                        style="background: unset;  border: transparent;">
                        <img class="img-fluid " src="./Assets/Group22.svg" alt="fb icon" width="20" height="">
                    </button>
                </div>

                <div class="up-photo-title">
                    <h3 class="modal-title"><img class="img-fluid " src="./Assets/Logo_vettoriale.svg" alt="fb icon"
                            width="200" height=""></h3>
                    <p class="modal-title">Update The Photo Of Your Loved One</p>
                </div>
                <div class="up-photo-content ">

                    <div id="upload-demoprofile" class="center-block">
                        <h5 style="color:#0000007d;"><i class="fas fa-arrows-alt mr-1"></i> Drag your photo as you
                            require</h5>
                    </div>
                    <div class="upload-action-btn text-center px-2">
                        <button type="button" id="crop_profile_ImageBtn" class="btn btn-default btn-medium  ">
                            Save photo
                        </button>
                        <button type="button" class="btn ReplaceProfilePPhoto position-relative"
                            style="color:#0000007d;">Replace Photo</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal-->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section class="d-flex flex-column justify-content-center " style="
                      
                    ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="    ">Create Enyty Page</h2>
                
            @if($user->donationHistories->count() > $user->eternityPages->count())
                <div class="alert alert-success" id="eternity_page_suc" role="alert" style="display:none;">
                    Enyty Page Created Successfully
                </div>
                <div class="alert alert-danger" id="eternity_page_error" role="alert" style="display:none;">
                    This is a danger alert—check it out!
                </div>
                <form action="" class="" id="create_eternity_page" method="post">
                    @csrf

                    <div class="row" style="justify-content: space-between;">
                        <input type="text" id="frist_name" name="first_name" value="" placeholder="FIRST NAME"
                            class="bg-white col-6  form-control mb-3 rounded-3" maxlength="30" required
                            style="width: 48%;" />
                        <input type="text" id="last_name" name="last_name" value="" placeholder="LAST NAME"
                            class="bg-white col-6 form-control mb-3 rounded-3" maxlength="30" required
                            style="width: 48%;" />
                    </div>
                    <span class="fw-bold " style="color:gray;">Date of Birth</span>
                    <div class="row" style="justify-content: space-between;">
                        <select id="month" name="birth_month" class="form-control mb-3 cursor-pointer"
                            style="width: 38%;" required>
                            <option value="">MONTH</option>
                            @for ($i = 12; $i >= 01; $i--)
                            <option value="{{ $i }}" class="py-2">{{ $i }}</option>
                            @endfor
                        </select>
                        <select id="day" name="birth_day" class="form-control mb-3 cursor-pointer" style="width: 28%;"
                            required>
                            <option value="">DAY</option>
                            @for ($i = 31; $i >= 01; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        <select id="birth_year" name="birth_year" class="form-control mb-3 cursor-pointer"
                            style="width: 28%;" required>
                            {{ $last= date('Y')-120 }}
                            {{ $now = date('Y') }}
                            <option value="">
                                YEAR
                            </option>
                            @for ($i = $now; $i >= $last; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <span class="fw-bold " style="color:gray;">Date of Departure</span>
                    <div class="row" style="justify-content: space-between;">

                        <select id="month" name="departure_month" class="form-control mb-3 cursor-pointer"
                            style="width: 38%;" required>
                            <option value="">MONTH</option>
                            @for ($i = 12; $i >= 01; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <select id="day" name="departure_day" class="form-control mb-3 cursor-pointer"
                            style="width: 28%;" required>
                            <option value="">DAY</option>
                            @for ($i = 31; $i >= 01; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <select id="departure_year" name="departure_year" class="form-control mb-3 cursor-pointer"
                            style="width: 28%;" required>
                            <option value="">YEAR</option>
                            {{ $last= date('Y')-120 }}
                            {{ $now = date('Y') }}
                            @for ($i = $now; $i >= $last; $i--)
                            <option class="" value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="row" style="justify-content: space-between;">
                        <input type="text" id="symbolic" name="symbolic" value=""
                            placeholder="SYMBOLIC PHRASE (OPTIONAL)" class="bg-white   form-control mb-3 rounded-3"
                            maxlength="150" />
                    </div>
                    <div class="row" style="justify-content: space-between;">
                        <textarea class="bg-white   form-control mb-3 rounded-3" placeholder="BIOGRAPHY" id="biography"
                            name="biography" rows="4" cols="50" maxlength="1500" required></textarea>
                    </div>
                    <div class="row fileExtension" style="justify-content: space-between;">

                        <input type="text" id="profile_picture1" name="profile_picture1" value=""
                            placeholder="PROFILE PICTURE" class="bg-white   form-control mb-3 rounded-3"
                            style="cursor: pointer;" />
                        <div class="alert alert-danger profile_picture_error" id="" role="alert" style="display:none;">
                            Image limit exceeded!
                        </div>
                        <div class="input_img" style="cursor: pointer;">
                            <img src='https://enyty.com/Assets/Vector.svg' id="pro_img" height="25" />
                        </div>
                        <input type="file" id="profile_picture2" name="profile_picture2" placeholder="PROFILE PICTURE"
                            class="bg-white   form-control mb-3 rounded-3" required style="display:none;" />
                        <input type="hidden" id="profile_picture3" name="profile_picture3" placeholder="PROFILE PICTURE"
                            class="bg-white   form-control mb-3 rounded-3" required style="display:none;" />
                    </div>
                    <div class="preview-Pimages-zone d-flex justify-content-center mb-2" style="">
                        <img src='' id="profile_item-img-output" height="auto" style="max-width: 50%;" />
                    </div>
                    <div class="row additional_picture12" style="justify-content: space-between;">
                        <input type="text" id="additional_picture1" name="additional_picture1" value=""
                            placeholder="ADDITIONAL PICTURES" class="bg-white   form-control mb-3 rounded-3" required
                            style="cursor: pointer;" />
                        <div class="alert alert-danger additional_picture_error" id="" role="alert"
                            style="display:none;">
                            Image limit exceeded!
                        </div>
                        <div class="input_img preview-image preview-show-1" style="cursor: pointer;">
                            <img src='https://enyty.com/Assets/Vector.svg' height="25" />
                        </div>
                        <div class="preview-images-zone justify-content-center"></div>
                        <input type="file" id="additional_picture2" name="additional_picture2[]"
                            placeholder="PROFILE PICTURE" class="bg-white   form-control mb-3 rounded-3" multiple
                            style="display:none;" />
                    </div>

                    <div class="row" style="justify-content: space-between;">

                        <select class="selectpicker bg-white   form-control mb-3 rounded-3" name="connection"
                            id="connection" aria-label="Default select example" data-live-search="true" required>
                            <option value="">YOUR CONNECTION TO THE DEPARTED</option>
                            <option value="Daddy">Daddy</option>
                            <option value="Mother">Mother</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Uncle">Uncle</option>
                            <option value="Cousin">Cousin</option>
                            <option value="Friend">Friend</option>
                            <option value="Grandparents">Grandparents</option>
                            <option value="great-grandparents">Great-grandparents</option>
                        </select>

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
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}" @if(auth()->user()->state_id==$state->id)
                                        selected @endif >{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-md-4  selectpicker-input">
                            <div class="city">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3 " id="location"
                                    name="city_id" aria-label="Default select example" data-live-search="true" required>
                                    <option value="">Cities</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}" @if(auth()->user()->city_id==$city->id)
                                        selected @endif >{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="input_tooltip d-flex align-items-center justify-content-center"
                            data-toggle="tooltip" data-bs-html="true"
                            data-bs-original-title="<div class=''>The country the province and city of the person to be memorialized will serve to geolocate the profile, generally associating it with the person's country of origin. </div>"
                            aria-describedby="tooltip134655">
                            <p class="m-0 fw-bold" style="color:gray;padding-top: 4px;">?</p>
                        </div>

                    <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>
                    <button style="background-color: #456297;" id="submit-btn-pass"
                        class="submit_btn_  form-control btn rounded-3 mb-3 mt-2 text-white w-100 py-2" type="submit">
                        Create page
                    </button>
                </form>
                
            @else
            
              <p class="text-uppercase">To create an Enyty page, support this project with a donation. After donating, you will be redirected to this section for creation.</p>
            @endif
            </div>
        </section>
        <!-- End Hero -->
    </div>
</div>
</div>

<x-AuthenticationModal message="To create an eternity page, please donate first." id="AuthenticationModalFordonation" />
<x-confirmation-of-successful-creation message="[person's name] will be forever remembered, eternally."
    id="AuthenticationModalForsuccessful" />
<!-- End of Content Wrapper -->
@endsection
@section('scripts')

<script>


// update profile
$("#create_eternity_page").submit(function(event) {

    event.preventDefault();
    $("#submit-btn-pass").prop('disabled', true);
    $("#submit-btn-pass").html('<i class="fas fa-spinner fa-pulse"></i>please wait...');
    // Serialize the form data
    var formData = new FormData(document.getElementById('create_eternity_page'));;
    var csrf_token = "{{csrf_token()}}";
    var profile_img = $('#profile_item-img-output').attr('src');
    $.ajax({
        method: 'post',
        url: "{{route('create_eternity_page_')}}",
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        enctype: 'multipart/form-data',
        _token: csrf_token,
        success: function(response) {
            // Handle the successful response from the server


            if (response.status == 2) {
                $('#eternity_page_error').html(response.msg);
                $("#eternity_page_error").show();
                $('html, body').animate({
                    scrollTop: $("#content").offset().top
                });
                $('#submit-btn-pass').html('Create page');
                $("#submit-btn-pass").prop('disabled', false);
            }
            if (response.status == 3) {

                $('.donation-url').attr('href', '/payment-method');
                $('.donation-button').html('Donate');
                $('#AuthenticationModalFordonation').modal('show');
            }

            if (response.status == 1) {
                $('#submit-btn-pass').html('Create page');
                $("#eternity_page_suc").show();
                $('#massage').html(response.msg);
                $('#AuthenticationModalForsuccessful').modal('show');
                // setTimeout(function(){window.location.href = "/your-eternity-page";} , 3000);   
            }
            if (response.Error) {
                $("#eternity_page_error").show();
            }
        },
        error: function(error) {
            // Handle the error response from the server
            console.log("Error:", error);
        }
    });
});

//multiple img

$(document).ready(function() {

    // document.getElementById('additional_picture2').addEventListener('change', readImage, false);

    $(".preview-images-zone").sortable();

});





var num = 4;


</script>

<script type="text/javascript">


//search data
$(document).ready(function() {
    var data = ['Daddy', 'Mother', 'Son', 'Daughter', 'Brother', 'Sister', 'Uncle', 'Cousin', 'Friend'];

    $('#connection').on('keyup', function() {
        var query = $(this).val().toLowerCase();
        var connectionresults = filterData(data, query);
        displayconnectionresults(connectionresults);
    });

    function filterData(data, query) {
        return data.filter(function(item) {
            return item.toLowerCase().includes(query);
        });
    }

    function displayconnectionresults(connectionresults) {
        $('#connectionresults').show();
        var connectionresultsContainer = $('#connectionresults');
        connectionresultsContainer.empty();
        for (var i = 0; i < connectionresults.length; i++) {
            var listItem = $('<li class="cursor-pointer p-2 h5">').text(connectionresults[i]);
            listItem.on('click', function() {
                $('#connection').val($(this).text());
                $('#connectionresults').hide();

            });

            connectionresultsContainer.append(listItem);
        }
    }
});

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
//end search data
</script>
<script src="{{asset('js/search_countries.js')}}"></script>
@endsection
@extends('layouts.company')
@section('title') Create Page - {{env('APP_NAME')}} @endsection
@section('css')

@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.company.sidebar') @endsection
@push('css')
<style>
.preview-image {
    padding: 0 !important;
}

.preview-image .image-zone {
    display: flex;
    justify-content: center;
}

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


.company-poster_img img#pro-img-4 {
    height: 146.203px;
}
.main-container{
      max-width: 1028px !important;
}
</style>
@endpush
@section('content')

@include('partials.imgCroperModal',['id'=>'cropImageprofile','imageInput'=>'company_logo1','imageOutput'=>'poster_img'])
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section class="d-flex flex-column justify-content-center ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-11 m-sm-5 m-md-5 m-lg-5 col-lg-12 msg-success main-container">
                <h2 class="text-capitalize page_titel mb-5" style="">Create Poster</h2>
                <ul class="" style="list-style:none;">
                    <li class="steps-style h5 text-uppercase">1 Payment</li>
                    <li class="steps-style h5 text-uppercase fw-bold">2 Create poster</li>
                    <li class="steps-style h5 text-uppercase">3 create enyty page</li>
                    <li class="steps-style h5 text-uppercase">4 QR Code Generation</li>
                </ul>

                <div class="d-flex flex-wrap flex-md-nowrap gap-5 mb-5" id="profile-section-images">
                    <div class="w-100 mx-auto">
                        <div class="border border-dark border-2 p-3">
                            <div class="border border-dark border-2 p-3 profile-section-images">
                                <div
                                    class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3">
                                    <div class="my-auto col-4 w-10">
                                        <h5
                                            class="text-uppercase text-center text-secondary text-md-end font-bold font-size">
                                            <span class="name">Name</span> &nbsp <span class="surname">Surname</span>
                                        </h5>
                                        <h5 class="text-uppercase text-center text-md-end font-size">
                                            <span class="text-secondary font-size ">age &nbsp <span
                                                    class="full_age">x</span></span>
                                        </h5>
                                    </div>
                                    <div class="col-4 profile-image-post ">
                                        <div class="company-poster_img p-sm-3  w-75 mx-auto img_border_in my-3">
                                            <img style="padding: 10px;background: #fff;"
                                                class="img-fluid justify-content-center poster_img"
                                                src="{{asset('Assets/AdobeStock_6410838122_1.svg')}}" alt=""
                                                height="150" width="">
                                        </div>
                                    </div>

                                    <div class="my-auto col-4 w-10">
                                        <h5
                                            class="text-uppercase text-center  text-secondary  text-md-start font-bold me-0  font-size birth_date">
                                            DAte of birth
                                        </h5>
                                        <h5 class="text-uppercase text-center text-md-start ">
                                            <span class="font-size text-secondary departure_date">date of
                                                departure</span>
                                        </h5>
                                    </div>
                                    <div class="company-logo profilePage position-absolute d-flex flex-row-reverse">
                                        <img class="img-fluid"
                                            src="{{auth()->user()->avatar ?? '/Assets/Group 51.png'}}" alt=""
                                            height="100">
                                    </div>
                                </div>

                                <div class="content-section pt-2 pb-2">
                                    <h5
                                        class="txt-light  text-center h5 text-secondary p-0 text-capitalize d-flex justify-content-center">
                                        <b class="font-size text-dark">Funeral celebration &nbsp </b>
                                        <p class="content-test funeral_celebration"> 123 Main Street, Anytown, USA,
                                            12345</p>
                                    </h5>
                                    <h5
                                        class="txt-light  text-center h5 p-0 text-capitalize text-secondary d-flex justify-content-center">
                                        <b class="font-size text-dark">Location of body &nbsp</b>
                                        <p class="content-test location_body">456 Elm Avenue, Anytown, USA, 12345</p>
                                    </h5>
                                </div>
                                <div class="content-section pt-2 pb-2">
                                    <h5 class="envet-heading text-center text-dark h5 p-0 text-capitalize">
                                        This was announced by <span class="announcedBy"> wife Elizabeth and sons Chris
                                            and Alex. </span></h5>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{route('company.create_poster')}}" class="" id="create_eternity_page" method="post">
                    @csrf

                    <div class="row" style="justify-content: space-between;">
                        <input type="text" id="frist_name" name="frist_name" value=""
                            onkeyup="changePosterValue('.name',this.value)" placeholder="FIRST NAME"
                            class="bg-white col-6  form-control mb-3 rounded-3" maxlength="22" required
                            style="width: 48%;" />
                        <input type="text" id="last_name" name="last_name" value=""
                            onkeyup="changePosterValue('.surname',this.value)" placeholder="LAST NAME"
                            class="bg-white col-6 form-control mb-3 rounded-3" maxlength="22" required
                            style="width: 48%;" />
                    </div>
                    <div class="row fileExtension" style="justify-content: space-between;">

                        <input type="text" onclick="$('#Up_logo').click()" value="" placeholder="Poster Image"
                            class="bg-white  posterImgBtn form-control mb-3 rounded-3" style="cursor: pointer;"
                            readonly>
                        <div class="input_img" style="cursor: pointer;">
                            <img src="{{asset('Assets/Vector.svg')}}" id="pro_img" height="25">
                        </div>
                        <div class="alert alert-danger profile_picture_error" id="" role="alert" style="display:none;">
                            Image limit exceeded!
                        </div>
                        <div class="company-poster_img">
                            <div class=" preview-image preview-show-4">
                                <input type="hidden" id="company_logo1" name="company_logo1" value="">
                                <div class="image-zone "><img id="posterImgOut" class="poster_img" src=""
                                        style="max-height:181.203px; border-radius: 0px;"></div>
                            </div>
                            <input type="file" id="Up_logo" name="c_logo"
                                onchange="imageCroper(this,'.posterImgBtn','.profile_picture_error','#cropImageprofile');"
                                class="d-none" />
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
                            <select id="day" name="birth_day" class="form-control mb-3 cursor-pointer"
                                style="width: 28%;" required>
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
                            <input type="date" name="birth_date" id="birth_date" style="display:none;">
                        </div>
                        <span class="fw-bold " style="color:gray;">Date of Departure</span>
                        <div class="row" style="justify-content: space-between;">

                            <select id="departure_month" name="departure_month" class="form-control mb-3 cursor-pointer"
                                style="width: 38%;" required>
                                <option value="">MONTH</option>
                                @for ($i = 12; $i >= 01; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="departure_day" name="departure_day" class="form-control mb-3 cursor-pointer"
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
                            <input type="date" name="departure_date" id="departure_date" style="display:none;">
                        </div>
                        <div class="row" style="justify-content: space-between;">
                            <input type="text" name="funeral_celebration" value=""
                                onkeyup="$('.funeral_celebration').html(this.value)"
                                placeholder="Information about the funeral celebration"
                                class="bg-white   form-control mb-3 rounded-3" maxlength="150" />
                        </div>

                        <div class="row">
                            <input type="text" name="location_body" value=""
                                onkeyup="$('.location_body').html(this.value)"
                                placeholder="Information about the location of the body"
                                class="bg-white   form-control mb-3 rounded-3" maxlength="150" />
                        </div>
                        <div class="row">
                            <input type="text" name="announces_passing" value=""
                                onkeyup="$('.announcedBy').html(this.value)" placeholder="Who announces the passing"
                                class="bg-white   form-control mb-3 rounded-3" maxlength="100" />
                        </div>
                        <div class="row " id="selectpicker-input">
                            <div class="col-4 col-md-4 ">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3 location"
                                    id="location" onChange="getLoctions('state',$(this).val())" name="country_id"
                                    aria-label="Default select example" data-live-search="true" required>
                                    <option value="">COUNTRY</option>
                                    @if($countries)
                                    @foreach($countries as $countrie)
                                    <option value="{{$countrie->id}}">{{$countrie->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-4 col-md-4 selectpicker-input px-2 ">
                                <div class="state">
                                    <select class="selectpicker bg-white   form-control mb-3 rounded-3" id="location"
                                        onChange="getLoctions('city',$(this).val())" name="province_id"
                                        aria-label="Default select example" data-live-search="true" required>
                                        <option value="">Province</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 col-md-4  selectpicker-input">
                                <div class="city">
                                    <select class="selectpicker bg-white   form-control mb-3 rounded-3 " id="location"
                                        name="city_id" aria-label="Default select example" data-live-search="true"
                                        required>
                                        <option value="">Cities</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input_tooltip d-flex align-items-center justify-content-center"
                            data-toggle="tooltip" data-bs-html="true"
                            data-bs-original-title="<div class=''>The country the province and city of the person to be memorialized will serve to geolocate the poster, generally associating it with the person's country of origin. <br> <br> <span class='text-uppercase'> It will also be the same for locating the memorial profile.</span> </div>"
                            aria-describedby="tooltip134655">
                            <p class="m-0 fw-bold" style="color:gray;padding-top: 4px;">?</p>
                        </div>

                        <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>
                        <button style="background-color: #456297;" id="submit-btn-pass"
                            class="submit_btn_  form-control btn rounded-3 mb-3 mt-2 text-white w-100 py-2"
                            type="submit">
                            Create page
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
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endpush
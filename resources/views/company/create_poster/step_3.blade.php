@extends('layouts.company')
@section('title') Create Page - Enyty @endsection
@section('css')

@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.company.sidebar') @endsection
@section('content')
<!-- Content Wrapper -->

<!--modal-->
@include('partials.imgCroperModal')
<!--end modal-->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section class="d-flex flex-column justify-content-center ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="">Create Enyty Page</h2>
                <ul class="" style="list-style:none;">
                    <li class="steps-style h5 text-uppercase">1 Payment</li>
                    <li class="steps-style h5  text-uppercase">2 Create poster</li>
                    <li class="steps-style h5 fw-bold text-uppercase">3 create enyty page</li>
                    <li class="steps-style h5 text-uppercase">4 QR Code Generation</li>
                </ul>

                <form action="{{route('company.create_enyty_page')}}" class="" id="create_eternity_page" method="post">
                    @csrf

                    <div class="row" style="justify-content: space-between;">
                    <input type="hidden" id="" name="poster_id" value="{{$poster->id ?? ''}}">
                        <input type="text" id="frist_name" name="frist_name" value="{{$poster->frist_name ?? ''}}" placeholder="FIRST NAME"
                            class="bg-white col-6  form-control mb-3 rounded-3" maxlength="30" required
                            style="width: 48%;" />
                        <input type="text" id="last_name" name="last_name" value="{{$poster->last_name ?? ''}}" placeholder="LAST NAME"
                            class="bg-white col-6 form-control mb-3 rounded-3" maxlength="30" required
                            style="width: 48%;" />
                    </div>
                    <span class="fw-bold " style="color:gray;">Date of Birth</span>
                    <div class="row" style="justify-content: space-between;">
                        <select id="month" name="birth_month" class="form-control mb-3 cursor-pointer"
                            style="width: 38%;" required>
                            <option value="">MONTH</option>
                            @for ($i = 12; $i >= 01; $i--)
                            <option value="{{ $i }}" class="py-2" @if(date('m', strtotime($poster->birth_date)) == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        <select id="day" name="birth_day" class="form-control mb-3 cursor-pointer" style="width: 28%;"
                            required>
                            <option value="">DAY</option>
                            @for ($i = 31; $i >= 01; $i--)
                            <option value="{{ $i }}" @if(date('d', strtotime($poster->birth_date)) == $i) selected @endif>{{ $i }}</option>
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
                            <option value="{{ $i }}" @if(date('Y', strtotime($poster->birth_date)) == $i) selected @endif>{{ $i }}</option>
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
                            <option value="{{ $i }}"@if(date('m', strtotime($poster->departure_date)) == $i) selected @endif >{{ $i }}</option>
                            @endfor
                        </select>
                        <select id="departure_day" name="departure_day" class="form-control mb-3 cursor-pointer"
                            style="width: 28%;" required>
                            <option value="">DAY</option>
                            @for ($i = 31; $i >= 01; $i--)
                            <option value="{{ $i }}" @if(date('d', strtotime($poster->departure_date)) == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        <select id="departure_year" name="departure_year" class="form-control mb-3 cursor-pointer"
                            style="width: 28%;" required>
                            <option value="">YEAR</option>
                            {{ $last= date('Y')-120 }}
                            {{ $now = date('Y') }}
                            @for ($i = $now; $i >= $last; $i--)
                            <option class="" value="{{ $i }}" @if(date('Y', strtotime($poster->departure_date)) == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        <input type="date" name="departure_date" id="departure_date" style="display:none;">
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
                            style="cursor: pointer;" readonly />
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
                            style="cursor: pointer;" readonly />
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
                    <p class="fw-bold " style="color:gray;">Information about the client </p>
                    <div class="row" style="justify-content: space-between;">
                        <input type="text" id="Name" name="name" value="" placeholder="NAME"
                            class="bg-white col-6  form-control mb-3 rounded-3" maxlength="30" required
                            style="width: 48%;" />
                        <input type="text" id="Surname" name="surname" value="" placeholder="Surname"
                            class="bg-white col-6 form-control mb-3 rounded-3" maxlength="30" required
                            style="width: 48%;" />
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
                        <div class="col-4 col-md-4">
                            <select class="selectpicker bg-white   form-control mb-3 rounded-3 location" id="location"
                                onChange="getLoctions('state',$(this).val())" name="country_id"
                                aria-label="Default select example" data-live-search="true" required>
                                <option value=""> country</option>
                                <option value="{{$poster->country_id}}" selected >{{$poster->country->name}}</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-4 selectpicker-input px-2">
                            <div class="state">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3" id="location"
                                    onChange="getLoctions('city',$(this).val())" name="state_id"
                                    aria-label="Default select example" data-live-search="true" required>
                                    <option value="">state</option>
                                    <option value="{{$poster->state_id}}" selected>{{$poster->state->name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-md-4  selectpicker-input">
                            <div class="city">
                                <select class="selectpicker bg-white   form-control mb-3 rounded-3 " id="location"
                                    name="city_id" aria-label="Default select example" data-live-search="true" required>
                                    <option value="">city</option>
                                    <option value="{{$poster->city_id}}" selected>{{$poster->city->name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>
                    <button style="background-color: #456297;" id="submit-btn-pass"
                        class="submit_btn_  form-control btn rounded-3 mb-3 mt-2 text-white w-100 py-2" type="submit">
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
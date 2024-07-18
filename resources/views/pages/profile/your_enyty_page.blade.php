@extends('layouts.backend.default')
@section('title') Your Page - Enyty @endsection
@section('css')

<style>
.eternity-page-class {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
}

.icon-class {
    width: 70px;
}

.edit-icon {
    width: 30px;
}

.delete-icon {
    width: 20px;
}

@media only screen and (max-width:768px) {
    .edit-icon {
        /*width: 100px;*/
    }
}

.anchor-class,
.anchor-class:hover {
    color: inherit;
    text-decoration: none;
}

.pagination-class {
    gap: 1rem !important;
}

.page-row {
    justify-content: space-between;
    box-shadow: 0px 0px 26px -2px #297afe38;
    min-height: 167px;
    position: relative;
    max-width: 1150px;
}

.pagination-class {
    gap: 1rem !important;
}

@media screen and (max-width: 320px) {
    .pagination-class {
        gap: 0.25rem !important;
        --bs-pagination-padding-x: 0.59rem !important;
    }
}

@media screen and (max-width: 425px) and (min-width: 320px) {
    .pagination-class {
        gap: 0.3rem !important;
    }

    .font-size {
        font-size: 13px !important;
    }

    .profile-section {
        flex-direction: row !important;
    }
}

#selectpicker-input .selectpicker-input {
    margin: 0px 0px 0px 11px !important;
}

#selectpicker-input .col-4 {
    width: 32% !important;
}
</style>

@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.backend.sidebar') @endsection
@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section id="hero" class="d-flex flex-column justify-content-center " style="
                      
                    ">


            <span></span>


            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-10 col-md-10 m-sm-5 m-md-5 m-lg-5 col-lg-10 msg-success">
                <h2 class="text-capitalize  mb-5 page_titel" style="">Your Enyty Pages</h2>
                @if($user == null)
                <a class="d-flex " style="font-size: 21px; color: gray;"><span class="text-gray">YOU DON'T HAVE ANY
                        ENYTY PAGES, MAKE A DONATION TO CREATE ONE. </a>
                @endif
                @if($user != null)

                @foreach($user as $key=> $user)

                @php
                $birth_date = new DateTime($user->birth_date);
                $birth_date_month = $birth_date->format('m');
                $birth_date_day = $birth_date->format('d');
                $birth_date_year = $birth_date->format('Y');
                $departure_date = new DateTime($user->departure_date);
                $departure_date_month = $departure_date->format('m');
                $departure_date_day = $departure_date->format('d');
                $departure_date_year = $departure_date->format('Y');
                $additional_pictures = json_decode($user->additional_picture);

                @endphp


                <div class="hide-eternity-div-{{$key}}">
                    <div class="eternity-page-class mb-5 justify-content-center">
                        <a href="/commemoration/{{$user->slug}}" class="anchor-class w-100">

                            <div class="row bg-white p-3 rounded-3  me-3 page-row your_page_main align-items-center"
                                style="">
                                <div class="main_text col-12 col-lg-8 col-sm-8 col-md-8">
                                    <div class="event-titel mb-3">
                                        <h5 class="fw-bold user_name "
                                            style="color: #465A7B;font-size: 36px;font-family: 'Larsseit-Bold'; text-transform: uppercase;">
                                            {{$user->frist_name}} . {{$user->last_name}}</h5>
                                        <span> <strong> {{$user->birth_date}} to {{$user->departure_date}} </strong>
                                        </span> </br>
                                    </div>
                                    <p1>{{$user->frist_name}} . {{$user->last_name}} was born on {{$user->birth_date}}
                                        in {{$user->location}}
                                        @if($user->biography)
                                        {{ Illuminate\Support\Str::limit(strip_tags($user->biography), $limit = 200, $end = ' ...') }}
                                        @endif</p1><br>
                                    <p1 style="font-size:15px; color:gray;">By {{auth()->user()->first_name}}
                                        {{auth()->user()->last_name}}, {{$user->connection ?? ''}}, {{$user->country->name ?? ''}}, {{$user->state->name ?? ''}},
                                        {{$user->city->name ?? ''}}
                                        <span style="color:#456297; text-transform: capitalize; "></span>
                                    </p1>
                                </div>
                                <div class="user_img user_img_your img-fluid rounded-circle me-5 col-4"
                                    style=" height:150px; width:150px;right: 0; align-items: center;">
                                    <img class="user_img1" src='{{$user->profile_picture}}' id="pro_img"
                                        style="max-width: 150px;padding: 10px;" />
                                </div>
                            </div>
                        </a>
                        <div class="d-flex justify-content-around flex-column delete-edit-button">
                            <div class="padding_l">
                                <img class="img-fluid cursor-pointer icon-class delete-icon"
                                    onclick="daleteEternity('{{$user->frist_name}}',{{$user->id}})"
                                    src="{{asset('Assets/Vector_4.svg')}}" alt="fb icon" width="" height="30">
                            </div>
                            <div class="eternity-page-modal" data-toggle="modal"
                                data-target="#delete-eternity-page-modal"></div>
                            <div class="padding-r">
                                <img class="img-fluid cursor-pointer icon-class edit-icon"
                                    onclick="hideOtherDiv({{$key}},{{$total_users}})"
                                    src="{{asset('Assets/AdobeStock_6586528292.svg')}}" alt="fb icon" width=""
                                    height="30">
                            </div>

                        </div>
                    </div>

                    <!--Start :Edit eternity page-->
                    <!-- Content Wrapper -->
                    <div class="show-eternity-edit-page-{{$key}} d-none">
                        <!-- Main Content -->

                        <div>
                            <div class="d-flex justify-content-center">

                                <div class="rounded-4 p-4 p-lg-2 col-12 col-sm-8 col-md-8  col-lg-8 msg-success">
                                    <a class="back" href="{{asset('your-enyty-page')}}" style="display: inline;"><img
                                            src="https://enyty.com/Assets/solar_arrow-up-outline.svg" width="20"
                                            style="margin-bottom: 10px;">
                                    </a>
                                    <div class="alert alert-success" id="eternity_page_suc" role="alert"
                                        style="display:none;">
                                        Enyty Page Created Successfully
                                    </div>
                                    <div class="alert alert-danger" id="eternity_page_error" role="alert"
                                        style="display:none;">
                                        This is a danger alert—check it out!
                                    </div>
                                    <form action="{{Route('update_eternity_page')}}" class=""
                                        id="update_eternity_page{{$key}}" method="post">
                                        @csrf
                                        <input type="hidden" name="profile_id" value="{{$user->id}}" />
                                        <div class="row" style="justify-content: space-between;">
                                            <input type="text" id="frist_name" name="firstName"
                                                value="{{$user->frist_name}}" placeholder="FIRST NAME"
                                                class="bg-white col-6  form-control mb-3 rounded-3" required
                                                style="width: 48%;" />
                                            <input type="text" id="last_name" name="last_name"
                                                value="{{$user->last_name}}" placeholder="LAST NAME"
                                                class="bg-white col-6 form-control mb-3 rounded-3" required
                                                style="width: 48%;" />
                                        </div>
                                        <span class="fw-bold " style="color:gray;">Date of Birth</span>
                                        <div class="row" style="justify-content: space-between;">
                                            <select id="month" name="birth_month"
                                                class="form-control mb-3 cursor-pointer" required style="width: 38%;">
                                                <option value="">MONTH</option>
                                                @for ($i = 12; $i >= 01; $i--)

                                                <option value="{{ $i }}" @if($birth_date_month==$i) selected @endif
                                                    class="py-2">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select id="day" name="birth_day" class="form-control mb-3 cursor-pointer"
                                                required style="width: 28%;">
                                                <option value="">DAY</option>
                                                @for ($i = 31; $i >= 01; $i--)
                                                <option value="{{ $i }}" @if($birth_date_day==$i) selected @endif>
                                                    {{ $i }}</option>
                                                @endfor
                                            </select>

                                            <select id="birth_year" name="birth_year"
                                                class="form-control mb-3 cursor-pointer" required style="width: 28%;">
                                                {{ $last= date('Y')-120 }}
                                                {{ $now = date('Y') }}
                                                <option value="">
                                                    YEAR
                                                </option>
                                                @for ($i = $now; $i >= $last; $i--)
                                                <option value="{{ $i }}" @if($birth_date_year==$i) selected @endif>
                                                    {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <span class="fw-bold " style="color:gray;">Date of Departure</span>
                                        <div class="row" style="justify-content: space-between;">

                                            <select id="month" name="departure_month"
                                                class="form-control mb-3 cursor-pointer" required style="width: 38%;">
                                                <option value="">MONTH</option>
                                                @for ($i = 12; $i >= 01; $i--)
                                                <option value="{{ $i }}" @if($departure_date_month==$i) selected @endif>
                                                    {{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select id="day" name="departure_day"
                                                class="form-control mb-3 cursor-pointer" required style="width: 28%;">
                                                <option value="">DAY</option>
                                                @for ($i = 31; $i >= 01; $i--)
                                                <option value="{{ $i }}" @if($departure_date_day==$i) selected @endif>
                                                    {{ $i }}</option>
                                                @endfor
                                            </select>
                                            <select id="departure_year" name="departure_year"
                                                class="form-control mb-3 cursor-pointer" required style="width: 28%;">
                                                <option value="">YEAR</option>
                                                {{ $last= date('Y')-120 }}
                                                {{ $now = date('Y') }}
                                                @for ($i = $now; $i >= $last; $i--)
                                                <option value="{{ $i }}" @if($departure_date_year==$i) selected @endif>
                                                    {{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="row" style="justify-content: space-between;">
                                            <input type="text" id="symbolic" name="symbolic" value="{{$user->symbolic}}"
                                                placeholder="SYMBOLIC PHRASE (OPTIONAL)"
                                                class="bg-white   form-control mb-3 rounded-3" maxlength="150"
                                                required />
                                        </div>
                                        <div class="row" style="justify-content: space-between;">
                                            <textarea class="bg-white   form-control mb-3 rounded-3"
                                                placeholder="BIOGRAPHY" id="biography" name="biography" rows="4"
                                                cols="50" value="{{$user->biography}}" minlength="80" maxlength="1500"
                                                required>{{$user->biography}}</textarea>
                                        </div>
                                        <div class="row profile_picture_23" style="justify-content: space-between;">
                                            <input type="text" id="profile_picture1{{$key}}" name="profile_picture1"
                                                value="" placeholder="Change Image"
                                                class="bg-white   form-control mb-3 rounded-3 profile_picture1"
                                                onclick="profile_p({{$key}})" style="cursor: pointer;" />
                                            <div class="alert alert-danger profile_picture_error" role="alert"
                                                style="display:none;">
                                                Image limit exceeded!
                                            </div>

                                            <div class="input_img" style="cursor: pointer;">
                                                <img src='https://enyty.com/Assets/Vector.svg' id="pro_img"
                                                    height="25" />
                                            </div>
                                            <input type="file" id="profile_picture2{{$key}}" name="profile_picture2"
                                                placeholder="PROFILE PICTURE"
                                                class="bg-white   form-control mb-3 rounded-3 profile_picture2"
                                                style="display:none;" />
                                            <input type="hidden" id="profile_picture3{{$key}}" name="profile_picture3"
                                                placeholder="PROFILE PICTURE"
                                                class="bg-white   form-control mb-3 rounded-3"
                                                value="{{$user->profile_picture}}" style="display:none;" />
                                        </div>
                                        <div
                                            class="preview-Pimages-zone d-flex justify-content-center mb-2 profile_item-img-output">
                                            <img src='{{asset($user->profile_picture)}}'
                                                id="profile_item-img-output{{$key}}" height="auto"
                                                style="    max-width: 50%;" />
                                        </div>
                                        <div class="row error12" style="justify-content: space-between;">
                                            <input type="text" id="additional_picture1{{$key}}"
                                                onclick="additional_p({{$key}})" name="additional_picture1"
                                                value="@if($additional_pictures) Add other picture @endif "
                                                onkeydown="return false" placeholder="ADDITIONAL PICTURES"
                                                class="bg-white   form-control mb-3 rounded-3 additional_picture1"
                                                style="cursor: pointer;" />
                                            <div class="input_img preview-image preview-show-1"
                                                style="cursor: pointer;">
                                                <img src='https://enyty.com/Assets/Vector.svg' height="25" />
                                            </div>

                                            <div class="alert alert-danger additional_picture_error" id="" role="alert"
                                                style="display:none;">
                                                Image limit exceeded!
                                            </div>
                                            <div
                                                class="preview-images-zone preview-images-zone{{$key}} justify-content-center ">
                                                @if($additional_pictures)
                                                @foreach($additional_pictures as $key1=> $additional_picture)
                                                <div
                                                    class="additional-preview-image{{$key1}} preview-image preview-show-">
                                                    <input type="hidden" name="additional_picture[{{$key1}}]"
                                                        value="{{$additional_picture}}">
                                                    <div class="image-zone ">
                                                        <img id="pro-img-{{$key1}}" src="{{$additional_picture}}"
                                                            style="max-height: 71px;">
                                                    </div>
                                                    <div class="image-cancel d-flex"
                                                        onclick="cancel_img({{$key1}},{{$key}})" data-no="{{$key}}">
                                                        <img src="./Assets/Group22.svg" height="20">
                                                    </div>
                                                    <div class="tools-edit-image"></div>
                                                </div>

                                                @endforeach
                                                @endif
                                            </div>
                                            <input type="file" id="additional_picture2{{$key}}"
                                                name="additional_picture2[]" placeholder="PROFILE PICTURE"
                                                class="bg-white   form-control mb-3 rounded-3 " style="display:none;" />
                                        </div>
                                        <div class="row" style="justify-content: space-between;">
                                            <select class="selectpicker bg-white   form-control mb-3 rounded-3"
                                                name="connection" id="connection" aria-label="Default select example"
                                                data-live-search="true" required>
                                                <option value="">YOUR CONNECTION TO THE DEPARTED</option>
                                                <option value="Daddy" @if($user->connection=='Daddy') selected
                                                    @endif>Daddy</option>
                                                <option value="Mother" @if($user->connection=='Mother') selected
                                                    @endif>Mother</option>
                                                <option value="Son" @if($user->connection=='Son') selected @endif>Son
                                                </option>
                                                <option value="Daughter" @if($user->connection=='Daughter') selected
                                                    @endif>Daughter</option>
                                                <option value="Brother" @if($user->connection=='Brother') selected
                                                    @endif>Brother</option>
                                                <option value="Sister" @if($user->connection=='Sister') selected
                                                    @endif>Sister</option>
                                                <option value="Uncle" @if($user->connection=='Uncle') selected
                                                    @endif>Uncle</option>
                                                <option value="Cousin" @if($user->connection=='Cousin') selected
                                                    @endif>Cousin</option>
                                                <option value="Friend" @if($user->connection=='Friend') selected
                                                    @endif>Friend</option>
                                                <option value="Grandparents" @if($user->connection=='Grandparents')
                                                    selected @endif>Grandparents</option>
                                                <option value="great-grandparents" @if($user->
                                                    connection=='great-grandparents') selected @endif>Great-grandparents
                                                </option>
                                            </select>
                                        </div>


                                        <div class="row " id="selectpicker-input">
                                            <div class="col-4 col-md-4 ">
                                                <select
                                                    class="selectpicker bg-white   form-control mb-3 rounded-3 location"
                                                    id="location" onChange="getLoctions('province_{{$user->id}}',$(this).val())"
                                                    name="country_id" aria-label="Default select example"
                                                    data-live-search="true" required>
                                                    <option value="">COUNTRY</option>
                                                    @foreach($countries as $countrie)
                                                    <option value="{{$countrie->id}}" @if($user->country_id==$countrie->id)
                                                        selected @endif>{{$countrie->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4 col-md-4 selectpicker-input ">
                                                <div class="province_{{$user->id}}">
                                                    <select class="selectpicker bg-white   form-control mb-3 rounded-3"
                                                        id="province{{$user->id}}'" onChange="getLoctions('city_{{$user->id}}',$(this).val())"
                                                        name="province_id" aria-label="Default select example"
                                                        data-live-search="true" required>
                                                        <option value="">Province</option>
                                                        @if($user->state_id)
                                                        @foreach($user->country->states as $state)
                                                        <option value="{{$state->id}}" @if($user->state_id==$state->id)
                                                            selected @endif >{{$state->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4 col-md-4  selectpicker-input">
                                                <div class="city_{{$user->id}}">
                                                    <select class="selectpicker bg-white   form-control mb-3 rounded-3 "
                                                        id="city{{$user->id}}" name="city_id" aria-label="Default select example"
                                                        data-live-search="true" required>
                                                        <option value="">Cities</option>
                                                        @if($user->city_id)
                                                     @foreach($user->state->cities as $city)
                                                        <option value="{{$city->id}}" @if($user->city_id==$city->id)
                                                            selected @endif >{{$city->name}}</option>
                                                        @endforeach 
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3"><span class="text-danger" id="email-exists"></span></div>
                                        <button style="background-color: #456297;" id="submit-btn-pass"
                                            class="submit_btn_  form-control btn rounded-3 mb-3 mt-2 text-white w-100 py-2"
                                            type="submit">
                                            confirm
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <!-- End Hero -->
                        </div>
                    </div>
                </div>
                <!-- End of Content Wrapper -->
                <!--End : Edit eternity page-->
                @endforeach
                @endif

                <!--pagination start -->
                <div class="d-flex justify-content-center mt-3 pagination-start">
                    <nav aria-label="Page navigation example">
                        @if($pagination >1)
                        <ul class="pagination pagination-class">
                            @php
                            $Previousurl = '/your-eternity-page?page='.$currentPage-1;
                            $Previousdisabled = 'null';
                            $i = 1;
                            $lastloop = $pagination;
                            $d_none ='';
                            @endphp
                            @if($pagination > 3)
                            @php
                            $lastloop =3;
                            @endphp
                            @endif
                            @if($currentPage > 3)
                            @php
                            $loopcondition = $currentPage - $lastloop;
                            $lastloop = $lastloop+$loopcondition;
                            $i = $i+$loopcondition;
                            @endphp
                            @endif
                            @if($currentPage == 1)
                            @php
                            $Previousdisabled = 'disabled';
                            @endphp
                            @endif
                            <li class="page-item cursor-pointer ">
                                <a class="{{$Previousdisabled}}" href="{{$Previousurl}}">
                                    <span class="page-link rounded-2 {{$Previousdisabled}}" style="background: #456297;"
                                        id="Previous" data-id="{{$currentPage}}" aria-label="Previous">
                                        <img src="/Assets/pagination-arrow(1).svg" width="15" alt="">
                                    </span>
                                </a>
                            </li>
                            <div class="appendPrevious gap-3 d-flex" style="    flex-direction: row-reverse;"></div>
                            @for($i; $i <= $lastloop; $i++) @php $url='/your-eternity-page?page=' .$i; @endphp <li
                                class="page-item cursor-pointer pagelist">
                                <a href="{{$url}}">
                                    <span
                                        class="page-link com-pagination-shadow border-0 rounded-2 txt-light {{$currentPage==$i ? ' active' : ''}}"
                                        id="pagination{{$i}}" onclick="pagination({{$i}},this.id,{{$pagination}})">
                                        {{$i}}
                                    </span>
                                </a>
                                </li>
                                @endfor

                                <div class="appendPage gap-3 d-flex"></div>

                                @if($currentPage == $pagination)
                                @php
                                $d_none ='d-none';
                                @endphp
                                @endif

                                @if($pagination > 3)
                                <li class="page-item cursor-pointer  lastdot {{$d_none}}">
                                    <span class="page-link com-pagination-shadow border-0 rounded-2 txt-light"
                                        id="lastdot">
                                        ...
                                    </span>
                                </li>
                                @endif
                                <li class="page-item cursor-pointer">
                                    @php
                                    $url = '/your-eternity-page?page='.$currentPage+1;
                                    $disabled = 'null';
                                    @endphp
                                    @if($currentPage == $pagination)
                                    @php
                                    $disabled = 'disabled';
                                    @endphp
                                    @endif
                                    <a class="{{$disabled}}" href="{{$url}}">
                                        <span class="page-link rounded-2 {{$disabled}}" style="background: #456297;"
                                            id="next" aria-label="Next">
                                            <img src="{{asset('Assets/pagination-arrow.svg')}}" width="15" alt="">
                                        </span>
                                    </a>
                                </li>
                        </ul>
                        @endif
                    </nav>

                </div>
                <!--pagination end -->
            </div>
        </section>



        <!-- End Hero -->
    </div>
</div>
</div>
<!-- End of Content Wrapper -->
<!--Start: delete-eternity-page-modal-->
<div id="deleteModal">
    <x-delete-eternity-page-modal message="Are you sure you want to delete[Person's Name] profile?" id="1" />
</div>

<!--End: delete-eternity-page-modal-->

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


@endsection
@section('scripts')
<script src="{{asset('js/search_countries.js')}}"></script>
<script>
function daleteEternity(name, id) {
    $('#id').val(id);
    $masse = 'Are you sure you want to delete ' + name + ' profile?'
    $('.page-deleted-msg').html($masse);
    $('.eternity-page-modal').click();

}

function hideOtherDiv(pageDivId, totalPage) {
    $('.pagination-start').addClass('d-none');
    $('.delete-icon').hide();
    $('.delete-edit-button').removeClass('justify-content-around');
    $('.delete-edit-button').addClass('justify-content-center');
    console.log('hideOtherDiv function called', pageDivId, totalPage);
    $('.show-eternity-edit-page-' + pageDivId).removeClass('d-none');
    for (let i = 0; i <= totalPage; i++) {
        if (i != pageDivId) {
            $('.hide-eternity-div-' + i).hide();
        }
    }

}

var profile_id = 0;

function profile_p(id) {
    profile_id = id;
    $('#profile_picture2' + id).click();
    $('#profile_picture2' + id).change(function(e) {
        var myformData = this.files[0];
        var fileName = myformData.name

        var fileExtension = fileName.split('.').pop().toLowerCase();
        if (fileExtension === 'png' || fileExtension === 'jpg' || fileExtension === 'heic' || fileExtension ===
            'jpeg') {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.upload-demo').addClass('ready');
                    $('#cropImageprofile').modal('show');
                    rawImg = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            }
        } else {
            $('.profile_picture_error').html(`` + fileExtension + ` format isn't supported`);
            $('.profile_picture_error').show();
            setTimeout(function() {
                $('.profile_picture_error').hide();
            }, 4000)
        }

    });
}
var additional_id = 0;

function additional_p(id) {
    additional_id = id;
    var additional_picturelength = $('.preview-images-zone' + id + ' .preview-image').length;
    if (additional_picturelength >= 3) {
        $("#additional_picture1").val('Image limit exceeded!');
    }
    if (additional_picturelength < 4) {
        $('#additional_picture2' + id).click();
        test(id);
    } else {
        $('.additional_picture_error').html('Image limit exceeded!');
        $(".additional_picture_error").show();
        setTimeout(function() {
            $('.additional_picture_error').hide();
        }, 4000)
    }

}

function test(id) {
    console.log('test1');
    $('#additional_picture2' + id).off('change').on('change', function(e) {
        console.log('#additional_picture2' + id);
        console.log('test2');
        var myformData = this.files[0];
        var fileName = myformData.name;
        var fileExtension = fileName.split('.').pop().toLowerCase();
        if (fileExtension === 'png' || fileExtension === 'jpg' || fileExtension === 'heic' || fileExtension ===
            'jpeg') {
            readImage();
        } else {
            $('.additional_picture_error').html(fileExtension + ' format isn\'t supported');
            $('.additional_picture_error').show();
            setTimeout(function() {
                $('.additional_picture_error').hide();
            }, 4000);
        }
    });
}




var img = new Image;
var c = document.createElement("canvas");
var ctx = c.getContext("2d");

img.onload = function() {
    c.width = this.naturalWidth; // update canvas size to match image
    c.height = this.naturalHeight;
    ctx.drawImage(this, 0, 0); // draw in image
    c.toBlob(function(blob) { // get content as JPEG blob
        // here the image is a blob
    }, "image/jpeg", 0.75);
};
img.crossOrigin = ""; // if from different origin
img.src = "url-to-image";




function cancel_img(data, id) {
    var additional_picturelength = $('.preview-images-zone' + id + ' .preview-image').length;

    if (data == 4) {
        $('.additional_picture1').val('');
    }
    if (additional_picturelength == 1) {
        $('.additional_picture_error').html('minimul one picture is requerd');
        $('.additional_picture_error').show();
        setTimeout(function() {
            $('.additional_picture_error').hide();
        }, 4000);
    } else {
        $(".additional-preview-image" + data).remove();
    }
}



var num = 4;

function readImage() {
    var additional_picturelength = $('.preview-images-zone' + additional_id + ' .preview-image').length;

    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");
        var maximglength = additional_picturelength + files.length;
        console.log('files.length');
        console.log(files.length);
        if (maximglength < 5) {
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;

                var fileName = file.name;
                var fileExtension = fileName.split('.').pop().toLowerCase();
                var supportedFormats = ['png', 'jpg', 'jpeg', 'heic'];
                if (supportedFormats.includes(fileExtension)) {
                    var picReader = new FileReader();

                    picReader.addEventListener('load', function(event) {
                        var picFile = event.target;
                        var html = '<div class=" preview-image preview-show- additional-preview-image' + num +
                            '">' + '<input type="hidden" name="additional_picture[' + num + ']" value = "' +
                            picFile.result + '">' +
                            '<div class="image-zone "><img id="pro-img-' + num + '" src="' + picFile.result +
                            '" style="    max-height: 71px;"></div>' +
                            '<div class="image-cancel d-flex" onclick="cancel_img(' + num + ',' +
                            additional_id + ')" data-no="' + num +
                            '"><img src ="./Assets/Group22.svg"  height="20"></div>' +
                            '<div class="tools-edit-image"></div>' +
                            '</div>';

                        output.append(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                } else {
                    // Display error message for unsupported format
                    var errorMessage = fileExtension + ' format isn\'t supported';
                    $('.additional_picture_error').html(errorMessage).show();
                    setTimeout(function() {
                        $('.additional_picture_error').hide();
                    }, 4000);
                }


            }
        } else {
            $('.additional_picture_error').html('The maximum number of images allowed for upload is four.').show();
            setTimeout(function() {
                $('.additional_picture_error').hide();
            }, 4000);

        }


    } else {
        console.log('Browser not support');
    }
}

$('.ReplaceProfilePPhoto').on('click', function() {
    $('#cropImageprofile').modal('hide');
    profile_p(profile_id);
    // $('.profile_picture2').trigger('click');
})
// Start upload preview image
$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
var $uploadCrop,
    tempFilename,
    rawImg,
    imageId;

$(document).ready(function() {
    var windowWidth1 = $(window).width();
    var mobileBreakpoint = 567;
    if (windowWidth1 < mobileBreakpoint) {
        $uploadCrop1 = $('#upload-demoprofile').croppie({
            viewport: {
                width: 150,
                height: 150,
            },
            enforceBoundary: false,
            enableExif: true
        });
    } else {
        $uploadCrop1 = $('#upload-demoprofile').croppie({
            viewport: {
                width: 220,
                height: 200,
            },
            enforceBoundary: false,
            enableExif: true
        });
    }
});


$('#cropImageprofile').on('shown.bs.modal', function() {
    // alert('Shown pop');
    var new_url = rawImg;
    $uploadCrop1.croppie('bind', {
        url: rawImg
    }).then(function() {
        setSliderLimits(new_url);
        // $('.cr-slider').attr({'min':0.001, 'max':1.4000,'aria-valuenow':0.400});
        //$('.cr-slider').attr({'min':0.080, 'max':0.7000,'aria-valuenow':0.400});

    });
});


$('#crop_profile_ImageBtn').on('click', function(ev) {
    $uploadCrop1.croppie('result', {

        type: 'base64',
        format: 'jpeg',
        size: 'original',
        backgroundColor: "white",
        quality: 1,
        // size: {width: 220, height: 220}
    }).then(function(resp1) {
        console.log(resp1);
        $('#profile_picture3' + profile_id).val(resp1);
        $('#profile_item-img-output' + profile_id).attr('src', resp1);
        $('#cropImageprofile').modal('hide');
    });
});






//search data
$(document).ready(function() {
    var data = ['Daddy', 'Mother', 'Son', 'Daughter', 'Brother', 'Sister', 'Uncle', 'Cousin', 'Friend'];

    $('.connection').on('keyup', function() {
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
        $('.connectionresults').show();
        var connectionresultsContainer = $('.connectionresults');
        connectionresultsContainer.empty();
        for (var i = 0; i < connectionresults.length; i++) {
            var listItem = $('<li class="cursor-pointer p-2 h5">').text(connectionresults[i]);
            listItem.on('click', function() {
                $('.connection').val($(this).text());
                $('.connectionresults').hide();

            });

            connectionresultsContainer.append(listItem);
        }
    }
});
//end search data







// End upload preview image
// Function to set slider limits based on image size
function setSliderLimits(imageUrl) {

    var image = new Image();
    image.onload = function() {
        // Get the dimensions of the loaded image
        var imageWidth = this.width;
        var imageHeight = this.height;

        // Calculate aspect ratio
        var aspectRatio = imageWidth / imageHeight;

        // Define the minimum and maximum scale factors based on aspect ratio
        var minScale = 0.01; // Set your desired minimum scale
        var maxScale = 1.3; // Set your desired maximum scale

        // Adjust the maximum scale based on aspect ratio
        if (aspectRatio > 1.2) {
            maxScale /= aspectRatio;
            minScale = 0.1;
        } else {
            minScale = 0.04;
            maxScale *= aspectRatio;
        }

        // Set the attributes for the Croppie slider
        console.log(aspectRatio);
        console.log(minScale);
        console.log(maxScale);
        console.log('imageUrl');
        $('.cr-slider').attr({
            'min': minScale,
            'max': maxScale,
            'aria-valuenow': 0.4 // You can set this value as desired
        });
    };

    // Set the source of the image
    image.src = imageUrl;
}

// Example usage
// Replace with the path to your image


// update_eternity_page
// $(document).ready(function () {
//     $('#update_eternity_page').submit(function (e) {
//         e.preventDefault();

//         // Serialize form data
//         var formData = $(this).serialize();

//         // Make an Ajax POST request
//         $.ajax({
//             type: 'POST',
//             url: '/submit-form', // Replace with your actual endpoint
//             data: formData,
//             success: function (response) {
//                 // Handle the success response
//                 console.log(response);
//             },
//             error: function (error) {
//                 // Handle errors
//                 console.error('Error:', error);
//             }
//         });
//     });
// });
</script>
@endsection
@if ($user->birth_date ?? '' && $user->departure_date ?? '')
@php
$birthDate = new DateTime($user->birth_date);
$departureDate = new DateTime($user->departure_date);
$interval = $birthDate->diff($departureDate);
$age = $interval->y;
@endphp
@else
@php
$age = 'x';
@endphp
@endif


@if(isset($currentDay))
<div class="ms-5 ps-2">
    <img class="user_img12 " src="Assets/new-icons/Ellipse19.svg" height="17" id="" style="margin-left: -8px;">
    {{ $currentDay }}
    <div class="line2"></div>
</div>
@endif
<div class="d-flex flex-wrap flex-md-nowrap gap-5 @if(!isset($currentDay)) mb-5 @endif" id="profile-section-images">
    <div class="w-100 mx-auto">
        <div class="border border-dark border-2 p-3">
            <div class="border border-dark border-2 p-3 profile-section-images">
                <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3">
                    <div class="my-auto col-12 col-sm-3 col-lg-4 col-md-4">
                        <h5 class="text-uppercase text-center text-secondary text-md-end font-bold font-size">
                            <span class="name">{{$user->frist_name ?? 'Name'}} </span> &nbsp <span
                                class="surname">{{$user->last_name ?? 'surname'}}</span>
                        </h5>
                        <h5 class="text-uppercase text-center text-md-end font-size">
                            <span class="text-secondary font-size ">age &nbsp <span
                                    class="full_age">{{$age}}</span></span>
                        </h5>
                    </div>
                    <div class="col-12 col-sm-3 col-lg-4 col-md-4 profile-image-post ">
                        <div class="p-sm-3   w-75 mx-auto img_border_in my-3">
                            <img style="padding: 10px;height: auto;"
                                class="img-fluid justify-content-center poster_img"
                                src="/{{$user->company_logo ?? 'Assets/AdobeStock_6410838122_1.svg'}}" alt="" height=""
                                width="250">
                        </div>
                    </div>

                    <div class="my-auto col-12 col-sm-3 col-lg-4 col-md-4">
                        <h5
                            class="text-uppercase text-center  text-secondary  text-md-start font-bold me-0  font-size birth_date">
                            {{$user->birth_date ?? 'Birth Date'}}
                        </h5>
                        <h5 class="text-uppercase text-center text-md-start ">
                            <span
                                class="font-size text-secondary departure_date">{{$user->departure_date ?? 'Departure Date'}}</span>
                        </h5>
                    </div>
                    <div class="company-logo position-absolute d-flex flex-row-reverse">
                        <img class="img-fluid rounded-5" src="{{$user->user->avatar ??  '/Assets/Group 51.png'}}" alt=""
                            height="100">
                    </div>
                </div>

                <div class="content-section pt-2 pb-2">
                    <h5
                        class="txt-light  text-center h5 text-secondary p-0 text-capitalize d-flex justify-content-center funeral_celebration_section">
                        <b class="font-size text-dark">Funeral celebration &nbsp </b>
                        <p class="content-test funeral_celebration">
                            {{$user->funeral_celebration ?? '123 Main Street, Anytown, USA,'}}
                            12345</p>
                    </h5>
                    <h5
                        class="txt-light  text-center h5 p-0 text-capitalize text-secondary d-flex justify-content-center funeral_celebration_section">
                        <b class="font-size text-dark">Location of body &nbsp</b>
                        <p class="content-test location_body">
                            {{$user->location_body ?? '456 Elm Avenue, Anytown, USA, 12345,'}}</p>
                    </h5>
                </div>
                <div class="content-section pt-2 pb-2">
                    <h5 class="envet-heading text-center text-dark h5 p-0 text-capitalize">
                        This was announced by <span class="announcedBy"> {{$user->announces_passing ?? 'wife Elizabeth and sons Chris
                            and Alex'}} . </span></h5>

                </div>
                <div class="d-flex justify-content-between date_loc text-center">
                    <p class="m-0"> @if($user->created_at ?? ''){{ $user->created_at->format('Y-m-d') ?? '' }} @endif
                    </p>
                    <p> {{$user->city->name ?? ''}} {{$user->state->name ?? ''}} {{$user->country->name ?? ''}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@if(isset($currentDay))
<div class="ms-5 ps-2">
    <div class="line2"></div>
</div>
@endif
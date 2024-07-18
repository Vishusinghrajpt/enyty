@push('css')
<style>
.your_page_main {

    box-shadow: 1px 10px 20px 0rem rgba(13, 110, 253, .25);

}
.biography{
    height: 50px;
    display: block;
    overflow: hidden;
}
</style>
@endpush

<div class="test">
    <div class="_userPoster d-flex justify-content-center w-100">
        <div class="hide-eternity-div">
            <div class="eternity-page-class mb-5 justify-content-center d-flex">
                <a href="https://enyty.com/commemoration/{{$user->slug ?? ''}}" class="anchor-class w-100">
                    <div class="row bg-white p-3 rounded-3  me-3 page-row your_page_main d-flex align-items-center" style="">
                        <div class="main_text col-12 col-lg-9 col-sm-8 col-md-9">
                            <div class="event-titel mb-3">
                                <h5 class="fw-bold user_name "
                                    style="color: #465A7B;font-size: 36px;font-family: 'Larsseit-Bold'; text-transform: uppercase;">
                                    {{$user->frist_name ?? ''}} {{$user->last_name ?? ''}} </h5>
                                <span> <strong> {{$user->birth_date ?? ''}} to {{$user->departure_date ?? ''}} </strong>
                                </span> </br>
                            </div>
                            <p1 class="biography">
                                @if($user->biography ?? '')
                                {{ Illuminate\Support\Str::limit(strip_tags($user->biography), $limit = 300, $end = ' ...') }}
                                @endif</p1><br>
                            <p1 style="font-size:15px; color:gray;">By {{$user->name ?? ''}}
                                {{$user->surname ?? ''}},{{$user->city->name ?? ''}} {{$user->state->name ?? ''}},
                                ,{{$user->country->name ?? ''}}
                                <span style="color:#456297; text-transform: capitalize; "></span>
                            </p1>
                        </div>
                        <div class="  img-fluid rounded-circle col-3">
                            <img class="user_img1" src='{{asset($user->profile_picture ?? "")}}' id="pro_img"
                                style="max-width: 150px;padding: 10px;" />
                        </div>
                    </div>
                </a>
                <div class="d-flex justify-content-around flex-column delete-edit-button">
                    @if($user->QrPath ??'')
                    <img class="mt-3 rounded-4" src="{{ asset('qrcodes/'.$user->QrPath.'.png') }}" height="130"
                        alt="QR Code for {{ $user->name?? '' }}">
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex flex-wrap flex-md-nowrap gap-5 @if(!isset($currentDay)) mb-5 @endif" id="profile-section-images">
        <div class="w-100 mx-auto">
            <div class="border border-dark border-2 p-3">
                <div class="border border-dark border-2 p-3 profile-section-images">
                    <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-3 profile-section pt-3">
                        <div class="my-auto col-4 w-100">
                            <h5 class="text-uppercase text-center text-secondary text-md-end font-bold font-size">
                                <span class="name">{{$poster->frist_name ?? 'Name'}} </span> &nbsp <span
                                    class="surname">{{$poster->last_name ?? 'surname'}}</span>
                            </h5>
                            <h5 class="text-uppercase text-center text-md-end font-size">
                                <span class="text-secondary font-size ">age &nbsp <span
                                        class="full_age">{{$age ?? ''}}</span></span>
                            </h5>
                        </div>
                        <div class="col-4 profile-image-post ">
                            <div class="p-sm-3   w-75 mx-auto img_border_in my-3">
                                <img style="padding: 10px;height: 131px;"
                                    class="img-fluid justify-content-center poster_img"
                                    src="/{{$poster->company_logo ?? 'Assets/AdobeStock_6410838122_1.svg'}}" alt=""
                                    height="" width="250">
                            </div>
                        </div>

                        <div class="my-auto col-4 w-100">
                            <h5
                                class="text-uppercase text-center  text-secondary  text-md-start font-bold me-0  font-size birth_date">
                                {{$poster->birth_date ?? 'Birth Date'}}
                            </h5>
                            <h5 class="text-uppercase text-center text-md-start ">
                                <span
                                    class="font-size text-secondary departure_date">{{$poster->departure_date ?? 'Departure Date'}}</span>
                            </h5>
                        </div>
                        <div class="company-logo position-absolute d-flex flex-row-reverse">
                            <img class="img-fluid rounded-5" src="{{$poster->user->avatar ??  '/Assets/Group 51.png'}}"
                                alt="" height="100">
                        </div>
                    </div>

                    <div class="content-section pt-2 pb-2">
                        <h5
                            class="txt-light  text-center h5 text-secondary p-0 text-capitalize d-flex justify-content-center funeral_celebration_section">
                            <b class="font-size text-dark">Funeral celebration &nbsp </b>
                            <p class="content-test funeral_celebration">
                                {{$poster->funeral_celebration ?? '123 Main Street, Anytown, USA,'}}
                                12345</p>
                        </h5>
                        <h5
                            class="txt-light  text-center h5 p-0 text-capitalize text-secondary d-flex justify-content-center funeral_celebration_section">
                            <b class="font-size text-dark">Location of body &nbsp</b>
                            <p class="content-test location_body">
                                {{$poster->location_body ?? '456 Elm Avenue, Anytown, USA, 12345,'}}</p>
                        </h5>
                    </div>
                    <div class="content-section pt-2 pb-2">
                    <h5 class="envet-heading text-center text-dark h5 p-0 text-capitalize">
                        This was announced by <span class="announcedBy"> {{$poster->announces_passing ?? 'wife Elizabeth and sons Chris
                            and Alex'}} . </span></h5>

                    </div>
                    <div class="d-flex justify-content-between date_loc text-center">
                        <p class="m-0"> @if($poster->created_at ?? ''){{ $poster->created_at->format('Y-m-d') ?? '' }}
                            @endif</p>
                        <p> {{$poster->city->name ?? ''}} {{$poster->state->name ?? ''}}
                            {{$poster->country->name ?? ''}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
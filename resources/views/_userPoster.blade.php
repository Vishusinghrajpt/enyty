@push('css')
<style>
.your_page_main {

    box-shadow: 1px 10px 20px 0rem rgba(13, 110, 253, .25);

}
</style>
@endpush

<div class="hide-eternity-div">
    <div class="eternity-page-class mb-5 justify-content-center d-flex">
        <a href="https://enyty.com/commemoration/{{$user->slug ?? ''}}" class="anchor-class w-100">
            <div class="row bg-white p-3 rounded-3  me-3 page-row your_page_main" style="">
                <div class="main_text col-12 col-lg-9 col-sm-8 col-md-9">
                    <div class="event-titel mb-3">
                        <h5 class="fw-bold user_name "
                            style="color: #465A7B;font-size: 36px;font-family: 'Larsseit-Bold'; text-transform: uppercase;">
                            {{$user->frist_name ?? ''}} {{$user->last_name ?? ''}} </h5>
                        <span> <strong> {{$user->birth_date ?? ''}} to {{$user->departure_date ?? ''}} </strong>
                        </span> </br>
                    </div>
                    <p1>
                        @if($user->biography ?? '')
                        {{ Illuminate\Support\Str::limit(strip_tags($user->biography), $limit = 300, $end = ' ...') }}
                        @endif</p1><br>
                    <p1 style="font-size:15px; color:gray;">By {{$user->name ?? ''}} {{$user->surname ?? ''}},{{$user->city->name ?? ''}} {{$user->state->name ?? ''}},
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
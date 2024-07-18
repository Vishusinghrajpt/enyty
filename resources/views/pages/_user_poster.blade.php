@if(isset($cruntDay))
<div class="ms-5 ps-2 ">
    <img class="user_img12 " src="Assets/new-icons/Ellipse19.svg" height="17" id="" style="margin-left: -8px;">
    {{ $cruntDay }}
    <div class="line2 "></div>
</div>
@endif
<a href="commemoration/{{$user->slug}}" class="anchor-class">
    <div class="row bg-white p-3 rounded-4 page-row your_page_main align-items-center" style="">
        <div class="main_text col-12 col-lg-8 col-sm-8 col-md-8">
            <div class="event-titel mb-3">
                <h5 class="fw-bold user_name "
                    style="color: #465A7B;font-size: 36px;font-family: 'Larsseit-Bold'; text-transform: uppercase;">
                    {{$user->frist_name}} {{$user->last_name}}</h5>
                <span> 
                    <strong> {{date('j-Y', strtotime($user->birth_date))}} to {{date('j-Y', strtotime($user->departure_date))}} </strong>
                </span> 
                <br>
            </div>
            <p1 class="mb-2 d-block w-100" style="min-height: 61px !important;">
                {{ Illuminate\Support\Str::limit(strip_tags($user->biography), $limit = 200, $end = ' ...') }}
                
            </p1>
            <br>
            <br>
            <p1 style="font-size:15px; color:gray;">
                <span style="color:#456297; text-transform: capitalize; ">
                    By {{$user->name ?? '' }} {{$user->surname ?? '' }}, {{$user->connection ?? ''}},
                    {{$user->country->name ?? ''}}, {{$user->state->name ?? ''}},{{$user->city->name ?? ''}}
                </span>
            </p1>
        </div>
        <div class="user_img user_img_your img-fluid rounded-circle me-5 col-4 position-absolute d-flex align-items-center"
            style=" height:150px; width:150px;right: 0;">
            <img class="user_img1" src="avatar/profile_picture/1719897701.jpg" id="pro_img"
                style="max-width:175px;padding: 10px;">
        </div>
    </div>
</a>

@if(isset($cruntDay))
<div class="ms-5 ps-2">
    <div class="line2"></div>
</div>
@endif
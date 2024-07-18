<div class="col-12 col-md-12 col-lg-12 mb-5 pe-2" id="{{$tribute->user_id}}">
    <div class="rounded-4 p-4 d-flex flex-column align-items-center gap-3"
        style="background: #F8FBFD; box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.09);min-height: 165px; ">
        <img style="margin-top: -4rem;height:80px;
             @if($donationHistories)
            background: linear-gradient(to bottom, #feda75 20%, #de3c61 50%, #5458d3 100%, #4f5bd5 100%);
            @endif
             padding: 3px;" class="img-fluid mb-3 rounded-circle" width="80" src="{{$tribute->user->avatar}}"
            alt="user image">
        @auth
        @if($tribute->user_id == Auth::user()->id)
        <div class="w-100 d-flex justify-content-between mb-3" style="    margin-top: -61px;">
            <img class="img-fluid cursor-pointer" onclick="editTribut('{{$tribute->comment}}')"
                src="{{asset('Assets/edit-icon.svg')}}" alt="fb icon" width="20" height="">
            <img class="img-fluid cursor-pointer" data-toggle="modal" data-target="#delete-tribut-modal"
                src="{{asset('Assets/Group22.svg')}}" alt="fb icon" width="20" height="">
        </div>
        @endif
        @endauth
        <p class="txt-light text-center mx-1 mb-0">
            {{$tribute->comment}}
        </p>
        <h6 class="txt-light text-center font-bold mb-2">{{$tribute->user->name}}</h6>
    </div>
</div>
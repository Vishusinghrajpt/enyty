<a class="nav-link text-capitalize hero-btn px-4 d-flex align-items-center cursor-pointer" @auth
    @if(auth()->user()->role_id==2)
    href="{{config('services.stripe.userDonation')}}"
    @else
    data-toggle="modal" data-target="#donateModal"
    @endif
    @else
    data-toggle="modal" data-target="#AuthantictionModal"
    @endauth
    >
    <span1 class="me-2">DONATE</span1>
    <img class="img-fluid" src="{{asset('/Assets/AdobeStock_398524235 1 (1).svg')}}" alt="donate heart" width="24"
        height="22" />
</a>
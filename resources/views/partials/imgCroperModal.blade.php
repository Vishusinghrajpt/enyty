<div class="modal fade cropImageModal" id="{{$id ?? 'cropImageprofile'}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content" style="height: auto !important;">

            <div class="modal-body p-0">
                <div class="modal-header-bg">
                    <button type="button" class="close-modal-custom pt-3" data-dismiss="modal" aria-label="Close"
                        style="background: unset;  border: transparent;">
                        <img class="img-fluid " src="{{asset('Assets/Group22.svg')}}" alt="fb icon" width="20"
                            height="">
                    </button>
                </div>

                <div class="up-photo-title">
                    <h3 class="modal-title"><img class="img-fluid " src="{{asset('Assets/Logo_vettoriale.svg')}}"
                            alt="fb icon" width="200" height=""></h3>
                    <p class="modal-title">Update The Photo Of Your Loved One</p>
                </div>
                <div class="up-photo-content ">

                    <div id="upload-demoprofile" class="center-block">
                        <h5 style="color:#0000007d;"><i class="fas fa-arrows-alt mr-1"></i> Drag your photo as you
                            require</h5>
                    </div>
                    <div class="upload-action-btn text-center px-2">
                        <button type="button"  @if($id ?? '') onclick="cropImgFun('#{{ $id }}', '#{{ $imageInput }}', '.{{ $imageOutput }}')" @else id="crop_profile_ImageBtn" @endif  class="btn btn-default btn-medium  crop_profile_ImageBtn12">
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
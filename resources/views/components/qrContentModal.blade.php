@props(['data' =>null,'id'=>null,'image'=>null])
<div class="modal  fade cropImageModal show" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    style="justify-content: space-between;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" style=" max-width: 870px ;">
        <div class="modal-content successModal">
            <div class="d-flex " style="padding-right: 22px;flex-direction: row-reverse;">
                <button type="button" class="close-modal-custom pt-3 AuthantictionModal_close" data-dismiss="modal"
                    aria-label="Close" style="cursor: pointer; background: unset;  border: transparent;">
                    <img class="img-fluid " src="{{asset('Assets/Group22.svg')}}" alt="fb icon" width="17" height="">
                </button>
            </div>
            <div class="modal-body p-0 d-flex justify-content-center"
                style="text-align: center;align-items: center;height: 400px;">
                <div class="d-flex align-items-center text-dark col-10" style="flex-direction: column;">
                    <h3 class="text-dark pb-2 h1"><img class="img-fluid Logo_vettoriale" src="{{asset('Assets/Logo_vettoriale.svg')}}"
                            alt="fb icon" width="170" height="" style="margin-left: -12px;"></h3>
                    <p class="pt-2 mb-3 h5  text-capitalize" id="massage"><span class='fw-bold'> {{$data->frist_name ?? ''}} {{$data->last_name ?? ''}} </span> will be forever remembered, eternally. Below is the qr code associated with it. You can find it and print it on the dedicated page.</p>
                    <img class="mb-3 rounded-4" src="{{$image}}" height="160" alt="QR Code for">
                    <a class="p-2 text-white text-decoration-none rounded-3 confirmation-url" href="/your-eternity-page"
                        style="background-color: #456297;">
                        <h3 class="text-dark h4 text-white m-0 px-5 confirmation-button">CHECK IT NOW!</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
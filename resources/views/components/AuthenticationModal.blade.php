@props(['message' =>null,'id'=>null])
<div class="modal  fade cropImageModal show" id="{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="justify-content: space-between;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" style=" max-width: 870px ;">
                    <div class="modal-content successModal" style="    height: 430px;">
                            <div class="d-flex " style="    padding-right: 22px;        flex-direction: row-reverse;">
                                     <button type="button" class="close-modal-custom pt-3 AuthantictionModal_close" data-dismiss="modal" aria-label="Close" style="cursor: pointer; background: unset;  border: transparent;">
                                        <img class="img-fluid " src="{{asset('Assets/Group22.svg')}}" alt="fb icon" width="20" height="">
                                    </button>
                            </div>
                        <div class="modal-body p-0 d-flex justify-content-center" style="text-align: center;   align-items: center;">
                            
                            <div class="d-flex align-items-center text-dark" style="flex-direction: column;"> 
                              <img class="mb-4 Logo_vettoriale" width="200" src="{{asset('Assets/Logo_vettoriale.svg')}}" >
                                <h3 class="text-dark pb-2 h1">Apologies</h3>
                                 <p class="pt-2 mb-4 h3">{{$message}}</p>
                                 <a class="p-2 text-white text-decoration-none rounded-3 donation-url" href="/register" style="    background-color: #456297;">
                                     <h3 class="text-dark h4 text-white m-0 px-5 donation-button">Sing UP Now!</h3>
                                 </a>
                              </div> 
                        </div>
                    </div>
                </div>
            </div>
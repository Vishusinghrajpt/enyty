<div class="modal  fade cropImageModal show" id="NotifictionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="justify-content: space-between; " aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" style=" max-width: 870px ;">
                    <div class="modal-content successModal" style="    height: 430px;">
                            <div class="d-flex " style="    padding-right: 22px;        flex-direction: row-reverse;">
                                     <button type="button" class="close-modal-custom pt-3 help_modal_close" data-dismiss="modal" aria-label="Close" style="cursor: pointer; background: unset;  border: transparent;">
                                        <img class="img-fluid " src="./Assets/Group22.svg" alt="fb icon" width="20" height="">
                                    </button>
                            </div>
                        <div class="modal-body p-0 d-flex justify-content-center" style="     text-align: center;   align-items: center;">
                            @if ($message = Session::get('successEmail'))
                            <div class="d-flex align-items-center text-dark" style="flex-direction: column;"> 
                                        
                                        <h4 class="pb-1 pb-md-3 pb-lg-3 m-0"> Thank You</h4>
                                  <div class=" border border-2 rounded-circle img-sec" style="    border-color: #465A7B !important;">       
                                     <img class="p-4" src="./Assets/VectorRight.svg" height="100" width="100"   >
                                </div>  
                                     <h3 class="text-dark pt-3 h1">{{$message}}</h3>
                                     
                                </div> 
                            @endif
                            @if ($message = Session::get('success'))
                                  <div class="d-flex align-items-center text-dark" style="flex-direction: column;"> 
                                        <h3 class="text-dark pb-1 pb-md-3 pb-lg-3 h1">Welcome To Enyty!</h3>
                                        <h4 class="pb-1 pb-md-3 pb-lg-3"> Thank Your*.</h4>
                                  <div class=" border border-2 rounded-circle img-sec" style="    border-color: #465A7B !important;">       
                                     <img class="p-4" src="./Assets/VectorRight.svg" height="100" width="100"   >
                                </div>  
                                     <h3 class="text-dark pb-1 pb-md-3 pb-lg-3 h1 m-0">${{$message}}</h3>
                                     <h4>Yout Donation Was Successfull. </h4>
                                </div> 
                          
                             @endif
                             @if ($message = Session::get('error'))
                                <div class="d-flex align-items-center text-dark" style="flex-direction: column;"> 
                                <h3 class="text-dark pb-2 h1">Apologies</h3>
                                <img class="p-4 border border-2 rounded-circle" src="./Assets/Vector1.svg" height="100"  style="    border-color: #465A7B !important;"  >
                                 <h3 class="pt-2 mt-2">Donation Failed</h3>
                                 <h5 >Please Try Again</h5>
                                </div>
                              
                             @endif
                          </div>  
                    </div>
                </div>
            </div>
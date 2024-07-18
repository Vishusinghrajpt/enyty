<div class="modal fade cropImageModal show" id="InviteEmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="justify-content: space-between;" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered" style=" max-width: 870px ;">
                    <div class="modal-content successModal" style="    height: 430px;">
                            <div class="d-flex " style="    padding-right: 22px;        flex-direction: row-reverse;">
                                     <button type="button" class="close-modal-custom pt-3 AuthantictionModal_close" data-dismiss="modal" aria-label="Close" style="cursor: pointer; background: unset;  border: transparent;">
                                        <img class="img-fluid " src="{{asset('Assets/Group22.svg')}}" alt="fb icon" width="20" height="">
                                    </button>
                            </div>
                        <div class="modal-body p-0 d-flex justify-content-center" style="     text-align: center;   align-items: center;">
                            <div class="d-flex align-items-center text-dark" style="flex-direction: column;"> 
                                <h3 class="text-dark pb-2 h1"><img class="img-fluid Logo_vettoriale" src="{{asset('Assets/Logo_vettoriale.svg')}}" alt="fb icon" width="300" height="" style="margin-left: -12px;"></h3>
                                <p><span class="h2" style="color:#000000ab;">Invite Others To Eternity Website</span></p>
                                <form action="{{route('InviteEmail')}}" class="" id="emailInvitation" method="post" style="    width: 73%;">
                                      @csrf
                                    <input type="email" id="email" name="email" placeholder="Email"
                                      class="bg-white invite form-control mb-3 rounded-3 "  style="    height: 50px;"/>
                                      <button style="background-color: #456297;font-family: 'DM Serif Display';" id="submit-btn" class="btn rounded-3 mb-3 mt-2 text-white  py-2" type="submit">
                                         <span class="h4 p-2">INVITE</span> 
                                       </button>
                                    
                                </form>
                              </div> 
                        </div>
                    </div>
                </div>
            </div>
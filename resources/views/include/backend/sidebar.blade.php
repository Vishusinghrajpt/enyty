   @php
   $profile ="";
   $passward ="";
   $create_enyty_page ="";
   $your_enyty_page ="";
   $payment_method ="";
   $donation_history ='';
   @endphp
@if (Request::path() == 'profile')
   @php
   $profile ="active";
   @endphp
@endif
@if (Request::path() == 'passward')

    @php
   $passward ="active";
   @endphp
@endif
@if (Request::path() == 'create-enyty-page')
    @php
   $create_enyty_page ="active";
   @endphp
@endif
@if (Request::path() == 'your-enyty-page')
   @php
   $your_enyty_page ="active";
   @endphp
@endif
@if (Request::path() == 'donation-history')
   @php
   $donation_history ="active";
   @endphp
@endif 

@if (Request::path() == 'payment-method')
   @php
   $payment_method ="active";
   @endphp
@endif 

  
  
  
  
  
  
  
  
  
  
  <div id="wrapper">
        <!-- Sidebar -->
        <div class="px-2 px-lg-5   sidebar sidebar-dark accordion text" id="accordionSidebar" >
            <ul class="navbar-nav">
             
                      <div class="profile" >
                          
                          <button id="btnfile" style="background: no-repeat;border:none;"> 
                             @if(isset(auth()->user()->avatar))
                             <img src="{{auth()->user()->avatar}}" width='280' height='280' id="my_image" class="img-fluid rounded-circle">
                             @else
                             <img src="{{asset('avatar/userLogo.svg')}}" width='280' height='280' id="my_image" class="img-fluid rounded-circle">
                             @endif
                          </button> 
                            <div class="wrapper d-none" > 
                            <form method="POST" action="{{route('profile_image_update')}}"  id="form_id" enctype="multipart/form-data">
                                 @csrf
                                 <input type="file" name = "avatar" value="" id="uploadfile" /> 
                                  <input type="hidden" name ="crop_img"  id="crop_img1" /> 
                            </form>
                            </div>
                        <!--<img src="./Assets/AdobeStock_616809924_Preview 1.png" height="280" width="280" alt="" class="img-fluid rounded-circle">-->
                        <p class="h5 text-gray mt-1" id="change-avatar-text">Change Profile Picture</p>
                      </div>
                 <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item {{$profile}}">
                      <a class="nav-link text-dark fw-bold font-size-18" href="{{route('user_profile')}}">
                         <span>Profile </span>
                      </a>
                </li>
                <li class="nav-item {{$passward}}">
                      <a class="nav-link text-dark fw-bold font-size-18" href="{{route('passward')}}">
                         <span>Password </span>
                      </a>
                </li>
                <li class="nav-item {{$create_enyty_page}}">
                      <a class="nav-link text-dark fw-bold font-size-18" href="{{route('create_enyty_page')}}">
                         <span>Create Enyty Page </span>
                      </a>
                </li>
                <li class="nav-item {{$your_enyty_page}}">
                      <a class="nav-link text-dark fw-bold font-size-18" href="{{route('your_enyty_page')}}">
                         <span>Your Enyty Pages </span>
                      </a>
                </li>
                <li class="nav-item {{$donation_history}}">
                      <a class="nav-link text-dark fw-bold font-size-18" href="{{route('donation_history')}}">
                         <span>Donation History </span>
                      </a>
                </li>
                
                    
               
            </ul>
                   <li class="nav-item help_" style="cursor: pointer; bottom: 0 !important;    position: absolute;     list-style: none;">
                          <a class="nav-link text-dark fw-bold font-size-18" >
                             <span>Need Help?</span>
                          </a>
                    </li>
       </div> 
        
        
                
             <!--modal-->
                <div class="modal fade cropImageModal" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                
                <div class="modal-dialog">
                    <div class="modal-content" style="height: auto !important;">
                       
                        <div class="modal-body p-0">
                            <div class="modal-header-bg">
                                 <button type="button" class="close-modal-custom pt-3" data-dismiss="modal" aria-label="Close" style="background: unset;  border: transparent;">
                                   <img class="img-fluid " src="./Assets/Group22.svg" alt="fb icon" width="20" height="" >
                                   </button>
                            </div>
                            
                            <div class="up-photo-title">
                                <h3 class="modal-title"><img class="img-fluid " src="./Assets/Logo_vettoriale.svg" alt="fb icon" width="200" height="" ></h3>
                                <h3 class="modal-title">Update Profile Photo</h3>
                            </div>
                            <div class="up-photo-content ">
        
                                <div id="upload-demo" class="center-block">
                                    <h5 style="color:#0000007d;"><i class="fas fa-arrows-alt mr-1"></i> Drag your photo as you require</h5>
                                </div>
                                <div class="upload-action-btn text-center px-2">
                                    <button type="button" id="cropImageBtn" class="btn btn-default btn-medium  ">
                                        Save photo
                                    </button>
                                    <button type="button" class="btn btn-default btn-medium bg-default-light px-3 ml-sm-2 replacePhoto position-relative" style="color:#0000007d;">Replace Photo</button>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--end modal-->
        
        
        <!--help modal-->
                <div class="modal fade cropImageModal" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="    justify-content: space-between; ">
                
                <div class="modal-dialog" style=" max-width: 870px ;">
                    <div class="modal-content" style="    height: 430px;">
                            <div class="d-flex " style="    padding-right: 22px;        flex-direction: row-reverse;">
                                     <button type="button" class="close-modal-custom pt-3 help_modal_close" data-dismiss="modal" aria-label="Close" style="cursor: pointer; background: unset;  border: transparent;">
                                        <img class="img-fluid " src="./Assets/Group22.svg" alt="fb icon" width="20" height="" >
                                    </button>
                            </div>
                            <div class="modal-body p-0 d-flex justify-content-center " style="text-align: center;align-items: center;">
                                <!-- <div class="d-flex justify-content-center"></div> -->
                           
                            <div class="d-flex align-items-center text-dark" style="flex-direction: column;"> 
                              <img class="mb-4" width="200" src="{{asset('Assets/Logo_vettoriale.svg')}}" >
                                <h3 class="text-dark pb-2 pb-lg-3 h1">Need Help?</h3>
                                 <h4> Kindly reach out us at</h4>
                                 <h4 style="color:#456297;">info@enyty.com</h4>
                                 <h4 >We will get back to you as soon as possible</h4>
                              </div> 
                        </div>
                    </div>
                </div>
            </div>
        <!--end help modal-->
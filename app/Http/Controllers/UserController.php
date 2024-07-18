<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\EternityPages;
use App\Models\DonationHistories;
use App\Models\CardDetails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\Country;

class UserController extends Controller
{
    
    public function Image(){
       $manager=new ImageManager(new Driver());
        return $manager;
    
    }// end method
    
    public function profile(){
          if(Auth::check()){
              $user = auth()->user();
            if($user->role_id == 3){
                return redirect()->route('company.company_profile');
            }
              $countries =  Country::all();
              $states = $user->country ? $user->country->states : null;
              $cities = $user->state ? $user->state->cities : null;
             return view('pages.profile.user_profile',compact('countries','states','cities'));
            }
        return redirect()->route('index');
    }// end method
  
    public function passward(){
          if(Auth::check()){
             return view('pages.profile.passward');
            }
        return redirect()->route('index');
    }// end method


    public function create_enyty_page(){
        if(Auth::check()){
            $user = auth()->user();
            $countries =  Country::all();
            $states = $user->country ? $user->country->states : null;
            $cities = $user->state ? $user->state->cities : null;
          return view('pages.profile.create_enyty_page',compact('countries','states','cities','user'));
        }
          return redirect()->route('index');
    }// end method


  

    
    public function delete_eternity_page(Request $request){
        $details=['user_id' => auth()->user()->id, 'id' =>$request->id];
        $user=  DB::table('eternity_pages')->where($details)->delete();
        return redirect()->route('your_enyty_page');
    }// end method
        
    // 
    // end method
    public function your_enyty_page(){
        if(Auth::check()){
            $currentPage = 1;
            $pageskipe = 0;
            if(isset($_GET['page'])){
                $currentPage = $_GET['page'];
            }
            if($currentPage > 1){
                $cur = $currentPage-1;
                $pageskipe=$cur*4; 
            }
           
            
            $user= EternityPages::where('user_id',auth()->user()->id)->skip($pageskipe)->take(4)->get();
            $pagination= EternityPages::where('user_id',auth()->user()->id)->count();
            if($user->isEmpty() && isset($_GET['page'])){
                return redirect()->route('your_enyty_page');
            }
            if($user->isEmpty()){
                $user=null; 
            }else{
                $user=$user;
            }
            $total_users=($user !=null)  ? $user->count() : 0;
            $pagination = ceil($pagination/4);
            $countries =  Country::all();
            return view('pages.profile.your_enyty_page',compact('user','total_users','pagination','currentPage','countries'));
        }
        return redirect()->route('index');
    }// end method
 
    public function donation_history(){
        if(Auth::check()){
            $user= DonationHistories::where('user_id',auth()->user()->id)->get();
            if($user->isEmpty()){
                $user=null; 
            }else{
                $user=$user;
            }
            // dd($user);
            return view('pages.profile.donation_history',compact('user'));
        }
        return redirect()->route('index');
    }// end method
    
    public function payment_method(){
        if(Auth::check()){
            $user= CardDetails::where('user_id',auth()->user()->id)->get();
            if($user->isEmpty()){
                $user=null; 
            }else{
                $user=$user;
            }
            return view('pages.profile.payment_method',compact('user'));
        }
         return redirect()->route('index');
    }// end method

    public function profile_update(Request $request){
        $first_name=$request->first_name;    
        $last_name=$request->last_name;    
        $location=$request->location;    
            
        if($request->email !=Auth::user()->email){
            
            $is_email_exits=User::where('email',$request->email)->exists();
            
              if($is_email_exits){
                  return ['error'=>1,'status'=>2,'msg'=>'This email already exist !!'];
              }
              
              $temp = User::where('id',Auth::user()->id)->update([
               'first_name' => $first_name,
               'last_name'=>$last_name,
               'state_id' => $request->province_id ?? null,
               'country_id'=>$request->country_id ?? null,
               'city_id' => $request->city_id ?? null,
               'email'=>$request->email,
               'email_verified_at'=>null
            ]);
            
            $user=User::where('id',Auth::user()->id)->first();
            $user->sendEmailVerificationNotification();
            $status='Email-verification-link-sent';
            Auth::guard('web')->logout();
            return ['status' => $status,'email_updated'=>1,'msg'=>'Updated Successfully !!'];
          }else{
              
                $user = User::where('id',Auth::user()->id)->update([
                'first_name' => $request->first_name,
                'last_name'=>$request->last_name,
                'state_id' => $request->province_id ?? null,
                'country_id'=>$request->country_id ?? null,
                'city_id' => $request->city_id ?? null,
            ]);
            
            return ['email_updated'=>0,'status'=>1,'msg'=>'Updated Successfully !!'];
          }
    }// end method
    public function update_eternity_page(Request $request){
       
        $validator = Validator::make($request->all(), [
        'biography' => 'required|string|not_regex:/<script.*?>/i',
        // Other validation rules for other fields
        ]);
       
        if ($validator->fails()) { 
            // return ['status'=>2,'msg'=>'Script tags are not allowed !!'];
            return redirect()->route('your_enyty_page')->with(['status'=>2,'msg'=>'Script tags are not allowed !!']);
        }
      
        $firstName = ucfirst(str_replace(' ', '', $request->firstName));
        $last_name = ucfirst(str_replace(' ', '', $request->last_name));
        $profile_id =$request->profile_id;
        $slug=$firstName.$last_name.$profile_id;
        
        $user_id = Auth::user()->id;
        $profile_picture =$request->profile_picture3;
         $date_of_birth = $request->birth_year .'-'. $request->birth_month .'-'. $request->birth_day;
         $date_of_departure = $request->departure_year .'-'. $request->departure_month .'-'. $request->departure_day;
         $updateData =  [
                'frist_name' => $firstName,
                'last_name' => $last_name,
                'birth_date' =>$date_of_birth,
                'slug'=>$slug,
                'departure_date' =>$date_of_departure,
                'symbolic' => $request->symbolic,
                'connection' => $request->connection,
                'country_id' => $request->country_id,
                'state_id' => $request->province_id,
                'city_id'=> $request->city_id,
                'biography'=>$request->biography,
            ];
            $user= EternityPages::where('id',$profile_id)->update($updateData);
            
            if($user==true)
            {   
                // dd($request);
                if ($profile_picture) 
                { 
                     $quality = 200; 
                    $imagePath=public_path("/avatar/profile_picture");
                    if (File::exists($imagePath))
                    {
                        $manager = $this->Image();
                        $image = $manager->read($profile_picture);
                        $imageName='avatar/profile_picture/'.time()+1 .'.jpg';
                        $user= EternityPages::where('id',$profile_id)->update(['profile_picture'=>$imageName]);
                        $image->save($imageName,$quality);  
                    }
                }
                
                if ($request->additional_picture_stor) {
                    $save_img = array();
                    $i = 1;
                    foreach ($request->additional_picture_stor as $value) {
                        $imagePath = public_path("/avatar/additional_picture");
                        if (File::exists($imagePath)) {
                            $manager2 = $this->Image();
                            $image = $manager2->read($value);
                            $imageName = 'avatar/additional_picture/' . time() . $i . '.jpg';
                            $image->save($imageName);
                            array_push($save_img, $imageName);
                        }
                        $i++;
                    }
                    $res = json_encode($save_img, true);
                    $user = EternityPages::where('id', $profile_id)->update(['additional_picture' => $res]);
                }

               return redirect()->route('your_enyty_page')->with(['status'=>1,'msg'=>'Updated Eternity Page  Successfull !!']);
            }
           
            return redirect()->route('your_enyty_page')->with(['status'=>2,'msg'=>'Error !!']);
            
            dd($user);
           
    }

    public function profile_image_update(Request $request){
        
        if ($request->hasFile('avatar')) {
            $db_avatar=DB::table('users')->where('id',Auth::user()->id)->value('avatar');
            $imagePath=public_path($db_avatar);
            
            if ($imagePath) {
                
                // Delete the existing image file
                if($db_avatar !='/avatar/avatar.png'){
                    File::delete($imagePath);
                }
                
                     $manager = $this->Image();
                     $quality = "200";
                     $image = $manager->read($request->crop_img);
                     $imageName='avatar/'.time()+1 .'.jpg';
                     $user= User::where('id',Auth::user()->id)->update(['avatar'=>"/".$imageName]);
                     $image->save($imageName,$quality);
                     return ['status'=>1,'msg'=>'Image Updated Successfull !!','imgName'=>'/'. $imageName,'img_update'=>1];
            }
        }else{
           return ['status'=>0,'msg'=>'Try Again !!','img_update'=>0];
        }
    }// end method
    
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        /* 
            Write Code Here for
            Store $imageName name in DATABASE from HERE 
        */
        return back()->with('success', 'You have successfully uploaded an image.')->with('image', $imageName); 
    }
     
    public function password_update(Request $request){
        $passward=$request->crunnet_password;    
        $new_password=$request->new_password;    
        if($new_password != $request->repeat_password){
            return response()->json([
                'message' => 'Password Not Matched !!',
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        if (Hash::check($request->crunnet_password, Auth::user()->password)) {
            $user = User::where('id',Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
                return [ 'status' => 2,'msg'=>'Your password  has been changed successfully.'];
        }
        return response()->json([
            'message' => 'Previous password doesn`t matched !!',
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }// end method
       
    
        
    public function create_eternity_page_(Request $request){
        
         $validator = Validator::make($request->all(), [
            'biography' => 'required|string|not_regex:/<script.*?>/i',
        ]);
       
        if ($validator->fails()) { 
            return ['status'=>2,'msg'=>'Script tags are not allowed !!'];
        }
        $number0fpage = EternityPages::where('user_id',auth()->user()->id)->count();
        $numberofdonet= DonationHistories::where('user_id',auth()->user()->id)->count();
        $date_of_birth = $request->birth_year .'-'. $request->birth_month .'-'. $request->birth_day;
        $date_of_departure = $request->departure_year .'-'. $request->departure_month .'-'. $request->departure_day;
        
        $firstName = ucfirst(str_replace(' ', '', $request->first_name));
        $last_name = ucfirst(str_replace(' ', '', $request->last_name));
        if($this->checkInteger($firstName)){
            return ['status'=>2,'msg'=>'First Name Should not contain number !'];
        }
        if($this->checkInteger($last_name)){
            return ['status'=>2,'msg'=>'Last Name Should not contain number !'];
        }
        
        $EternityPages = EternityPages::create([
            'user_id' => Auth::user()->id,
            'frist_name' => $firstName,
            'last_name' => $last_name,
            'birth_date' =>$date_of_birth,
            'departure_date' =>$date_of_departure,
            'symbolic' => $request->symbolic,
            'profile_picture' => $request->profile_picture1,
            'additional_picture' => $request->additional_picture1,
            'connection' => $request->connection,
            'country_id' => $request->country_id,
            'state_id' => $request->province_id,
            'city_id'=> $request->city_id,
            'biography'=>$request->biography,
        ]);
        
        if(!empty($EternityPages->id)){
            $slug=$firstName.$last_name.$EternityPages->id;
            EternityPages::where('id',$EternityPages->id)->update(['slug'=>$slug]);
           
              if ($request->hasFile('profile_picture2')) {
                        $imagePath = public_path("/avatar/profile_picture");
                        if (File::exists($imagePath)) {
                            $quality = 200; 
                            $manager = $this->Image();
                            $image = $manager->read($request->profile_picture3); 
                            $imageName = 'avatar/profile_picture/' . time() . '1.jpg'; 
                            $image->save(public_path($imageName,$quality)); 
                            $user = EternityPages::where('id', $EternityPages->id)->update(['profile_picture' => $imageName]);
                        }
                    }

                    if ($request->additional_picture_stor) {
                        $save_img = array();
                        $i = 1;
                        foreach ($request->additional_picture_stor as $value) {
                            $imagePath = public_path("/avatar/additional_picture");
                            if (File::exists($imagePath)) {
                                $manager2 = $this->Image();
                                $image = $manager2->read($value);
                                $imageName = 'avatar/additional_picture/' . time() . $i . '.jpg'; 
                                $image->save($imageName);
                                array_push($save_img, $imageName);
                            }
                            $i++;
                        }
                        $res = json_encode($save_img, true);
                        $user = EternityPages::where('id', $EternityPages->id)->update(['additional_picture' => $res]);
                    }

                
                // send email to subscriber on new page created !
                $subscribers=DB::table('subscribers')->get();
                if(!$subscribers->isEmpty()){
                    $user= new User();
                    foreach($subscribers as $subscriber){
                        $user->email=$subscriber->email;
                        $url=config('app.url').'/commemoration/'.$slug;
                        $unsubscribe_token=config('app.url').'/unsubscribe/'.$subscriber->unsubscribe_token;
                     Mail::to($user->email)->send(new \App\Mail\UpdateNewEternityPageCreated($subscriber->name,$url,$unsubscribe_token));
                    }
                }
                
              return ['status'=>1,'msg'=>' <strong>'. $firstName.' '.$last_name.'</strong> will be forever remembered, eternally !']; 
             }
             return ['status'=>2,'msg'=>'Error !!'];
    }// end method
        
    public function deletCard(Request $request){
        $user= CardDetails::where('id',$request->id)->delete();
    }// end method
    
    
    public function UpdateProfilePicture($user_id,$profile_id,$profile_picture)
    {
        $imagePath=public_path("/avatar/profile_picture");
        if (File::exists($imagePath))
        {
            $manager = $this->Image();
            $image = $manager->read($profile_picture);
            $quality = '200';
            // $encoded = $modified_image->toJpg();
            $imageName='avatar/profile_picture/'.time()+1 .'.jpg';
            $user= EternityPages::where('id',$profile_id)->update(['profile_picture'=>$imageName]);
            $encoded->save($imageName,$quality);  
            dd($user_id,$profile_id,$user);
            
        }
                
    }
    
    private function checkInteger($name){
        if (preg_match('/\d/', $name)) {
            return 1;
        }else{
            return 0;
        }
    }
    
}// end class

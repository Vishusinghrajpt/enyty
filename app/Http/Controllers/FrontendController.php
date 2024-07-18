<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\EternityPages;
use App\Models\Tribut; 
use App\Models\Comment;
use App\Models\Like;
use App\Models\DonationHistories;
use SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
// use Validator;
use App\Mail\InviterEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\Agencie;
use App\Models\City;
use App\Models\Poster;
use DataTables;
use Carbon\Carbon;
use App\Helpers\ModelUtility;
use Illuminate\Support\Facades\Validator;



class FrontendController extends Controller
{
    function index(){
        $users = $posts = '';
        if(EternityPages::all()){
            $users = EternityPages::orderBy('id', 'DESC')->skip(0)->take(1)->get();
            $posts = EternityPages::orderBy('id', 'DESC')->skip(1)->take(4)->get();
        }
         return view('index',compact('posts','users'));
    }// end method
    
    public function commemoration(){

        $user = User::all();
    
        return view('pages.commemoration' ,compact('user'));
    }// end method
    
    public function commemorations(Request $request){
       
        $posts =  EternityPages::all();
        $users = User::all();

        if ($request->ajax()) {
            $query = EternityPages::query();
            $user = Auth::user();
            $params = $request->all();
            $query = ModelUtility::generateQuery($query, $params, $user);
            
            return DataTables::of($query)
                ->addColumn('details', function ($poster) {
                    return view('pages._user_poster', [
                        'user' => $poster,
                        'cruntDay' => Carbon::parse($poster->created_at)->diffForHumans()
                    ])->render();
                })
                ->rawColumns(['details'])
                ->make(true);
        }

        return view('pages.commemorations', compact('posts', 'users'));

    }

    public function events(Request $request){
        $posts = Poster::first();
        if ($request->ajax()) {
            $query = Poster::query();
            $user = Auth::user();
            
            $params = $request->all();
            if(!$request->section){
                $params['section']='recent';
                $request->section='recent';
            }
            $query = ModelUtility::generateQuery($query, $params, $user);
            
            return DataTables::of($query)
                ->addColumn('details', function ($poster) {
                    return view('_companyPoster', [
                        'user' => $poster,
                        'currentDay' => Carbon::parse($poster->created_at)->diffForHumans()
                    ])->render();
                })
                ->rawColumns(['details'])
                ->make(true);
        }
        return view('pages.events',compact('posts'));

    }// end method
    
    public function mission(){
        
        return view('pages.mission');
    }// end method
    
    public function donations(){
        
        
        $users = DonationHistories::orderBy('id','DESC')->selectRaw('user_id, MAX(id) as id, SUM(amount) as amount, MAX(currency) as currency')
                ->groupBy('user_id')->take(1)->get();
        $posts = DonationHistories::where('user_id', '!=' ,$users->first()->user_id)->selectRaw('user_id, MAX(id) as id, SUM(amount) as amount, MAX(currency) as currency')
                ->groupBy('user_id')
                ->take(20)
                ->get();


        
    //   dd($posts,$users);
        return view('pages.donations' ,compact('posts','users'));
    }// end method
    
    public function register(){ 
        if(Auth::check()){
            return redirect()->route('index');
        }
        $countries = Country::all();
        $country_arr = [];
        foreach($countries as $country){
            $country_arr['name'][$country->id] = $country->name;
        }
        return view('pages.register',compact('country_arr'));
    }
    // end method
      public function agency(){
        if(Auth::check()){
            return redirect()->route('index');
        }
        $countries = Country::all();
        $country_arr = [];
        foreach($countries as $country){
            $country_arr['name'][$country->id] = $country->name;
        }

        return view('auth.company_register', compact('country_arr'));

    }
    
    public function user_profile(){
          if(Auth::check()){
             return view('pages.user_profile');
            }
        return redirect()->route('index');
    }// end method
    
    public function register_store(Request $request) {
        
        $validator = Validator::make($request->all(), $this->rules($request));
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'status' => false,
                'icon' => 'error',
                'message' => $validator->errors()
            ]);
        }
        
            if($request->first_name){
                $name = $request->first_name . ' ' . $request->last_name;
            }
            // dd($request);
            $remember_token = Str::random(64);
            $user = User::create([
                'first_name' => $request->first_name ?? '',
                'last_name' => $request->last_name ?? '',
                'state_id' => $request->province_id ?? null,
                'country_id'=>$request->country_id ?? null,
                'city_id' => $request->city_id ?? null,
                'email' => $request->email,
                'role_id' => $request->role_id ?? 2,
                'remember_token' => $remember_token,
                'name' => $name ?? $request->name,
                'password' => Hash::make($request->password),
            ]);
            if ($request->role_id == '3') {
                $user->agencie()->create([
                    'number' => $request->c_number,
                    'vat_number' => $request->vat_number,
                    'eternity_cod' => $request->eternity_cod,
                ]);
            }

    
    event(new Registered($user));
    $status = 'verification-link-sent';
    return ['status' => $status, 'token' => $remember_token];
}

// 

private function generateRandomEmail() {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $random_string = '';
    $length = 10; // Adjust the length of the random string as needed

    // Generate a random string
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Choose a random domain from a list of common domains
    $domains = ['example.com', 'gmail.com', 'yahoo.com', 'hotmail.com'];
    $random_domain = $domains[rand(0, count($domains) - 1)];

    // Concatenate the random string with the random domain to form the email address
    $random_email = $random_string . '@' . $random_domain;

    return $random_email;
}
// 
    
    public function verify($status,$token){
        return view('pages.verify',['status' => $status,'token' => $token]);
    }
    
    public function postverify(Request $request){
            $token=$request->token;
            $status='verification-link-sent';
            $user = User::where('remember_token',$token)->first();
           
            if($user!=null){
               if ($user->hasVerifiedEmail()) {
                    $remember_token=null;
                    DB::table('users')->where('id',$user->id)->update(['remember_token'=> $remember_token]);
                    return redirect()->route('user_profile');
                }
            $user->sendEmailVerificationNotification();
            return view('pages.verify',['status' => $status,'token' => $token]);
            }
            return to_route('register');
    }

    // end method
    
    public function InviteEmail(Request $request){
         if (Auth::check()) {
            $inviter = User::findOrFail(auth()->user()->id);
            $email =  Mail::to($request->email)->send(new InviterEmail($inviter));

            // Create Agencie record
            $agencie = new Agencie();
            $agencie->user_id = auth()->user()->id;
            // Set other attributes as needed
            $agencie->save();

            return back()->with('successEmail', 'Your Mail has been sent.');
        }
        return redirect()->route('index');
    }

    // end method
    
    
    public function loadMore(Request $request){
        
        $posts =  DB::table('users')->orderBy('eternity_pages.created_at', 'DESC')
            ->skip($request->lenth)
            ->select('users.id','users.name','eternity_pages.*')
            ->join('eternity_pages','eternity_pages.user_id','=','users.id')
            ->take(2)
            ->get();
            // dd($posts);
             if($posts->isEmpty()){
                $posts='null'; 
            }else{
                $posts=$posts;
            }
            return  $posts;
    }
    
    public function liveSearch(Request $request)
    {
        $orderBy = 'eternity_pages.frist_name';
         if($request->value == "created_at")
            {
                $orderBy = 'eternity_pages.created_at';
            }
        if($request->searchby=='ASC'){
            
            $posts =  DB::table('users')
            ->select('users.id','users.name','eternity_pages.*')
             ->join('eternity_pages','eternity_pages.user_id','=','users.id')
             ->orderBy($orderBy, 'ASC')
             ->take(2)
             ->get();
        }
        else if($request->searchby=='DESC'){
            $posts =  DB::table('users')
             ->select('users.id','users.name','eternity_pages.*')
             ->join('eternity_pages','eternity_pages.user_id','=','users.id')
             ->orderBy($orderBy, 'DESC')
             ->take(2)
             ->get();
        }
         else if($request->searchby=='Location'){
             $posts =  DB::table('users')->orderBy('eternity_pages.created_at', 'DESC')
            ->where('eternity_pages.location', 'like', "%$request->value%")
            ->select('users.id','users.name','eternity_pages.*')
            ->join('eternity_pages','eternity_pages.user_id','=','users.id')
            ->take(2)
            ->get();
        }
        else{
            
        $posts =  DB::table('users')->orderBy('eternity_pages.created_at', 'DESC')
            ->where('eternity_pages.frist_name', 'like', "%$request->value%")
            ->select('users.id','users.name','eternity_pages.*')
            ->join('eternity_pages','eternity_pages.user_id','=','users.id')
            ->take(2)
            ->get();
        }
            return  $posts;  
    }
    
    // public function commemorationInnerpage($name, $id){
    public function commemorationInnerpage(Request $request, $slug){
        
        $page=EternityPages::where(['slug'=>$slug])->first();
        $id=$page->id;
        $name=$page->frist_name.$page->last_name;
        
        $user =  DB::table('users')
            ->where('eternity_pages.id', $id)
            ->select('users.id','users.name','eternity_pages.*')
            ->join('eternity_pages','eternity_pages.user_id','=','users.id')
            ->first();
            
        $like = Like::where('eternity_pages_id', $id)->count();
        $post_id=$id;
        
        $countTributs = DB::table('tributs')->select('user_id','tribut')->where('profile_id', $id)->WhereNotNull('tribut')->count();
        $countTributs = ceil($countTributs/9);
        
        $userDetails=DB::table('tributs')->select('user_id','tribut')->where(['profile_id'=> $id])->WhereNotNull('tribut')->take(9)->get();
     
        $details=[];
        foreach($userDetails as $key => $user_arr){
            $temp_data=DB::table('users')->select('first_name','last_name','avatar')->where('id',$user_arr->user_id)->first();
            $given_donation=DB::table('donation_histories')->where(['user_id'=>$user_arr->user_id,'status'=>'COMPLETED'])->exists();
            $user_arr->first_name=$temp_data->first_name;
            $user_arr->last_name=$temp_data->last_name;
            $user_arr->avatar=$temp_data->avatar;
            $user_arr->donation=($given_donation == true) ? 1:0;
            $userDetails[$key]=$user_arr;
        }

        if ($request->ajax()) {
            $page = EternityPages::where(['slug' => $slug])->first();
            $query = $page->comments()->orderBy('created_at', 'DESC');
            return DataTables::of($query)
                ->addColumn('details', function ($poster) {
                    $donationHistories = $poster->user->donationHistories;
                    $hasDonationHistories = !$donationHistories->isEmpty();
                    return view('partials.tribute', [
                        'tribute' => $poster,
                        'donationHistories' => $hasDonationHistories ? 1 : 0
                    ])->render();
                })
                ->rawColumns(['details'])
                ->make(true);
        }
        // dd($userDetails->donation);
        return view('pages.commemorationInnerpage',compact('user','post_id','name','userDetails','countTributs','page'),compact('like'));
        
    }
    
    public function leaveTribut(request $request)
    {
        
        
        
        $response = [
            'status' => '0',
            'msg' => 'Your Tribut is Already Saved !',
        ];
        
        
        $tribute_details=['user_id' => $request->user_id, 'profile_id' =>$request->profile_id];
       
        $tribut=DB::table('tributs')
               ->where($tribute_details)
               ->get();
                // dd($tribut);
        if($tribut->isEmpty()){
                DB::table('tributs')
                    ->where($tribute_details)
                    ->insert(['tribut'=>$request->message,'user_id' => $request->user_id, 'profile_id' =>$request->profile_id]);
                $response = [
                             'status' => '1',
                             'msg' => 'Your tribut has been saved !',
                            ];
                
        }else{
            if($request->user_id == auth()->user()->id)
            {
                DB::table('tributs')
                    ->where($tribute_details)
                    ->update(['tribut'=>$request->message]);
                $response = [
                             'status' => '1',
                             'msg' => 'Your tribut has been updated !',
                            ];
            }
        }
        return response()->json($response);
        
    }// end method    
    public function like(request $request)
    {   
        $details=['user_id' => $request->user_id, 'profile_id' =>$request->profile_id];
        $user =  DB::table('tributs')->where($details)->get();
        if($user->isEmpty()){
              $details['like']=1;
                $user = Tribut::create($details);
        }else{
            if($user[0]->like ==1)
            {
                $user=  DB::table('tributs')->where($details)->update(['like'=> 0]);
            }else{
                $user=  DB::table('tributs')->where($details)->update(['like'=> 1]);
            }
        }
        $like = DB::table('tributs')
            ->where(['like'=>1,'profile_id'=>$request->profile_id])
            ->count();
        return $like;
    }// end method
    
    public function pagination(request $request)
    {   
        $skipPage = $request->pageno-1;
        $countTributs = DB::table('tributs')->select('user_id','tribut')->where('profile_id', $request->post_id)->WhereNotNull('tribut')->count();
        $countTributs = ceil($countTributs/9);
        $userDetails=DB::table('tributs')
                    ->select('user_id','tribut')
                    ->where(['profile_id'=> $request->post_id])
                    ->skip($skipPage*9)
                    ->WhereNotNull('tribut')
                    ->take(9)
                    ->get();
            
        
        $details=[];
        foreach($userDetails as $key => $user_arr){
            $temp_data=DB::table('users')->select('first_name','last_name','avatar')->where('id',$user_arr->user_id)->first();
            $given_donation=DB::table('donation_histories')->where(['user_id'=>$user_arr->user_id,'status'=>'COMPLETED'])->exists();
            $user_arr->first_name=$temp_data->first_name;
            $user_arr->last_name=$temp_data->last_name;
            $user_arr->avatar=$temp_data->avatar;
            $user_arr->donation=($given_donation == true) ? 1:0;
            $user_arr->pageno = $request->pageno;
            $user_arr->profile_id = $request->post_id;
            if($user_arr->user_id == auth()->user()->id){
                $user_arr->authTrue = 'true';
            }
            $userDetails[$key]=$user_arr;
        } 
 
    //   dd($userDetails);
        return $userDetails;
        
    }// end method
    
    public function deleteTribut(request $request)
    {
       $comment = Comment::where('user_id',Auth::user()->id)->first();
       $comment->delete();
        return $comment;
    }

    public function agencylogin(){
           if(Auth::check()){
             return redirect()->route('company.company_profile');
           }
        return view('auth.agency_login');
    }

   public function Agency_login(Request $request)
    {
        $validatedData = $this->validate($request, [
            'c_email' => 'required',
            'password' => 'required',
        ]);

        $agency = Agencie::where('c_email', $validatedData['c_email'])->first();
        if ($agency && Hash::check($validatedData['password'], $agency->password)) {
            return redirect()->route('test');
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function getLoctions(Request $request){
        if($request->page_id == 'province' || $request->page_id == 'state' ){
            $country = Country::find($request->id);
            $data = $country->states;
        }else{
           $state = State::find($request->id);
           $data = $state->cities;
        }
        return json_encode($data);
       
    }

    public function searcharea(Request $request){
        $selected = $request->input('selected'); 
        $q = $request->q;
        $selectedArray = json_decode($selected);
        $data = Country::where('name', 'like', $q . '%')
                            ->limit(5)
                            ->get();
        if($request->val == 1){
            $data = State::where('country_id', $selectedArray[0])
                            ->where('name', 'like', $q . '%')
                            ->limit(5)
                            ->get();
        }elseif($request->val == 2){

            $data = City::where('state_id', $selectedArray[1])
                            ->where('name', 'like', $q . '%')
                            ->limit(5)
                            ->get();

        }

        if($data){
           return response()->json($data);
        }

        return "data not found";

    }
    
    
    public function rules(Request $request)
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        return $rules;
    }


}

// end class
 
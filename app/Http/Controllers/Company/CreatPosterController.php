<?php

namespace App\Http\Controllers\Company;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Poster;
use App\Models\Country;
use App\Models\EternityPages;

class CreatPosterController extends Controller
{
    public function Image(){
        $manager=new ImageManager(new Driver());
         return $manager;
     
     }// end method


    public function steps(Request $request) 
    { 
        $user = auth()->user();
        $countries = Country::all();
        if($user->posters->count() > $user->eternityPages->count()){
           $poster = $user->posters()->latest()->first();
            return view('company.create_poster.step_3',compact('countries','poster'));
        }
        if($user->donationHistories->count() > $user->posters->count()){
            return view('company.create_poster.step_2',compact('countries'));
        }
        return view('company.create_poster.step_1');
    }// end method

    public function store(Request $request){
        $user = auth()->user();
        if($user){
          $poster = $user->posters()->create($request->all());
        //   dd($request);
          if($request->company_logo1){
                $quality = 200; 
                $imagePath=public_path("/avatar/poster");
                if (File::exists($imagePath))
                {
                    $manager = $this->Image();
                    $image = $manager->read($request->company_logo1);
                    $imageName='avatar/poster/'.time()+1 .'.jpg';
                    $poster->update(['company_logo'=>$imageName]);
                    $image->save($imageName,$quality);  
                }
          }
           return redirect()->route('company.step_1');
        }
    }

    public function create_enyty_page(Request $request){
        $user = auth()->user();
        if($user){
            $eternityPages = $user->eternityPages()->create($request->all());
            if(!empty($eternityPages->id)){
                $slug= $request->fristName.$request->last_name.$eternityPages->id;
                  
                $QrPath=  $this->generateQRCode(config('app.url')."commemoration/".$slug);
                $eternityPages->update(['slug'=>$slug,'QrPath'=>$QrPath]);
                if ($request->profile_picture3) {
                   $imageName = $this->profile_picture_store($request->profile_picture3);
                   $eternityPages->update(['profile_picture'=>$imageName]);
                }

                if ($request->additional_picture_stor) {
                   $result = $this->additional_picture_store($request->additional_picture_stor);
                   $eternityPages->update(['additional_picture'=>$result]);
                }
            }
            return redirect()->route('company.step_4',$eternityPages->id)->with(['success',"seccessfull"]);
        }
    }

    public function step_4(Request $request,$id){
      $user = EternityPages::find($request->slug);
      $states = $user->country ? $user->country->states : null;
      $cities = $user->state ? $user->state->cities : null;
      if($user){
        $success = $request->session()->get('success') ?? null;
        return view('company.create_poster.step_4',compact('user','success'));
      }
      return redirect()->route('company.step_1');
    }

    public function profile_picture_store($image){
        $imagePath = public_path("/avatar/profile_picture");
        if (File::exists($imagePath)) {
            $quality = 200; 
            $manager = $this->Image();
            $image = $manager->read($image); 
            $imageName = 'avatar/profile_picture/' . time() . '1.jpg'; 
            $image->save(public_path($imageName,$quality)); 
            return $imageName;
        }
    }

    public function additional_picture_store($images){
        $save_img = array();
        $i = 1;
        foreach ($images as $value) {
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
        return $res = json_encode($save_img, true);
    }

    public function generateQRCode($url){
        $time = time();
       QrCode::size(300)
            ->format('png') 
            ->color(77,127,156)
            ->generate($url, public_path('qrcodes/' . $time . '.png'));
        $path =  $time;
        return $path;
    }

    public function downloadQRCode($pageName)
    {
        $filePath = public_path("/qrcodes/{$pageName}.png");
        if (file_exists($filePath)) {
            $headers = [
                'Content-Type' => 'image/png',
            ];
            return Response::download($filePath, "{$pageName}.png", $headers);
        } else {
            return redirect()->back()->with('error', 'QR Code image not found.');
        }
    }
}

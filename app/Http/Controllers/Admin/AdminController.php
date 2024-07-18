<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Hash;
use DataTables;
class AdminController extends Controller
{
    public function index(){
        return view('pages.admin.dashboard');
    }// end method
    
    public function getUsers(Request $request){
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function(User $user){
                    $actionBtn ='
                                <button type="submit" class="edit btn btn-primary btn-sm" 
                                onclick=editUser('.$user->id.');>Edit</button>
                                 <form class="d-inline-block" id="delete-form-'.$user->id.'" action="'.route('admin.user_delete').'"
                                method="POST">
                                 <input type="hidden" name="_token" value="'.csrf_token().'" /> 
                                  <input type="hidden" name="_method" value="DELETE" />
                                  <input type="hidden" name="user_id" value="'.$user->id.'" />
                                  <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm("Are you sure?")">Delete</button>
                                </form>
                              ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }// end method
    
    public function addUser(Request $request){
        
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->email);
        $user->email = $request->email;
        $current_time=Carbon::now();
        $user->created_at=$current_time;
        $user->updated_at=$current_time;
        $user->remember_token = Str::random(60);
        if($request->role=='admin'){
        $user->role_id= 1;
        }else{
        $user->role_id= 2;
        }
        if($request->mark_email_as_verified){
                $user->email_verified_at=$current_time;
        }

        $user->save();
        
        // send details to Registerd email
        if($request->send_email){
            
        }
        return back();
        
    }// end method
    
    public function editUser(Request $request,$id){
        dd('Edit User');

      $user=User::find($id);
      dd($user);
        
    }// end method
    public function deleteUser(Request $request){
        User::where('id',$request->user_id)->delete();
        return back();
        
    }// end method
    public function restoreUser(Request $request){
        dd('restore User');
        return back();
        
    }// end method

    public function getUserById(Request $request){
        $user=(object)User::find($request->id);
        return $user;
    }// end method
    
}// end class
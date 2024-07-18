<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\Models\EternityPages;
use App\Helpers\ModelUtility;

class ClientsController extends Controller
{
    public function clients(Request $request){
        $user = Auth::user();
        $companyUser = $user->posters->first();
        $user = $user->EternityPages->first();
        if ($request->ajax()) {
            $query = EternityPages::query();

            $params = $request->all();
            $query = ModelUtility::generateQuery($query, $params);
    
            $users = $query->where('user_id', Auth::user()->id)->get();
        //    dd($users);
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('name', function ($row) {
                    $name = '<span class="test">' . $row->frist_name . ' ' . $row->last_name . '</span>';
                    return $name;
                })
                ->addColumn('creation_at', function ($row) {
                    $created_at = date('d/m/Y', strtotime($row->created_at));
                    return $created_at;
                })
                ->addColumn('commemoration_page', function ($row) {
                    $packages = 'Created';
                    return $packages;
                })
                ->addColumn('qr', function ($row) {
                    $packages = '<a href="download-qrcode/' . $row->QrPath . '" class="text-black fw-bold">Download</a>';
                    return $packages;
                })
                ->addColumn('poster', function ($row) {
                    return 'Created';
                })
                ->addColumn('edit', function ($row) {
                    $editBtn = '<div class="accorfing'.$row->id.'">
                                    <i class="fa fa-edit img-fluid cursor-pointer icon-class editBtn'.$row->id.'" onclick="newUserData('.$row->id.')"></i>
                                </div>';
                    return $editBtn;
                })
                ->rawColumns(['edit', 'name', 'creation_at', 'poster', 'commemoration_page', 'qr'])
                ->make(true);
        }
        
        return view('company.clients.index',compact('user','companyUser'));
    }

    public function fetch_user_data(Request $request){
        $user = EternityPages::find($request->userId);
        $poster = $user->poster;
        return view('partials.userAndCopnayPos', ['user' => $user, 'poster' => $poster])->render();
    }
}

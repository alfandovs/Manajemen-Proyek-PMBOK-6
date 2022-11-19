<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $users = User::where('id', Auth::user()->id)->first();
        // echo Auth::user()->id;
        // dd($users['edit']);
        return view('editprofil', [
            'data' => $users,
            
        ]);
    }

    public function password_update(Request $request)
    {  
        $users = User::find($request->id);
        $users->password = bcrypt($request->password);
        $users->save();

        return redirect('editprofil')->with('sukses', 'Password Berhasil Diubah');
        // return view('editprofil');
        
        // $status = [
        //     'status' => 'info',
        //     'msg' => 'Password berhasil di diubah'
        // ];
        
        // if($request->own == "false"){
        //     return redirect()->route('sales.index')->with( $status );
        // }else{
        // }
    }

    // public function create($id)
    // {
    //     $data['id'] = $id;
    //     $data['users'] = User::where('user_id', $id)->first();
    //     return view('editprofil', $data);
    // }
}

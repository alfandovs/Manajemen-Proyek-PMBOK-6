<?php

namespace App\Http\Controllers;


use App\Models\employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employes = employe::all();
        return view('manajer/karyawan', [
            'data' => $employes,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajer/karyawan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('employes')->insert([
            'name' => $request->name,
            'position' => $request->position,
            'skill' => $request->skill,
        ]);

        return redirect('/manajer/karyawan')->with('sukses', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = DB::table('employes')->where('id', $id)->first();
        echo json_encode($employe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = DB::table('employes')->where('id', $id)->get();

        echo json_encode($employe);
        // $employes = employe::find($id);
        // // return view('/manajer/karyawan', compact('employes'));
        // echo json_encode($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employe = DB::table('employes')->where('id', $id)->update([
            'name' => $request->name,
            'position' => $request->position,
            'skill' => $request->skill,
        ]);

        return redirect('manajer/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employes')
        ->where('id', $id)
        ->delete();
        return redirect('/manajer/karyawan')->with('success', 'Data berhasil dihapus!');
    }
}

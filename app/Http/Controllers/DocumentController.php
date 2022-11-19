<?php

namespace App\Http\Controllers;


use App\Models\document;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::all();
        $documents = DB::select("SELECT documents.*, projects.name AS project FROM documents, projects WHERE documents.project_id = projects.id");
        return view('manajer/dokumen', [
            'data' => $documents,
            'project' => $projects
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajer/dokumen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $file = $request->file('dokumen');
        $name = date('YmdHis').'_'.$file->getClientOriginalName();
     

        $target = 'assets/dokumen';
        $file->move($target,$name);

        DB::table('documents')->insert([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'file' => $name,
        ]);

        return redirect('/manajer/dokumen')->with('sukses', 'Dokumen Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\document  $document
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = DB::table('documents')->where('id', $id)->first();
        echo json_encode($document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\document  $document
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $employe = DB::table('employes')->where('id', $id)->get();

    //     echo json_encode($employe);
    //     // $employes = employe::find($id);
    //     // // return view('/manajer/karyawan', compact('employes'));
    //     // echo json_encode($id);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\document  $document
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $employe = DB::table('employes')->where('id', $id)->update([
    //         'name' => $request->name,
    //         'position' => $request->position,
    //         'skill' => $request->skill,
    //     ]);

    //     return redirect('manajer/karyawan');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('documents')
        ->where('id', $id)
        ->delete();
        return redirect('/manajer/dokumen')->with('success', 'Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Charter;
use App\Models\client;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CharterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charter = DB::select("SELECT charters.*, projects.name AS project FROM charters, projects WHERE charters.project_id = projects.id");
        $project = Project::all();
        return view('manajer/charter', [
            'charter' => $charter,
            'project' => $project,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajer/charter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('charters')->insert([
            'project_id' => $request->project_id,
            'asumsi' =>$request->asumsi,
            'batasan' => $request->batasan,
            'resiko' => $request->resiko,
            'kriteria' =>$request->kriteria,
        ]);

        return redirect('/manajer/charter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function exportpdf($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $cr = DB::table('charters')->where('project_id', $id)->Get();


        view()->share('data', $data);
        view()->share('cr', $cr);

        $pdf = PDF::loadview('pdf/charter')->setPaper('A4');
        return $pdf->download('projectcharter.pdf');
    }

    public function show(Charter $charter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function edit(Charter $charter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Charter $charter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charter  $charter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Charter $charter)
    {
        //
    }
}

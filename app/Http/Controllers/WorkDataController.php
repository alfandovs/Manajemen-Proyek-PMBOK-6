<?php

namespace App\Http\Controllers;

use App\Models\Workdata;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use PDF;

class WorkDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = DB::select("SELECT workdata.*, projects.name AS project FROM workdata, projects WHERE workdata.project_id = projects.id");
        $project = Project::all();
        return view('manajer/work-data', [
            'project' => $project,
            'work' => $work
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('workdata')->insert([
            'project_id' => $request->project_id,
            'estimate' =>$request->estimate,
            'planned' => $request->planned,
            'actual' => $request->actual,
        ]);

        return redirect('/manajer/work-data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workdata  $workdata
     * @return \Illuminate\Http\Response
     */
    public function show(Workdata $workdata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workdata  $workdata
     * @return \Illuminate\Http\Response
     */
    public function edit(Workdata $workdata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workdata  $workdata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workdata $workdata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workdata  $workdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workdata $workdata)
    {
        //
    }

    public function exportworkdata($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $work = DB::table('workdata')->where('project_id', $id)->Get();



        view()->share('work', $work);
        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/work-data')->setPaper('A4');
        return $pdf->download('ManageWorkData.pdf');
    }
}

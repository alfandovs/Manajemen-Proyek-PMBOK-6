<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use PDF;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work = DB::select("SELECT work.*, projects.name AS project FROM work, projects WHERE work.project_id = projects.id");
        $project = Project::all();
        return view('manajer/work', [
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
        return view('manajer/work');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('work')->insert([
            'project_id' => $request->project_id,
            'deliverables' =>$request->deliverables,
            'issue' => $request->issue,
            'change' => $request->change,
        ]);

        return redirect('/manajer/work');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }

    public function exportwork($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $cr = DB::table('work')->where('project_id', $id)->Get();

        view()->share('cr', $cr);
        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/work')->setPaper('A4');
        return $pdf->download('ManageWork.pdf');
    }

    public function exportproject()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');


        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/dokproject')->setPaper('A4');
        return $pdf->download('DokumenProject.pdf');
    }
}

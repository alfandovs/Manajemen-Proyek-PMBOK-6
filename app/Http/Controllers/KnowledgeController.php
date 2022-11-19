<?php

namespace App\Http\Controllers;

use App\Models\Knowledge;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        $knowledge = DB::select("SELECT knowledge.*, projects.name AS project FROM knowledge, projects WHERE knowledge.project_id = projects.id");
        return view('manajer/knowledge', [
            'knowledge' => $knowledge,
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
        return view('manajer/knowledge');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('knowledge')->insert([
            'project_id' => $request->project_id,
            'raised' =>$request->raised_date,
            'event' => $request->event,
            'early' => $request->early,
            'recomendation' =>$request->recomendation,
            'action' => $request->action,
            'status' => $request->status,
        ]);

        return redirect('/manajer/knowledge');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledge $knowledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledge $knowledge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledge $knowledge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knowledge  $knowledge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledge $knowledge)
    {
        //
    }

    public function exportlearned($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $kn = DB::table('knowledge')->where('project_id', $id)->Get();



        view()->share('kn', $kn);
        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/learned')->setPaper('A4');
        return $pdf->download('LeassonLearned.pdf');
    }

    public function exportplanupdate()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $know = DB::select("SELECT knowledge.*, projects.name AS project FROM knowledge, projects WHERE knowledge.project_id = projects.id");


        view()->share('data', $data);
        view()->share('know', $know);


        $pdf = PDF::loadview('pdf/planupdate')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate.pdf');
    }

    
}

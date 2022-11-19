<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use PDF;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issue = DB::select("SELECT issue.*, projects.name AS project FROM issue, projects WHERE issue.project_id = projects.id");
        $project = Project::all();
        return view('manajer/issue', [
            'project' => $project,
            'issue' => $issue
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajer/issue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('issue')->insert([
            'project_id' => $request->project_id,
            'issue' =>$request->issue,
            'report' => $request->report_date,
            'reportby' => $request->reportby,
            'priority' => $request->priority,
            'status' => $request->status,

        ]);

        return redirect('/manajer/issue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }

    public function exportissue($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $issue = DB::table('issue')->where('project_id', $id)->Get();



        view()->share('issue', $issue);
        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/issue')->setPaper('A4');
        return $pdf->download('IssueLog.pdf');
    }
}

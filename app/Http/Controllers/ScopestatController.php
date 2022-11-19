<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Project;

class ScopestatController extends Controller
{
    public function index()
    {
        $stat = DB::select("SELECT scopestat.*, projects.name AS project FROM scopestat, projects WHERE scopestat.project_id = projects.id");
        $project = Project::all();
        return view('manajer/scopestat', [
            'project' => $project,
            'stat' => $stat
        ]);
    }

    public function create()
    {
        return view('manajer/scopestat');
    }

    public function store(Request $request)
    {
        DB::table('scopestat')->insert([
            'project_id' => $request->project_id,
            'description' =>$request->description,
            'deliverables' => $request->deliverables,
            'criteria' => $request->criteria,
            'constrain' => $request->constrain,

        ]);

        return redirect('/manajer/scopestat');
    }

    public function exportstat($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $cr = DB::table('scopestat')->where('project_id', $id)->Get();

        view()->share('cr', $cr);
        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/scopestat')->setPaper('A4');
        return $pdf->download('ScopeStatement.pdf');
    }

    public function exportproject3()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $state = DB::select("SELECT scopestat.*, projects.name AS project FROM scopestat, projects WHERE scopestat.project_id = projects.id");


        view()->share('data', $data);
        view()->share('state', $state);


        $pdf = PDF::loadview('pdf/dokproject3')->setPaper('A4');
        return $pdf->download('DokumenProject.pdf');
    }
}

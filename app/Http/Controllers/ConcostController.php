<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workdata;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use PDF;

class ConcostController extends Controller
{
    public function index()
    {
        $cost = DB::select("SELECT concost.*, projects.name AS project FROM concost, projects WHERE concost.project_id = projects.id");
        $projects = Project::all();
        return view('manajer/con-cost', [
            'cost' => $cost,
            'project' => $projects
        ]);
    }

    public function store(Request $request)
    {
        DB::table('concost')->insert([
            'project_id' => $request->project_id,
            'variance' =>$request->variance,
            'index' => $request->index,

        ]);

        return redirect('/manajer/con-cost');
    }

    public function exportcost($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $work = DB::table('workdata')->where('project_id', $id)->Get();
        $sc = DB::table('conscope')->where('project_id', $id)->Get();
        $cs = DB::table('concost')->where('project_id', $id)->Get();




        view()->share('work', $work);
        view()->share('data', $data);
        view()->share('sc', $sc);
        view()->share('cs', $cs);



        $pdf = PDF::loadview('pdf/concost')->setPaper('A4');
        return $pdf->download('WorkDataCost.pdf');
    }

    
    public function exportplanupdate6()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $know = DB::select("SELECT knowledge.*, projects.name AS project FROM knowledge, projects WHERE knowledge.project_id = projects.id");


        view()->share('data', $data);
        view()->share('know', $know);


        $pdf = PDF::loadview('pdf/planupdate6')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate.pdf');
    }
}

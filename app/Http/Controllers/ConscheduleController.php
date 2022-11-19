<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use PDF;

class ConscheduleController extends Controller
{
    public function index()
    {
        $sch = DB::select("SELECT conschedule.*, projects.name AS project FROM conschedule, projects WHERE conschedule.project_id = projects.id");
        $projects = Project::all();
        return view('manajer/con-schedule', [
            'sch' => $sch,
            'project' => $projects
        ]);
    }

    public function store(Request $request)
    {
        DB::table('conschedule')->insert([
            'project_id' => $request->project_id,
            'scvariance' =>$request->scvariance,
            'scindex' => $request->scindex,

        ]);

        return redirect('/manajer/con-schedule');
    }

    public function exportschedule($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $work = DB::table('workdata')->where('project_id', $id)->Get();
        $sc = DB::table('conscope')->where('project_id', $id)->Get();
        $cs = DB::table('concost')->where('project_id', $id)->Get();
        $sch = DB::table('conschedule')->where('project_id', $id)->Get();

        view()->share('work', $work);
        view()->share('data', $data);
        view()->share('sc', $sc);
        view()->share('cs', $cs);
        view()->share('sch', $sch);


        $pdf = PDF::loadview('pdf/conschedule')->setPaper('A4');
        return $pdf->download('WorkDataSchedule.pdf');
    }

    public function exportplanupdate8()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $know = DB::select("SELECT knowledge.*, projects.name AS project FROM knowledge, projects WHERE knowledge.project_id = projects.id");


        view()->share('data', $data);
        view()->share('know', $know);


        $pdf = PDF::loadview('pdf/planupdate8')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate.pdf');
    }
}

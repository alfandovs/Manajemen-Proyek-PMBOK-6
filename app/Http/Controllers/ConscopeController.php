<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workdata;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use PDF;


class ConscopeController extends Controller
{
    public function index()
    {
        $scope = DB::select("SELECT conscope.*, projects.name AS project FROM conscope, projects WHERE conscope.project_id = projects.id");
        $projects = Project::all();
        return view('manajer/con-scope', [
            'scope' => $scope,
            'project' => $projects
        ]);
    }

    public function store(Request $request)
    {
        DB::table('conscope')->insert([
            'project_id' => $request->project_id,
            'task' =>$request->task,
            'complete' => $request->complete,
            'spent' => $request->spent,
        ]);

        return redirect('/manajer/con-scope');
    }

    public function exportscope($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $work = DB::table('workdata')->where('project_id', $id)->Get();
        $sc = DB::table('conscope')->where('project_id', $id)->Get();


        view()->share('work', $work);
        view()->share('data', $data);
        view()->share('sc', $sc);


        $pdf = PDF::loadview('pdf/conscope')->setPaper('A4');
        return $pdf->download('WorkDataScope.pdf');
    }

    public function exportplanupdate5()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $know = DB::select("SELECT knowledge.*, projects.name AS project FROM knowledge, projects WHERE knowledge.project_id = projects.id");


        view()->share('data', $data);
        view()->share('know', $know);


        $pdf = PDF::loadview('pdf/planupdate5')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate2.pdf');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\dashboardmain;
use App\Models\Project;
use App\Models\progress;
use App\Models\client;
use App\Models\employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use PDF;

class DashboardmainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () 
    {
        return view('dashboardmain');
    }

    public function run()
    {
        $p = Project::all();
        return view('/projectall', [
            'data' => $p,
            
        ]);

    }

    public function close()
    {
        $p = Project::all();
        return view('/progressall', [
            'data' => $p,
            
        ]);
    }

    public function show($id)
    {
        $progress = DB::table('progress')->where('project_id', $id)->get();
        return view('/progress', [
            'data' => $progress,
        ]);
    }
    
    public function klien()
    {
        $k = client::all();
        return view('/klienall', [
            'data' => $k,
            
        ]);
    }

    public function employee()
    {
        $e = employe::all();
        return view('/employeeall', [
            'data' => $e,
            
        ]);

    }

    public function grafik()
    {
        $grafik = Project::select(DB::raw("COUNT(*) as total_project"), DB::raw("Month(start) as month"))
        ->GroupBy(DB::raw("Month(start)"))
        ->get();
        
        echo json_encode($grafik);
    }

    public function edit($id)
    {
        $data['id'] = $id;
        $data['projects'] = Project::where('id', $id)->first();
        return view('/progress-saran', $data);
    }

    public function update(Request $request)
    {
         
        $project = DB::table('projects')->where('id', $request->id)->update([
            'saran' => $request->saran,

        ]);

        return redirect('/progress/edit/'.$request->id);
    }

    public function exportplanupdate2()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $know = DB::select("SELECT knowledge.*, projects.name AS project FROM knowledge, projects WHERE knowledge.project_id = projects.id");


        view()->share('data', $data);
        view()->share('know', $know);


        $pdf = PDF::loadview('pdf/planupdate2')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate2.pdf');
    }
}

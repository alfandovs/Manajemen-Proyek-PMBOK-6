<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use PDF;

use Illuminate\Http\Request;

class CloseController extends Controller
{
    public function index()
    {
        $projects = DB::select('SELECT projects.*, (SELECT SUM(biaya) FROM gancharts WHERE gancharts.project_id = projects.id) AS cost, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $employes = DB::select('SELECT employes.name, employes.id, (SELECT count(*) FROM projects WHERE projects.employe_id = employes.id AND projects.status = "Run") as active_project FROM employes WHERE skill = "Programmer" ');
        return view('manajer/close', [
            'data' => $projects,
            'employe' => $employes,
        ]);

    }

    public function edit($id)
    {
        $project = DB::table('projects')->where('id', $id)->get();

        echo json_encode($project);
    }

    public function update(Request $request, $id)
    {
        
        $get = DB::table('projects')->where('id', $id)->first();

        $employe = DB::table('projects')->where('id', $id)->update([
            'status' => $request->status,
        ]);

        return redirect('/manajer/close');
    }

    public function exportclose($id)
    {
        
        $data = DB::table('projects')->where('id', $id)->Get();
        $td = DB::select('SELECT projects.*, clients.name AS client FROM projects, clients WHERE projects.client_id = clients.id AND projects.id = '.$id);
        $gn = DB::table('gancharts')->where('project_id', $id)->Get();

        view()->share('data', $data);
        view()->share('td', $td);
        view()->share('gn', $gn);
        $pdf = PDF::loadview('pdf/exportclose')->setPaper('A4');
        return $pdf->download('ProjectFinal.pdf');
    }

    public function exportproject2()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');


        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/dokproject2')->setPaper('A4');
        return $pdf->download('DokumenProject.pdf');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Project;
use App\Models\ganchart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $gancharts = ganchart::all();
        return view('manajer/cost', [
            'data' => $gancharts,
            'project' => $projects

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportcost($id)
    {
        
        $pro = DB::table('gancharts')->where('project_id', $id)->Get();
        

        view()->share('pro', $pro);

        $pdf = PDF::loadview('pdf/cost')->setPaper('A4');
        return $pdf->download('ProjectCost.pdf');
    }

    public function exportcostplan()
    {
        
        $pro = DB::table('projects')->Get();
        

        view()->share('pro', $pro);

        $pdf = PDF::loadview('pdf/plancost')->setPaper('A4');
        return $pdf->download('ManagementCost.pdf');
    }

    public function exportproject5()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');


        view()->share('data', $data);


        $pdf = PDF::loadview('pdf/dokproject5')->setPaper('A4');
        return $pdf->download('DokumenProject.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Scope;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;


class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::select('SELECT projects.*,(SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        return view('manajer/scope',[
            'data' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajer/scope');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('scope')->insert([
            'project_id' => $request->project_id,
            'requiremens' =>$request->requiremens,
            'categories' => $request->categories,
            'prioriti' => $request->prioriti,
            'treacebility' =>$request->treacebility,
        ]);

        return redirect('/manajer/scope');
    }

    public function exportscope2($id)
    {
        
        $pro = DB::select('SELECT scope.*, projects.name AS project FROM scope, projects WHERE scope.project_id = projects.id AND projects.id = '.$id);
        // $pro = DB::table('scope')->where('project_id', $id)->Get();

        view()->share('pro', $pro);

        $pdf = PDF::loadview('pdf/planscope')->setPaper('A4');
        return $pdf->download('ScopeRequirement.pdf');
    }
}

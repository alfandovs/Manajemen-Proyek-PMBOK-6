<?php

namespace App\Http\Controllers;

use App\Models\Planstakeholder;
use Illuminate\Http\Request;
use App\Models\client;
use Illuminate\Support\Facades\DB;
use PDF;


class PlanstakeholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = client::all();
        $plan = DB::select("SELECT planstakeholder.*, clients.name AS client FROM planstakeholder, clients WHERE planstakeholder.client_id = clients.id");

        return view('manajer/planstakeholder', [
            'client' => $clients,
            'plan' => $plan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manajer/planstakeholder');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('planstakeholder')->insert([
            'client_id' => $request->client_id,
            'type' =>$request->type,
            'level' => $request->level,
            'ability' => $request->ability,
            'detail' =>$request->detail,
        ]);

        return redirect('/manajer/planstakeholder');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planstakeholder  $planstakeholder
     * @return \Illuminate\Http\Response
     */
    public function show(Planstakeholder $planstakeholder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planstakeholder  $planstakeholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Planstakeholder $planstakeholder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planstakeholder  $planstakeholder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planstakeholder $planstakeholder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planstakeholder  $planstakeholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planstakeholder $planstakeholder)
    {
        //
    }

    public function exportstake($id)
    {
        
        $data = DB::select("SELECT planstakeholder.*, clients.name AS client FROM planstakeholder, clients WHERE planstakeholder.client_id = clients.id");

        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/planstakeholder')->setPaper('A4');
        return $pdf->download('PlanStakeholder.pdf');
    }

    public function exportplanupdate7()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $stake = DB::select("SELECT planstakeholder.*, clients.name AS client FROM planstakeholder, clients WHERE planstakeholder.client_id = clients.id");


        view()->share('data', $data);
        view()->share('stake', $stake);


        $pdf = PDF::loadview('pdf/planupdate7')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ganchart;
use App\Models\Project;
use App\Models\Link;
use App\Http\Requests\StoreganchartRequest;
use App\Http\Requests\UpdateganchartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class GanchartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $gancharts = ganchart::all();
        return view('manajer/ganchart', [
            'data' => $gancharts,
            'project' => $projects

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // return view('manajer/ganchart-create');
        $data['id'] = $id;
        $data['gancharts'] = Ganchart::where('project_id', $id)->get();
        return view('manajer/ganchart-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreganchartRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $lama = Ganchart::where('project_id', $request->project_id)->get();
        $biaya_lama = 0;
        foreach ($lama as $val) {
            $biaya_lama += $val->biaya;
        }

        $getproject = DB::table('projects')->where('id', $request->project_id)->first();
        DB::table('project_update')->insert([
            'project_id' => $request->project_id,
            'name' => $getproject->name,
            'start' => $getproject->start,
            'end' => $getproject->end,
            'biaya' => $biaya_lama,
        ]);

        Ganchart::where('project_id', $request->project_id)->delete();
        $count = $request->count;
        $cost = 0;
        for ($i = 1; $i <= $count; $i++) {
            
          
            if ($request['kegiatan' . $i] != null) {
                $cost += $request['biaya' . $i];

                $ganchart = new Ganchart();
                $ganchart->kegiatan = $request['kegiatan' . $i];
                $ganchart->start = $request['start_date' . $i];
                $ganchart->end = $request['end_date' . $i];
                $ganchart->biaya = $request['biaya' . $i];
                $ganchart->project_id = $request->project_id;
                $ganchart->save();

                DB::table('projects')->where('id', $request->project_id)->update([
                    'biaya' => $cost,
                ]);

            }
        }

        return redirect('manajer/ganchart/create/'.$request->project_id)->with('sukses', 'Jadwal Berhasil Ditambah');

    }

    public function chart($id)
    {
        $gancharts = ganchart::where('project_id', $id)->get();
        return view('manajer/chart', [
            'data' => $gancharts

        ]);
    }

    public function exportschedule2($id)
    {
        
        $pro = DB::table('gancharts')->where('project_id', $id)->Get();
        

        view()->share('pro', $pro);

        $pdf = PDF::loadview('pdf/schedule')->setPaper('A4');
        return $pdf->download('ProjectSchedule.pdf');
    }

    public function exportscheduleplan()
    {
        
        $pro = DB::table('projects')->Get();
        

        view()->share('pro', $pro);

        $pdf = PDF::loadview('pdf/planschedule')->setPaper('A4');
        return $pdf->download('ManagementSchedule.pdf');
    }

    public function exportproject4()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');


        view()->share('data', $data);


        $pdf = PDF::loadview('pdf/dokproject4')->setPaper('A4');
        return $pdf->download('DokumenProject.pdf');
    }
}

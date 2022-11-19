<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\employe;
use App\Models\client;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProjectRequest;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\DB;
use PDF;

class ProjectController extends Controller
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
        $projects = DB::select('SELECT projects.*, (SELECT SUM(biaya) FROM gancharts WHERE gancharts.project_id = projects.id) AS cost, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $employes = DB::select('SELECT employes.name, employes.id, (SELECT count(*) FROM projects WHERE projects.employe_id = employes.id AND projects.status = "Run") as active_project FROM employes WHERE skill = "Programmer" ');
        $clients = client::all();
        return view('manajer/project', [
            'data' => $projects,
            'employe' => $employes,
            'client' => $clients,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = Employe::all(); 
        return view('manajer/project', compact('employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro = DB::table('projects')->insertGetId([
            'employe_id' => $request->employe_id,
            'client_id' => $request->client_id,
            'name' => $request->name,
            'start' => $request->start_date,
            'end' => $request->end_date,
            'biaya' => 0,
            'tujuan' => $request->tujuan,
            'deskripsi' => $request->deskripsi,
            // 'status' => $request->status,
        ]);
        // DB::table('progress')->insert([
        //     'project_id' => $pro,
        //     'date' => '2022-01-01',
        //     'file' => '',
        //     'progress' => '-',
        //     'saran' => '',
        //     'status' => 'run'
        // ]);

        return redirect('/manajer/project')->with('sukses', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = DB::table('projects')->where('id', $id)->first();
        echo json_encode($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = DB::table('projects')->where('id', $id)->get();

        echo json_encode($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $get = DB::table('projects')->where('id', $id)->first();

        // DB::table('projects_update')->insert([
        //     'project_id' => $get->id,
        //     'employe_id' => $get->employe_id,
        //     'client_id' => $get->client_id,
        //     'name' => $get->name,
        //     'start' => $get->start_date,
        //     'end' => $get->end_date,
        //     'biaya' => $get->biaya,
        //     'tujuan' => $get->tujuan,
        //     'deskripsi' => $get->deskripsi,
        //     'status' => $get->status,
        // ]);

        $employe = DB::table('projects')->where('id', $id)->update([
            'employe_id' => $request->employe_id,
            'client_id' => $request->client_id,
            'name' => $request->name,
            'start' => $request->start_date,
            'end' => $request->end_date,
            'biaya' => $request->biaya,
            'tujuan' => $request->tujuan,
            'deskripsi' => $request->deskripsi,
            // 'status' => $request->status,
        ]);

        return redirect('/manajer/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('projects')
        ->where('id', $id)
        ->delete();
        return redirect('/manajer/project')->with('success', 'Data berhasil dihapus!');
    }

    public function exportplan($id)
    {
        
        $data = DB::table('project_update')->where('project_id', $id)->Get();
        $td = DB::select('SELECT projects.*, clients.name AS client FROM projects, clients WHERE projects.client_id = clients.id AND projects.id = '.$id);
        $gn = DB::table('gancharts')->where('project_id', $id)->Get();

        view()->share('data', $data);
        view()->share('td', $td);
        view()->share('gn', $gn);
        $pdf = PDF::loadview('manajer/projectcharter-pdf')->setPaper('A4');
        return $pdf->download('projectplan.pdf');
    }

    public function grafik()
    {

        $projects = Project::all();
        // $totalproject = Project::select(DB::raw("CAST(SUM(totalproject) as int) as totalproject"))
        // ->GroupBy(DB::raw("Month(start)"))
        // ->pluck('totalproject');

        // dd($totalproject);

        // $bulan = Project::select(DB::raw("MONTHNAME(start) as bulan"))
        // ->GroupBy(DB::raw("Month(start)"))
        // ->pluck('bulan');

        // return view('dashboardmain', compact('total_project','bulan'));

        // $categories = [];

        // foreach ($projects as $pr){
        //     $categories[] = $pr->start->Mounth;
        // }

        // dd($categories);

        // return view('dashboardmain');

        $Pdata = Project::select(DB::raw("COUNT(*) as count"))
        ->whereYear('start', date('Y'))
        ->groupBy(DB::raw("Month(start)"))
        ->pluck('count');

        // dd($Pdata);

        return view('/dashboardmain', compact('Pdata'));

    }

    public function history($id)
    {
        $data = DB::table('project_update')->where('project_id', $id)->Get();
        return view('/manajer/history', compact('data'));
    }

    public function str(Request $request)
    {
        $str = DB::table('project_update')->insertGetId([
            'deskripsi' => $request->deskripsi,
        ]);
    }
}

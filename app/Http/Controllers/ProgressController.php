<?php

namespace App\Http\Controllers;

use App\Models\progress;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreprogressRequest;
use App\Http\Requests\UpdateprogressRequest;
use PDF;

class ProgressController extends Controller
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
        $progress = progress::all();
        return view('manajer/progress', [

            'data' => $progress,
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
        $data['id'] = $id;
        $data['progress'] = progress::where('project_id', $id)->first();
        return view('manajer/progress-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprogressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('picture');
        $name = date('YmdHis').'_'.$file->getClientOriginalName();
     

        $target = 'assets/picture';
        $file->move($target,$name);

        DB::table('progress')->where('id', $request->id)->insert([
            'project_id' => $request->project_id,
            'date' => $request->progress_date,
            'file' =>$name,
            'progress' => $request->progress,
            'status' => $request->status
        ]);

        return redirect('/manajer/progress/create/'.$request->project_id)->with('sukses', 'Data Berhasil Diupdate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\progress  $progress
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $progress = DB::table('progress')->where('project_id', $id)->get();
        return view('manajer/progresshistory', [
            'data' => $progress,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprogressRequest  $request
     * @param  \App\Models\progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprogressRequest $request, progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('progress')
        ->where('id', $id)
        ->delete();
        return redirect('/manajer/progresshistory/'.$id);
    }

    public function exportplanupdate3()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $know = DB::select("SELECT workdata.*, projects.name AS project FROM workdata, projects WHERE workdata.project_id = projects.id");


        view()->share('data', $data);
        view()->share('know', $know);


        $pdf = PDF::loadview('pdf/planupdate3')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate3.pdf');
    }
}

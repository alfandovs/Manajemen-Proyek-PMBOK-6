<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use Illuminate\Support\Facades\DB;
use PDF;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index () 
    {
        $clients = client::all();
        return view('manajer/klien', [
            'data' => $clients,
            
        ]);
    }

    public function create()
    {
        return view('manajer/klien');
    }

    public function store(Request $request)
    {
        DB::table('clients')->insert([
            'name' => $request->name,
            'addres' => $request->addres,
            'phone' => $request->phone,
        ]);

        return redirect('/manajer/klien')->with('sukses', 'Data Berhasil Ditambah');
    }

    public function show($id)
    {
        $clients = DB::table('clients')->where('id', $id)->first();
        echo json_encode($clients);
    }

    public function edit($id)
    {
        $clients = DB::table('clients')->where('id', $id)->get();

        echo json_encode($clients);
    }

    public function update(Request $request, $id)
    {
        $client = DB::table('clients')->where('id', $id)->update([
            'name' => $request->name,
            'addres' => $request->addres,
            'phone' => $request->phone,
        ]);

        return redirect('manajer/klien');
    }

    public function destroy($id)
    {
        DB::table('clients')
        ->where('id', $id)
        ->delete();
        return redirect('/manajer/klien')->with('success', 'Data berhasil dihapus!');
    }

    public function exportpdf()
    {
        $data = DB::table('clients')->Get();

        view()->share('data', $data);

        $pdf = PDF::loadview('pdf/register')->setPaper('A4');
        return $pdf->download('StakeholderRegister.pdf');
    }

    public function exportpdf2()
    {
        
        $pro = DB::select('SELECT projects.*, clients.name AS client FROM projects, clients WHERE projects.client_id = clients.id');

        view()->share('pro', $pro);

        $pdf = PDF::loadview('pdf/change')->setPaper('A4');
        return $pdf->download('StakeholderRegister.pdf');
    }

    public function exportplanupdate4()
    {
        
        $data = DB::select('SELECT projects.*, (SELECT name FROM clients WHERE clients.id = projects.client_id) AS client, (SELECT name FROM employes WHERE employes.id = projects.employe_id) AS employe FROM projects');
        $know = DB::select("SELECT knowledge.*, projects.name AS project FROM knowledge, projects WHERE knowledge.project_id = projects.id");


        view()->share('data', $data);
        view()->share('know', $know);


        $pdf = PDF::loadview('pdf/planupdate4')->setPaper('A4');
        return $pdf->download('ProjectPlanUpdate.pdf');
    }

}

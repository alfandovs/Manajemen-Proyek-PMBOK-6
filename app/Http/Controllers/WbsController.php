<?php

namespace App\Http\Controllers;

use App\Models\employe;
use Illuminate\Http\Request;

class WbsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index ()
    {
        $employes = employe::all();
        return view('manajer/wbs', [
            'data' => $employes
        ]);
        
    }
}

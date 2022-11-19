<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\progress;

class StakeholderController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $progress = progress::all();
        return view('manajer/stakeholder', [

            'data' => $progress,
            'project' => $projects
        ]);
    }
}

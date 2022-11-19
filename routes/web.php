<?php

use App\Http\Controllers\EmployeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardmainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WbsController;
use App\Http\Controllers\GanchartController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\EditProfilController;
use App\Http\Controllers\CharterController;
use App\Http\Controllers\ScopeController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\CloseController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\WorkDataController;
use App\Http\Controllers\ConscopeController;
use App\Http\Controllers\ConscheduleController;
use App\Http\Controllers\ConcostController;
use App\Http\Controllers\PlanstakeholderController;
use App\Http\Controllers\StakeholderController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ScopestatController;




use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home');
});

Route::get('/login/index', [LoginController::class, 'index'])->name('login');
Route::post('/login/index', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboardmain', [DashboardmainController::class, 'index']);
Route::get('/projectall', [DashboardmainController::class, 'run']);
Route::get('/progressall', [DashboardmainController::class, 'close']);
Route::get('/klienall', [DashboardmainController::class, 'klien']);
Route::get('/employeeall', [DashboardmainController::class, 'employee']);
Route::get('/dashboardmain/grafik', [DashboardmainController::class, 'grafik']);
Route::get('/progress/{id}', [DashboardmainController::class, 'show']);
Route::get('/progress/edit/{id}', [DashboardmainController::class, 'edit']);
Route::post('/progress/update', [DashboardmainController::class, 'update']);
Route::get('/exportplanupdate2', [DashboardmainController::class, 'exportplanupdate2']);



Route::get('/manajer/klien', [ClientController::class, 'index']);
Route::post('/manajer/klien', [ClientController::class, 'store']);
Route::get('/manajer/klien/{id}', [ClientController::class, 'show']);
Route::get('/manajer/klien/edit', [ClientController::class, 'edit']);
Route::patch('/manajer/klien/{id}', [ClientController::class, 'update']);
Route::delete('/manajer/klien/{id}', [ClientController::class, 'destroy']);
Route::get('/exportpdf', [ClientController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportpdf2', [ClientController::class, 'exportpdf2'])->name('exportpdf2');
Route::get('/exportplanupdate4', [ClientController::class, 'exportplanupdate4']);



Route::get('/manajer/project', [ProjectController::class, 'index']);
Route::post('/manajer/project', [ProjectController::class, 'store']);
Route::get('/manajer/project/{id}', [ProjectController::class, 'show']);
Route::get('/manajer/project/edit', [ProjectController::class, 'edit']);
Route::patch('/manajer/project/{id}', [ProjectController::class, 'update']);
Route::delete('/manajer/project/{id}', [ProjectController::class, 'destroy']);
Route::get('/manajer/history/{id}', [ProjectController::class, 'history']);
Route::post('/manajer/history', [ProjectController::class, 'str']);


// pdf
Route::get('/exportplan/{id}', [ProjectController::class, 'exportplan'])->name('exportplan');
//grafik
// Route::get('/dashboardmain', [ProjectController::class, 'grafik']);

Route::get('/manajer/wbs', [WbsController::class, 'index']);

Route::get('/manajer/karyawan', [EmployeController::class, 'index']);
Route::post('/manajer/karyawan', [EmployeController::class, 'store']);
Route::get('/manajer/karyawan/{id}', [EmployeController::class, 'show']);
Route::get('/manajer/karyawan/edit', [EmployeController::class, 'edit']);
Route::patch('/manajer/karyawan/{id}', [EmployeController::class, 'update']);
Route::delete('/manajer/karyawan/{id}', [EmployeController::class, 'destroy']);

Route::get('/manajer/dokumen', [DocumentController::class, 'index']);
Route::post('/manajer/dokumen', [DocumentController::class, 'store']);
Route::get('/manajer/dokumen/{id}', [DocumentController::class, 'show']);
Route::delete('/manajer/dokumen/{id}', [DocumentController::class, 'destroy']);

Route::get('/manajer/progress', [ProgressController::class, 'index']);
Route::get('/manajer/progresshistory/{id}', [ProgressController::class, 'show']);
Route::get('/manajer/progress/create/{id}', [ProgressController::class, 'create']);
Route::post('/manajer/progress/store', [ProgressController::class, 'store']);
Route::delete('/manajer/progresshistory/{id}', [ProgressController::class, 'destroy']);
Route::get('/exportplanupdate3', [ProgressController::class, 'exportplanupdate3']);


Route::get('/manajer/ganchart', [GanchartController::class, 'index']);
Route::get('/manajer/ganchart/create/{id}', [GanchartController::class, 'create']);
Route::post('/manajer/ganchart/store', [GanchartController::class, 'store']);
Route::get('/manajer/chart/{id}', [GanchartController::class, 'chart']);
Route::get('/exportschedule2/{id}', [GanchartController::class, 'exportschedule2']);
Route::get('/exportscheduleplan', [GanchartController::class, 'exportscheduleplan']);
Route::get('/exportproject4', [GanchartController::class, 'exportproject4']);



Route::get('/editprofil', [EditProfilController::class, 'index']);
Route::post('/editprofil', [EditProfilController::class, 'password_update']);

Route::get('/manajer/charter', [CharterController::class, 'index']);
Route::post('/manajer/charter', [CharterController::class, 'store']);
Route::get('/exportpdf/{id}', [CharterController::class, 'exportpdf'])->name('exportpdf');


Route::get('/manajer/scope', [ScopeController::class, 'index']);
Route::post('/manajer/scope', [ScopeController::class, 'store']);
Route::get('/exportscope2/{id}', [ScopeController::class, 'exportscope2']);


Route::get('/manajer/cost', [CostController::class, 'index']);
Route::get('/exportcost/{id}', [CostController::class, 'exportcost']);
Route::get('/exportcostplan', [CostController::class, 'exportcostplan']);
Route::get('/exportproject5', [CostController::class, 'exportproject5']);


Route::get('/manajer/work', [WorkController::class, 'index']);
Route::post('/manajer/work', [WorkController::class, 'store']);
Route::get('/exportwork/{id}', [WorkController::class, 'exportwork']);
Route::get('/exportproject', [WorkController::class, 'exportproject']);


Route::get('/manajer/knowledge', [KnowledgeController::class, 'index']);
Route::post('/manajer/knowledge', [KnowledgeController::class, 'store']);
Route::get('/exportlearned/{id}', [KnowledgeController::class, 'exportlearned']);
Route::get('/exportplanupdate', [KnowledgeController::class, 'exportplanupdate']);


Route::get('/manajer/close', [CloseController::class, 'index']);
Route::get('/exportclose/{id}', [CloseController::class, 'exportclose']);
Route::get('/exportproject2', [CloseController::class, 'exportproject2']);


Route::get('/manajer/change', [ChangeController::class, 'index']);
Route::get('/manajer/change/edit', [ChangeController::class, 'edit']);
Route::patch('/manajer/change/{id}', [ChangeController::class, 'update']);

Route::get('/manajer/work-data', [WorkDataController::class, 'index']);
Route::post('/manajer/work-data', [WorkDataController::class, 'store']);
Route::get('/exportworkdata/{id}', [WorkDataController::class, 'exportworkdata']);


Route::get('/manajer/con-scope', [ConscopeController::class, 'index']);
Route::post('/manajer/con-scope', [ConscopeController::class, 'store']);
Route::get('/exportscope/{id}', [ConscopeController::class, 'exportscope']);
Route::get('/exportplanupdate5', [ConscopeController::class, 'exportplanupdate5']);


Route::get('/manajer/con-schedule', [ConscheduleController::class, 'index']);
Route::post('/manajer/con-schedule', [ConscheduleController::class, 'store']);
Route::get('/exportschedule/{id}', [ConscheduleController::class, 'exportschedule']);
Route::get('/exportplanupdate8', [ConscheduleController::class, 'exportplanupdate8']);

Route::get('/manajer/con-cost', [ConcostController::class, 'index']);
Route::post('/manajer/con-cost', [ConcostController::class, 'store']);
Route::get('/exportcost/{id}', [ConcostController::class, 'exportcost']);
Route::get('/exportplanupdate6', [ConcostController::class, 'exportplanupdate6']);


Route::get('/manajer/planstakeholder', [PlanstakeholderController::class, 'index']);
Route::post('/manajer/planstakeholder', [PlanstakeholderController::class, 'store']);
Route::get('/exportstake/{id}', [PlanstakeholderController::class, 'exportstake']);
Route::get('/exportplanupdate7', [PlanstakeholderController::class, 'exportplanupdate7']);

Route::get('/manajer/stakeholder', [StakeholderController::class, 'index']);

Route::get('/manajer/issue', [IssueController::class, 'index']);
Route::post('/manajer/issue', [IssueController::class, 'store']);
Route::get('/exportissue/{id}', [IssueController::class, 'exportissue']);

Route::get('/manajer/scopestat', [ScopestatController::class, 'index']);
Route::post('/manajer/scopestat', [ScopestatController::class, 'store']);
Route::get('/exportstat/{id}', [ScopestatController::class, 'exportstat']);
Route::get('/exportproject3', [ScopestatController::class, 'exportproject3']);

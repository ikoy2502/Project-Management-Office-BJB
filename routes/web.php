<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductivityController; 
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\PriorityController; 
use App\Models\Category;
use App\Models\Task;
use App\Http\Controllers\ProjectOwnerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RevisionsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ExportPdfController;
use App\Exports\ProjectsExport;
use App\Http\Controllers\ExcelExportController;
use App\Http\Controllers\ExportController;

use App\Http\Controllers\ReportController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'logout']);
    Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
});
Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/GH', [AdminController::class, 'GH'])->middleware('userAkses:GH');
    Route::get('/admin/MGR', [AdminController::class, 'MGR'])->middleware('userAkses:MGR');
    Route::get('/admin/SPV', [AdminController::class, 'SPV'])->middleware('userAkses:SPV');
    Route::get('/admin/Staff', [AdminController::class, 'Staff'])->middleware('userAkses:Staff');
    Route::get('/admin/QA', [AdminController::class, 'QA'])->middleware('userAkses:QA');
        // routes/web.php
    Route::get('/loading', function () {
        return view('loading');
    })->name('loading');
    

    
});
Route::group(['middleware' => ['auth', 'user-akses:GH']], function () {
    // Definisikan rute-rute yang memerlukan peran 'GH' di sini
    Route::get('/user', 'UserController@index');
    Route::get('/report', 'ReportController@index');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// Route::get('/projects/{projectId}', 'ProjectController@show');
// Route::get('/projects', [ProjectController::class, 'index']);
//data project
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectsController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
Route::get('/projects/pdf/export', [ExportPdfController::class, 'exportPdf'])->name('projects.pdf');
Route::get('/projects/export/excel', [ExcelExportController::class, 'exportExcel'])->name('projects.export-excel');


Route::resource('projects', ProjectsController::class);

//untuk crud category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::group(['middleware' => 'auth'], function () {
 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
 });



//productivity
Route::get('/productivity', [ProductivityController::class, 'index'])->name('productivity.index');
Route::get('/productivity/create', [ProductivityController::class, 'create'])->name('productivity.create');
Route::post('/productivity', [ProductivityController::class, 'store'])->name('productivity.store');
Route::get('/productivity/{productivity}', [ProductivityController::class, 'show'])->name('productivity.show');
Route::get('/productivity/{productivity}/edit', [ProductivityController::class, 'edit'])->name('productivity.edit');
Route::put('/productivity/{productivity}', [ProductivityController::class, 'update'])->name('productivity.update');
Route::delete('/productivity/{productivity}', [ProductivityController::class, 'destroy'])->name('productivity.destroy');

//task list 
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
// Route::get('/pro', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/projects/{projectId}', [TaskController::class, 'viewProject'])->name('projects.view');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
Route::resource('users', \App\Http\Controllers\UserController::class);

// routes/web.php

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//routes ProjectOwner

Route::get('/configure/project-owners', [ProjectOwnerController::class, 'configuration'])->name('project-owners.configuration');
Route::get('/project-owners/{id}/edit', [ProjectOwnerController::class, 'edit'])->name('project-owners.edit');
Route::delete('/project-owners/{id}', [ProjectOwnerController::class, 'destroy'])->name('project-owners.destroy');
Route::get('/project-owners/create', [ProjectOwnerController::class, 'create'])->name('project-owners.create');
Route::put('/project-owners/{id}', [ProjectOwnerController::class, 'update'])->name('project-owners.update');
Route::resource('project-owners', ProjectOwnerController::class);




Route::get('/configure-priority/edit', [PriorityController::class, 'edit'])->name('configure-priority.edit');
Route::get('/edit-priority', [PriorityController::class, 'editPriority'])->name('priority.editPriority');
Route::get('/configure-priority/index', [PriorityController::class, 'index'])->name('configure-priority.index');
Route::get('/configure-priority/create', [PriorityController::class, 'create'])->name('configure-priority.create');
Route::post('/priorities', [PriorityController::class, 'store'])->name('priorities.store');





Route::get('/configure/revisions', [RevisionsController::class, 'index'])->name('configure-revisions.index');
Route::get('/configure/revisions/create', [RevisionsController::class, 'create'])->name('configure-revisions.create');
Route::post('/configure/revisions', [RevisionsController::class, 'store'])->name('configure-revisions.store');
Route::get('/configure/revisions/{id}/edit', [RevisionsController::class, 'edit'])->name('configure-revisions.edit');
Route::put('/configure/revisions/{id}', [RevisionsController::class, 'update'])->name('configure-revisions.update');
Route::delete('/configure/revisions/{id}', [RevisionsController::class, 'destroy'])->name('configure-revisions.destroy');

Route::get('/configure/statuses', [StatusController::class, 'index'])->name('statuses.index');
Route::get('/configure/statuses/create', [StatusController::class, 'create'])->name('statuses.create');
Route::post('/configure/statuses', [StatusController::class, 'store'])->name('statuses.store');
Route::get('/configure/statuses/{status}', [StatusController::class, 'show'])->name('statuses.show');
Route::get('/configure/statuses/{id}/edit', [StatusController::class, 'edit'])->name('statuses.edit');
Route::put('/configure/statuses/{id}', [StatusController::class, 'update'])->name('statuses.update');
Route::delete('/configure/statuses/{status}', [StatusController::class, 'destroy'])->name('statuses.destroy');

//Report

Route::get('/reports/index', [ReportController::class, 'index'])->name('report.index');
Route::get('/export-to-excel', [ExcelExportController::class, 'exportExcel'])->name('export.to.excel')->middleware(['auth']);
Route::get('/repotrts/export/excel', [ExcelExportController::class, 'exportExcel'])->name('reports.export-excel');



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   

   
     
     public function index()
     {
         // Mendapatkan ID status berdasarkan nama status
         $todoStatusId = DB::table('status')->where('nama', 'Todo')->value('id');
         $onProgressStatusId = DB::table('status')->where('nama', 'On-Progress')->value('id');
         $testingStatusId = DB::table('status')->where('nama', 'Testing')->value('id');
         $waitingDeployStatusId = DB::table('status')->where('nama', 'Waiting-Deploy')->value('id');
         $doneStatusId = DB::table('status')->where('nama', 'Done')->value('id');
         $cancelStatusId = DB::table('status')->where('nama', 'Cancel')->value('id');
         $pendingStatusId = DB::table('status')->where('nama', 'Pending')->value('id');
         $inisiasiStatusId = DB::table('status')->where('nama', 'Inisiasi')->value('id');
     
         // Hitung jumlah proyek dengan status 'To Do'
         $todoCount = Project::where('status_id', $todoStatusId)->count();
     
         // Hitung jumlah proyek dengan status 'On Progress'
         $onProgressCount = Project::where('status_id', $onProgressStatusId)->count();
     
         // Hitung jumlah proyek dengan status 'Testing'
         $testingCount = Project::where('status_id', $testingStatusId)->count();
     
         // Hitung jumlah proyek dengan status 'Waiting-Deploy'
         $waitingDeployCount = Project::where('status_id', $waitingDeployStatusId)->count();
     
         // Hitung jumlah proyek dengan status 'Done'
         $doneCount = Project::where('status_id', $doneStatusId)->count();
     
         // Hitung jumlah proyek dengan status 'Cancel'
         $cancelCount = Project::where('status_id', $cancelStatusId)->count();
     
         // Hitung jumlah proyek dengan status 'Pending'
         $pendingCount = Project::where('status_id', $pendingStatusId)->count();
     
         // Hitung jumlah proyek dengan status 'Inisiasi'
         $inisiasiCount = Project::where('status_id', $inisiasiStatusId)->count();

         $todoProjects = Project::where('status_id', $todoStatusId)->get();

     
         // Mengambil semua data proyek
         $projects = Project::all();
     
         // ... sisa kode Anda
     
         return view('home', [
             'projects' => $projects,
             'todoCount' => $todoCount,
             'onProgressCount' => $onProgressCount,
             'testingCount' => $testingCount,
             'waitingDeployCount' => $waitingDeployCount,
             'doneCount' => $doneCount,
             'cancelCount' => $cancelCount,
             'pendingCount' => $pendingCount,
             'inisiasiCount' => $inisiasiCount,
             'todoProjects' => $todoProjects
         ]);
     }
     
     
}

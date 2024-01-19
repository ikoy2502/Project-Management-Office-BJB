<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Project;
use App\Models\ProjectOwner;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectProgress;
use App\Models\Quarter;
use App\Models\Revisions;
use App\Models\Status;



class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $users = User::all(); // Menambahkan ini
        $selectedTriwulan = $request->input('triwulan'); // Ambil triwulan dari URL, default ke 'Q1' jika tidak ada

    // Query Projects dengan filter triwulan
    $projects = Project::where('triwulan', $selectedTriwulan)->get();
        return view('projects.index', compact('projects', 'users', 'selectedTriwulan'));
    }

    public function create(Request $request)
    {
        $projectOwners = ProjectOwner::all(); // Ambil data pemilik proyek dari model
        $users = User::all();
        $categories = Category::all();
        $statuses = Status::all();
        $priorities = Priority::all();
        $revisions = Revisions::all();
        $projects = Project::all();
        //$leadSubgroups = LeadSubgroup::all(); // Ambil data subkelompok dari model
        

        return view('projects.create', compact('projectOwners', 'users', 'categories', 'statuses', 'revisions', 'priorities', 'projects'));
    }

    public function store(Request $request, Project $project)
    {
        $category_id = $request->input('category_id');
        Project::create($request->all());
        // // Mendapatkan nilai dari input 'quarter'
        // $quarterValue = $request->input('quarter');

        // // Membuat instance model atau mengambil data yang ada dari database
        // $model = new Quarter(); // Gantilah ModelName dengan nama model yang sesuai

        // // Mengisi kolom 'triwulan' dengan nilai dari input 'quarter'
        // $model->triwulan = $quarterValue;
      
        

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
                    $stat = [
                        'Pending' => 'badge-secondary',
                        'Started' => 'badge-primary',
                        'On-Progress' => 'badge-info',
                        'On-Hold' => 'badge-warning',
                        'Over Due' => 'badge-danger',
                        'Done' => 'badge-success',
                        'Todo' => 'badge-light',
                    ];
                
                    $status = $project->status;
                    $progress = ProjectProgress::where('project_id', $project->id)->get();
                
                    return view('projects.view', [
                        'project' => $project, // Pass the entire project object
                        'status' => $status,
                        'stat' => $stat,
                        'progress' => $progress,
                        'id' => $project->id,
                    ]);
            }
    
    

    public function edit($id)
    {
        $project = Project::find($id);
        $projectOwners = ProjectOwner::all(); 
        
        return view('projects.edit', compact('project', 'projectOwners'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    public function viewProject()
{
    $projects = Project::all(); // Mengambil semua proyek dari model Project

    return view('projects.view', ['projects' => $projects]);
}

}

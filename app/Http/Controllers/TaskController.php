<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan daftar tugas
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::all();
        return view('tasks.index', compact('tasks','projects'));
    }

    // Menampilkan formulir tambah tugas
    public function create($projectId)
    {
        // Retrieve the project related to $projectId
        $project = Project::find($projectId);
    
        // Retrieve all projects if needed
        $projects = Project::all();
    
        // Pass the $project and $projects variables to the view
        return view('tasks.create', compact('project', 'projects'));
    }

    // Menyimpan tugas yang baru dibuat
    public function store(Request $request)
    {
        $projects = Project::all();
        $tasks = Task::all();
        Task::create($request->all());

        
        return redirect()->route('projects.view', ['projectId' => $request->input('project_id')])->with('success', 'Task created successfully');

    }

    // Menampilkan formulir edit tugas
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Menyimpan perubahan pada tugas yang diedit
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    // Menghapus tugas
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('projects.view', ['projectId' => $task->project_id])->with('success', 'Task deleted successfully');
    }

    public function viewProject($projectId)
{
    // Mendapatkan data proyek dari database berdasarkan $projectId
    $project = Project::find($projectId);

    // Mengirimkan variabel $project ke tampilan bersamaan dengan data proyek lainnya (jika ada)
    $projects = Project::all(); // Contoh pengiriman semua proyek
    return view('projects.view', compact('project', 'projects'));
}
     

}


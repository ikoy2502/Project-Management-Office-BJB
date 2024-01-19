<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Sesuaikan namespace sesuai dengan model Anda
use App\Models\Task; // Sesuaikan namespace sesuai dengan model Anda
use App\Models\User; // Sesuaikan namespace sesuai dengan model Anda
use App\Models\Productivity;
use Illuminate\Support\Facades\Auth;

class ProductivityController extends Controller
{
    public function index()
    {
    $productivity = Productivity::all();
    $projects = Project::all();
    $tasks = Task::all(); // Anda perlu mengganti 'Task' dengan nama model yang sesuai
    return view('projects.view', compact('productivity', 'projects', 'tasks'));
    }


            public function create()
        {
            $projects = Project::all();
            $tasks = Task::all();
            $users = User::all();

            return view('productivity.create_productivity', compact('projects', 'tasks', 'users'));
        }

    

    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'task_id' => 'required|exists:task_list,id',
            'comment' => 'required',
            'subject' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end_time' => 'required',
            'time_rendered' => 'required', // Pastikan 'time_rendered' termasuk dalam validasis
        ]);

        $userId = Auth::id();

        $productivity = new Productivity([
            'project_id' => $validatedData['project_id'],
            'task_id' => $validatedData['task_id'],
            'comment' => $validatedData['comment'],
            'subject' => $validatedData['subject'],
            'date' => $validatedData['date'],
            'start' => $validatedData['start'],
            'end_time' => $validatedData['end_time'],
            'user_id' => $userId, // Menggunakan ID pengguna yang sedang masuk
            'time_rendered' => $validatedData['time_rendered'],
        ]);
    
        $productivity->save();
        

        // Redirect kembali ke halaman index atau halaman lain yang sesuai
        return redirect()->route('projects.view', ['projectId' => $request->input('project_id')])->with('success', 'Task created successfully');
    }

    // Tambahkan metode-metode lain seperti edit, update, dan delete sesuai kebutuhan

    
}
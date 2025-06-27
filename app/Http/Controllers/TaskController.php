<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function index()
{
    $tasks = Task::orderBy('created_at', 'desc')->paginate(6); 
    return view('tasks.index', compact('tasks'));
}


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
        ]);

        return redirect('/tasks')->with('success', 'Tâche ajoutée avec succès.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    // GET /tasks/{id}/edit : Formulaire de modification
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->is_completed = $request->has('is_completed');
        $task->save();

        return redirect('/tasks')->with('success', 'Tâche mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Tâche supprimée.');
    }

    public function markAsCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->is_completed = true;
        $task->save();

        return redirect('/tasks')->with('success', 'Tâche marquée comme terminée.');
    }
}

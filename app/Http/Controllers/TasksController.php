<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Tasks::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        Tasks::create($request->only(['name', 'description']));
        return redirect('/')->with('success', 'Task successfully added.');
    }

    public function edit($id)
    {
        $task = Tasks::findOrFail($id);
        return view('tasks.edit', compact('tasks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $task = Tasks::findOrFail($id);
        $task->update($request->only(['name', 'description', 'status']));
        return redirect('/')->with('success', 'Task successfully updated.');
    }

    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();
        return redirect('/')->with('success', 'Task successfully deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function index()
    {
      $posts = Post::all();
      return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'task_name' => 'required|max:255',
        'priority' => 'required|max:255',
        'status' => 'required|max:255',
        'date' => 'required|max:255',
      ]);
      Task::create($request->all());
      return redirect()->route('tasks.index')
        ->with('success', 'Task created successfully.');
    }
   
    public function update(Request $request, $id)
    {
      $request->validate([
        'task_name' => 'required|max:255',
        'priority' => 'required|max:255',
        'status' => 'required|max:255',
        'date' => 'required|max:255',
      ]);
      $post = Task::find($id);
      $post->update($request->all());
      return redirect()->route('tasks.index')
        ->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
      $post = Task::find($id);
      $post->delete();
      return redirect()->route('tasks.index')
        ->with('success', 'Post deleted successfully');
    }

    public function create()
    {
      return view('tasks.create');
    }

    public function show($id)
    {
      $post = Task::find($id);
      return view('tasks.show', compact('post'));
    }

    public function edit($id)
    {
      $post = Task::find($id);
      return view('tasks.edit', compact('post'));
    }
}

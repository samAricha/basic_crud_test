<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function index()
    {
      $tests = Test::all()->orderBy('id', desc);
      return json_encode($tests);
    }

    public function store(Request $request)
    {
      $request->validate([
        'test_name' => 'required|max:255',
        'class' => 'required|max:255',
        'total' => 'required|max:255',
        'average' => 'required|max:255',
      ]);
      Test::create($request->all());
      return json_encode("creted successfully");
    }
   
    public function update(Request $request, $id)
    {
      $request->validate([
        'test_name' => 'required|max:255',
        'class' => 'required|max:255',
        'total' => 'required|max:255',
        'average' => 'required|max:255',
      ]);
      $test = Test::find($id);
      $test->update($request->all());
      return json_encode($test);
    }

    public function destroy($id)
    {
      $test = Test::find($id)->orderBy('id', desc);
      $test->delete();
      return json_encode($test);
    }


    public function show($id)
    {
      $test = Test::find($id);
      return json_encode($test);
    }

    public function edit($id)
    {
      $test = Test::find($id)->orderBy('id', desc);
      return json_encode($test);
    }
}


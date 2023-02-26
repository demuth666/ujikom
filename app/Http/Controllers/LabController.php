<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabController extends Controller
{
    public function index()
    {
        $lab = Lab::all();
        return view('admin.pages.Lab.index', [
            'lab' => $lab
        ]);
    }

    public function create()
    {
        return view('admin.pages.Lab.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => ['required', 'integer'],
            'hasil_lab' => ['required', 'string'],
            'ket' => ['required', 'string'],
        ]);

        Lab::create($request->all());
        return redirect('/Lab');
    }

    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        
        return view('admin.pages.Lab.edit', [
            'lab' => $lab
        ]);
    }
    
    public function update($id, Request $request)
    {
       $lab = Lab::findOrFail($id);
       $lab->update($request->except(['_token']));
        return redirect('/Lab');
    }

    public function destroy($id)
    {
       $lab = Lab::find($id);
       $lab->delete();
        return redirect('/Lab');
    }

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('data');
            $results = Lab::where('no_rm', 'like', '%'.$input.'%')
            ->orWhere('hasil_lab', 'like', '%'.$input.'%')
            ->orWhere('ket', 'like', '%'.$input.'%')
            ->get();

        return view('admin.pages.Lab.index', [
            'lab' => $results
        ]);
    }

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
            'hasil_lab' => ['required', 'string'],
            'ket' => ['required', 'string'],
        ]);

        Lab::create($request->all());
        return redirect('/Lab')->with('toast_success', 'Data berhasil tersimpan!');
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
        return redirect('/Lab')->with('toast_success', 'Data berhasil di edit!');
    }

    public function destroy($id)
    {
       $lab = Lab::find($id);
       $lab->delete();
        return redirect('/Lab')->with('toast_success', 'Data berhasil dihapus!');
    }

}


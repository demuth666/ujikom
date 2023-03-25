<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use App\Models\Pasien;

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
        $pasien = Pasien::all();
        return view('admin.pages.Lab.add', [
            'pasien' => $pasien
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => ['required', 'string'],
            'hasil_lab' => ['required', 'string'],
            'ket' => ['required', 'string'],
        ]);

        Lab::create($request->all());
        return redirect('/Lab')->with('toast_success', 'Data berhasil tersimpan!');
    }

    public function edit($id)
    {
        $lab = Lab::findOrFail($id);
        $pasien = Pasien::all();
        return view('admin.pages.Lab.edit', [
            'lab' => $lab,
            'pasien' => $pasien
        ]);
    }
    
    public function update($id, Request $request)
    {
       $lab = Lab::findOrFail($id);
       $lab->hasil_lab = $request->hasil_lab;
       $lab->ket = $request->ket;
       $lab->save();
        return redirect('/Lab')->with('toast_success', 'Data berhasil di edit!');
    }

    public function destroy($id)
    {
       $lab = Lab::find($id);
       $lab->delete();
        return redirect('/Lab')->with('toast_success', 'Data berhasil dihapus!');
    }

}


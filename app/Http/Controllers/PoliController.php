<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli;

class PoliController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('data');
        $results = Poli::where('nama_poli', 'like', '%'.$input.'%')
        ->orWhere('lantai', 'like', '%'.$input.'%')
        ->get();

         return view('admin.pages.Poli.index', [
            'poli' => $results
    ]);
    }

    public function index()
    {
        $poli = Poli::all();
        return view('admin.pages.Poli.index', [
            'poli' => $poli
        ]);
    }

    public function create()
    {
        return view('admin.pages.Poli.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => ['required', 'string'],
            'lantai' => ['required', 'integer'],
        ]);

        Poli::create($request->all());
        return redirect('/Poli')->with('toast_success', 'Data berhasil tersimpan!');
    }

    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin.pages.Poli.edit', [
            'poli' => $poli
        ]);
    }

    public function update($id, Request $request)
    {
        $poli = Poli::findOrFail($id);
        $poli->update($request->except(['_token']));
        return redirect('/Poli')->with('toast_success', 'Data berhasil di edit!');
    }

    public function destroy($id)
    {
       $poli = Poli::find($id);
       $poli->delete();
        return redirect('/Poli')->with('toast_success', 'Data berhasil dihapus!');
    }
}
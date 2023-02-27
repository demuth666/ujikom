<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();

        return view('admin.pages.Obat.index', [
            'obat' => $obat
        ]);
    }

    public function create()
    {
        return view('admin.pages.Obat.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => ['required', 'string'],
            'jml_obat' => ['required', 'integer'],
            'ukuran' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
        ]);

        Obat::create($request->all());
        return redirect('/Obat')->with('toast_success', 'Data berhasil tersimpan!');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('admin.pages.Obat.edit', [
            'obat' => $obat
        ]);
    }

    public function update($id, Request $request)
    {
        $obat = Obat::findOrFail($id);
        $obat->update($request->except(['_token']));
        return redirect('/Obat')->with('toast_success', 'Data berhasil di edit!');
    }

    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();
        return redirect('/Obat')->with('toast_success', 'Data berhasil dihapus!');
    }
}

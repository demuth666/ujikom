<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Poli;

class KunjunganController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('data');
        $kunjungan = Kunjungan::where('pasien_id', 'like', '%'.$query.'%')
        ->orWhere('poli_id', 'like', '%'.$query.'%')
        ->get();
        return view('admin.pages.Kunjungan.index', [
            'kunjungan' => $kunjungan
        ]);

        
    }

    public function index(Request $request)
    {
        $kunjungan = Kunjungan::with('pasien', 'poli')->paginate(10);
        return view('admin.pages.Kunjungan.index', [
            'kunjungan' => $kunjungan,
        ]);
    }

    public function create()
    {
        $pasien = Pasien::all();
        $poli = Poli::all();
        return view('admin.pages.Kunjungan.add', [
            'pasien' => $pasien,
            'poli' => $poli
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_kunjungan' => ['required'],
            'pasien_id' => ['required', 'integer'],
            'poli_id' => ['required', 'integer'],
            'jam_kunjungan' => ['required'],
        ]);

        Kunjungan::create($request->all());
        return redirect('/Kunjungan');
    }

    public function edit($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        
        return view('admin.pages.Kunjungan.edit', [
            'kunjungan' => $kunjungan
        ]);
    }

    public function update($id, Request $request)
    {
       $kunjungan = Kunjungan::findOrFail($id);
       $kunjungan->update($request->except(['_token']));
        return redirect('/Kunjungan');
    }

    public function destroy($id)
    {
       $kunjungan = Kunjungan::find($id);
       $kunjungan->delete();
        return redirect('/Kunjungan');
    }
}

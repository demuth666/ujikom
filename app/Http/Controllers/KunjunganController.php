<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Poli;
Use Alert;


class KunjunganController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('data');
        $kunjungan = Kunjungan::whereHas('pasien', function ($query) use ($input){
            $query->where('nama_pasien', 'like', '%'.$input.'%');
        })->orWhereHas('poli', function ($query) use ($input){
            $query->where('nama_poli', 'like', '%'.$input.'%');
        })->get();
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
            'pasien_id' => ['required', 'string'],
            'poli_id' => ['required', 'string'],
            'jam_kunjungan' => ['required'],
        ]);

        Kunjungan::create($request->all());
        return redirect('/Kunjungan')->with('toast_success', 'Data berhasil tersimpan!');
    }

    public function edit($id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $pasien = Pasien::all();
        $poli = Poli::all();
        return view('admin.pages.Kunjungan.edit', [
            'kunjungan' => $kunjungan,
            'pasien' => $pasien,
            'poli' => $poli
        ]);
    }

    public function update($id, Request $request)
    {
       $kunjungan = Kunjungan::findOrFail($id);
       $kunjungan->update($request->except(['_token']));
        return redirect('/Kunjungan')->with('toast_success', 'Data berhasil di edit!');
    }

    public function destroy($id)
    {
       $kunjungan = Kunjungan::find($id);
       $kunjungan->delete();
        return redirect('/Kunjungan')->with('toast_success', 'Data berhasil di hapus!');
    }
}

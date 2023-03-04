<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\Poli;
Use Alert;


class DokterController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('data');
        $result = Dokter::whereHas('poli', function ($query) use ($input){
            $query->where('nama_poli', 'like', '%'.$input.'%');
        })
        ->orWhere('nama_dokter', 'like', '%'.$input.'%')
        ->orWhere('sip', 'like', '%'.$input.'%')
        ->orWhere('tempat_lahir', 'like', '%'.$input.'%')
        ->orWhere('no_tlp', 'like', '%'.$input.'%')
        ->orWhere('alamat', 'like', '%'.$input.'%')
        ->get();
        return view('admin.pages.Dokter.index', [
            'dokter' => $result
        ]);
    }

    public function index()
    {
        $dokter = Dokter::with('poli')->paginate(5);
        return view('admin.pages.Dokter.index', [
            'dokter' => $dokter
        ]);
    }

    public function create()
    {
        $poli = Poli::all();
        return view('admin.pages.Dokter.add', [
            'poli' => $poli
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli_id' => ['required', 'string'],
            'tgl_kunjungan' => ['required', 'date'],
            'user_id' => ['required', 'integer'],
            'nama_dokter' => ['required', 'string', 'max:255'],
            'sip' => ['required', 'integer'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'no_tlp' => ['required', 'integer'],
            'alamat' => ['required', 'string'],
        ]);

        Dokter::create($request->all());
        return redirect('/Dokter')->with('toast_success', 'Data berhasil tersimpan!');
    }

    public function edit($id)
    {
        $poli = Poli::all();
        $dokter = Dokter::find($id);
        return view('admin.pages.Dokter.edit', [
            'dokter' => $dokter,
            'poli' => $poli
        ]);
    }

    public function update($id, Request $request)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->except(['_token']));
        return redirect('/Dokter')->with('toast_success', 'Data berhasil di edit!');;
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        $dokter->delete();
        return redirect('/Dokter')->with('toast_success', 'Data berhasil dihapus!');;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Lab;

class RekamController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('data');
        $result = RekamMedis::whereHas('labotarium', function ($query) use ($input){
            $query->where('no_rm', 'like', '%'.$input.'%');
        })->orWhereHas('tindakan', function ($query) use ($input){
            $query->where('nm_tindakan', 'like', '%'.$input.'%');
        })
        ->orWhereHas('dokter', function ($query) use ($input){
            $query->where('nama_dokter', 'like', '%'.$input.'%');
        })
        ->orWhereHas('pasien', function ($query) use ($input){
            $query->where('nama_pasien', 'like', '%'.$input.'%');
        })
        ->orWhere('obat_id', 'like', '%'.$input.'%')
        ->orWhere('diagnosa', 'like', '%'.$input.'%')
        ->orWhere('resep', 'like', '%'.$input.'%')
        ->orWhere('keluhan', 'like', '%'.$input.'%')
        ->orWhere('ket', 'like', '%'.$input.'%')
        ->get();
        return view('admin.pages.Rekam-Medis.index', [
            'rekam' => $result
        ]);
    }

    public function index()
    {
        $rekam = RekamMedis::with('labotarium', 'pasien', 'tindakan', 'obat', 'dokter')->paginate(10);
        return view('admin.pages.Rekam-Medis.index', [
            'rekam' => $rekam
        ]);
    }

    public function create()
    {
        $tindakan = tindakan::all();
        $obat = Obat::all();
        $dokter = Dokter::all();
        $pasien = Pasien::all();
        $lab = Lab::all();
        return view('admin.pages.Rekam-Medis.add', [
            'tindakan' => $tindakan,
            'obat' => $obat,
            'dokter' => $dokter,
            'pasien' => $pasien,
            'lab' => $lab
        ]);
    }

    public function store(Request $request)
    {
        $obat = implode(',', $request->input('obat_id'));
        $request->validate([
            'labotarium_id' => ['required'],
            'tindakan_id' => ['required'],
            'obat_id' => ['required'],
            'dokter_id' => ['required'],
            'pasien_id' => ['required'],
            'diagnosa' => ['required'],
            'resep' => ['required'],
            'keluhan' => ['required'],
            'tgl_pemeriksaan' => ['required'],
            'ket' => ['required'],
        ]);

        RekamMedis::create([
            'labotarium_id' => $request->labotarium_id,
            'tindakan_id' => $request->tindakan_id,
            'obat_id' => $obat,
            'dokter_id' => $request->dokter_id,
            'pasien_id' => $request->pasien_id,
            'diagnosa' => $request->diagnosa,
            'resep' => $request->resep,
            'keluhan' => $request->keluhan,
            'tgl_pemeriksaan' => $request->tgl_pemeriksaan,
            'ket' => $request->ket,
        ]);
        return redirect('/RekamMedis')->with('toast_success', 'Data berhasil tersimpan!');
    }

    public function edit($id)
    {
        $rekam = RekamMedis::findOrFail($id);
        $tindakan = tindakan::all();
        $obat = Obat::all();
        $dokter = Dokter::all();
        $pasien = Pasien::all();
        $lab = Lab::all();
        return view('admin.pages.Rekam-Medis.edit', [
            'tindakan' => $tindakan,
            'obat' => $obat,
            'dokter' => $dokter,
            'pasien' => $pasien,
            'lab' => $lab,
            'rekam' => $rekam
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = RekamMedis::findOrFail($id);
        $obat = implode(',', $request->input('obat_id'));
        $request->validate([
            'labotarium_id' => ['required'],
            'tindakan_id' => ['required'],
            'obat_id' => ['required'],
            'dokter_id' => ['required'],
            'pasien_id' => ['required'],
            'diagnosa' => ['required'],
            'resep' => ['required'],
            'keluhan' => ['required'],
            'tgl_pemeriksaan' => ['required'],
            'ket' => ['required'],
        ]);

        $post->labotarium_id = $request->labotarium_id;
        $post->tindakan_id = $request->tindakan_id;
        $post->obat_id = $obat;
        $post->dokter_id = $request->dokter_id;
        $post->pasien_id = $request->pasien_id;
        $post->diagnosa = $request->diagnosa;
        $post->resep = $request->resep;
        $post->keluhan = $request->keluhan;
        $post->tgl_pemeriksaan = $request->tgl_pemeriksaan;
        $post->ket = $request->ket;
        $post->save();

        return redirect('/RekamMedis')->with('toast_success', 'Data berhasil di edit!');
    }

    public function destroy($id)
    {
        $rekam = RekamMedis::find($id);
        $rekam->delete();
        return redirect('/RekamMedis')->with('toast_success', 'Data berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\Dokter;



class PemeriksaanController extends Controller
{
    public function index()
    {
        $pasien = Pasien::paginate(10);
        return view('dokter.pages.Pemeriksaan.index', [
            'pasien' => $pasien
        ]);
    }

    public function create($id)
    {
        $rekam = RekamMedis::find($id);
        $tindakan = tindakan::all();
        $obat = Obat::all();
        $dokter = Dokter::find($id);
        $pasien = Pasien::find($id);
        return view('dokter.pages.Pemeriksaan.add', [
            'rekam' => $rekam,
            'tindakan' => $tindakan,
            'obat' => $obat,
            'dokter' => $dokter,
            'pasien' => $pasien,
        ]);
    }

    public function store(Request $request)
    {
        $obat = implode(',', $request->input('obat'));
        $request->validate([
            'pasien_id' => ['required'],
            'tindakan_id' => ['required'],
            'obat' => ['required'],
            'dokter' => ['required'],
            'pasiens' => ['required'],
            'diagnosa' => ['required'],
            'resep' => ['required'],
            'keluhan' => ['required'],
            'tgl_pemeriksaan' => ['required'],
        ]);

        RekamMedis::create([
            'pasien_id' => $request->pasien_id,
            'tindakan_id' => $request->tindakan_id,
            'obat' => $obat,
            'dokter' => $request->dokter,
            'pasiens' => $request->input('pasiens'),
            'diagnosa' => $request->diagnosa,
            'resep' => $request->resep,
            'keluhan' => $request->keluhan,
            'tgl_pemeriksaan' => $request->tgl_pemeriksaan,
        ]);
        return redirect('/Pemeriksaan')->with('toast_success', 'Data berhasil tersimpan!');
    }
}

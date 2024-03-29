<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Lab;
use Dompdf\Dompdf;
use FPDF;

class RekamController extends Controller
{
    public function cetak()
    {
        $rekam = RekamMedis::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('admin.pages.Rekam-Medis.cetak', [
            'rekam' => $rekam
        ])); 
        $pdf->setPaper('A', 'potrait');
        $pdf->render();
    
        return $pdf->stream('RekamMedis.pdf'); 
    }

    public function search(Request $request)
    {
        $input = $request->input('data');
        $result = RekamMedis::whereHas('pasien', function ($query) use ($input){
            $query->where('no_rm', 'like', '%'.$input.'%');
        })
        ->orWhere('pasiens', 'like', '%'.$input.'%')
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
        $lab = Pasien::all();
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
        $request->validate([
            'pasien_id' => ['required'],
            'pasiens' => ['required'],
        ]);

        RekamMedis::create([
            'pasien_id' => $request->pasien_id,
            'pasiens' => $request->input('pasiens'),
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
        $lab = Pasien::all();
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
        $request->validate([
            'pasiens' => ['required'],
        ]);

        // $post->pasien_id = $request->pasien_id;
        $post->tindakan_id = $request->tindakan_id;
        $post->dokter = $request->dokter;
        $post->pasiens = $request->pasiens;
        $post->diagnosa = $request->diagnosa;
        $post->keluhan = $request->keluhan;
        $post->tgl_pemeriksaan = $request->tgl_pemeriksaan;
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

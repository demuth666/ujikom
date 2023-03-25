<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\CatatanRekam;
use Dompdf\Dompdf;


class PemeriksaanController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('data');
            $results = Pasien::where('nama_pasien', 'like', '%'.$input.'%')
            ->orWhere('no_rm', 'like', '%'.$input.'%')
            ->orWhere('j_kelamin', 'like', '%'.$input.'%')
            ->orWhere('agama', 'like', '%'.$input.'%')
            ->orWhere('alamat', 'like', '%'.$input.'%')
            ->orWhere('usia', 'like', '%'.$input.'%')
            ->orWhere('no_tlp', 'like', '%'.$input.'%')
            ->orWhere('nm_kk', 'like', '%'.$input.'%')
            ->orWhere('hub_kel', 'like', '%'.$input.'%')
            ->get();

        return view('dokter.pages.Pemeriksaan.index', [
            'pasien' => $results
        ]);
    }

    public function cetak($pasien_id)
    {
        $rekam = CatatanRekam::where('pasien_id', $pasien_id)->get();
        // dd($rekam);
        $pdf = new Dompdf();
        $pdf->loadHtml(view('admin.pages.Rekam-Medis.cetak', [
            'rekam' => $rekam
        ])); 
        $pdf->setPaper('A', 'potrait');
        $pdf->render();
    
        return $pdf->stream('RekamMedis.pdf'); 
    }


    public function index()
    {
        $pasien = Pasien::paginate(10);
        // dd($pasien);
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
        $request->validate([
            'pasien_id' => ['required'],
            'tindakan' => ['required'],
            'dokter' => ['required'],
            'diagnosa' => ['required'],
            'keluhan' => ['required'],
            'tgl_pemeriksaan' => ['required'],
        ]);

        $CatatanRekam = CatatanRekam::create([
            'pasien_id' => $request->pasien_id,
            'tindakan' => $request->tindakan,
            'dokter' => $request->dokter,
            'diagnosa' => $request->diagnosa,
            'keluhan' => $request->keluhan,
            'tgl_pemeriksaan' => $request->tgl_pemeriksaan,
        ]);

        $catatan_id = $CatatanRekam->pasien_id;
        return redirect()->route('detail.pemeriksaan', ['pasien_id' => $catatan_id])->with('toast_success', 'Data berhasil tersimpan!');
    }

    public function detail($pasien_id)
    {
        $detail = CatatanRekam::where('pasien_id', $pasien_id)->get();
        $rekam = CatatanRekam::where('pasien_id', $pasien_id)->first();
        // dd($rekam);
        return view('dokter.pages.Pemeriksaan.detail', [
            'detail' => $detail,
            'rekam' => $rekam
        ]);
    }
}

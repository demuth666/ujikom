<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Obat;
use App\Models\Resep;
use App\Models\Pasien;
use App\Models\CatatanRekam;
use Dompdf\Dompdf;


class ResepController extends Controller
{
    public function generatePDF($kode_resep) {
        $resep = Resep::where('kode_resep', $kode_resep)->get(); 
        $reseps = Resep::all();
        // dd($resep);
        $pdf = new Dompdf();
        $pdf->loadHtml(view('dokter.pages.Resep.cetak', [
            'resep' => $resep,
            'reseps' => $reseps
        ])); 
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        return $pdf->stream('Resep Obat.pdf'); 
    }

    public function getData($id)
    {
        $obat = Obat::findOrFail($id);
        return response()->json([
            'harga' => $obat->harga,
            'stock' => $obat->jml_obat,
        ]);
    }

    public function index()
    {
        $rekam = RekamMedis::all();
        return view('dokter.pages.Resep.index', [
            'rekam' => $rekam
        ]);
    }

    public function create($id, $pasien_id)
    {
        $obat = Obat::all();
        $pasien = Pasien::find($pasien_id);
        $rekam = CatatanRekam::find($id);
        $resep = Resep::all();
        // dd($resep);
        return view('dokter.pages.Resep.add', [
            'rekam' => $rekam,
            'obat' => $obat,
            'resep' => $resep,
            'pasien' => $pasien,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pasien_id' => ['required', 'string'],
            'pasiens' => ['required', 'string'],
            'diagnosa' => ['required'],
            'obat_id' => ['required'],
        ]);

        $pasien_id = $request->input('pasien_id');
        $pasiens = $request->input('pasiens');
        $obat = $request->input('obat_id');
        $diagnosa = $request->input('diagnosa');

        $resep = new Resep;
        $resep->pasien_id = $pasien_id;
        $resep->pasiens = $pasiens;
        $resep->obat_id = $obat;
        $resep->diagnosa = $diagnosa;
        $resep->save();

        return redirect()->back();
    }

    public function lihat($kode_resep)
    {
        $reseps = Resep::where('kode_resep', $kode_resep)->first();
        $resep = Resep::all();
        if (!$resep) {
            abort(404);
        }

        return view('dokter.pages.Resep.lihat', [
            'reseps' => $reseps,
            'resep' => $resep
        ]);
    }

    public function DestroyResep($id)
    {
        $resep = Resep::find($id);
        $resep->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Dompdf\Dompdf;


class PasienController extends Controller
{

    public function generatePDF($id, $nama_pasien) {
        $pasien = Pasien::where('id', $id)->get(); 
        $nama = Pasien::where('nama_pasien', $nama_pasien);
        $pdf = new Dompdf();
        $pdf->loadHtml(view('admin.pages.Pasien.cetak', [
            'pasien' => $pasien
        ])); 
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        return $pdf->stream('kartu pasien.pdf'); 
    }

    public function search(Request $request)
    {
        $input = $request->input('data');
            $results = Pasien::where('nama_pasien', 'like', '%'.$input.'%')
            ->orWhere('j_kelamin', 'like', '%'.$input.'%')
            ->orWhere('agama', 'like', '%'.$input.'%')
            ->orWhere('alamat', 'like', '%'.$input.'%')
            ->orWhere('usia', 'like', '%'.$input.'%')
            ->orWhere('no_tlp', 'like', '%'.$input.'%')
            ->orWhere('nm_kk', 'like', '%'.$input.'%')
            ->orWhere('hub_kel', 'like', '%'.$input.'%')
            ->get();

        return view('admin.pages.Pasien.index', [
            'pasien' => $results
        ]);
    }

    public function index()
    {
        $pasien = Pasien::paginate(10);
        return view('admin.pages.Pasien.index', [
            'pasien' => $pasien
        ]);
    }

    public function create()
    {
        return view('admin.pages.Pasien.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => ['required', 'string'],
            'j_kelamin' => ['required', 'string'],
            'agama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'tgl_lahir' => ['required'],
            'usia' => ['required', 'integer'],
            'no_tlp' => ['required'],
            'nm_kk' => ['required', 'string'],
            'hub_kel' => ['required', 'string'],
        ]);

        $pasien = Pasien::create([
            'nama_pasien' => $request->nama_pasien,
            'j_kelamin' => $request->j_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'usia' => $request->usia,
            'no_tlp' => $request->no_tlp,
            'nm_kk' => $request->nm_kk,
            'hub_kel' => $request->hub_kel,
        ]);

        $rekam = new RekamMedis();
        $rekam->pasien_id = $pasien->id;
        $rekam->pasiens = $pasien->nama_pasien;
        $rekam->save(); 

        return redirect('/Pasien')->with('toast_success', 'Data berhasil tersimpan!');;
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('admin.pages.Pasien.edit', [
            'pasien' => $pasien
        ]);
    }

    public function update($id, Request $request)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->except(['_token']));
        return redirect('/Pasien')->with('toast_success', 'Data berhasil di edit!');;
    }

    public function destroy($id)
    {
       $pasien = Pasien::find($id);
       $pasien->delete();
        return redirect('/Pasien')->with('toast_success', 'Data berhasil dihapus!');;
    }
}

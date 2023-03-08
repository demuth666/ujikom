<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use Dompdf\Dompdf;


class PasienController extends Controller
{

    public function generatePDF($id) {
        $pasien = Pasien::where('id', $id)->get();    
        $pdf = new Dompdf();
        $pdf->loadHtml(view('admin.pages.Pasien.cetak', [
            // 'data' => $data,
            'pasien' => $pasien
        ])); 
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        return $pdf->stream('dokumen.pdf'); 
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
        $pasien = Pasien::all();
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

        Pasien::create($request->all());
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

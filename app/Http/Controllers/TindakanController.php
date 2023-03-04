<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tindakan;

class TindakanController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('data');
        $results = Tindakan::where('nm_tindakan', 'like', '%'.$input.'%')
        ->orWhere('ket', 'like', '%'.$input.'%')
        ->get();

         return view('admin.pages.Tindakan.index', [
            'tindakan' => $results
    ]);
    }

    public function index()
    {
        $tindakan = Tindakan::all();
        return view('admin.pages.Tindakan.index', [
            'tindakan' => $tindakan
        ]);
    }

    public function create()
    {
        return view('admin.pages.Tindakan.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_tindakan' => ['required', 'string'],
            'ket' => ['required', 'string'],
        ]);

        Tindakan::create($request->all());
        return redirect('/Tindakan')->with('toast_success', 'Data berhasil tersimpan!');;
    }

    public function edit($id)
    {
        $tindakan = Tindakan::find($id);
        return view('admin.pages.Tindakan.edit', [
            'tindakan' => $tindakan
        ]);
    }

    public function update($id, Request $request)
    {
        $tindakan = Tindakan::findOrFail($id);
        $tindakan->update($request->except(['_token']));
        return redirect('/Tindakan')->with('toast_success', 'Data berhasil di edit!');;
    }


    public function destroy($id)
    {
        $tindakan = Tindakan::find($id);
        $tindakan->delete();
        return redirect('/Tindakan')->with('toast_success', 'Data berhasil dihapus!');;
    }
}

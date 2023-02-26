<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;

class RekamController extends Controller
{
    public function index()
    {
        $rekam = RekamMedis::all();
        return view('admin.pages.Rekam-Medis.index', [
            'rekam' => $rekam
        ]);
    }
}

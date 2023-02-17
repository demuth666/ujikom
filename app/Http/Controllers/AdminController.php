<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;

class AdminController extends Controller
{
    public function index()
    {
        $rekam = RekamMedis::all();
        return view('admin.rekam_medis', [
            'rekam' => $rekam
        ]);
    }
}

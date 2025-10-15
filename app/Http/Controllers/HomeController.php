<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Ia;
use App\Models\Moa;
use App\Models\Mou;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
         $fakultas = Fakultas::orderBy('nama_fakultas')->get(); 
        $mous = Mou::with(['partner', 'fakultas'])->latest()->get();
        $moas = Moa::with(['partner', 'fakultas'])->latest()->get();
        $ias  = Ia::with('fakultas')->latest()->get();

        return view('home.index', compact('fakultas', 'mous', 'moas', 'ias'));
    }
}

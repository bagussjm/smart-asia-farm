<?php

namespace App\Http\Controllers;



use App\Models\Wahana;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $data = ['4','2','9'];
        $dataar = collect($data);
        $dataar->splice(1,1)->all();

      dd($dataar);
        return view('backend.dashboard');
    }
}

<?php

namespace App\Http\Controllers;



use App\Models\Wahana;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }
}

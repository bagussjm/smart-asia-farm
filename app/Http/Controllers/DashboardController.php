<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class DashboardController extends Controller
{
    public function index()
    {
        dd(QrCode::generate('kambing'));
        return view('backend.dashboard');
    }
}

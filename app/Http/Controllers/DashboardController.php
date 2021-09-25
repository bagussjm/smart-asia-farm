<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;


class DashboardController extends Controller
{
    public function index()
    {
        $qr = new Generator();
        dd($qr->generate('kambing'));
        return view('backend.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function visitorReport()
    {

        return view('backend.report.visitor');
    }
}

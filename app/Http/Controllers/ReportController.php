<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //

    public function index(){
        return view('company.report.index');
    }

    public function top5(){
        return view('company.report.especific');
    }
}

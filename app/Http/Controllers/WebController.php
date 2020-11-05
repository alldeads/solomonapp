<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReportRequest;

class WebController extends Controller
{
    public function saveReport(CreateReportRequest $request) {
    	dd(1);
    }
}

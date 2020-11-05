<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReportRequest;

use App\Models\Contact;

class WebController extends Controller
{
    public function saveReport(CreateReportRequest $request) {
    	try {
    		Contact::create($request->all());
    		session()->flash('success', 'Successfully submitted!');
    	} catch (\Exception $e) {
    		session()->flash('error', 'Something went wrong!');
    	}

    	return redirect()->route('contact');
    }
}

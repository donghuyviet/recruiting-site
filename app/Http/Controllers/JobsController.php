<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
class JobsController extends Controller
{
    public function index()
    {
    	return view('template.jobs', ['message' => 0]);
    }
    public function save(Request $request)
    {
    	$job = new Job;

    	$convert_start_date = date("Y-m-d", strtotime($request->input('start_date')));
    	$convert_end_date = date("Y-m-d", strtotime($request->input('end_date')));
		
        $job->orderer_id = $request->input('orderer_id');
    	$job->title = $request->input('title');
    	$job->description = $request->input('description');
    	$job->start_date = $convert_start_date;
		$job->end_date = $convert_end_date;

        $job->save();
    	return view('template.jobs', ['message' => 1]);
    }	
}

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
		
        $job->orderer_id = $job->get_oderer_id();
    	$job->title = $request->input('title');
    	$job->description = $request->input('description');
    	$job->start_date = $convert_start_date;
		$job->end_date = $convert_end_date;

        $job->save();
    	return view('template.jobs', ['message' => 1]);
    }
    public function listjobs()
    {
        $job = new Job;
        $Jobs = $job->get_list_jobs();
        return view('template.listjobs', ['Jobs'=>$Jobs]);
    }
    public function viewjob($id)
    {
         $job = new Job;
         $detail = $job->get_detail_job($id);
         return view('template.jobdetail', ['detail'=>$detail]);
    }
    public function view_author_job($orderer_id)
    {
        $job = new Job;
        $author = $job->get_author_jobs($orderer_id);
        return view('template.jobauthor', ['author'=>$author]);
    }	
}

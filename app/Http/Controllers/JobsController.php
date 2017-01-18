<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
class JobsController extends Controller
{
    public function index()
    {
    	return view('template.jobs', ['status'=> 0,'message' => ""]);
    }
    public function save(Request $request)
    {
    	$job = new Job;
        $status = 0;
        $message ="";
    	$convert_start_date = date("Y-m-d", strtotime($request->input('start_date')));
    	$convert_end_date = date("Y-m-d", strtotime($request->input('end_date')));
		
        if($job->get_oderer_id())
        {
            $job->orderer_id = $job->get_oderer_id();
        	$job->title = $request->input('title');
        	$job->description = $request->input('description');
        	$job->start_date = $convert_start_date;
    		$job->end_date = $convert_end_date;
            $job->save();
            $status = 1;
            $message = '求人の登録に成功しました。';
        }
        else{
            $status = 2;
            $message = 'プロファイルを登録ください。';
        }
    	return view('template.jobs', ['status' => $status,'message' => $message]);
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

<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\search;
use App\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SearchController extends BaseController
{
	public function index(){
		return view('search/index');
	}
	public function fillter(){
			return view('search/fillter');
	}
	public function location(){
			return view('search/location');
	}
	public function rosen(){
			return view('search/rosen');
	}
	public function station($id){
			return view('search/station',['id'=>$id]);
	}
	public function east(){
			return view('search/east');
	}
	public function condition(){
			return view('search/condition');
	}
	public function career(){
		// $current_user = Auth::user();
		// $Apply = DB::table('jobs') 
		// 	->join('job_applicant','jobs.id', '=', 'job_applicant.job_id')
		// 	->select('job_applicant.*' )
		// 	->get();
		// if($current_user){

		// }
		return view('search/career');
	}
	public function zenkoku(){
			return view('search/zenkoku');
	}

	function apply(Request $request){
        $current_user = Auth::user();
        $message = (object)[];
        if(isset($current_user)){
	        $current_date_time = date("Y-m-d H:i:s");
	        $job_id = $request->input('jobID',0);
	        $job_applicant_id = DB::table('job_applicant')
		        ->insertGetId(['job_id' => $job_id,'user_apply' => $current_user->id,'time_apply'=>$current_date_time,'status'=>0]
	    	);
	        if($job_applicant_id>0){
	            $message->status = "OK";
	            $message->message = "Apply successful !";
	            $message->applyStatus = "待っている";
	        }else{
	            $message->status = "ERROR";
	            $message->message = "ERROR";
	        }

        }else{
        	$message->message = "are you login";
        }
	        return response()->json($message);
    }
}

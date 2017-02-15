<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Location;
use App\Specializations;
use App\Benefit;
use App\Salary;
class JobsController extends Controller
{
    public function index()
    {
        $location = Location::all();
        $specializations = Specializations::all();
        $benefit = Benefit::all();
    	return view('template.jobs', ['status'=> 0,'message' => "",'locations'=>$location,'specializations' =>$specializations,'benefits' => $benefit]);
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
            if (trim($request->input('description')) == "") {
                 $status = 2;
                 $message = 'please description not empty';
            }
            else
            {
                $job->orderer_id = $job->get_oderer_id();
            	$job->title = $request->input('title');
            	$job->description = $request->input('description');
            	$job->start_date = $convert_start_date;
        		$job->end_date = $convert_end_date;
                $job->save();
                $customer = Job::find($job->id);
                //save location
                $id_location =  $request->input('location');
                $cat_ids = $id_location;
                $customer->locations()->attach($cat_ids);
                ///save skill
                $id_specializations =  $request->input('specializations');
                $customer->specializations()->attach($id_specializations);
                //save benefit
                $id_benefit =  $request->input('benefit');
                $customer->benefits()->attach($id_benefit);
                ///save salary
                $salary = new Salary;
                $salary->job_id = $job->id;
                $salary->salary_unit = $request->input('salary_unit');
                $salary->price = (int)$request->input('price');
                $customer->salarys()->save($salary);

                $status = 1;
                $message = '求人の登録に成功しました。';
            }
        }
        else{
            $status = 2;
            $message = 'プロファイルを登録ください。';
        }
        $location = Location::all();
        $specializations = Specializations::all();
        $benefit = Benefit::all();
    	return view('template.jobs', ['status' => $status, 'message' => $message, 'locations'=>$location, 'specializations' =>$specializations, 'benefits' => $benefit]);
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
        $jobs_author= $job->get_author_lists_jobs($orderer_id);
        return view('template.jobauthor', ['author'=>$author,'jobs_author' => $jobs_author]);
    }       
}

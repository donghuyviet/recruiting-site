<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Location;
use App\Specializations;
use App\Benefit;
use App\Salary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Confirm;
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
            elseif(count($request->input('location')) === 0 || count($request->input('specializations')) === 0 || count($request->input('benefit'))=== 0 )
            {
                 $status = 2;
                 $message = 'please select all field';
            }
            else
            {
                $job->orderer_id = $job->get_oderer_id();
                $job->title = $request->input('title');
                $job->description = $request->input('description');
                $job->work_id = 2;
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
                $salary->salary_unit = (int)$request->input('salary_unit');
                $salary->price = (int)$request->input('price');
                $customer->salarys()->save($salary);
                ////save station
                $id_station =  $request->input('station');
                $customer->stations()->attach($id_station);

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

    function apply(Request $request){
        $current_date_time = date("Y-m-d H:i:s");
        $message = (object)[];
        $current_user = Auth::user();
        $job_id = $request->input('jobID',0);
        $job_applicant_id = DB::table('job_applicant')->insertGetId(
            ['job_id' => $job_id, 'user_apply' => $current_user->id,'time_apply'=>$current_date_time,'status'=>0]
        );
        if($job_applicant_id>0){
            $message->status = "OK";
            $message->message = "Apply successful !";
            $message->applyStatus = "待っている";
        }else{
            $message->status = "ERROR";
            $message->message = "ERROR";
        }
        return response()->json($message);
    }
    public function get_list_jobs_submmit()
    {
        $job = new Job;
        $orderer_id = $job->get_oderer_id();
        $list_jobs =  DB::table('jobs')
                        ->where('jobs.orderer_id', $orderer_id)
                        ->select('jobs.*')
                        ->get();
       return view('template.listjobsapply', ['listjob' => $list_jobs ]);
    }
    public function get_user_apply_jobs(Request $request)
    {
        $id_job = $request->id_job;
         $list_user =  DB::table('job_applicant')
                        ->where('job_applicant.job_id', $id_job)
                        ->join('user', 'user.userid', '=', 'job_applicant.user_apply')
                        ->select('user.*','job_applicant.user_apply','job_applicant.id as id_job_applicant')
                        ->get();
        return response()->json(['users' => $list_user]);
    }
    public function profileUser(Request $request)
    {
       $id_user = $request->id;
       $user =  DB::table('user')
                        ->where('user.userid', $id_user)
                        ->select('user.*')
                        ->get();
        return view('template.profile-user', ['user' => $user[0] ]);
    }
    public function send_mail(Request $request){
         $message = (object)[];
         $content = [
            'name' => $request->name,
            'subject'=> 'Test Apply Jobs',
        ];
        //Mail::to($receiverAddress)->send(new Confirm($content));
        Mail::to($request->mail)->send(new Confirm($content));
        if (Mail::failures()) {
            $message->status = "ERROR";
            $message->message = 'Could not send';
        }
        else
        {
            $message->status = "OK";
            $message->message = "Apply successful";
            DB::table('job_applicant')
                        ->where('id', $request->id_apply)
                        ->update(['status' => 1]);
        }        
        return response()->json($message);
    }
}

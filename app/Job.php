<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
     protected $table = 'jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderer_id','title', 'description', 'start_date','end_date'
    ];
    public function get_oderer_id()
    {
    		$id_user = Auth::user()->id;
    		$user = DB::table('orderer')->where('user_id', $id_user)->first();
            if ($user === null) {
               return 0;
            }
            else
            {
    		  return $user->id;
            }

    }
    public function get_list_jobs()
    {
    	$Jobs = DB::table('jobs')
            ->join('orderer', 'jobs.orderer_id', '=', 'orderer.id')
            ->select('jobs.*', 'orderer.name')
            ->get();
            return $Jobs;
    }
    public function get_detail_job($id)
    {
    	//$job = DB::table('jobs')->where('id', $id)->first();
    	$job = DB::table('jobs')
    		->where('jobs.id', $id)
            ->join('orderer', 'jobs.orderer_id', '=', 'orderer.id')
            ->select('jobs.*', 'orderer.name')
            ->first();
    	return $job;
    }
    public function get_author_jobs($orderer_id)
    {
    	$author = DB::table('orderer')->where('id', $orderer_id)->first();
    	return $author;
    }
    public function get_author_lists_jobs($orderer_id)
    {
        $jobs_author = DB::table('jobs')->where('orderer_id', $orderer_id)->paginate(100);
        return $jobs_author;
    }
    public function locations(){
        return $this->belongsToMany('App\Location','job_location','job_id','location_id');
    }
    public function specializations(){
        return $this->belongsToMany('App\Specializations','job_specializations','job_id','specialization_id');
    }
    public function benefits(){
        return $this->belongsToMany('App\Benefit','job_benefit','job_id','benefit_id');
    }
    public function stations(){
        return $this->belongsToMany('App\Station','job_station','job_id','station_id');
    }
    public function salarys(){
        return $this->hasMany('App\Salary');
    }
    public function get_job_location($id_location)
    {
        $job_location = DB::table('location')
            ->where('location.id', $id_location)
            ->join('job_location', 'job_location.location_id', '=', 'location.id')
            ->join('jobs', 'jobs.id', '=', 'job_location.job_id')
            ->select('jobs.*')
            ->get();
        return $job_location;
    }
    public function get_job_specializations($id)
    {
        $job = DB::table('specializations')
            ->where('specializations.id', $id)
            ->join('job_specializations', 'job_specializations.specialization_id', '=', 'specializations.id')
            ->join('jobs', 'jobs.id', '=', 'job_specializations.job_id')
            ->select('jobs.*')
            ->get();
        return $job;
    }
    public function get_job_benefit($id)
    {
        $job = DB::table('benefit')
            ->where('benefit.id', $id)
            ->join('job_benefit', 'job_benefit.benefit_id', '=', 'benefit.id')
            ->join('jobs', 'jobs.id', '=', 'job_benefit.job_id')
            ->select('jobs.*')
            ->get();
        return $job;
    }
    public function get_job_salary($price,$unit)
    {
        $job_location = DB::table('salary')
            ->where('salary.salary_unit',$unit)
            ->whereBetween('salary.price', [1, $price])
            ->join('jobs', 'jobs.id', '=', 'salary.job_id')
            ->select('jobs.*')
            ->get();
        return $job_location;
    }
    public function get_all($id_location,$id_category,$id_benefit,$salary_from,$salary_to,$salary_unit)
    {
        $job = DB::table('jobs');
        if ($id_location)
        {
             $job->join('job_location', 'jobs.id', '=', 'job_location.job_id');
             $job->join('location', 'job_location.location_id', '=', 'location.id');
             $job->where('location.id', $id_location);
        }
        if ($id_category)
        {
             $job->join('job_specializations', 'jobs.id', '=', 'job_specializations.job_id');
             $job->join('specializations', 'job_specializations.specialization_id', '=', 'specializations.id');
             $job->where('specializations.id', $id_category);
        }
        if ($id_benefit)
        {
             $job->join('job_benefit', 'jobs.id', '=', 'job_benefit.job_id');
             $job->join('benefit', 'job_benefit.benefit_id', '=', 'benefit.id');
             $job->where('benefit.id', $id_benefit);
        }
        if($salary_from || $salary_to)
        {
            $job->join('salary', 'jobs.id', '=', 'salary.job_id');
            $job->where('salary.salary_unit',$salary_unit);
        }
        if ($salary_from)
        {
             $job->where('salary.price','>=',$salary_from);
        }
        if ($salary_to)
        {
             $job->where('salary.price', '<=', $salary_to);
        }
        $result = $job->select('jobs.*')->get();
        return $result;
    }
}
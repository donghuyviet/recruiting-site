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
    		$user = DB::table('orderer')->where('user_id', $id_user)->get();
    		return $user[0]->id;

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
}
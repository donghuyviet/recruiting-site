<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Orderer extends Model
{
    //
    protected $table = 'orderer';
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'tel',
        'companyname',
        'email'
    ];

    public function list_order()
    {   $get_id = Auth::user()->id;
        $data = DB::table('orderer')->where('user_id',$get_id)->get();
        return $this->id;
    }
    public function get_detail($id)
    {
    	$job = DB::table('jobs')->where('jobs.id', $id)  ->join('orderer', 'jobs.orderer_id', '=', 'orderer.id')->select('jobs.*', 'orderer.name')->first();
    	return $job;
    }
}

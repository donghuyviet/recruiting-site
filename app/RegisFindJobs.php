<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisFindJobs extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'userid',
        'name',
        'address',
        'tel',
        'email',
        'text'
    ];
    public function get_user(){
	$seeker = DB::table('user')->select('user.userid')->where('userid',Auth::user()->id)->get();
    	return $seeker->userid;
    }
}

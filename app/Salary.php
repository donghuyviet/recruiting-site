<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Salary extends Model
{
    protected $table = 'salary';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id','salary_unit','price'
    ];
    public function job()
    {
        return $this->belongsTo('App\Job');
    }
    public function get_all_salary_unit()
    {
        $salary_unit = DB::table('salary_unit')->get();
        return $salary_unit;
    }
}

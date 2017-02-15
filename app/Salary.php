<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}

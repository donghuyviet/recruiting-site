<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}

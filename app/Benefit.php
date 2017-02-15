<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $table = 'benefit';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_benefit'
    ];
    public function jobs(){
        return $this->belongsToMany('App\Job');
    }
}

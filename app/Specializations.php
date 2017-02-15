<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specializations extends Model
{
    protected $table = 'specializations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_specializations'
    ];
    public function jobs(){
        return $this->belongsToMany('App\Job');
    }
}

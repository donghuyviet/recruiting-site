<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
     protected $table = 'stations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id','name_station'
    ];
    public function jobs(){
        return $this->belongsToMany('App\Job');
    }
    public function routers(){
       return $this->belongsToMany('App\Router','router_station','router_id','station_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $table = 'routes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id','location_id','name_router'
    ];
    public function stations(){
        return $this->belongsToMany('App\Station','router_station','router_id','station_id');
    }
}

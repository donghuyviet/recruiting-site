<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function oderererAvailabel(){
        $result = DB::table($this->table)->join('jobs', 'orderer.id', '=', 'jobs.orderer_id')->get();
        return $result;
    }
}

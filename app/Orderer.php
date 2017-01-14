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
}

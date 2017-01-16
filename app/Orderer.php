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

    public function getId()
    {
        $data = DB::table('users')->whereIn('id', $user)->get();
        return $this->id;
    }
}

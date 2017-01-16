<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisFindJobs extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'userid',
        'name',
        'address',
        'tel',
        'email',
        'text'
    ];
}

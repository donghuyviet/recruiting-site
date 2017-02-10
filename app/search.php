<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Search extends Model
{
    protected $table = 'search';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'keyword', 'hit', 'vote'
    ];
    public function insert($keyword,$hit,$vote)
    {
    	DB::table('search')->insert(
		    ['keyword' => $keyword, 'hit' => $hit, 'vote' => $vote]
		);
    }
}

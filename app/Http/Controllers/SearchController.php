<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\search;
class SearchController extends BaseController
{
	public function index(){
		$keyword = Search::all();
	    return response()->json([
	         'data' => $keyword
	    ], 200);
	}
	public function store(Request $request)
	{
	    if(! $request->keyword){
	        return response()->json([
	            'error' => [
	                'message' => 'failse'
	            ]
	        ], 422);
	    }
	    $search = new Search;
 		$search->keyword = $request->keyword;
    	$search->hit = 1;
    	$search->vote = 1;
        $search->save();
	    return response()->json([
	       'status' => 1,
	       'message' => 'success'
	    ]);
	}
}

<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\search;

class ApiSearchController extends BaseController
{
   public function index(Request $request)
	{
		$popular = Search::orderBy('hit', 'DESC')->select('keyword')->take(5)->get();
		$vote = Search::orderBy('vote', 'DESC')->take(5)->get();
		/*return response()
		->json([
         'data' => [
          'popular'=> $popular->keyword,
          'favorite' => $vote->keyword
          ]
    	], 200);*/
		$countries = $popular->lists('keyword');
		return $countries;
	}
	public function get_job_in_keyrord(Request $request)
	{
		$search_term = $request->keyword;
		$jokes = Job::orderBy('id', 'DESC')->where('title', 'LIKE', "%$search_term%")->select('id', 'body', 'user_id')->paginate($limit);
	}
}

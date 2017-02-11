<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\search;
use App\Job;

class ApiSearchController extends BaseController
{
   public function index(Request $request)
	{
		$limit = isset($request->limit) && (int)$request->limit ? (int)$request->limit : 5;
		$popular = Search::orderBy('hit', 'DESC')->pluck('keyword')->take($limit);
		$vote = Search::orderBy('vote', 'DESC')->pluck('keyword')->take($limit);

		return response()
		->json([
         'data' => [
          'popular'=> $popular,
          'favorite' => $vote
          ]
    	], 200);
	}
	public function get_job_in_keyrord(Request $request)
	{
		$keyword = $request->keyword;
		$limit = isset($request->limit) && (int)$request->limit ? (int)$request->limit : 5;
		$posts = Job::orderBy('id', 'DESC')->whereRaw(
        "MATCH(title,description) AGAINST(? IN BOOLEAN MODE)", array($keyword))->get();
        return response()
		->json([
         'data' => $posts
    	], 200);
	}
}

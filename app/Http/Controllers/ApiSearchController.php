<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\search;
use App\Job;
use App\Location;
use App\Specializations;
use App\Benefit;
use App\Salary;

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
	public function get_job_location(Request $request)
	{
		$id = isset($request->id_location) && (int)$request->id_location ? (int)$request->id_location : 0;
		$job_location = new Job;
		$result = $job_location->get_job_location($id);
		return response()
		->json([
         'data' => $result
    	], 200);
	}
	public function get_job_specializations(Request $request)
	{
		$id = isset($request->id) && (int)$request->id ? (int)$request->id : 0;
		$job_specialized = new Job;
		$result = $job_specialized->get_job_specializations($id);
		return response()
		->json([
         'data' => $result
    	], 200);
	}
	public function get_job_benefit(Request $request)
	{
		$id = isset($request->id) && (int)$request->id ? (int)$request->id : 0;
		$job_benefit = new Job;
		$result = $job_benefit->get_job_benefit($id);
		return response()
		->json([
         'data' => $result
    	], 200);
	}
	public function get_job_salary(Request $request)
	{
		$option_salary = (int)$request->option;
		$salary = (int)$request->price;
		$job_location = new Job;
		switch ($option_salary) {
			case 0:
				$result = $job_location->get_job_salary($salary,'day');
				break;
			case 1:
				$result = $job_location->get_job_salary($salary,'month');
				break;
			case 2:
				$result = $job_location->get_job_salary($salary,'year');
				break;
			default:
				$result = 0;
				break;
		}
		return response()
		->json([
         'data' => $result
    	], 200);
	}
	public function get_all_locations(){
		 $locations = Location::all();
		 return response()
		->json([
         'data' => $locations
    	], 200);
	}
	public function get_all_category(){
		 $category = Specializations::all();
		 return response()
		->json([
         'data' => $category
    	], 200);
	}
	public function get_all_benefit(){
		 $benefit = Benefit::all();
		 return response()
		->json([
         'data' => $benefit
    	], 200);
	}
	public function get_all_salary_unit(){
		 $salary = new Salary;
		 $salary_unit = $salary->get_all_salary_unit();
		 return response()
		->json([
         'data' => $salary_unit
    	], 200);
	}
}

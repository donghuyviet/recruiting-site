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
	function search_all(Request $request){
		$id_location = isset($request->id_location) && (int)$request->id_location ? (int)$request->id_location : 0;
		$id_category = isset($request->id_category) && (int)$request->id_category ? (int)$request->id_category : 0;
		$id_benefit =  isset($request->id_benefit) && (int)$request->id_benefit ? (int)$request->id_benefit : 0;
		$salary_from = (int)$request->salary_from;
		$salary_to =   (int)$request->salary_to ;
		$salary_unit = (int)$request->salary_unit;
		$job_location = new Job;
		$result = $job_location->get_all($id_location,$id_category,$id_benefit,$salary_from,$salary_to,$salary_unit);
		return response()
		->json([
         'data' => $result
    	], 200);
	}
	public function get_all_locations(Request $request){
		if (isset($request->id_location) && (int)$request->id_location) {
			 $locations = Location::find((int)$request->id_location);
		}
		else
		     $locations = Location::all();
		return response()
		->json([
         'data' => $locations
    	], 200);
	}
	public function get_all_category(Request $request){
		if (isset($request->id_category) && (int)$request->id_category) {
			$category = Location::find((int)$request->id_category);
		}
		else
		 	$category = Specializations::all();
		 return response()
		->json([
         'data' => $category
    	], 200);
	}
	public function get_all_benefit(Request $request){
		if (isset($request->id_benefit) && (int)$request->id_benefit) {
			$benefit = Location::find((int)$request->id_benefit);
		}
		else
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

<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiSearchTrainController extends BaseController
{
    public function index()
    {
        $myarray = array();
    	$location = DB::table('location')->select('id','name_location')->get();
        foreach ($location as $key => $value) {
           $myarray[$key] = array('id_location' =>$value->id, 'name_location' =>$value->name_location, 'company'=> $this->get_company($value->id));
        }
    	return response()
		->json([
         'location' => $myarray
    	], 200);
    }
    public function get_station(Request $request)
    {
        $id_router = $request->id_router;
        $router = DB::table('routes')->where('id',$id_router)->first();
        $station = DB::table('router_station')
                 ->where('router_station.router_id', $id_router)
                 ->join('stations', 'stations.id', '=', 'router_station.station_id')
                 ->select('stations.id','stations.name_station')
                 ->get();
        return response()
        ->json([
         'data' => $station,
         'router' => $router
        ], 200);
    }
    public function get_station_location(Request $request)
    {
        $array_location = ($request->array_location);
        $arr = explode(",", $array_location);
        foreach ($arr AS $index => $value)
            $arr[$index] = (int)$value; 

        $station = DB::table('stations')
                 ->whereIn('location_id',$arr)
                 ->get();
        return response()
        ->json([
         'stations' => $station
        ], 200);
    }
    public function get_router($id_location,$id_company)
    {
        $router = DB::table('routes')
                ->join('location', 'location.id', '=', 'routes.location_id')
                ->join('company', 'company.id', '=', 'routes.company_id')
                ->select('routes.*')
                ->where('location.id',$id_location)
                ->where('company.id',$id_company)
                ->get();
        return $router;
    }
    public function get_all_time(Request $request){    
         $time = DB::table('work_day')->orderBy('id')->get();
         return response()
        ->json([
         'data' => $time
        ], 200);
    }
    public function get_company($id_location)
    {
        $myarray = array();
        $company = DB::table('company')
                ->join('routes', 'company.id', '=', 'routes.company_id')
                ->join('location', 'location.id', '=', 'routes.location_id')
                ->select('routes.company_id','routes.location_id','company.name_company')
                ->groupBy('routes.company_id','routes.location_id','company.name_company')        
                ->where('location.id',$id_location)
                ->get();
        foreach ($company as $key => $value) {
                $myarray[$key] =  array('name' =>$value->name_company,'id' => $value->company_id, 'router'=> $this->get_router($id_location,$value->company_id));
         }           
        return $myarray;
    }
    public function get_job_station(Request $request)
    {
        $array_statiton = ($request->id_statiton);
        $arr = explode(",", $array_statiton);
        foreach ($arr AS $index => $value)
            $arr[$index] = (int)$value; 

        $job_station = DB::table('job_station')
                 ->whereIn('job_station.station_id',$arr)
                 ->join('jobs','jobs.id', '=', 'job_station.job_id')
                 ->select('jobs.id')
                 ->groupBy('jobs.id')
                 ->get();
        $result = array_pluck($job_station,'id');
        return response()
        ->json([
         'data' => $this->get_jobs($result),
        ], 200);
    }
    public function get_job_train(Request $request)
    {
        $result = [];
        $result1 = [];
        $result2 = [];
        if(isset($request->id_router))
        {
            $array_router = ($request->id_router);
            $arr = explode(",", $array_router);
            foreach ($arr AS $index => $value)
                $arr[$index] = (int)$value;

            $list_jobs = DB::table('routes')
                     ->whereIn('routes.id',$arr)
                     ->join('router_station','router_station.router_id', '=', 'routes.id')
                     ->join('job_station','job_station.station_id', '=', 'router_station.station_id')
                     ->join('jobs','jobs.id', '=', 'job_station.job_id')
                     ->select('jobs.id')
                     ->groupBy('jobs.id')
                     ->get();
            $result1 = array_pluck($list_jobs,'id');
        }
        if(isset($request->id_statiton))
        {
            $array_statiton = ($request->id_statiton);
            $arr = explode(",", $array_statiton);
            foreach ($arr AS $index => $value)
                $arr[$index] = (int)$value; 

            $job_station = DB::table('job_station')
                     ->whereIn('job_station.station_id',$arr)
                     ->join('jobs','jobs.id', '=', 'job_station.job_id')
                     ->select('jobs.id')
                     ->groupBy('jobs.id')
                     ->get();
            $result2 = array_pluck($job_station,'id');
        }
        $result = $result1 + $result2;
        return response()
        ->json([
         'data' => $this->get_jobs($result),
        ], 200);
    }
    public function get_jobs($id)
    {
        $list_jobs = DB::table('jobs')
                    ->whereIn('jobs.id', $id)
                    ->get();
        return  $list_jobs;
    }
    public function get_district()
    {
        $myarray = array();
        $list_district = DB::table('district')->select('id','name_district')->get();
        foreach ($list_district as $key => $value) {
           $myarray[$key] = array('id_district' => $value->id, 'name_district' => $value->name_district, 'city'=> $this->get_city_location($value->id));
        }
        return response()
        ->json([
         'district' => $myarray
        ], 200);
    }
    public function get_city_location($id)
    {
        $myarray = array();
        $citis = DB::table('city')
                    ->where('city.district_id', $id)
                    ->select('id','name_city')
                    ->get();
        foreach ($citis as $key => $value) {
           $myarray[$key] = array('id_city' => $value->id, 'name_city' => $value->name_city, 'location'=> $this->get_city($value->id));
        }
        return $myarray;
    }
    public function get_city($id)
    {
        $location = DB::table('location')
                    ->where('location.city_id', $id)
                    ->select('id','name_location')
                    ->get();
        return  $location;
    }
    public function get_jobs_areaSearch(Request $request)
    {
        $result = [];
        $result1 = [];
        $result2 = [];
        if(isset($request->id_city))
        {
            $array_city = ($request->id_city);
            $arr = explode(",", $array_city);
            foreach ($arr AS $index => $value)
                $arr[$index] = (int)$value;

            $list_city = DB::table('location')
                     ->whereIn('location.city_id',$arr)
                     ->join('job_location','job_location.location_id', '=', 'location.id')
                     ->join('jobs','jobs.id', '=', 'job_location.job_id')
                     ->select('jobs.id')
                     ->groupBy('jobs.id')
                     ->get();
            $result1 = array_pluck($list_city,'id');
        }
        if(isset($request->id_location))
        {
            $array_location = ($request->id_location);
            $arr = explode(",", $array_location);
            foreach ($arr AS $index => $value)
                $arr[$index] = (int)$value; 

            $list_loc = DB::table('job_location')
                     ->whereIn('job_location.location_id',$arr)
                     ->join('jobs','jobs.id', '=', 'job_location.job_id')
                     ->select('jobs.id')
                     ->groupBy('jobs.id')
                     ->get();
            $result2 = array_pluck($list_loc,'id');
        }
        $result = array_merge($result1 , $result2);
        $result = array_unique($result);
        return response()
        ->json([
         'data' => $this->get_jobs($result)
        ], 200);
    }
    public function get_condition_search(Request $request)
    {
        $city = "";
        $location = "";
        if(isset($request->id_city))
        {
            $array_city = ($request->id_city);
            $arr = explode(",", $array_city);
            foreach ($arr AS $index => $value)
                $arr[$index] = (int)$value; 
             $city = DB::table('city')
                    ->whereIn('city.id', $arr)
                    ->pluck('name_city')->take(100);
        }
        if(isset($request->id_location))
        {
            $array_location = ($request->id_location);
                $arr2 = explode(",", $array_location);
                foreach ($arr2 AS $index => $value)
                    $arr2[$index] = (int)$value; 
             $location = DB::table('location')
                    ->whereIn('location.id', $arr2)
                    ->pluck('name_location')->take(100);
        }
       return response()
        ->json([
         'city' => $city->implode('/'),
         'location' => $location->implode('/')
        ], 200);
    }
    public function get_location_by_city(Request $request)
    {
        $city='';
        $id_city = ($request->id_city);
        if(isset($id_city))
        {
            $city = DB::table('city')
                    ->where('city.id', $id_city)
                    ->first();
            $result = DB::table('city')
                 ->where('city.id' , $id_city)
                 ->join('location','location.city_id', '=', 'city.id')
                 ->select('location.*')
                 ->get();
        }
        else
        {
            $city = DB::table('city')->first();
            $result = DB::table('city')
                 ->where('city.id' , $city->id)
                 ->join('location','city.id', '=','location.city_id' )
                 ->select('location.*','city.id as id_city','name_city')
                 ->get();
        }
        return response()
        ->json([
         'city' => $city,
         'location' => $result
        ], 200);
    }
}
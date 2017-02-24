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
        $station = DB::table('router_station')
                 ->where('router_station.router_id', $id_router)
                 ->join('stations', 'stations.id', '=', 'router_station.station_id')
                 ->select('stations.id','stations.name_station')
                 ->get();
        return response()
        ->json([
         'data' => $station
        ], 200);
    }
    public function get_station_location()
    {
        
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
}
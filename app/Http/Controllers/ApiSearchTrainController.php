<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiSearchTrainController extends BaseController
{
    public function get_company()
    {
        $myarray = array();
    	$location = DB::table('location')->select('id','name_location')->get();
        foreach ($location as $key => $value) {
           $myarray[$key] = array('id_location' =>$value->id, 'name_location' =>$value->name_location, 'company'=> $this->get_com($value->id));
        }
    	return response()
		->json([
         'location' => $myarray,
         'router' => $this->get_router(1,3)
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
    public function get_com($id_location)
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

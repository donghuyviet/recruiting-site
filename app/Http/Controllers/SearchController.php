<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\search;
class SearchController extends BaseController
{
	public function index(){
		return view('search/index');
	}
	public function fillter(){
			return view('search/fillter');
	}
	public function location(){
			return view('search/location');
	}
}

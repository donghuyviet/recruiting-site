<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
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

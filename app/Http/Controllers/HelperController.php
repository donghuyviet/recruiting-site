<?php
/**
 * Created by PhpStorm.
 * User: SonLe
 * Date: 08/09/2016
 * Time: 2:46 AM
 */

namespace App\Http\Controllers;

use \Exception as Exception;
use Illuminate\Support\Facades\Auth;


class HelperController
{
	public static function user() {

		try{
			$user = Auth::user();
			return $user['attributes'];

		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public static function  getUserId(){
		try{
			$user = Auth::user();
			return $user['attributes']['id'];

		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public static function  getUserEmail(){
		try{
			$user = Auth::user();
			return $user['attributes']['email'];

		} catch(Exception $e) {
			die($e->getMessage());
		}
	}



}
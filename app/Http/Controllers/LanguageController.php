<?php
/**
 * Created by PhpStorm.
 * User: LuongNK
 * Date: 08/12/2016
 * Time: 2:46 AM
 */

namespace App\Http\Controllers;

use \App\Models\TransModel AS Tran;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use \Request AS Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class LanguageController extends Controller
{

	public function index($lang = 'jp'){

        $params = Request::all();
		$langs = ['en', 'jp', 'vi'];

		if( in_array($lang, $langs) ){
			Session::set('lang', $lang);
            Redirect::to($params['ret'])->send();
		}

	}
}
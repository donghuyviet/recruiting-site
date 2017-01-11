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
use App\Models\UserModuleModel;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
	public static function index() {
		$id = Auth::user()->id;
		return view('template.index', []);
	}
}
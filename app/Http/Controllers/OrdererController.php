<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orderer;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class OrdererController extends Controller
{
    public function index()
    {
            // $orderer = DB::table('orderer')->where('user_id','=',Auth::user()->id)->paginate(100);
            // $get_user = Auth::user()->id;
            // $orderer = DB::table('orderer')->where('user_id',$get_user)->paginate(100);
        $orderer = DB::table('orderer')->where('user_id','=',Auth::user()->id)->paginate(100);

        $jobs = DB::table('orderer')->join('jobs', 'orderer.id', '=', 'jobs.orderer_id')->paginate(100);
        return view('orderer.index', ['orderer'=>$orderer,'jobs'=>$jobs] );
        // $ord = new Orderer;
        // $orderer = $ord->list_order();
        // return view('orderer.index', ['orderer'=>$orderer] );
    }

    public function view_detail($id){
        $detail = DB::table('orderer')->join('jobs', 'orderer.id', '=', 'jobs.orderer_id')->select('orderer.*','jobs.*')->where('orderer.orderer_id', $id);
        // $ord = new Orderer;
        // $detail = $ord->get_detail($id);
        return view('orderer.detail',['detail'=>$detail]);
    }
    public function create(){
        return view('orderer.register');
    }

    public function store(Request $request)
    {

        $this->validate($request,
            [
                'name'=>'required|unique:orderer',
                'address'=>'required',
                'tel'=>'required|unique:orderer',
                'companyname'=>'required',
                'email'=>'required|unique:orderer',
            ],
            [
                'name.required'=>'名前を入力してください。',
                'name.unique'=>'名前が存在します ',
                'address.required'=>'アドレスを入力してくださ',
                'tel.required'=>'電話番号を入力してください',
                'tel.unique'=>'携帯電話を存在',
                'companyname.required'=>'会社名を入力してください。',
                'email.required'=>'メールアドレスを入力してくださ',
                'email.unique'=>'存在する電子メール',
            ]
            );
            $orderer = new Orderer;
            $orderer->user_id = Auth::user()->id;
            $orderer->name = $request->name;
            $orderer->address = $request->address;
            $orderer->tel = $request->tel;
            $orderer->companyname = $request->companyname;
            $orderer->email = $request->email;

            $orderer->save();
            return redirect('/orderer/entry')-> with('success', 'register '.$orderer -> name.' success');

    }
}

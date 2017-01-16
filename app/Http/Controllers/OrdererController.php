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
        $orderer = DB::table('orderer')->where('user_id','=',Auth::user()->id)->paginate(100);
        return view('orderer.index', ['orderer'=>$orderer]);
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
                'name.required'=>'あなたが名前を入力しませんでした',
                'name.unique'=>'名前が存在します ',
                'address.required'=>'あなたはアドレスをインポートしません',
                'tel.required'=>'携帯電話を入力していません',
                'tel.unique'=>'携帯電話を存在',
                'companyname.required'=>'会社が入力されていません',
                'email.required'=>'メールアドレスを入力していません',
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

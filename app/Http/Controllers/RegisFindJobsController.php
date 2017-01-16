<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisFindJobs;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisFindJobsController extends Controller
{
    public function entry(){
    	return view('regisFindJobs.register');
    }

    public function store(Request $request){
    	$this->validate($request, 
            [
                'name'=>'required|unique:user',
                'address'=>'required',
                'tel'=>'required|unique:user',
                'email'=>'required|unique:user',
                'text'=>'required',
            ],
            [
                'name.required'=>'あなたが名前を入力しませんでした',
                'name.unique'=>'名前が存在します ',
                'address.required'=>'あなたはアドレスをインポートしません',
                'tel.required'=>'携帯電話を入力していません',
                'tel.unique'=>'携帯電話を存在',
                'email.required'=>'メールアドレスを入力していません',
                'email.unique'=>'存在する電子メール',
                'text.required'=>'自己紹介',
            ]
            );
            $findJobs = new RegisFindJobs;
            $findJobs->userid = Auth::user()->id;
            $findJobs->name = $request->name;
            $findJobs->address = $request->address;
            $findJobs->tel = $request->tel;
            $findJobs->email = $request->email;
            $findJobs->text = $request->text;

            $findJobs->save();
            return redirect('/findjobsdetai/entry')-> with('success', 'register detail find jobs '.$findJobs -> name.' success');
    }

}

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
        $get_user=Auth::user()->id;
        $seeker = DB::table('user')->where('userid',$get_user)->first();
        if ($seeker) {
            return redirect('/seeker/edit/'.$seeker->id);
        }else{
    	    return view('regisFindJobs.register');
        }
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
                        'name.required'=>'名前を入力してください。',
                        'name.unique'=>'名前が存在します ',
                        'address.required'=>'アドレスを入力してくださ',
                        'tel.required'=>'電話番号を入力してください。',
                        'tel.unique'=>'携帯電話を存在',
                        'email.required'=>'メールアドレスを入力していません',
                        'email.unique'=>'存在する電子メール',
                        'text.required'=>'自己紹介',
                    ]);
                    $findJobs = new RegisFindJobs;
                    $findJobs->userid = Auth::user()->id;
    	            $findJobs->name = $request->name;
    	            $findJobs->address = $request->address;
    	            $findJobs->tel = $request->tel;
    	            $findJobs->email = $request->email;
    	            $findJobs->text = $request->text;

    	            $findJobs->save();
    	            return redirect('/seeker/edit/'.$findJobs->id)-> with('success', 'register detail find jobs '.$findJobs -> name.' success');
    }

    public function edit($id){
    	$edit = RegisFindJobs::find($id);
    	return view('/regisFindJobs.edit', ['edit'=>$edit]);
    }

    public function update(Request $request, $id){
        $update = regisFindJobs::find($id);
    	$this->validate($request,
            [],
            []);
            $update->userid = Auth::user()->id;
            $update->name = $request->name;
            $update->address = $request->address;
            $update->tel = $request->tel;
            $update->email = $request->email;
            $update->text = $request->text;

            $update->save();
            return redirect('/seeker/edit/'.$id)-> with('success', 'update detail find jobs '.$update -> name.' success');
    }
}

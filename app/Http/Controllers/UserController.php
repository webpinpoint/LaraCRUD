<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),
        [
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed'
        ]);

        if($validate->fails()){
            return redirect()->back()->withStatus($validate->errors());
        }else{
             User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>$request->input('password')
            ]);
            return redirect(route('home'))->withStatus('User has been created');
        }
        
       
    }

    public function edit($id)
    {
        $user= User::where('id',$id)->first();
        return view('users.edit',compact(
            ['user']
        ));
    }

    public function update(Request $request)
    {

$validate=Validator::make($request->all(),
        [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed'
        ]);

        if($validate->fails()){
            return redirect()->back()->withStatus($validate->errors());
        }else{
             User::where('id',$request->input('id'))->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>$request->input('password')
            ]);
            return redirect(route('home'))->withStatus('User has been updated');
        }
    }

    public function delete(Request $request)
    {
         User::where('id',$request->input('id'))->delete();
         return redirect()->back()->with('status', 'User has been deleted');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        $users= User::paginate(5);
        return view('home',compact([
            'users'
        ]));

        // $data=array('users_list'=>$users);
        // return view('home')->with($data);
    }
}
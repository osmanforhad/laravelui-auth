<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //__Function for deposit money__//
    public function deposit()
    {
        return view('deposit');
    }


    //__Function for User Details__//
    public function details($id)
    {
         $userId = Crypt::decryptString($id);
         echo $userId;

                 //DB Query
        //  $userdata =  DB::table('users')->where('id', $userId)->first();
         
    }

    //__Function for Store data//
    public function store(Request $request)
    {
        $password = Hash::make($request->input('password'));

        echo $password;
         
    }


}

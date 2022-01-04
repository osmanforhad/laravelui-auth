<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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

    //__Function for change password__//
    public function password_change()
    {
        return view('password_change');
    }

    //__Function for update password__//
    public function update_password(Request $request)
    {
        $request->validate([
            'currecnt_password' => 'required',
            'password' => 'required|min:6|max:16|string|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if(Hash::check($request->currecnt_password, $user->password))
        {
            // $user->password = Hash::make($request->password); //Hashing password from user input
            // $user->save();
              // Auth::logout();
            // return redirect()->route('login');

            $data = array(
                'password' => Hash::make($request->password),
            );

            DB::table('users')->where('id', Auth::id())->update($data);
            // Auth::logout();
            // return redirect()->route('login');

            return redirect()->back()->with('success', 'Password Change Succesfully!');
        }
        else {
            return redirect()->back()->with('error', 'Current Password Not Match!');
        }

    }


}

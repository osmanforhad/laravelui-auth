<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
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

    //Index method for show all class from DB__//
    public function index()
    {
        $class = DB::table('classes')->get();
        return view('admin.class.index', compact('class'));
    }

}

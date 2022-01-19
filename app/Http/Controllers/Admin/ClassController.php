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
        // $class = DB::table('classes')->simplePaginate('3');
        $class = DB::table('classes')->paginate('3');
        return view('admin.class.index', compact('class'));
    }

     //create method for show from page__//
     public function create()
     {
         
         return view('admin.class.create');
     }

      //store method for insert data into db__//
      public function store(Request $request)
      {
        $request->validate([
            'class_name' => 'required|unique:classes',
        ]);

        $data = array(
            'class_name' => $request->class_name,
        );

        DB::table('classes')->insert($data);

        return redirect()->back()->with('success', 'Successfully Inserted');

      }

      //__destroy method for delete reocrd from DB__//
      public function destroy($id)
      {
          DB::table('classes')->where('id', $id)->delete();
          return redirect()->back()->with('success', 'Successfully Deleted');
      }

      //edit method for show from page__//
     public function edit($id)
     {
        $class = DB::table('classes')->where('id', $id)->first();
         return view('admin.class.edit', compact('class'));
     }

     //Update method for update data in DB__//
     public function update(Request $request, $id)
     {
        $request->validate([
            'class_name' => 'required',
        ]);

        $data = array(
            'class_name' => $request->class_name,
        );

        DB::table('classes')->where('id', $id)->update($data);

         return redirect()->route('class.index')->with('success', 'Successfully Updated');
     }
    

}

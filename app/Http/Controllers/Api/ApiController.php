<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class ApiController extends Controller
{
    public function index()
    {

        $class = Sclass::all();

        return response()->json($class);
    } // End Method

    public function Store(Request $request)
    {

        $validationData = $request->validate([

            'class_name' => 'required|unique:sclasses|min:2|max:20'

        ]);

        Sclass::insert([
            'class_name' => $request->class_name,
            'created_at' => Carbon::now(),
        ]);

        return response('Student Class Added Successfully');
    } // End Method


    public function Edit($id)
    {

        $edit =  Sclass::findOrFail($id);

        return response()->json($edit);
    } // End Method

    public function Update(Request $request, $id)
    {

        $validationData = $request->validate([

            'class_name' => 'required|min:2|max:20'

        ]);
        Sclass::findOrFail($id)->update([
            'class_name' => $request->class_name,
        ]);
        return response('Class Update Successfully');
    } // End Method

    public function Delete($id){

        Sclass::findOrfail($id)->delete();

        return response('Student Delete Successfully');

  } // End Method

}

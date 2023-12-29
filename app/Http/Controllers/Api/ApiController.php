<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;
use App\Models\Subject;
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

    public function Delete($id)
    {

        Sclass::findOrfail($id)->delete();

        return response('Student Delete Successfully');
    } // End Method



    public function SubjectStore(Request $request)
    {
        $validationData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|min:2|max:20',
            'subject_code' => 'required'
        ]);

        Subject::insert([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
            'created_at' => Carbon::now(),
        ]);

        return response('Student subject insert successfully');
    } // End Method


    public function IndexSubject()
    {

        $subject = Subject::latest()->get();

        return response()->json($subject);
    } // End Method



    public function subjectEdit($id)
    {

        $edit =   Subject::findOrFail($id);

        return  response()->json($edit);
    }
    // End method

    public function subjectUpdate(Request $request, $id)
    {


        $validationData = $request->validate([

            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects',
            'subject_code' => 'required',
        ]);
        Subject::findOrFail($id)->Update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        return response('subject update successfully');
    } // End 


    public function subjectDelete($id)
    {
        Subject::findOrFail($id)->delete();

        return response('subject delete successfully');
    } // End Method




}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\category_doctor;
use App\Models\Doctor;
use App\Models\MedicineDetails;
use App\Models\MedicineList;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $doctor = Doctor::all();

        return view('backend.doctor',compact('doctor','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $photo = $request->photo;
        $phone =$request->phone;
        $Speciality =$request->Speciality;
        $Degree =$request->Degree;
        $email =$request->email;
        $hospital =$request->hospital;
        $cat_id =$request->cat_id;

        $image_path = $request->file('photo')->store('image', 'public');
        $FileKey = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path;

        $doctor = new Doctor();
        $doctor->category_id = $cat_id;
        $doctor->doctor_name = $name;
        $doctor->img = $FileKey;
        $doctor->Speciality = $Speciality;
        $doctor->Degree = $Degree;
        $doctor->Email = $email;
        $doctor->Phone = $phone;
        $doctor->Hospital = $hospital;

        $doctor->save();
        $id = Doctor::max('id');
        $cat_doct = new category_doctor();
        $cat_doct->category_id = $cat_id;
        $cat_doct->doctor_id = $id-1;
        $cat_doct->save();
        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::with('category')->find($id);
       //return $doctor->id;
        $category = Category::all();
        return view('backend.doctor_edit',compact('doctor','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $photo = $request->photo;
        $phone =$request->phone;
        $Speciality =$request->Speciality;
        $Degree =$request->Degree;
        $email =$request->email;
        $hospital =$request->hospital;
        $cat_id =$request->cat_id;

        $image_path = $request->file('photo')->store('image', 'public');
        $FileKey = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path;

        $doctor = Doctor::find($id);
        $doctor->category_id = $cat_id;
        $doctor->doctor_name = $name;
        $doctor->img = $FileKey;
        $doctor->Speciality = $Speciality;
        $doctor->Degree = $Degree;
        $doctor->Email = $email;
        $doctor->Phone = $phone;
        $doctor->Hospital = $hospital;

        $doctor->save();
        //$id1 = category_doctor::where('doctor_id',$id)->get();

        $cat_doct = category_doctor::find($id);
        $cat_doct->category_id = $cat_id;
        $cat_doct->doctor_id = $id;
        $cat_doct->save();
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor_cat = category_doctor::find($id);

        if(is_null($doctor)){
            return redirect()->route('doctor.index');
        }

        $doctor->delete();
        $doctor_cat->delete();
        return redirect()->route('doctor.index');
    }
}

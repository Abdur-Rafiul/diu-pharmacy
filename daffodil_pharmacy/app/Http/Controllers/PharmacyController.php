<?php

namespace App\Http\Controllers;

use App\Models\MedicineDetails;
use App\Models\MedicineList;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacy = Pharmacy::all();
        return  view('backend.pharmacy',compact('pharmacy'));
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
        $description = $request->description;
        $email = $request->email;
        $password = $request->password;
        $image_path = $request->file('photo')->store('image', 'public');
        $FileKey = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path;

        $pharmacy = new Pharmacy();
        $pharmacy->name = $name;
        $pharmacy->img = $FileKey;
        $pharmacy->description = $description;
        $pharmacy->email =   $email;
        $pharmacy->password = $password ;
        $pharmacy->save();

        return redirect()->route('pharmacy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pharmacy = Pharmacy::find($id);
        return view('backend.pharmacy_edit',compact('pharmacy'));
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
        $description = $request->description;
        $email = $request->email;
        $password = $request->password;
        $image_path = $request->file('photo')->store('image', 'public');
        $FileKey = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path;

        $pharmacy = Pharmacy::find($id);
        $pharmacy->name = $name;
        $pharmacy->img = $FileKey;
        $pharmacy->description = $description;
        $pharmacy->email =   $email;
        $pharmacy->password = $password ;
        $pharmacy->save();

        return redirect()->route('pharmacy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pharmacy = Pharmacy::find($id);
        if(is_null($pharmacy)){
            return redirect()->route('pharmacy.index');
        }

        $pharmacy->delete();
        return redirect()->route('pharmacy.index');
    }
}

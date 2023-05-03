<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MedicineDetails;
use App\Models\MedicineList;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $medicine = MedicineList::all();
        $pharmacy = Pharmacy::all();
        $category = Category::all();
        return view('backend.medicine',compact('medicine','pharmacy','category'));
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

//        $request->validate([
//            'photo1' => 'required|image|mimes:png,jpg,jpeg|max:2048'
//        ]);
        //dd($request->all());
        $medicine1 = new MedicineList();
        $medicine2 = new MedicineDetails();

        $name = $request->name;
        $photo1 = $request->photo1;
        $photo2 = $request->photo2;
        $photo3 = $request->photo3;
        $photo4 = $request->photo4;
        $price = $request->price;
        $discount = $request->discount;
        $pharmacy = $request->pharmacy;
        $category = $request->category;
        $remark = $request->remark;
        $pis = $request->pis;
        $box = $request->box;
        $description = $request->description;


        $medicine1->category_id = $category;
        $medicine1->medicine_name = $name;
        $medicine1->remark = $remark;
        $medicine1->save();
        $id = MedicineList::max('id');



        $image_path1 = $request->file('photo1')->store('image', 'public');
        $image_path2 = $request->file('photo2')->store('image', 'public');
        $image_path3 = $request->file('photo3')->store('image', 'public');
        $image_path4 = $request->file('photo4')->store('image', 'public');



        $FileKey4 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path1;
        $FileKey3 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path2;
        $FileKey2 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path3;
        $FileKey1 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path4;

        //dd($FileKey4);

        $medicine2->medicine_list_id = $id;
        $medicine2->pharmacy_id = $pharmacy;
        $medicine2->medicine_img1 = $FileKey1;
        $medicine2->medicine_img2 = $FileKey2;
        $medicine2->medicine_img3 = $FileKey3;
        $medicine2->medicine_img4 = $FileKey4;
        $medicine2->medicine_box = $box;
        $medicine2->medicine_pis = $pis;
        $medicine2->medicine_price = $price;
        $medicine2->medicine_discount = $discount;
        $medicine2->medicine_description = $description;
        $medicine2->save();
        return redirect()->route('medicine.index');

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
        $medicine = MedicineList::find($id);
        $pharmacy = Pharmacy::all();
        $category = Category::all();

        if(is_null($medicine)){
            return redirect()->route('medicine.index');
        }
        return view('backend.medicine_edit', compact('medicine','category','pharmacy'));
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
        $medicine1 =MedicineList::find($id);


        $name = $request->name;
        $photo1 = $request->photo1;
        $photo2 = $request->photo2;
        $photo3 = $request->photo3;
        $photo4 = $request->photo4;
        $price = $request->price;
        $discount = $request->discount;
        $pharmacy = $request->pharmacy;
        $category = $request->category;
        $remark = $request->remark;
        $pis = $request->pis;
        $box = $request->box;
        $description = $request->description;


        $medicine1->category_id = $category;
        $medicine1->medicine_name = $name;
        $medicine1->remark = $remark;
        $medicine1->save();

        $medicine2 = MedicineDetails::where('medicine_list_id',$id)->first();




        $image_path1 = $request->file('photo1')->store('image', 'public');
        $image_path2 = $request->file('photo2')->store('image', 'public');
        $image_path3 = $request->file('photo3')->store('image', 'public');
        $image_path4 = $request->file('photo4')->store('image', 'public');



        $FileKey4 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path1;
        $FileKey3 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path2;
        $FileKey2 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path3;
        $FileKey1 = "http://".$_SERVER['HTTP_HOST']."/storage/".$image_path4;

        //dd($FileKey4);

        $medicine2->medicine_list_id = $id;
        $medicine2->pharmacy_id = $pharmacy;
        $medicine2->medicine_img1 = $FileKey1;
        $medicine2->medicine_img2 = $FileKey2;
        $medicine2->medicine_img3 = $FileKey3;
        $medicine2->medicine_img4 = $FileKey4;
        $medicine2->medicine_box = $box;
        $medicine2->medicine_pis = $pis;
        $medicine2->medicine_price = $price;
        $medicine2->medicine_discount = $discount;
        $medicine2->medicine_description = $description;
        $medicine2->save();
        return redirect()->route('medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine_list = MedicineList::find($id);
        $medicine_details = MedicineDetails::where('medicine_list_id',$id)->first();
        if(is_null($medicine_list)){
            return redirect()->route('medicine.index');
        }

        $medicine_list->delete();
        $medicine_details->delete();
        return redirect()->route('medicine.index');
    }

}

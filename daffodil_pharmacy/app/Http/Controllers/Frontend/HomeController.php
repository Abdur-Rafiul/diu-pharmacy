<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Category;
use App\Models\MedicineDetails;
use App\Models\MedicineList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
       $category = Category::all();
       $medicine = MedicineList::all();
       $personal = MedicineList::where('remark','Personal Care')->get();
       $vitamin = MedicineList::where('remark','Vitamin')->get();
       $sexual = MedicineList::where('remark','Sexual Care')->get();
       $device = MedicineList::where('remark','Device')->get();
        return view('frontend.home',compact('vitamin', 'sexual','device',
            'personal','medicine','category'));
    }

    public function Category(){
        $category = Category::all();
        return $category;
    }


    public function MedicineDetails($id){

        $medicine = MedicineList::find($id);

        return view('frontend.medicineDetails',compact('medicine'));

    }

    public function MedicineDetails1(Request $req){


        $id =  $req->input('id');

        $medicine= MedicineDetails::where('id','=',$id)->first();

        if($medicine){

            return $medicine;
        }else{

            return 0;
        }

    }

    public function AddToCart(Request $req){

        $mname = $req->input('mname');
        $cname = $req->input('cname');
        $img = $req->input('img');
        $price = $req->input('price');
        $pharmacy = $req->input('pharmacy');

        $medicine = new AddToCart();
        $medicine->category_name = $cname;
        $medicine->medicine_name = $mname;
        $medicine->medicine_img = $img;
        $medicine->medicine_special_price = $price;
        $medicine->medicine_price = 0;
        $medicine->medicine_discount = 0;
        $medicine->pharmacy = $pharmacy;
        $medicine->email = 'r@gmail.com';

        $medicine->save();
        $count = AddToCart::count();
        if($count){
            return $count;

        }else{

            return 0;
        }
    }

}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AddToCart;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\MedicineDetails;
use App\Models\MedicineList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AddToOrder;

class HomeController extends Controller
{
    public function Home()
    {
        $category = Category::all();
        $medicine = MedicineList::all();
        $personal = MedicineList::where('remark', 'Personal Care')->get();
        $vitamin = MedicineList::where('remark', 'Vitamin')->get();
        $sexual = MedicineList::where('remark', 'Sexual Care')->get();
        $device = MedicineList::where('remark', 'Device')->get();
        return view('frontend.home', compact('vitamin', 'sexual', 'device',
            'personal', 'medicine', 'category'));
    }

    public function Category()
    {
        $category = Category::all();
        return $category;
    }


    public function MedicineDetails($id)
    {

        $medicine = MedicineList::find($id);
        $id = $medicine->category->id;
        $doctor = Doctor::where('category_id',$id)->get();

        return view('frontend.medicineDetails', compact('medicine','doctor'));

    }

    public function MedicineDetails1(Request $req)
    {


        $id = $req->input('id');

        $medicine = MedicineDetails::where('id', '=', $id)->first();

        if ($medicine) {

            return $medicine;
        } else {

            return 0;
        }

    }

    public function AddToCart(Request $req)
    {

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
        if ($count) {
            return $count;

        } else {

            return 0;
        }
    }

    public function AddToOrder(Request $req){

        $mname = $req->input('mname');
        $cname = $req->input('cname');
        $img = $req->input('img');
        $price = $req->input('price');
        $pharmacy = $req->input('pharmacy');
        $status = $req->input('status');
        $address = $req->input('address');

        $delivery_email = $req->input('delivery_email');
        $phone = $req->input('phone');
        $fname = $req->input('fname');

        $medicine = new AddToOrder();
        $medicine->category_name = $cname;
        $medicine->medicine_name = $mname;
        $medicine->medicine_img = $img;
        $medicine->medicine_special_price = $price;
        $medicine->medicine_price = 0;
        $medicine->medicine_discount = 0;
        $medicine->pharmacy = $pharmacy;
        $medicine->email = "raf@gmail.com";

        $medicine->delivery_email = $delivery_email;
        $medicine->phone = $phone;
        $medicine->fname = $fname;
        $medicine->address = $address;
        $medicine->status = $status;

        $medicine->save();


        // dd($medicine);
        if($medicine){
            return 1;

        }else{

            return 0;
        }
    }


    public function AllMedicine(Request $request)
    {

        $all_medicine = MedicineList::all();

        return view('frontend.allMedicine',compact('all_medicine'));

    }
    public function DoctorList(Request $request)
    {

        $all_doctor = Doctor::all();

        return view('frontend.allDoctor',compact('all_doctor'));

    }

    public function CategoryMedicine($id){

        $category_medicine = MedicineList::where('category_id',$id)->get();
        return view('frontend.categorymedicine',compact('category_medicine'));
    }

    public function MedicineSearch(Request $request){

        $medicines = MedicineList::where('medicine_name','LIKE','%'.$request->search."%")
            ->get();

        if($medicines){
            return view('frontend.medicinesearch',compact('medicines'));

        }else{

            return redirect()->route('home');
        }


    }

}

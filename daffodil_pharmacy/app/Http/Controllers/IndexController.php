<?php

namespace App\Http\Controllers;

use App\Models\AddToOrder;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\MedicineList;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){

        $users = User::count();
        $orders = AddToOrder::count();
        $categories = Category::count();
        $pharmacies = Pharmacy::count();
        $doctors = Doctor::count();
        $medicines = MedicineList::count();

        return view('backend.dashboard',compact('users','orders',
            'categories','pharmacies','doctors','medicines'));
    }

    public function user(){

        $users = User::all();
        return view('backend.user',['users'=>$users]);
    }
}

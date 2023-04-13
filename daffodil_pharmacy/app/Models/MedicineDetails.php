<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineDetails extends Model
{
    use HasFactory;

    public function medicine_lists()
    {
        return $this->belongsTo(MedicineList::class);
    }

//    public function pharmacy()
//    {
//        return $this->belongsToMany(Pharmacy::class);
//    }
}

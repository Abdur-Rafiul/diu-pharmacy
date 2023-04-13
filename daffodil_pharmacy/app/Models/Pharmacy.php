<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    public function pharmacy()
    {
        return $this->hasManyThrough(Pharmacy::class, MedicineDetails::class);
    }
}

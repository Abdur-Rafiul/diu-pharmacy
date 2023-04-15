<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function medicine_list()
    {
        return $this->hasMany(Medicine_List::class);
    }

    public function doctor()
    {
        return $this->belongsToMany(Doctor::class);
    }

}

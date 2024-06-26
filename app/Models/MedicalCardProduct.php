<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCardProduct extends Model
{
    use HasFactory;
    protected $table = 'medical_card_products';
    protected $guarded = false;

    public function medicalProducts(){
        return $this->belongsToMany(MedicalProduct::class, 'medical_card_products','medical_card_id','medical_tag_id');
    }
}
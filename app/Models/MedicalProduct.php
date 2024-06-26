<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medical_products';
    protected $guarded = false;

    public function medicalCards(){
        return $this->belongsToMany(MedicalCard::class, 'medical_card_products','medical_product_id','medical_card_id',);
    }
}

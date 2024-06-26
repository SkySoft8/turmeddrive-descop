<?php

namespace App\Http\Controllers\Medical\Product;

use App\Http\Controllers\Controller;
use App\Models\MedicalCategory;
use App\Models\MedicalProduct;

class EditController extends Controller
{
    public function __invoke(MedicalProduct $medicalProduct)
    {
        return view('medical.product.edit' , compact('medicalProduct'));
    }
}

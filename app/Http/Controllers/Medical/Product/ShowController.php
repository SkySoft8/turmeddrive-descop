<?php

namespace App\Http\Controllers\Medical\Product;

use App\Http\Controllers\Controller;
use App\Models\MedicalCategory;
use App\Models\MedicalProduct;

class ShowController extends Controller
{
    public function __invoke(MedicalProduct $medicalProduct)
    {
        return view('medical.product.show', compact('medicalProduct'));
    }
}

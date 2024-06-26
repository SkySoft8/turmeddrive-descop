<?php

namespace App\Http\Controllers\Medical\Product;

use App\Http\Controllers\Controller;
use App\Models\MedicalProduct;

class DeleteController extends Controller
{
    public function __invoke( MedicalProduct $medicalProduct)
    {

        $medicalProduct->delete();
        return  redirect()->route('medical.product.index');
    }
}

<?php

namespace App\Http\Controllers\Medical\Product;

use App\Http\Controllers\Controller;
use App\Models\MedicalProduct;

class IndexController extends Controller
{
    public function __invoke()
    {
        $medicalProducts =  auth()->user()->medicalProducts ;
        $medicalItems =  auth()->user()->medicalItems ;
        return view('medical.product.index', compact('medicalProducts','medicalItems'));
    }
}

<?php

namespace App\Http\Controllers\Medical\Item;

use App\Http\Controllers\Controller;
use App\Models\MedicalProduct;

class IndexController extends Controller
{
    public function __invoke()
    {
        $medicalItems =  auth()->user()->medicalItems ;
        return view('medical.product.index', compact('medicalItems'));
    }
}

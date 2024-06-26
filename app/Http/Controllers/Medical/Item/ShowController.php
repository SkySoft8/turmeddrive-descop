<?php

namespace App\Http\Controllers\Medical\Item;

use App\Http\Controllers\Controller;
use App\Models\MedicalCategory;
use App\Models\MedicalProduct;

class ShowController extends Controller
{
    public function __invoke(MedicalItem $medicalItem)
    {
        return view('medical.item.show', compact('medicalItem'));
    }
}
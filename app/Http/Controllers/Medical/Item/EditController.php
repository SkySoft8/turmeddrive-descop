<?php

namespace App\Http\Controllers\Medical\Item;

use App\Http\Controllers\Controller;
use App\Models\MedicalCategory;
use App\Models\MedicalItem;

class EditController extends Controller
{
    public function __invoke(MedicalItem $medicalItem)
    {
        $medicalProducts =  auth()->user()->medicalProducts ;
        $medicalCards = auth()->user()->medicalCards;
        return view('medical.item.edit' , compact('medicalItem','medicalProducts','medicalCards'));
    }
}

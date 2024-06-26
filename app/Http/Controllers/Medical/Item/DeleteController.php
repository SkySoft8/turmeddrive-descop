<?php

namespace App\Http\Controllers\Medical\Item;

use App\Http\Controllers\Controller;
use App\Models\MedicalItem;

class DeleteController extends Controller
{
    public function __invoke( MedicalItem $medicalItem)
    {

        $medicalItem->delete();
        return  redirect()->route('medical.product.index');
    }
}

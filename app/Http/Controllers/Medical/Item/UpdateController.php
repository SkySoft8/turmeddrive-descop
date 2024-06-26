<?php

namespace App\Http\Controllers\Medical\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Item\UpdateRequest;
use App\Models\MedicalItem;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalItem $medicalItem)
    {
        $data = $request->validated();
        $medicalItem->update($data);
        return  redirect()->route('medical.product.index');
    }
}

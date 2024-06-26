<?php

namespace App\Http\Controllers\Medical\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Product\UpdateRequest;
use App\Models\MedicalProduct;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalProduct $medicalProduct)
    {
        $data = $request->validated();
        $medicalProduct->update($data);
        return  redirect()->route('medical.product.index');
    }
}

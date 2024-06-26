<?php

namespace App\Http\Controllers\Medical\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Product\StoreRequest;
use App\Models\MedicalProduct;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        if (isset($data['medical_card_ids'])) {
            $medical_cardIds = $data['medical_card_ids'];
            unset($data['medical_card_ids']);
        }
        $medicalProduct = MedicalProduct::firstOrCreate($data);
        if (isset($medical_cardIds)) {
            $medicalProduct->medicalCards()->attach($medical_cardIds);
        }
        return redirect()->route('medical.product.index');
    }
}

<?php

namespace App\Http\Controllers\Medical\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Item\StoreRequest;
use App\Models\MedicalItem;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $medicalItem = MedicalItem::firstOrCreate($data);
        return redirect()->route('medical.product.index');
    }
}

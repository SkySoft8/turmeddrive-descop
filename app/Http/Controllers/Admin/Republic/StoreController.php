<?php

namespace App\Http\Controllers\Admin\Republic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Republic\StoreRequest;
use App\Models\City;
use App\Models\Republic;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Republic::firstOrCreate($data);
        
        return redirect()->route('admin.republic.index');
    }
}

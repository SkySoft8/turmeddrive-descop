<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\District\StoreRequest;
use App\Models\District;
use Illuminate\Support\Facades\DB;
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        District::firstOrCreate(['name'=>$data['name'] ], $data);
        return redirect()->route('admin.district.index');
    }
}

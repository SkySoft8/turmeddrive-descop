<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
class IndexController extends Controller
{
    public function __invoke()
    {

        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        return view('admin.city.index', compact('cities'));
    }
}

<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Republic;
class CreateController extends Controller
{
    public function __invoke()
    {
        $country_list = District::all();
        $region_list = Republic::all();
        return view('admin.city.create',compact('country_list', 'region_list'));
    }
}

<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
class EditController extends Controller
{
    public function __invoke(City $city)
    {
        $districts = District::all();
        $republics = Republic::all();
        return view('admin.city.edit' , compact('city', 'districts' , 'republics'));
    }
}

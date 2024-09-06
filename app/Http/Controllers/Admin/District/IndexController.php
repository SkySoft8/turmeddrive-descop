<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Republic;
class IndexController extends Controller
{
    public function __invoke()
    {
        $districts = District::all();
        $republics = Republic::all();
        return view('admin.district.index', compact('districts', 'republics'));
    }
}

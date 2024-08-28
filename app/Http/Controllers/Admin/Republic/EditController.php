<?php

namespace App\Http\Controllers\Admin\Republic;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Republic;
use App\Models\District;
class EditController extends Controller
{
    public function __invoke(Republic $republic)
    {
        $districts = District::all();
        return view('admin.republic.edit' , compact('republic', 'districts'));
    }
}

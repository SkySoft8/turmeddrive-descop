<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
class EditController extends Controller
{
    public function __invoke(CafeCard $cafeCard)
    {
        $cafeTags =auth()->user()->cafeTags;
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        return view('cafe.card.edit' , compact('cafeCard', 'cafeTags','cities', 'districts', 'republics'));
    }
}

<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Models\SpaCard;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
class EditController extends Controller
{
    public function __invoke(SpaCard $spaCard)
    {
        $spaTags =auth()->user()->spaTags;
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        return view('spa.card.edit' , compact('spaCard', 'spaTags', 'cities', 'districts', 'republics'));
    }
}

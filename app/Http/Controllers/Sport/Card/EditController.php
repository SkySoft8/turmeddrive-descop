<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCard;
use App\Models\SportCategory;
use App\Models\SportPost;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
class EditController extends Controller
{
    public function __invoke(SportCard $sportCard)
    {
        $sportCardTags =auth()->user()->sportCardTag;
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        return view('sport.card.edit' , compact('sportCard','sportCardTags', 'cities', 'districts', 'republics'));
    }
}

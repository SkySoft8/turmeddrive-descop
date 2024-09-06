<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
class EditController extends Controller
{
    public function __invoke(TuroperatorCard $turoperatorCard)
    {
        $turoperatorCardTags =auth()->user()->turoperatorCardTag;
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        return view('turoperator.card.edit' , compact('turoperatorCard','turoperatorCardTags', 'cities', 'districts', 'republics'));
    }
}

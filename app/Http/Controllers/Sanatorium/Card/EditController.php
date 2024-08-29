<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
class EditController extends Controller
{
    public function __invoke(SanatoriumCard $sanatoriumCard)
    {
        $sanatoriumCardTags =auth()->user()->sanatoriumCardTag;
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        return view('sanatorium.card.edit' , compact('sanatoriumCard','sanatoriumCardTags', 'cities', 'districts', 'republics'));
    }
}

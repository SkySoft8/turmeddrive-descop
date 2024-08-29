<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Models\MedicalCard;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use App\Models\User;
class EditController extends Controller
{
    public function __invoke(MedicalCard $medicalCard)
    {
        $medicalTags =auth()->user()->medicalTags;
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        return view('medical.card.edit' , compact('medicalCard', 'medicalTags' , 'cities', 'districts', 'republics'));
    }
}

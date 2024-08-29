<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;

class EditController extends Controller
{
    public function __invoke(HostelCard $hostelCard)
    {
        $hostelCardTags =auth()->user()->hostelCardTag;
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        return view('hostel.card.edit' , compact('hostelCard','hostelCardTags','cities', 'districts', 'republics'));
    }
}

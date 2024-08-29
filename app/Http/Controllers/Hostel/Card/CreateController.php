<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $user_email = DB::table('users')->where('id', '=', $user)->pluck('email');
        $types = Type::all();
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $hostelCardTags =auth()->user()->hostelCardTag;
        $country_list = DB::table('districts')->select('id','title')->get();
        return view('hostel.card.create', compact('user', 'types' , 'cities' , 'republics','districts','hostelCardTags','user_email', 'country_list'));
    }
}

<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    public function index($id)
    {

        $roles = User::getRoles();
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();
        $empData['data'] = DB::table('region')->select('id_country','name','id_region')->where('id_country',$id)->get();
        return response()->json($empData);
    }
}

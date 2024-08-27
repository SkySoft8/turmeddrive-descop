<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class CreateController extends Controller
{
    public function __invoke()
    {

        $roles = User::getRoles();
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $types = Type::all();

        $country_list = DB::table('districts')->select('id','name')->get();

        return view('admin.user.create', compact('roles', 'cities', 'republics','districts', 'types','country_list'));
    }
}

<?php

namespace App\Http\Controllers\Admin\Republic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\District;
class CreateController extends Controller
{
    public function __invoke()
    {
        $country_list = District::all();;

        return view('admin.republic.create', compact('country_list'));
    }
}

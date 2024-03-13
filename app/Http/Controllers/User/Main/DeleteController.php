<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Models\preOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(preOrder $preOrder)
    {
        $preOrder->delete();
        $medicals = DB::table('medical_cards')->get();
        $spa = DB::table('spa_cards')->get();
        $cafes = DB::table('cafe_cards')->get();
        $hostels = DB::table('hostel_cards')->get();
        $sanatoriums = DB::table('sanatorium_cards')->get();
        $turoperators = DB::table('turoperator_cards')->get();
        $sports = DB::table('sport_cards')->get();
        $user = auth()->user();
        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->get();
        $totals = DB::table('pre_orders')->where('user_id', '=', $user['id'])->pluck('total_price') ;
        $payments =  DB::table('payments')->where('user_id', '=', $user['id'])->get();
        return view('user.main.index' , compact('user', 'preOrders' , 'totals', 'payments','medicals','sports', 'turoperators', 'sanatoriums', 'hostels','cafes','spa'));
    }
}

<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Main\UpdateRequest;
use App\Mail\Payment\Promocode;
use App\Models\preOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $medicals = DB::table('medical_cards')->get();
        $spa = DB::table('spa_cards')->get();
        $cafes = DB::table('cafe_cards')->get();
        $hostels = DB::table('hostel_cards')->get();
        $sanatoriums = DB::table('sanatorium_cards')->get();
        $turoperators = DB::table('turoperator_cards')->get();
        $sports = DB::table('sport_cards')->get();
        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->get();
        $totals = DB::table('pre_orders')->pluck('total_price') ;
        $payments =  DB::table('payments')->where('user_id', '=', $user['id'])->get(); 
        $user->update($data);
        
        return view('user.main.index' , compact('user' ,'preOrders', 'totals', 'payments','medicals','sports', 'turoperators', 'sanatoriums', 'hostels','cafes','spa'));
    }
}

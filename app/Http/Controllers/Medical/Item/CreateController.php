<?php

namespace App\Http\Controllers\Medical\Item;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $medicalCards =auth()->user()->medicalCards;
        $medicalProducts =auth()->user()->medicalProducts;
        return view('medical.item.create' , compact('user', 'medicalCards','medicalProducts'));
    }
}

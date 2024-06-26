<?php

namespace App\Http\Controllers\Medical\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $medicalCards =auth()->user()->medicalCards;
        return view('medical.product.create' , compact('user', 'medicalCards'));
    }
}

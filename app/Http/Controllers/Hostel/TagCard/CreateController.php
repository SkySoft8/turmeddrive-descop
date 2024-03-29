<?php

namespace App\Http\Controllers\Hostel\TagCard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        return view('hostel.tagCard.create' , compact('user'));
    }
}

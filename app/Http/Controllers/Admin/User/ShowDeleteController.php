<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class ShowDeleteController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.user.showDelete', compact('user'));
    }
}

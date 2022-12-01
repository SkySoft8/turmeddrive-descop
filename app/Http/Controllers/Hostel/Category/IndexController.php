<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;

class IndexController extends Controller
{
    public function __invoke()
    {
        $hostelCategories = HostelCategory::all();
        return view('hostel.categories.index', compact('hostelCategories'));
    }
}

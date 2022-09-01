<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function view()
    {
        return view('pages.admin.category.category-data', [
            'category' => Category::class
        ]);
    }
}
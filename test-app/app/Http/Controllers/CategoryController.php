<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAllCategories(){
        return view('admin.category.index');
    }
}

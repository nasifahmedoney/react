<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class CategoryController extends Controller
{
    public function showAllCategories(){
        return view('admin.category.index');
    }

    public function addCategory(Request $request){

        $validateData = $request->validate(
        [
            'categoryName' => 'required|unique:categories|max:255'
        ],
        [
            'categoryName.required' => 'Category name is required'
        ]);
    }
}

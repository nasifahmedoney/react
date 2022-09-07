<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function showAllCategories(){
        // $categories = Category::all();
        // when using paginate, Category::all()-> use Category::paginate(), same resuls with pagination
        $categories = Category::paginate(5);
        return view('admin.category.index',[
            'categories' => $categories,
            'users'=> User::all()
        ]);
    }

    public function addCategory(Request $request){

        $validateData = $request->validate(
        [
            'category_name' => 'required|unique:categories|max:255'
        ],
        [
            'category_name.required' => 'Category name is required'
        ]);

        //using 'insert' instead of 'create' does not update timestamps, 'updated_at' column in categories table
        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Success!!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function showAllCategories(){
        $categories = Category::paginate(5);
        $trash = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',[
            'categories' => $categories,
            'users'=> User::all(),
            'trash' => $trash
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

        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Success!!');
    }

    public function editCategories($id){
        $editCategoryId = Category::find($id);

        return view('admin.category.edit',[
            'category' => $editCategoryId,
            'users'=> User::all()
        ]);
    }

    public function updateCategories($id, Request $request){

        $validateData = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ],
        [
            'category_name.required' => 'Update Category name is required'
        ]);

        $editCategoryId = Category::find($id)->update([
            'category_name' => $request->category_name
        ]);

        return Redirect('/category/all')->with('success','Category name has been updated successfully.');
    }

    public function softdelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','item deleted successfully!!');
    }

    public function restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','item resotred successfully!!');
    }

    public function permanentDelete($id){
        $permanentDelete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','item permanently deleted successfully!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function allBrands(){
        $brands = Brand::paginate(5);//all data with pagination
        return view('admin.brands.index',[
            'brands'=> $brands
        ]);
    }

    // file type validation doesnt work for exe files, use front end validation
    public function storeBrands(Request $request){

        $validateInput = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required|mimes:jpg,jpeg,png|max:4096'
        ],
        [
            'brand_name.required' => 'Brand name is required.',
            'brand_image.required' => 'Brand image is required.'
        ]);

        //image name processing
        $uploadedImage = $request['brand_image'];
        //generate unique id and add image extension
        $hexid = hexdec(uniqid());
        $image_with_id_ext = $hexid.'.'.strtolower($uploadedImage->getClientOriginalExtension());
        // public/image/brands
        $upload_location = 'image/brands/';
        $image = $upload_location.$image_with_id_ext;

        //move file to upload dir
        $uploadedImage->move($upload_location,$image_with_id_ext);

        Brand::create([
            'brand_name' => $request['brand_name'],
            'brand_image' => $image
        ]);
        return Redirect()->back()->with('success','Success!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



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
        //$uploadedImage->move($upload_location,$image_with_id_ext);

        //resize and move
        $resize_image = Image::make($uploadedImage)->resize(300,200)->save($image);

        Brand::create([
            'brand_name' => $request['brand_name'],
            'brand_image' => $image
        ]);
        return Redirect()->back()->with('success','Success!!');
    }

    public function editBrands($id){
        $brand = Brand::find($id);
        return view('admin.brands.edit',[
            'brand' => $brand
        ]);
    }

    public function updateBrands(Request $request, $id){
        $validateInput = $request->validate([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Brand name is required.',
        ]);

        $existing_image = $request['existing_image'];

        $uploadedImage = $request['brand_image'];

        if($uploadedImage)
        {
            $hexid = hexdec(uniqid());
            $image_with_id_ext = $hexid.'.'.strtolower($uploadedImage->getClientOriginalExtension());
            $upload_location = 'image/brands/';
            $image = $upload_location.$image_with_id_ext;
            $uploadedImage->move($upload_location,$image_with_id_ext);
            unlink($existing_image);
            Brand::find($id)->update([
                'brand_name' => $request['brand_name'],
                'brand_image' => $image
            ]);
            return Redirect('/brand/all/')->with('success','Success!!');
        }
        else{
            Brand::find($id)->update([
                'brand_name' => $request['brand_name']
            ]);
            return Redirect('/brand/all/')->with('success','Success!!');
        }

    }

    public function deleteBrand($id){
        $image = Brand::find($id);
        unlink(public_path($image->brand_image));
        $image->forceDelete();
        return Redirect()->back()->with('success','item deleted successfully!!');
    }

    //multiple pic view
    public function multipic(){
        $images = Multipic::all();
        return view('admin.multipic.index',[
            'images' => $images
        ]);
    }

    public function multipicUpload(Request $request){
        $validate = $request->validate([
            'image' => 'required'
        ]);

        $images = $request->file('image');

        foreach($images as $image){
            $hexid = hexdec(uniqid());
            $image_with_id_ext = $hexid.'.'.strtolower($image->getClientOriginalExtension());
            $upload_location = 'image/multi/';
            $multi_image = $upload_location.$image_with_id_ext;
            Image::make($image)->resize(300,200)->save($multi_image);

            Multipic::create([
                'image' => $multi_image
            ]);
        }

        return Redirect()->back()->with('success','Success!!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BrandController extends Controller
{
    public function list()
    {
        $data['brand'] = Brand::getBrand();
        $data['title'] = 'Brand List';
        return view('admin.brand.list', $data);
    }

    public function add()
    {
        $data['title'] = 'Add New Brand';
        return view('admin.brand.add', $data);
    }
    public function save(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:brand,slug'
        ]);
        $brand = new Brand();
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_keyword = trim($request->meta_keyword);
        $brand->meta_description = trim($request->meta_description);
        $brand->status = trim($request->status);
        $brand->created_by = Auth::user()->id;
        $brand->save();
        return redirect('admin/brand/list')->with('success', 'Brand added successfully');
    }

    public function edit($id)
    {
        $brandID = Crypt::decrypt($id);
        $data['title'] = 'Edit Category';
        $data['getBrand'] = Brand::getSingle($brandID);
        return view('admin.brand.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:brand,slug'
        ]);
        $brandID = Crypt::decrypt($id);
        $brand = Brand::getSingle($brandID);
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_keyword = trim($request->meta_keyword);
        $brand->meta_description = trim($request->meta_description);
        $brand->status = trim($request->status);
        $brand->save();

        return redirect('admin/brand/list')->with('success', 'Brand Updated successfully');
    }


    public function delete($id)
    {
        $brandID = Crypt::decrypt($id);
        $brand = Brand::getById($brandID);
        if ($brand) {
            return redirect()->back()->with('success', 'Brand deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Brand not found');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SubCategoryController extends Controller
{
    public function list()
    {
        $data['sub_category'] = SubCategory::getSubCategory();
        $data['title'] = 'Sub Category List';
        return view('admin.sub_category.list',$data);
    }

    public function add()
    {
        $data['title'] = 'Add New Sub Category';
        $data['category'] = Category::getCategory();
        return view('admin.sub_category.add', $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:sub_category,slug'
        ]);
        $sub_category = new SubCategory();
        $sub_category->category_id = trim($request->category_id);
        $sub_category->name = trim($request->name);
        $sub_category->slug = trim($request->slug);
        $sub_category->meta_title = trim($request->meta_title);
        $sub_category->meta_keyword = trim($request->meta_keyword);
        $sub_category->description = trim($request->description);
        $sub_category->status = trim($request->status);
        $sub_category->created_by = Auth::user()->id;
        $sub_category->save();
        return redirect('admin/sub_category/list')->with('success', 'Sub Category added successfully');
    }

    public function edit(string $id)
    {
        $sub_categoryID = Crypt::decrypt($id);
        $data['title'] = 'Edit Sub Category';
        $data['category'] = Category::getCategory();
        $data['getSubCategory'] = SubCategory::getSingle($sub_categoryID);
        return view('admin.sub_category.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'slug' => 'required|unique:sub_category,slug'
        ]);
        $sub_categoryID = Crypt::decrypt($id);
        $sub_category = SubCategory::getSingle($sub_categoryID);
        $sub_category->category_id = trim($request->category_id);
        $sub_category->name = trim($request->name);
        $sub_category->slug = trim($request->slug);
        $sub_category->meta_title = trim($request->meta_title);
        $sub_category->meta_keyword = trim($request->meta_keyword);
        $sub_category->description = trim($request->description);
        $sub_category->status = trim($request->status);
        $sub_category->save();

        return redirect('admin/sub_category/list')->with('success', 'Sub Category Updated successfully');
    }
    public function delete($id)
    {
        $sub_categoryID = Crypt::decrypt($id);
        $sub_category = SubCategory::getById($sub_categoryID);
        if ($sub_category) {
            return redirect()->back()->with('success', 'Sub Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Sub Category not found');
        }
    }
    public function getSubCategory(Request $request)
    {
        $category_id = $request->id;
        $get_sub_category = SubCategory::selectSubCategory($category_id);

        $html = '';
        $html .= '<option value="">Select</option>';
        if(!empty($get_sub_category)){
            foreach ($get_sub_category as $value) {
                $html = '<option value="'.$value->id.'">'.$value->name.'</option>';
            }
        }else{
            $html = '<option value="">No data found</option>';
        }
        $json['html'] = $html;
        return response()->json($json);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function list()
    {
        $data['category'] = Category::getCategory();
        $data['title'] = 'Category List';
        return view('admin.category.list',$data);
    }
    public function add()
    {
        $data['title'] = 'Add New Category';
        return view('admin.category.add', $data);
    }
    public function edit($id)
    {
        $categoryID = Crypt::decrypt($id);
        $data['title'] = 'Edit Category';
        $data['getCategory'] = Category::getSingle($categoryID);
        return view('admin.category.edit', $data);
    }
    public function save(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:category,slug'
        ]);
        $category = new Category();
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_keyword = trim($request->meta_keyword);
        $category->description = trim($request->description);
        $category->status = trim($request->status);
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/category/list')->with('success', 'Category added successfully');
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:category,slug'
        ]);
        $categoryID = Crypt::decrypt($id);
        $category = Category::getSingle($categoryID);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_keyword = trim($request->meta_keyword);
        $category->description = trim($request->description);
        $category->status = trim($request->status);
        $category->save();

        return redirect('admin/category/list')->with('success', 'Category Updated successfully');
    }

    public function delete($id)
    {
        $categoryID = Crypt::decrypt($id);
        $category = Category::getById($categoryID);
        if ($category) {
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }

}

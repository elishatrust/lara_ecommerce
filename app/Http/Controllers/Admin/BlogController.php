<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function list()
    {
        $data['blog'] = Blog::getBlog();
        $data['title'] = 'Blog List';
        return view('admin.blog.list',$data);
    }
    public function add()
    {
        $data['title'] = 'Add New Blog';
        $data['category'] = Category::getCategory();
        return view('admin.blog.add', $data);
    }

    public function save(Request $request)
    {
        ## Declare blog details
        $blog = new Blog();
        $blog->title = trim($request->title);
        $blog->category_id = trim($request->category_id);
        $blog->description = trim($request->description);
        $blog->status = trim($request->status);
        $blog->created_by = Auth::user()->id;
        $image = $request->file('image');
        if ($image) {
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/blog/', $filename);
            $blog->image = 'uploads/blog/' . $filename;
        }

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     if ($image->isValid()) {
        //         $ext = $image->getClientOriginalExtension();
        //         $randomStr = Str::random(20);
        //         $filename = strtolower($randomStr) . '.' . $ext;
        //         $image->move('uploads/blog/', $filename);
        //         $blog->image = $filename;
        //     }
        // }
// dd($request->all());
        $blog->save();
        return redirect('admin/blog/list')->with('success', 'Blog saved successfully');
    }

    public function edit($id)
    {
        $blogID = Crypt::decrypt($id);
        $data['title'] = 'Edit Blog';
        $data['category'] = Category::getCategory();
        $data['blog'] = Blog::getSingle($blogID);
        return view('admin.blog.edit', $data);
    }

    public function update($id, Request $request)
    {
        $blogID = Crypt::decrypt($id);
        $blog = Blog::getSingle($blogID);
        $blog->title = trim($request->name);
        $blog->description = trim($request->description);
        $blog->category_id = trim($request->category_id);
        $blog->status = trim($request->status);
        $blog->save();

        return redirect('admin/blog/list')->with('success', 'Brand Updated successfully');
    }


    public function delete($id)
    {
        $blogID = Crypt::decrypt($id);
        $blog = Blog::getById($blogID);
        if ($blog) {
            return redirect()->back()->with('success', 'Blog deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Blog not found');
        }
    }
}

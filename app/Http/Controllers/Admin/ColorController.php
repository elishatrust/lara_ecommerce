<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ColorController extends Controller
{
    public function list()
    {
        $data['color'] = Color::getColor();
        $data['title'] = 'Color List';
        return view('admin.color.list',$data);
    }
    public function add()
    {
        $data['title'] = 'Add New Color';
        return view('admin.color.add', $data);
    }
    public function save(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:color,code'
        ]);
        $color = new Color();
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::user()->id;
        $color->save();
        return redirect('admin/color/list')->with('success', 'Color added successfully');
    }

    public function edit($id)
    {
        $colorID = Crypt::decrypt($id);
        $data['title'] = 'Edit Color';
        $data['color'] = Color::getSingle($colorID);
        return view('admin.color.edit', $data);
    }
    public function update($id, Request $request)
    {
        $colorID = Crypt::decrypt($id);
        $color = Color::getSingle($colorID);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->save();

        return redirect('admin/color/list')->with('success', 'Color Updated successfully');
    }


    public function delete($id)
    {
        $colorID = Crypt::decrypt($id);
        $color = Color::getById($colorID);
        if ($color) {
            return redirect()->back()->with('success', 'Color deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Color not found');
        }
    }

}

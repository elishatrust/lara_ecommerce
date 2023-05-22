<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function add()
    {
        $data['getRecord'] = User::getAdmin();
        $data['title'] = 'Add New Admin';
        return view('admin.admin.list', $data);
    }

    public function insert_admin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect()->back()->with('success', 'Admin added successfully');
    }

    public function deleteAdmin($slug)
    {
        $user = User::getSingle($slug);
        $user->is_delete = 1;
        $user->save();

        return redirect()->back()->with('success', 'Record Deleted ');
    }
}

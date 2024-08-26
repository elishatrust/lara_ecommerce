<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function list()
    {
        $data['getAdmin'] = User::getAdmin();
        $data['title'] = 'Admin List';
        return view('admin.admin.list', $data);
    }
    public function add()
    {
        $data['title'] = 'Add New Admin';
        return view('admin.admin.add', $data);
    }

    public function save(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->created_by = Auth::user()->id;
        $user->role = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin added successfully');
    }

    public function edit($id)
    {
        $userID = Crypt::decrypt($id);
        $data['title'] = 'Edit Admin';
        $data['getAdmin'] = User::getSingle($userID);
        return view('admin.admin.edit', $data);
    }

    public function update($id, Request $request)
    {
        $userID = Crypt::decrypt($id);
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$userID,
        ]);

        $user = User::getSingle($userID);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->role = 1;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin Updated successfully');
    }
    public function delete($id)
    {
        $userID = Crypt::decrypt($id);
        $user = User::getById($userID);
        if ($user) {
            return redirect()->back()->with('success', 'Admin deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Admin not found');
        }
    }
}

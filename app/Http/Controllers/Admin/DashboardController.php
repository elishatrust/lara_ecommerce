<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }

    public function admin()
    {
        $data['title'] = 'Admin';
        return view('admin.admin.list', $data);
    }

    public function users()
    {
        $data['title'] = 'Users';
        return view('admin.users.list', $data);
    }

    public function products()
    {
        $data['title'] = 'Products';
        return view('admin.products.list', $data);
    }
}

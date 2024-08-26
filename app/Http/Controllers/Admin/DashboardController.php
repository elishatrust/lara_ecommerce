<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $user_model = new User;
    }
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }


    public function products()
    {
        $data['title'] = 'Products';
        return view('admin.products.list', $data);
    }
}

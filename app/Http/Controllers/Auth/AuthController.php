<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $data['title'] = 'LOGIN';
        if(!empty(Auth::check()) && Auth::user()->role ==1)
        {
            return redirect('admin/dashboard');
        }else{
            return view('admin.auth.login', $data);
        }
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 0,
            'archive' => 0,
            'role'=>'1'], $remember))
        {
            // Pass
            return redirect('admin/dashboard');
        }else{
            //Fail
            return redirect()->back()->with('error', 'Incorrect E-mail or Password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/');

    }

    public function userProfile()
    {
        $data['title'] = 'My Profile';
        return view('admin.profile.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }




}

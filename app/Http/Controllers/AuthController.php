<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    
    public function index()
    {
        if(!empty(Auth::check()) && Auth::user()->is_admin ==0)
        {
            return redirect('admin/dashboard');
        }else{
            return view('admin.auth.login');
        }
    }

    public function login(Request $request)
    {
        //dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password, 
            'is_admin'=>'0'], $remember))
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }




}
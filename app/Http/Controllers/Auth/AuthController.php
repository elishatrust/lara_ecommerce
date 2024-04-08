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
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            ## For active user
            if($user->archive == 0 && $user->status == 0)
            {
                if ($user->role == 1) {

                    return redirect('admin/dashboard');

                } elseif ($user->role == 2) {

                    return redirect('admin/users');
                }

            }else{
                return redirect()->back()->with('error', 'Incorrect Email or Password');

            }


            // return response()->json(['status' => 'success', 'message' => 'Login successful']);
        }
        return redirect()->back()->with('error', 'Incorrect Email or Password');

        // return response()->json(['status' => 'error', 'message' => 'Incorrect E-mail or Password'], 401);
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

    public function updateProfile(Request $request ,$id)
    {
dd($request->all());
    }
    public function updatePassword(Request $request, $id)
    {
        dd($request->all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }




}

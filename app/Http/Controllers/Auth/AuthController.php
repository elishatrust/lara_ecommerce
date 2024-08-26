<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;


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

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {

    //         $user = Auth::user();

    //         ## For active user
    //         if($user->archive == 0 && $user->status == 0)
    //         {
    //             if ($user->role == 1) {

    //                 return redirect('admin/dashboard');

    //             } elseif ($user->role == 2) {

    //                 return redirect('admin/users');
    //             }

    //         }else{
    //             return redirect()->back()->with('error', 'Incorrect Email or Password');

    //         }


    //         // return response()->json(['status' => 'success', 'message' => 'Login successful']);
    //     }
    //     return redirect()->back()->with('error', 'Incorrect Email or Password');

    //     // return response()->json(['status' => 'error', 'message' => 'Incorrect E-mail or Password'], 401);
    // }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $loginAttempts = Session::get('login_attempts', 0);

        if ($loginAttempts >= 3) {
            Session::flash('prompt', 'Too many failed login attempts. Please try again later.');
            return redirect()->route('admin');
        }

        if (Auth::attempt(['email'=>$email,'password'=>$password,'status'=>0,'archive'=>0])) {

            $user = Auth::user();
            Session::forget('login_attempts');
            if($user->role == 1)
            {
                return redirect()->intended('admin/dashboard');

            }else if($user->role == 2)
            {
                return redirect()->intended('admin/client');

            }else if($user->role == 3)
            {
                return redirect()->intended('admin/seller');
            }

        } else {

            $loginAttempts++;
            Session::put('login_attempts', $loginAttempts);
            Session::flash('error', 'Incorrect Email or Password');
            return redirect()->route('admin');
        }
    }

    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);

    //     if ($this->hasTooManyLoginAttempts($request)) {
    //         $this->fireLockoutEvent($request);

    //         return $this->sendLockoutResponse($request);
    //     }

    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     }

    //     $this->incrementLoginAttempts($request);

    //     return $this->sendFailedLoginResponse($request);
    // }

    // protected function validateLogin(Request $request)
    // {
    //     Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ])->validate();
    // }

    // protected function hasTooManyLoginAttempts(Request $request)
    // {
    //     return RateLimiter::tooManyAttempts($this->throttleKey($request), config('auth.login_max_attempts', 3));
    // }

    // protected function incrementLoginAttempts(Request $request)
    // {
    //     RateLimiter::hit($this->throttleKey($request), config('auth.lockout_duration', 15));
    // }

    // protected function sendLockoutResponse(Request $request)
    // {
    //     $seconds = RateLimiter::availableIn($this->throttleKey($request));

    //     return back()
    //         ->withInput($request->only('email'))
    //         ->withErrors(['email' => Lang::get('auth.throttle', ['seconds' => $seconds])]);
    // }

    // protected function attemptLogin(Request $request)
    // {
    //     return Auth::attempt(
    //         $request->only('email', 'password'),
    //         $request->filled('remember')
    //     );
    // }

    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();
    //     return redirect()->intended('admin/dashboard');
    // }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     return back()
    //         ->withInput($request->only('email'))
    //         ->withErrors([
    //             'email' => __('auth.failed'),
    //         ]);
    // }

    // protected function throttleKey(Request $request)
    // {
    //     return strtolower($request->input('email')) . '|' . $request->ip();
    // }

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

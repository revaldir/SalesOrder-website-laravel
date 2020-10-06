<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        // # code...
        // if (auth()->user()->role_id != 1) {
        //     $this->guard()->logout();
        //     abort(403, 'Unauthorized action.');
        // }
        // dd(auth()->user());

        if (auth()->user()->is_active == TRUE) {
            if (auth()->user()->role_id == 1) {
                return redirect('/admin/home');
            } else if (auth()->user()->role_id == 2) {
                return redirect('/home');
            }
        } else {
            $this->guard()->logout();
            return back()->with('status', 'User is not verified by admin!');
        }
    }
}

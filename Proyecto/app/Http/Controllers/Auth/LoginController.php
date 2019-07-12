<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

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
    if(auth()->user()->has_role(config('app.client_role')))
    {
        return redirect()->route('frontoffice.user.profile');
    } 
    elseif (auth()->user()->has_role(config('app.assistant_role')))
    {
    	return redirect()->route('backoffice.admin.show');
    }
    elseif (auth()->user()->has_role(config('app.doctor_role')))
    {
    	return redirect()->route('backoffice.admin.show');
    }
    else
    {
    	return redirect()->route('backoffice.admin.show');
    }

    return redirect('/user/dashboard');
}
}

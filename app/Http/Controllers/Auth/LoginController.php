<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\sendcode;


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
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if($this->hasToomanyLoginAttempts($request)){
            $this->fireLockoutResponse($request);
        }


//-----

        if($user->guard()->validate($this->credentials($request))){
            $user=$this->guard()->getLastAttempted();
            if($user->active && $this->attempptLogin($request)){
                return $this->sendLoginResponse($request);
            }
       
        else {
            $this->incrementLoginAttempts($request);
            $user->coed=sendcode::sendCode($user->phone);
            if($user->save()){
                return redirect('/verify?phone='.$user->phone);
            }
        }
         }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }


}

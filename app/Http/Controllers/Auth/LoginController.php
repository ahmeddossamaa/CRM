<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

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
    // protected $redirectToCust = RouteServiceProvider::EMP;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:employee')->except('logout');
    }

    // protected function attemptLogin(Request $request)
    // {
    //     $customerAttempt = Auth::guard('web')->attempt(
    //         $this->credentials($request), $request->has('remember')
    //     );
    //     if(!$customerAttempt){
    //         return Auth::guard('employee')->attempt(
    //             $this->credentials($request), $request->has('remember')
    //         );
    //     }
    //     return $customerAttempt;
    // }

}

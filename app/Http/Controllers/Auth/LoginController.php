<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\MessageBag;
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
    protected $redirectTo = '/user/index';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


   /* đăng nhập sử dụng cả email and username  */
   public function login(Request $request)
   {

        $field = filter_var($request->input('username'),FILTER_VALIDATE_EMAIL) ? 'email':'username';
        $credential = 
        [
            $field => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credential)) {
            // Authentication passed...
            return redirect()->intended('home');
        }else{
            $error = new MessageBag(['errorlogin' => 'Username/email or password incorrect']);
            return redirect()->back()->withInput()->withErrors($error);
        }
   }
}

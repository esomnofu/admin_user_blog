<?php

namespace App\Http\Controllers\Admin\Auth;


use App\Model\admin\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm()
    {
        return view('admin.login');
    }



     public function login(Request $request)
    {
        
            $this->validateLogin($request);

            if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
            }

            return $this->sendFailedLoginResponse($request);
    }


    
    protected function credentials(Request $request)
    {
    
        
    $admin = admin::where('email', $request->email)->first();

    if ($admin) {
        
if ($admin->status == 0) {
    return ['email' => 'Inactive', 'password' => 'Your account is not active.contact Super Admin'];
            }else{
    return ['email' => $request->email, 'password' => $request->password, 'status' => 1];
            }
        
    }else{
     return ['email' => $request->email, 'password' => $request->password, 'status' => 1];  
    }    
    #return $request->only($this->username(), 'password');
    
    }



    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


 protected function guard()
    {
        return Auth::guard('admin');
    }


}

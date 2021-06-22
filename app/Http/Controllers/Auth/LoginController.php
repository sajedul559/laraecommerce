<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\VerifyRegistration;
use App\Models\User;
use Auth;

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
    protected $redirectTo = '/';

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
           $this->validate($request, [
           'email' => 'required|email',
            'password' => 'required|string',
        ]);

           $user = User::where('email', $request->email)->first();

           if ($user->status == 1) {
               if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password ], $request->remember))
                {
                   return redirect()->intended(route('index'));
               }
           }
           else
           {
            if (!is_null($user)) {
                $user->notify(new VerifyRegistration($user));
                  session()->flash('success', 'A  New confirmation email has sent to you.. Please check and confirm your email');
                   return redirect()->route('login');

            }
            else
            {
                 session()->flash('errors', 'Please Login first');
                   return redirect()->route('login');

            }
           }
    }

}

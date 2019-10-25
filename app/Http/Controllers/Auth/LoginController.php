<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /******/

    
    # disini kita override fungsi auth bawaan laravel

    public function showLoginForm(){
        return view('admin.login');
    } // end func

    public function login(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $logindata = ['email' => $input['email'], 'password' => $input['password']];

        if( ! auth()->attempt($logindata)):
            return redirect()
                ->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        endif;

         switch (auth()->user()->role):
            case 'admin':
                return redirect()
                    ->route('admin.dashboard');
            break;
            case 'member':
                return redirect()
                    ->route('member.dashboard');
            break;     
            default:
                return redirect()
                    ->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            break;
        endswitch;
    } // end func

    protected function sendLoginResponse(Request $request){
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        var_dump($this->redirectPath()); exit();

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    } // end func

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('login');
    } // end func

}

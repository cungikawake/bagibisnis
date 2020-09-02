<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Member;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string', 
        ]);

        $user = \Auth::attempt([
            'email' => $request->email,
            'password' => $request->password, 
        ]);

        $user = Auth::user();
        

        if($user->role == '1'){
            return redirect()->route('admin.dashboard');
            
        }else if($user->role == '2'){ 
            $member = Member::where('user_id', $user->id)->first(); 
            $today = date('Y-m-d');
            
            if($today > $member->exp_date ){
                //akun sudah exp                 
                session([
                    'exp_member' => true
                ]);

            }

            session([
                'member' => $member,
                'user' => $user
            ]);
 
            return redirect()->route('member.profile');

        }else{
            return redirect()->back()->with(['error' => 'Email / Password Salah']);
        }
         
    }
}

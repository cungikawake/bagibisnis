<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie; 
use Session; 
use App\Member;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\User;

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

            //cookee
            setcookie("joinjob",'guest_login',time()+31556926 ,'/');

            session([
                'member' => $member,
                'user' => $user
            ]);
 
            return redirect()->route('member.profile');

        }else{
            return redirect()->back()->with(['error' => 'Email / Password Salah']);
        }
         
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/member/profile');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        
        if ($authUser) {
            //cookee
            setcookie("joinjob",'guest_login',time()+31556926 ,'/');
 
            return $authUser;
        }
        else{
             
            $authUser = User::create([
                'name'     => $user->name,
                'email'    => !empty($user->email)? $user->email : '' ,
                'provider' => $provider,
                'provider_id' => $user->id,
                'role' => 2,
                'password' => Hash::make($user->name),
                'exp_date' => date('Y-m-d', strtotime('+10 days', strtotime($today))), //free
            ]); 

            $customer = Member::create([
                'name' => $authUser->name,
                'email' => $authUser->email,
                'shop_name' => $authUser->name,
                'user_id' => $authUser->id,
                'status' => 1,
                'max_product' => 10, 
                'type_member' => 1, 
                'quota_post' => 5, //free,
                'province_id'=> 1
            ]);
    
            if($customer){
                $member = Member::where('user_id', $authUser->id)->first(); 
                
                //cookee
                setcookie("joinjob",'guest_login',time()+31556926 ,'/');
 
                if($today > $member->exp_date ){
                    //akun sudah exp                 
                    session([
                        'exp_member' => true
                    ]);
    
                }
    
                session([
                    'member' => $member,
                    'user' => $authUser
                ]);
     
                return $authUser;
    
            }else{
                return redirect()->back()->with('error', 'Maaf anda tidak dapat mendaftar akun');
            }
            
        }
    }
}

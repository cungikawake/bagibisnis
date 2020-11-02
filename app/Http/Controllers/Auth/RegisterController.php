<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Province;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'member/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'province_id' => ['required'],
        ]);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/member');
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            Auth::login($authUser);
            return $authUser;
        }
        else{
            $today = date('Y-m-d');

            $data = User::create([
                'name'     => $user->name,
                'email'    => !empty($user->email)? $user->email : '' ,
                'provider' => $provider,
                'provider_id' => $user->id,
                'role' => 2,
                'password' => Hash::make($user->name),
                'exp_date' => date('Y-m-d', strtotime('+10 days', strtotime($today))), //free
            ]);
            Auth::login($user);

            $customer = Member::create([
                'name' => $data->name,
                'email' => $data->email,
                'shop_name' => $data->name,
                'user_id' => $data->id,
                'status' => 1,
                'max_product' => 10, 
                'type_member' => 1, 
                'quota_post' => 5, //free,
                'province_id'=> 1
            ]);
    
            if($customer){
                $member = Member::where('user_id', $data->id)->first(); 
                
                
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
     
                return $user;
    
            }else{
                return redirect()->back()->with('error', 'Maaf anda tidak dapat mendaftar akun');
            }
        }
    }


    public function getRegister()
    {
        $provinces = Province::get();

        return view('auth.register', compact('provinces'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $today = date('Y-m-d');

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 2,
            'exp_date' => date('Y-m-d', strtotime('+10 days', strtotime($today))), //free
            'password' => Hash::make($data['password']),
        ]);

        $customer = Member::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'shop_name' => $data['name'],
            'user_id' => $user->id,
            'status' => 1,
            'max_product' => 10, 
            'type_member' => 1, 
            'quota_post' => 5, //free,
            'province_id'=> $data['province_id'] 
        ]);

        if($customer){
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
 
            return $user;

        }else{
            return redirect()->back()->with('error', 'Maaf anda tidak dapat mendaftar akun');
        }
    }
}

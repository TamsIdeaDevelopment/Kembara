<?php

namespace App\Http\Controllers\Auth;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InviteRegisterController extends Controller
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
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/home';

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
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//        ]);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $redirectTo = "/home";
         $user = User::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'phone_no' => $request->input('phone_no'),
             'postcode' => $request->input('postcode'),
             'address_1' => $request->input('address_1'),
             'city' => $request->input('city'),
             'nric' => $request->input('nric'),
             'ssm' => $request->input('ssm'),
             'company_name' => $request->input('company_name'),
             //'state' => $data['state'] || '',
             'facebook' => $request->input('facebook'),
             'instagram' => $request->input('instagram'),
             'role_id' => 3,
             'password' => Hash::make($request->input('password')),
         ]);

         $agent = Agent::create([
             'user_id' => $user->id,
//             'agent_levels_id' => $data['level'],
//             'leader_id' => $data['leader'],
//             'territory_id' => $data['territory'],
//             'state_id' => $data['state'],
             'paid' => '0',
             'status' => '0',
             'city' => $request->input('city'),
         ]);

        return $user;
    }
}

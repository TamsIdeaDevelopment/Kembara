<?php

namespace App\Http\Controllers\Auth;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
    protected function create(array $data)
    {
         $user = User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'phone_no' => $data['phone_no'],
             'postcode' => $data['postcode'],
             'address_1' => $data['address_1'],
             'city' => $data['city'],
             'country' => 'Malaysia',
             'nric' => $data['nric'],
             'ssm' => $data['ssm'],
             'company_name' => $data['company_name'],
             //'state' => $data['state'] || '',
             'facebook' => $data['facebook'],
             'instagram' => $data['instagram'],
             'Shopee' => $data['shopee'],
             'Lazada' => $data['lazada'],
             'role_id' => 3,
             'password' => Hash::make($data['password']),
         ]);
//        $user = User::create($data);
//        $data['user_id'] = $user->id;
        $HQ = Agent::where('HQ', 1)->first();

        if($data['level'] === $data['leader_level']){
            $agent = Agent::create([
                'user_id' => $user->id,
                'HQ' => 0,
                'agent_levels_id' => $data['level'],
                'leader_id' => $HQ->user_id,
                'referral_id' => $data['leader'],
                'territory_id' => $data['territory'],
                'state_id' => $data['state'],
                'paid' => '0',
                'status' => '0',
                'city' => $data['city'],
            ]);
        }
        else{
            $agent = Agent::create([
                'user_id' => $user->id,
                'HQ' => 0,
                'agent_levels_id' => $data['level'],
                'leader_id' => $data['leader'],
                'territory_id' => $data['territory'],
                'state_id' => $data['state'],
                'paid' => '0',
                'status' => '0',
                'city' => $data['city'],
            ]);
        }

//        $agent = Agent::create($data);

        //$data['level'] = $agent->Level->name;

        return $user;




//        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'role_id' => '1',
//            'password' => Hash::make($data['password']),
//        ]);
//
//        $data['user_id'] = $user->id;
//
//        // $agent = Agent::create([
//        //     'user_id' => $user->id,
//        //     // 'member_id' => $data['member_id'],
//        //     'level' => $data['level'],
//        //     'city' => $data['city'],
//        //     'state' => $data['state'],
//        //     'territory' => $data['territory'],
//        //     'leader' => $data['leader'],
//        //     // 'existing_member' => isset($data['existing_member']) ? $data['existing_member'] : 0,
//        // ]);
//        $agent = Agent::create($data);
//
//        $data['level'] = $agent->Level->name;

//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'role_id' => '1',
//            'password' => Hash::make($data['password']),
//        ]);
    }
}

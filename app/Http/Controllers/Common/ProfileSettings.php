<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 10/10/2020
 * Time: 6:33 PM
 */

namespace App\Http\Controllers\Common;


use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileSettings
{

    /** @var  User */
    private $repository;

    /**
     * ProfileSettings constructor.
     * @param User $repository
     */
    public function __construct(User $repository)
    {
        $this->repository = $repository;
    }

    public function ChangeProfile($id, Request $request){

        $user = $this->repository->findOrFail($id);

        $user->name = $request->input('name');
        $user->nric = $request->input('nric');
        $user->email = $request->input('email');
        $user->facebook = $request->input('facebook');
        $user->instagram = $request->input('instagram');
        $user->Shopee = $request->input('Shopee');
        $user->Lazada = $request->input('Lazada');
        $user->phone_no = $request->input('phone_no');
        $user->postcode = $request->input('postcode');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->address_1 = $request->input('address_1');
        $user->bank_name = $request->input('bank_name');
        $user->bank_acc_no = $request->input('bank_acc_no');
        $user->bank_acc_name = $request->input('bank_acc_name');


        if($user->save()){
            return $user;
        }

    }

    public function ChangeProfilePicture($id, Request $request)
    {
        if($request->hasFile('image'))
        {

            $filenameWithExt = $request->image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '_', $filename);
            $extension = $request->image->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->image->storeAs('public/ProfilePicture', $fileNameToStore);

        }
        else
        {
            $fileNameToStore = 'null';
        }
        $user = $this->repository->findOrFail($id);

        $user->avatar = $fileNameToStore;

        if($user->save()){
            return $user;
        }
    }

    public function CheckPassword($id,$password)
    {
        $profile = $this->repository->findOrFail($id);

        if(Hash::check( $password, $profile->password))
        {
            return with('same');
        }
        else
        {
            return with('not');
        }
    }

    public function ChangePassword($id,$new_password)
    {
        $profile = $this->repository->findOrFail($id);

        $profile->password = Hash::make($new_password);

        $profile->save();

        return $profile;
    }

}
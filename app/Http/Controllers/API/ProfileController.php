<?php

namespace App\Http\Controllers\API;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Profile as ProfileResource;


class ProfileController extends BaseController
{
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        if ($user->profile == null) {
           $profile = Profile::create([
            'user_id'    => $id,          
            'bio'    => 'Hello world',
           ]);
        }
        return $this->sendResponse(ProfileResource::collection($user),  );



    }

     public function update(Request $request )
    {
$this->validate($request,[
            'name' => 'required',
            'province' => 'required',
            'gender'    => 'required',
            'bio'      => 'required',
            'facebook' =>'required',

        ]);



        $user = Auth::user();
        $user->name = $request->name ;
        $user->profile->province = $request->province ;
        $user->profile->gender = $request->gender ;
        $user->profile->bio = $request->bio ;
        $user->profile->facebook = $request->facebook ;
        $user->save();
        $user->profile->save();

     
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        if ($request->has('photo')) {
            $user->photo = Hash::make($request->photo);
            $user->save();
        }
     return $this->sendResponse( new ProfileResource($user), 'Profile updated Successfully' );;
 }
    public function destroy(Profile $profile)
    {
        //
    }
}

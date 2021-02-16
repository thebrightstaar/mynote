<?php

namespace App\Http\Controllers\Web;

use App\Models\Profile;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        if ($user->profile == null) {
           $profile = Profile::create([
            'user_id'    => $id,
            'bio'    => 'Hello world!',
        
           ]);
        }
        return view('users.profile')->with('user',$user);



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
     return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

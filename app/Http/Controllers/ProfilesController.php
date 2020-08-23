<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Auth;
use Session;

class ProfilesController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('admin/users/profile', [
            'user' => $user
        ]);
    }
    public function update(Request $request){
        $this->validate($request,[
            'fname' => 'required', 
            'lname' => 'required',
            'email' => 'required',
            'about' => 'required',
        ]);
        // $user = Auth::user();
        // if ($request->hasFile('avatar')) {
        //     $avatar = $request->avatar;
        //     $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
        //     $request->avatar->move(public_path('profiles'), $imageName);
        //     $user->profile->avatar = 'profiles' . $imageName;
        //     $user->profile->save();
        // }
        // $user->fname = request('fname');
        // $user->lname = request('lname');
        // $user->email = request('email');
        // $user->profile->facebook = request('facebook');
        // $user->profile->instagram = request('instagram');
        // $user->profile->twitter = request('twitter');
        // $user->profile->about = request('about');
        // $user->save();
        // $user->profile->save();
        // if($request->has('password')){
        //     $user->password = bcrypt($request->password);
        // }
        // $user->save();
        // Session::flash('success', 'Profile Updated Successfully.');
        // return redirect()->back();
        
      $user = User::where('id', Auth::user()->id)->first();

    if($user) {
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }
    }

    if( $user->save() ) {

        $profile = Profile::where('user_id', Auth::user()->id)->first();

        $profile->facebook = $request->facebook;
        $profile->instagram = $request->instagram;
        $profile->twitter = $request->twitter;
        $profile->about = $request->about;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $profile->avatar = 'uploads/avatars/' . $avatar_new_name ;
        }
    }

    if($profile->save()) {
        Session::flash('success', 'Account profile updated.');
    } else {
        Session::flash('error', 'Failed to update.');
    }
    return back();

     }
}

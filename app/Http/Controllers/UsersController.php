<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Session;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $users = User::All();
        return view('admin/users/index', [
            'users' => $users
        ]);
    }
    public function create(){
        return view('admin/users/create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::create([
           'fname' => $request->fname, 
           'lname' => $request->lname, 
           'email' => $request->email,
           'password' => Hash::make(request('password')),
           
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => '/profiles/avatar.png',
        ]);
        Session::flash('success', 'User Added Successfully.');
        return redirect('admin/users');
    }
    public function admin($id){
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success', 'You successfully Changed the user permissions.');
        return redirect()->back();
    }
    public function not_admin($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success', 'You successfully Changed the user permissions.');
        return redirect()->back();
    }
    public function destroy($id){
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('success', 'User Deleted.');
        return redirect()->back();
    }
    public function delete($id){
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('success', 'User Deleted.');
        return redirect()->back();
    }
}

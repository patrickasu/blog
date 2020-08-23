<?php

namespace App\Http\Controllers;
use App\Setting;
use Session;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $settings = Setting::first();
        return view('admin/setting/settings', [
            'settings' => $settings,
        ]);
    }
    public function update(Request $request){
        //dd(request());
        //dd(request()->all());
        $this->validate($request, [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email',
            'contact_address' => 'required',
        ]);
        $settings = Setting::first();
        $settings->site_name = request()->site_name;
        $settings->contact_number = request()->contact_number;
        $settings->contact_email = request()->contact_email;
        $settings->contact_address = request()->contact_address;
        $settings->save();
        Session::flash('success', 'Settings Updated.');
        return redirect()->back();
    }
}

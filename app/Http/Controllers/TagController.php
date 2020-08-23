<?php

namespace App\Http\Controllers;
use App\Tag;
use Session;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::All();
        return view('admin/tags/index', [
            'tags' => $tags
        ]);
    }
    public function create(){
        return view('admin/tags/create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);
        $tags = new Tag;
        $tags->name = request('name');
        $tags->save();
        //dd($tags);
        Session::flash('success', 'Tag Created Successfully.');
        //return redirect()->back();
        return redirect('admin/tag');
    }
    public function edit($id){
        $tags = Tag::find($id);
        return view('admin/tags/edit', [
            'tags' => $tags,
        ]);
    }
    public function update($id){
        $tags =  Tag::find($id);
        $tags->name = request('name');
        $tags->save();
        Session::flash('success', 'Tag Updated Successfully.');
        return redirect('admin/tag');
    }
    public function delete($id){
        $tags = Tag::find($id);
        $tags ->delete();
        Session::flash('success', 'You Successfully Deleted the Tag.');
        return redirect('/admin/tag');
    }
}

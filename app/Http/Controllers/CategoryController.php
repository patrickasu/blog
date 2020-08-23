<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::All();
        return view('admin/category/index', [
            'categories' => $categories
        ]);
    }

    public function create(){
        return view('admin/category/create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
        ]);
        $categories = new Category;
        $categories->name = request('name');
        $categories->save();
        Session::flash('success', 'You Successfully Created a New Category.');
        return redirect('admin/post-category');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin/category/edit', [
            'category' => $category,
        ]);
    }
    public function update($id){
        $categories =  Category::find($id);
        $categories->name = request('name');
        $categories->save();
        Session::flash('success', 'You Successfully Updated the Category.');
        return redirect('admin/post-category');
    }

    public function delete($id){
        $category =  Category::find($id);
        foreach($category->posts as $post) {
            $post->delete();
            $post->forceDelete();
        }
        $category = Category::find($id);
        $category ->delete();
        Session::flash('success', 'You Successfully Deleted the Category.');
        return redirect('/admin/post-category');
    }
}
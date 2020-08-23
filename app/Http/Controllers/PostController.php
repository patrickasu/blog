<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        $posts = Post::All();
        return view('admin/posts/index', [
            'posts' => $posts  
        ]);
    }
    public function create(){
        $categories = Category::All();
        $tags = Tag::All();
        if($categories->count() == 0 || $tags->count() == 0){
            Session::flash('info', 'You must have some categories and Tags before attempting to create a post.');
            return redirect()->back();
        }
        return view('admin/posts/create', [
            'categories' => $categories,
            'tags' => $tags  
        ]);
    }
    public function store(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'required|image',
            'category_id' => 'required',
        ]);
        // $featured_image = $request->featured_image;
        // $featured_image_new_name = time().$featured_image->getClientOriginalName();
        // $featured_image->move('uploads/posts', $featured_image_new_name);
        $imageName = time().'.'.$request->featured_image->getClientOriginalExtension();
        $request->featured_image->move(public_path('images'), $imageName);
        $post = new Post;
        $post->title = request('title');
        $post->content = request('content');
        $post->featured_image = $imageName;
        $post->category_id = request('category_id');
        $request['slug'] = Str::slug($request->title);
        $post->save();
        $post->tags()->attach(request('tags'));
        Session::flash('success', 'Post Created Successfully.');
        return redirect('admin/posts');
        
        // Session::flash('success', 'Post Created Successfully.');
        //dd($request->all());
    }
    public function edit($id){
        $posts = Post::find($id);
        $categories = Category::All();
        $tags = Tag::All();
        return view('admin/posts/edit', [
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'title' => 'required', 
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $posts =  Post::find($id);
        if ($request->hasFile('featured_image')) {
            $featured_image = $request->featured_image;
            // $featured_image_new_name = time() . $featured_image->getClientOriginalName();
            // $featured_image->move('')
            $imageName = time().'.'.$request->featured_image->getClientOriginalExtension();
            $request->featured_image->move(public_path('images'), $imageName);
            $posts->featured_image = $imageName;
        }
        $posts->title = request('title');
        $posts->content = request('content');
        $posts->category_id = request('category_id');
        $posts->save();
        $posts->tags()->sync(request('tags'));
        Session::flash('success', 'Post Updated Successfully.');
        return redirect('admin/posts');

    }
    public function delete($id){
        $post = Post::find($id);
        $post ->delete();
        Session::flash('success', 'The post was just trashed.');
        return redirect()->back();
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin/posts/trashed', [
            'posts' => $posts
        ]);
        //dd($post);
    }
    public function kill($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();
        Session::flash('success', 'Post deleted permanently.');
        return redirect()->back();
        //dd($posts);
    }
    public function restore($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();
        Session::flash('success', 'Post restore successfully.');
        return redirect('admin/posts');
        //return redirect()->back();
        //return redirect()->route('admin/posts');
        //dd($posts);
    }
}

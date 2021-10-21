<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user','likes','category'])->latest()->paginate(5);
        $categories = Category::all();
        // dd($posts);
        return view('admin.posts.index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.partials.add-post',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostFormRequest $request)
    {
        // $request;
        // return $request;
        $validated = $request->validated();
        $fileNameWithExt = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $ext = $request->file('file')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().$ext;

        $filePath = $request->file('file')->storeAs('public/posts',$fileNameToStore);
        // Post::create($validated);
        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->user_id = Auth::id();
        $post->image_url =$fileNameToStore;
        $post->category_id = $validated['category_id'];
        $post->save();

        return redirect()->route('posts.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.partials.edit-post', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, $id)
    {
        $fileNameWithExt = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        $ext = $request->file('file')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().$ext;

        $filePath = $request->file('file')->storeAs('public/posts',$fileNameToStore);
        
        $validated = $request->validated();
        $post = Post::find($id);
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->user_id = Auth::id();
        $post->image_url = $fileNameToStore;
        $post->category_id = $validated['category_id'];
        $post->save();

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return back();
    }

    public function forceDelete($id){
        Post::withTrashed()->find($id)->forceDelete();
        return back();
    }

    public function restore($id){
        $post = Post::withTrashed()->find($id);
        $post->restore();
        return back();
    }

    public function archive(){

        $posts = Post::onlyTrashed()->latest()->paginate(5);
        // dd($posts);
        $categories = Category::all();
        return view('admin.posts.archive-posts',compact('posts','categories'));
    }
}

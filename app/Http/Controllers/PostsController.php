<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;


class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'         => 'required|unique:posts|max:255',
            'article_body'  => 'required',
            'cover_image'   => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get Filename with extention 
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // GET EXTENSION
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            // Link store with public by artisan 

        } else {
            $fileNameToStore = "noimage.jpg";
        }
        $post = new Post;
        $post->title = $request->input('title'); 
        $post->body = $request->input('article_body'); 
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        return redirect()->to('posts')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.single')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        // Check correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'article_body' => 'required',
            'cover_image'   => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } 
        $post = Post::find($id);
        $post->title = $request->input('title'); 
        $post->body = $request->input('article_body'); 
        if($request->hasFile('cover_image')) {
            Storage::delete('public/cover_images/'.$post->cover_image);
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        return redirect()->to('posts')->with('success', 'Post Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error', 'Unauthorized Page');
        }
        if($post->cover_image !== 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect()->to('posts')->with('success', 'Post Deleted');

    }
}

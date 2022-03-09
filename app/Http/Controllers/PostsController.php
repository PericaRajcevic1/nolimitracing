<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
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
        $this->validate($request, [
            'title' => 'required',
            'location' => 'required',
            'body' => 'required',
            
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //upload handler

        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // dohvaćamo samo ime
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // samo ekstenziju
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //spremanje imena
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // udcitavanje
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        //kreiranje posta
        $post = new Post;
        $post->title= $request->input('title');
        $post->location= $request->input('location');
        $post->body= $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','Objavili ste oglas');
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
        return view('posts.show')->with('post', $post);
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
        // Trazi pravog usera
        if(auth()->user()->id !==$post->user_id && !(Gate::allows('delete-posts'))){
        return redirect('/posts')->with('error', "Niste vlasnik oglasa ili admin.");
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
        $this->validate($request, [
            'title' => 'required',
            'location' => 'required',
            'body' => 'required',
           
        ]);
        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // dohvaćamo samo ime
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // samo ekstenziju
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //spremanje imena
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // udcitavanje
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } 

        $post = Post::find($id);
        $post->title= $request->input('title');
        $post->location= $request->input('location');
        $post->body= $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success','Uredili ste oglas.');
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
        // Trazi pravog usera
        if(auth()->user()->id !==$post->user_id && !(Gate::allows('delete-posts'))){
            return redirect('/posts')->with('error', "Niste vlasnik fotografije ili admin");
            }
        
        if($post->cover_image != 'noimage.jpg')  {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }  

        $post->delete();
        return redirect('/posts')->with('success','Obrisali ste fotografiju.');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use App\Category;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('category',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //upload the file to the storage
        $image=$request->file('image');
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $post = Post::create([
           'title'=>$request->title,
           'description'=>$request->description,
           'content'=>$request->content,
           'image'=>$image_url,
           'published_at'=>$request->published_at,
           'category_id'=>$request->category,
           'user_id'=>auth()->user()->id
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }
         $msg= __('translateproperties.postcreatemsg');

        session()->flash('success',$msg);

        return redirect(route('posts.index'));
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
    public function edit(POST $post)
    {
        return view('posts.create')->with('posts',$post)->with('category',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, POST $post)
    {
        $data=$request->only(['title','description','published_at','content']);
         $image=$request->file('image');
         if($image){
         $image_name=hexdec(uniqid());
         $ext=strtolower($image->getClientOriginalExtension());
         $image_full_name=$image_name.'.'.$ext;
         $upload_path='public/image/';
         $image_url=$upload_path.$image_full_name;
         $success=$image->move($upload_path,$image_full_name);
         echo "<pre>";
         print_r($post);
         unlink($post->image);
         $data['image']=$image_url;
         }
         if($post->tags)
         {
            $post->tags()->sync($request->tags);
         }
         $post->update($data);
         $msg= __('translateproperties.postupdatemsg');
         session()->flash('success',$msg);
         return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();

        if($post->trashed())
        {
            unlink($post->image);
            $post->forceDelete();
        }
        else
        {
            $post->delete();
        }
        $msg= __('translateproperties.postdeletemsg');
        session()->flash('success',$msg);
        return redirect(route('posts.index'));
    }

    public function trashed()
    {
        $trashed=POST::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        $msg= __('translateproperties.postrestoremsg');
        session()->flash('success',$msg);
        return redirect()->back();

    }
}

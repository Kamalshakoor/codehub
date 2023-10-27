<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\posts\CreatePostRequest;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all()->where('seller_id',auth()->user()->id);
        // foreach ($posts as $post) {
        //     return response()->download(public_path('storage/'.$post->project));
        // }
        return view('seller.posts.index')->with('posts',Post::where('seller_id',auth()->user()->id)->simplePaginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.posts.create')->with('subcategories',SubCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
       if($request->project->getClientOriginalExtension() != 'zip'){
           session()->flash('error','Please Upload a Project Zip File');
           return redirect()->back();
       }
        $image = $request->image->store('posts');
        $project = $request->project->store('projects');

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
            'project' => $project,
            'seller_id' => auth()->user()->id,
            'subcategory_id' => $request->subcategory
        ]);

        session()->flash('success','Project created successfully.');

        return redirect(route('seller.posts.index'));
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
    public function edit(Post $post)
    {
        return view('seller.posts.create')->with('post',$post)->with('subcategories',SubCategory::all());  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->hasFile('image')){
            $image = $request->image->store('posts');
            Storage::delete($post->image);
        } else {
            $image = $post->image;
        }

        if($request->hasFile('project')){
            $project = $request->project->store('projects');
            Storage::delete($post->project);
        } else {
            $project = $post->project;
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image,
            'project' => $project,
            'seller_id' => auth()->user()->id,
            'subcategory_id' => $request->subcategory
        ]);

        session()->flash('success','Project updated successfully.');

        return redirect(route('seller.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        Storage::delete($post->project);

        $post->delete();

        session()->flash('success','Project deleted successfully.');

        return redirect(route('seller.posts.index'));
    }
}
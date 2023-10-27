<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // show sellers in admin panel
    public function index()
    {
        return view('admin.sellers.index')->with('sellers',Seller::all());
    }

    // show projects in admin panel
    public function projects()
    {
        return view('admin.projects.index')->with('posts',Post::all());
    }

    // admin will approve project
    public function approveProject(Post $post)
    {
        $post->status = true;

        $post->save();
        
        session()->flash('success','Project approved successfully.');

        return redirect()->back();
    }

    // show project details in admin panel
    public function show(Post $post)
    {
        return view('admin.projects.show')->with('post',$post);
    }

    // admin can delete a seller
    public function delete(Seller $seller)
    {
        $posts = Post::where('seller_id',$seller->id)->get();

        foreach ($posts as $post) {
            $post->delete();
            Storage::delete($post->image);
        }

        $seller->delete();
        
        session()->flash('success','Seller deleted Successfully.');

        return redirect()->back();
    }

    // admin can delete a project
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('success','Project deleted successfully.');

        return redirect()->back();
    }
}

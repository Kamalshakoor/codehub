<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        // dd(File::exists(public_path('Example.zip')));
        if(File::exists(public_path('Project.zip')))
        {
            File::delete(public_path('Project.zip'));
        }
        return view('welcome')
        ->with('posts',Post::all())
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all());
    }

    public function searchResults()
    {
        return view('search-results')
        ->with('posts',Post::searched()->simplePaginate(3))
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all());
    }

    public function singlePost(Post $post)
    {
        $ratings = Rating::where('post_id',$post->id)->get();
        $rating_sum = Rating::where('post_id',$post->id)->sum('stars_rated');
        if($ratings->count() > 0)
        {
            $rating_value = $rating_sum/$ratings->count();
        } else {
            $rating_value = 0;
        }
        // if rating is done on a post by user
        $rating_done = Rating::where('buyer_id',auth()->user()->id)->where('post_id',$post->id)->first();
        return view('front.single')
        ->with('post',$post)
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all())
        ->with('ratings',$ratings)
        ->with('rating_value',$rating_value)
        ->with('rating_done',$rating_done);
    }

    public function category(Category $category)
    {
        return view('front.category')
        ->with('category',$category)
       ->with('posts',Post::searched()->simplePaginate(3))
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all());
    }

    public function Subcategory(Subcategory $subcategory)
    {
        return view('front.subcategory')
        ->with('subcategory',$subcategory)
       ->with('posts',Post::searched()->paginate(5))
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all());
    }
}

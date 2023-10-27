<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:buyer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('welcome')
        // ->with('posts',Post::all())
        // ->with('subcategories',Subcategory::all())
        // ->with('categories',Category::all());
        return view('buyer.home');
    }
}

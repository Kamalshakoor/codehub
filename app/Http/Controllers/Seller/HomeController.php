<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use App\Models\Seller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::where('seller_id',auth()->user()->id)->get();
        $total_balance = 0;
        foreach ($orders as $order) {
            if(!$order->status){
                $total_balance = $total_balance + $order->post->price;
            }
        }
        $posts_count = Post::all()->where('seller_id',auth()->user()->id)->count();
        $sales_count = Order::all()->where('seller_id',auth()->user()->id)->count();
    
        return view('seller.home')
        ->with('posts_count',$posts_count)
        ->with('sales_count',$sales_count)
        ->with('total_balance',$total_balance);
    }
}

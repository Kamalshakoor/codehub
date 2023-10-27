<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {

        // dd(auth()->user()->name);

        $post = Post::find(request()->post_id);

        $cartItem = Cart::add([
            'id' => $post->id,
            'name' => $post->title,
            'qty' => 1,
            'price' => $post->price,
        ]);

        Cart::associate($cartItem->rowId,'App\Models\Post');

        session()->flash('success','Product added successfully.');

        return redirect(route('buyer.cart'));
    }

    public function cart()
    {
        return view('front.cart')
        ->with('posts',Post::all())
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all());
    }

    public function cart_delete($id)
    {
        Cart::remove($id);

        session()->flash('success','Product deleted successfully.');

        return redirect()->back();
    }
}

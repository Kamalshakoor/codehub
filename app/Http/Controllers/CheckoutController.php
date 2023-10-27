<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('front.checkout')
        ->with('posts',Post::all())
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all());
    }

    public function checkout()
    {   if(Cart::content()->count() == 0)
        {
            return redirect(route('welcome'));
        }
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_GaJce7tbHQ3kTgIqBPdpLl4x00ysIkm78h');
		
		$amount = Cart::total() * 100;
        // dd($amount);
        $amount = (int) $amount;
        // dd($amount);
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'USD',
			'description' => 'Payment From CodeHub',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'))
        ->with('posts',Post::all())
        ->with('subcategories',Subcategory::all())
        ->with('categories',Category::all());

    }

    public function afterPayment()
    {
        foreach(Cart::content() as $post){
            Order::create([
                'buyer_id' => auth()->user()->id,
                'seller_id' => $post->model->seller_id,
                'post_id' => $post->model->id
            ]);
        }

        if(Cart::content()->count() == 1)
        {
            foreach (Cart::content() as $post)
            {
                session()->flash('success','Order Placed Successfully.');
                Cart::destroy();
                return response()->download(public_path('storage/'.$post->model->project));
            }
        } elseif (Cart::content()->count() == 0) {
            session('error', 'Please add product to cart.');
            return redirect(route('welcome'));
        } else {
            // download zip file
            $zip = new ZipArchive;

            $fileName = 'Project.zip';

            if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
            {
                foreach (Cart::content() as $post) {
                    $file = basename($post->model->project);
                    $zip->addFile(public_path('storage/'.$post->model->project),$file);
                }
                
                $zip->close();

                Cart::destroy();
            }

            session()->flash('success','Order Placed Successfully.');

            
            return response()->download(public_path($fileName));
            unlink(public_path('Project.zip'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $purchase_check = Order::where('buyer_id',auth()->user()->id)->where('post_id',$request->post_id)->first();

        if($purchase_check)
        {
            $already_rated = Rating::where('buyer_id',auth()->user()->id)->where('post_id',$request->post_id)->first();
            if($already_rated)
            {
                $already_rated->stars_rated = $request->product_rating;
                $already_rated->update();
            } else {
                Rating::create([
                    'buyer_id' => auth()->user()->id,
                    'post_id' => $request->post_id,
                    'stars_rated' => $request->product_rating
                ]);
            }
            return redirect()->back()->with('success','Thank you for rating this product');
        } else {
            return redirect()->back()->with('error','You cannot rate a product without purchase');
        }
    }
}

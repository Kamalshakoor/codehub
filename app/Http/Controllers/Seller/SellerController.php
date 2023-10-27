<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $orders = Order::where('seller_id',auth()->user()->id)->simplePaginate(5);
        return view('seller.orders.index')->with('orders',$orders);
    }

    public function balance()
    {
        $orders = Order::where('seller_id',auth()->user()->id)->get();
        $total = 0;
        foreach ($orders as $order) {
            if(!$order->status){
                $total = $total + $order->post->price;
            }
        }
        return view('seller.orders.balance')
        ->with('total',$total)
        ->with('seller',auth()->user());
    }

    public function balanceWithdraw()
    {
        $orders = Order::where('seller_id',auth()->user()->id)->get();
        foreach ($orders as $order) {
           $order->status = true;
           $order->save();
        }

        return redirect()->back();
    }

    public function accountDetail(Request $request, Seller $seller)
    {
        $seller->update([
            'bank_name' => $request->bank_name,
            'account_holder_name' => $request->account_holder_name,
            'account_number' => $request->account_number,
        ]);

        session()->flash('success','Account detail added successfully.');

        return redirect()->back();
    }
}

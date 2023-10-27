<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        return view('admin.subscribers.index')->with('subscribers',Subscriber::orderBy('id','desc')->paginate(5));
    }

    public function store(Request $request)
    {
        Subscriber::create([
            'email' => $request->email
        ]);

        session()->flash('success','Subscription added successfully.');

        return redirect()->back();
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        session()->flash('success','Subscriber deleted successfully.');

        return redirect()->back();
    }
}

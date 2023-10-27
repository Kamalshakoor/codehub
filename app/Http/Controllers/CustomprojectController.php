<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomProjectRequest;
use App\Models\Customproject;
use Illuminate\Http\Request;

class CustomprojectController extends Controller
{
    public function index()
    {
        return view('admin.customprojects.index')->with('customprojects',Customproject::all());
    }

    public function store(CreateCustomProjectRequest $request)
    {
        Customproject::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'message' => $request->message
        ]);

        return redirect()->back()->with('success','Your Request for Custom Project Sent Successfully.');
    }

    public function show(Customproject $customproject)
    {
        return view('admin.customprojects.show')->with('customproject',$customproject);
    }


}

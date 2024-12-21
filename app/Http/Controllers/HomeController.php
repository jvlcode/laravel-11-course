<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function contactForm(){
        return view('contact.form');
    }

    public function submitContactForm(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        // dd($request->all());
        // $data = $request->all();
        //Store the data to database or Send Email
        // Success message
        return redirect()->route('contact.show')->with('status', 'Your message has been sent successfully!');
    }
}

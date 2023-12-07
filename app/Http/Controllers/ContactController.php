<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Session::forget(['arrival', 'departure']);
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $currentDateTime = now();

        $contact = Contact::create([
            'date' =>  $currentDateTime,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'comment' => $request->input('message'),
            'archived' => false,
        ]);

        if ($contact->wasRecentlyCreated) {

            $notification = [
                'Thanks! Your message will be reviewed soon.',
                'success',
                false,
                'Thanks for your time!',
            ];
        } else {
            $notification = [
                "Oops! Something's wrong. Try again later, please.",
                'error',
                false,
                'Error:',
            ];
        }

        return response()->json(['notification' => $notification]);
    }
}

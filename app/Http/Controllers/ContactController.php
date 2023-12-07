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
        $contact = new Contact();
        $contact->date = $currentDateTime;
        $contact->name = htmlspecialchars($request->input('name'));
        $contact->email = htmlspecialchars($request->input('email'));
        $contact->phone = htmlspecialchars($request->input('phone'));
        $contact->subject = htmlspecialchars($request->input('subject'));
        $contact->comment = htmlspecialchars($request->input('message'));
        $contact->archived = false;

        $contact->save();

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

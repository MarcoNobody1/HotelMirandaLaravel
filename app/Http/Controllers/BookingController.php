<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Session::has('arrival') && Session::has('departure') && Session::has('roomId') && Session::has('roomPrice')) {
            $checkin =  htmlspecialchars(Session::get('arrival'));
            $checkout =  htmlspecialchars(Session::get('departure'));
            $roomId = htmlspecialchars(Session::get('roomId'));
            $roomPrice = htmlspecialchars(Session::get('roomPrice'));
        }


        $request->validate([
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'specialrequest' => 'required',
        ]);

        $currentDateTime = now();

        $booking = Booking::create([
            'name' => $request->input('firstname'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'order_date' =>  $currentDateTime,
            'check_in' => $checkin,
            'check_out' => $checkout,
            'special_request' => $request->input('specialrequest'),
            'room_id' => $roomId,
            'price' => $roomPrice,
            'status' => 'Check In',
        ]);

        if ($booking->wasRecentlyCreated) {
            $notification = [
                'Thanks! Your booking is done.',
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

        Session::forget(['arrival', 'departure']);

        return response()->json(['notification' => $notification]);
    }
}

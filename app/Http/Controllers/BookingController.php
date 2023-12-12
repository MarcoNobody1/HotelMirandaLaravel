<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'order_date' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'special_request' => 'required',
            'room_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $booking = Booking::create($request->all());

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


        return response()->json(['notification' => $notification]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Session::has('roomId') && Session::has('roomPrice')) {
            Session::forget(['roomId', 'roomPrice']);
        }

        $rooms = Room::where('room.availability', 'Available')
            ->groupBy('room.id')
            ->get();

        foreach ($rooms as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        return view('home', ['rooms' => $rooms]);
    }
}

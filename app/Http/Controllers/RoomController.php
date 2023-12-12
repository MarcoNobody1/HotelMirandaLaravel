<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    public function index()
    {
        $checkin = '';
        $checkout = '';

        $rooms = Room::all();

        $photoArray = Room::organizePhotos($rooms);

        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $chunks = array_chunk($roomsArray, 5);

        return view('rooms', ['rooms' => $chunks, 'arrival' => $checkin, 'departure' => $checkout, 'photo' => $photoArray]);
    }

    public function search(Request $request)
    {
        $checkin = htmlspecialchars($request->query('arrival'));
        $checkout = htmlspecialchars($request->query('departure'));

        $rooms = Room::getRooms($checkin, $checkout);

        $photoArray = Room::organizePhotos($rooms);

        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $chunks = array_chunk($roomsArray, 5);

        return view('rooms', ['rooms' => $chunks, 'arrival' => $checkin, 'departure' => $checkout, 'photo' => $photoArray]);
    }

    public function show(string $id, Request $request)
    {
        $checkin = htmlspecialchars($request->query('arrival'));
        $checkout = htmlspecialchars($request->query('departure'));

        $roomDetails = Room::findOrFail($id);

        $roomId = $roomDetails->id;
        $roomPrice = $roomDetails->price;


        $roomDetails->finalPrice = $roomDetails->price - ($roomDetails->price * ($roomDetails->discount / 100));

        if ($checkin && $checkout) {
            $recommendedRooms = Room::getRooms($checkin, $checkout)->shuffle()->take(5);
        } else {
            $recommendedRooms = Room::all()->shuffle()->take(5);
        }



        foreach ($recommendedRooms as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        return view('roomdetails', ['roomdetails' => $roomDetails, 'recommendedRooms' => $recommendedRooms, 'checkin' => $checkin, 'checkout' => $checkout, 'roomId' => $roomId, 'roomPrice' => $roomPrice]);
    }
}

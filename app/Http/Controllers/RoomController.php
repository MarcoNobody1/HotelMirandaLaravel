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

        $rooms = Room::all()->where('availability', 'Available');

        $photoArray = Room::organizePhotos($rooms);

        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $chunks = array_chunk($roomsArray, 5);

        return view('rooms', ['rooms' => $chunks, 'check_in' => $checkin, 'check_out' => $checkout, 'photo' => $photoArray]);
    }

    public function search(Request $request)
    {
        $checkin = htmlspecialchars($request->query('check_in'));
        $checkout = htmlspecialchars($request->query('check_out'));

        $rooms = Room::getRooms($checkin, $checkout);

        $photoArray = Room::organizePhotos($rooms);

        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $chunks = array_chunk($roomsArray, 5);

        return view('rooms', ['rooms' => $chunks, 'check_in' => $checkin, 'check_out' => $checkout, 'photo' => $photoArray]);
    }

    public function show(string $id, Request $request)
    {
        $checkin = htmlspecialchars($request->query('check_in'));
        $checkout = htmlspecialchars($request->query('check_out'));

        $roomDetails = Room::findOrFail($id);

        $error = false;

        $roomId = $roomDetails->id;
        $roomPrice = $roomDetails->price;

        $roomDetails->finalPrice = $roomDetails->price - ($roomDetails->price * ($roomDetails->discount / 100));

        if ($checkin && $checkout) {
            $recommendedRooms = Room::getRooms($checkin, $checkout)->where('availability', 'Available')->shuffle()->take(5);
        } else {
            $recommendedRooms = Room::all()->where('availability', 'Available')->shuffle()->take(5);
        }

        if ($checkin && $checkout) {
            $roomAvailable = Room::getAvailableRoom($checkin, $checkout, $id);
            if (count($roomAvailable) == 0) {
                $error = true;
            } else {
                $error = false;
            }
        }


        foreach ($recommendedRooms as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        return view('roomdetails', ['error' =>  $error, 'roomdetails' => $roomDetails, 'recommendedRooms' => $recommendedRooms, 'checkin' => $checkin, 'checkout' => $checkout, 'roomId' => $roomId, 'roomPrice' => $roomPrice]);
    }
}

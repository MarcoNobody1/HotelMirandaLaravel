<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkin = '';
        $checkout = '';

        $rooms = Room::where('room.discount', '!=', "0")->get();

        $offerPhotoArray = Room::organizePhotos($rooms);

        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $chunks = array_chunk($roomsArray, 5);

        if ($checkin && $checkout) {
            $recommendedRooms = Room::getRooms($checkin, $checkout)->shuffle()->take(5);
            $recommendedPhotoArray = Room::organizePhotos($recommendedRooms);
        } else {
            $recommendedRooms = Room::all()->shuffle()->take(5);
            $recommendedPhotoArray = Room::organizePhotos($recommendedRooms);
        }

        foreach ($recommendedRooms as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        return view('offers', ['discountedRooms' => $chunks, 'rooms' => $recommendedRooms, 'checkin' => $checkin, 'checkout' => $checkout, 'offerphoto' =>  $offerPhotoArray, 'recommendedphoto' => $recommendedPhotoArray]);
    }
}

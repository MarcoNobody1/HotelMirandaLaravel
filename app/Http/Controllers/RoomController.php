<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $rooms = Room::select('room.*')
            ->selectRaw('GROUP_CONCAT(DISTINCT photos.photo_url) as photo')
            ->selectRaw('GROUP_CONCAT(amenity.amenity) as amenity')
            ->leftJoin('photos', 'room.id', '=', 'photos.room_id')
            ->leftJoin('room_amenities', 'room.id', '=', 'room_amenities.room_id')
            ->leftJoin('amenity', 'room_amenities.amenity_id', '=', 'amenity.id')
            ->where('room.availability', 'Available')
            ->groupBy('room.id')
            ->get();

        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $chunks = array_chunk($roomsArray, 5);

        return view('rooms', ['rooms' => $chunks]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checkin = htmlspecialchars($request->query('arrival'));
        $checkout = htmlspecialchars($request->query('departure'));
        Session::put('arrival', $checkin);
        Session::put('departure', $checkout);
        $roominstance = new Room();
        $rooms = $roominstance->getRooms($checkin, $checkout);
        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $chunks = array_chunk($roomsArray, 5);

        return view('rooms', ['rooms' => $chunks]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Session::has('arrival') && Session::has('departure')) {
            $checkin =  htmlspecialchars(Session::get('arrival'));
            $checkout =  htmlspecialchars(Session::get('departure'));
        }

        $roomraw = Room::select('room.*')
            ->selectRaw('GROUP_CONCAT(DISTINCT photos.photo_url) as photo')
            ->selectRaw('GROUP_CONCAT(amenity.amenity) as amenity')
            ->leftJoin('photos', 'room.id', '=', 'photos.room_id')
            ->leftJoin('room_amenities', 'room.id', '=', 'room_amenities.room_id')
            ->leftJoin('amenity', 'room_amenities.amenity_id', '=', 'amenity.id')
            ->where('room.id', $id)
            ->groupBy('room.id')
            ->first();

        $roomDetails = $roomraw->toArray();

        $roomId = $roomDetails['id'];
        $roomPrice = $roomDetails['price'];

        Session::put('roomId', $roomId);
        Session::put('roomPrice', $roomPrice);

        $roomDetails['finalPrice'] = $roomDetails['price'] - ($roomDetails['price'] * ($roomDetails['discount'] / 100));

        $roomsraw = Room::select('room.*')
            ->selectRaw('GROUP_CONCAT(DISTINCT photos.photo_url) as photo')
            ->selectRaw('GROUP_CONCAT(amenity.amenity) as amenity')
            ->leftJoin('photos', 'room.id', '=', 'photos.room_id')
            ->leftJoin('room_amenities', 'room.id', '=', 'room_amenities.room_id')
            ->leftJoin('amenity', 'room_amenities.amenity_id', '=', 'amenity.id')
            ->where('room.availability', 'Available')
            ->where('room.discount', '!=', 0)
            ->groupBy('room.id')
            ->get();

        $roomsArray = $roomsraw->toArray();

        $randomRoomIndices = array_rand($roomsArray, 5);
        $recommendedRooms = array_intersect_key($roomsArray, array_flip($randomRoomIndices));
        foreach ($recommendedRooms as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        return view('roomdetails', ['roomdetails' => $roomDetails, 'recommendedRooms' => $recommendedRooms, 'checkin' => $checkin, 'checkout' => $checkout]);
    }
}

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
        $rooms = $roominstance->getOffers($checkin, $checkout);
        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $randomRoomIndices = array_rand($roomsArray, 5);
        $randomRooms = array_intersect_key($roomsArray, array_flip($randomRoomIndices));
        $chunks = array_chunk($roomsArray, 5);

        return view('offers', ['discountedRooms' => $chunks, 'rooms' => $randomRooms, 'checkin' => $checkin, 'checkout' => $checkout]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

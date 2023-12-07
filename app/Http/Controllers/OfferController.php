<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('arrival') && request()->has('departure')) {
            $checkin = htmlspecialchars(request()->input('arrival'));
            Session::put('arrival', $checkin);
            $checkout = htmlspecialchars(request()->input('departure'));
            Session::put('departure', $checkout);

            $rooms = Room::select('room.*')
            ->selectRaw('GROUP_CONCAT(DISTINCT photos.photo_url) as photo')
            ->selectRaw('GROUP_CONCAT(amenity.amenity) as amenity')
            ->leftJoin('photos', 'room.id', '=', 'photos.room_id')
            ->leftJoin('room_amenities', 'room.id', '=', 'room_amenities.room_id')
            ->leftJoin('amenity', 'room_amenities.amenity_id', '=', 'amenity.id')
            ->where('room.availability', 'Available')
            ->where('room.discount', '!=', 0)
                ->whereNotExists(function (Builder $subquery) use ($checkin, $checkout) {
                    $subquery->selectRaw(1)
                        ->from('booking as b')
                        ->whereColumn('room.id', 'b.room_id')
                        ->where(function (Builder $query) use ($checkin, $checkout) {
                            $query->whereBetween($checkin, ['b.check_in', 'b.check_out'])
                                ->orWhereBetween($checkout, ['b.check_in', 'b.check_out'])
                                ->orWhereBetween('b.check_in', [$checkin, $checkout])
                                ->orWhereBetween('b.check_out', [$checkin, $checkout]);
                        });
                })
                ->groupBy('room.id')
                ->get();
        } else {
            $rooms = Room::select('room.*')
                ->selectRaw('GROUP_CONCAT(DISTINCT photos.photo_url) as photo')
                ->selectRaw('GROUP_CONCAT(amenity.amenity) as amenity')
                ->leftJoin('photos', 'room.id', '=', 'photos.room_id')
                ->leftJoin('room_amenities', 'room.id', '=', 'room_amenities.room_id')
                ->leftJoin('amenity', 'room_amenities.amenity_id', '=', 'amenity.id')
                ->where('room.availability', 'Available')
                ->where('room.discount', '!=', 0)
                ->groupBy('room.id')
                ->get();
        }

        $roomsArray = $rooms->toArray();

        foreach ($roomsArray as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        $randomRoomIndices = array_rand($roomsArray, 5);
        $randomRooms = array_intersect_key($roomsArray, array_flip($randomRoomIndices));

        $chunks = array_chunk($roomsArray, 3);



        return view('offers', ['discountedRooms' => $chunks, 'rooms' => $randomRooms]);
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
        //
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

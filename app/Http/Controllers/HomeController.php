<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
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

        foreach ($rooms as &$room) {
            $room['discountedPrice'] = $room['price'] - ($room['price'] * ($room['discount'] / 100));
        }

        return view('home', ['rooms' => $rooms]);
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

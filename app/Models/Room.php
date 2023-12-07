<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    public $timestamps = false;

    public function getRooms($checkin, $checkout)
    {


        $rooms = Room::select('room.*')
            ->selectRaw('GROUP_CONCAT(DISTINCT photos.photo_url) as photo')
            ->selectRaw('GROUP_CONCAT(amenity.amenity) as amenity')
            ->leftJoin('photos', 'room.id', '=', 'photos.room_id')
            ->leftJoin('room_amenities', 'room.id', '=', 'room_amenities.room_id')
            ->leftJoin('amenity', 'room_amenities.amenity_id', '=', 'amenity.id')
            ->where('room.availability', 'Available')
            ->whereNotExists(function (Builder $subquery) use ($checkin, $checkout) {
                $subquery->selectRaw(1)
                    ->from('booking')
                    ->whereColumn('room.id', 'booking.room_id')
                    ->where(function (Builder $query) use ($checkin, $checkout) {
                        $query->whereBetween(DB::raw("'$checkin'"), ['booking.check_in', 'booking.check_out'])
                            ->orWhereBetween(DB::raw("'$checkout'"), ['booking.check_in', 'booking.check_out'])
                            ->orWhereBetween('booking.check_in', [DB::raw("'$checkin'"), DB::raw("'$checkout'")])
                            ->orWhereBetween('booking.check_out', [DB::raw("'$checkin'"), DB::raw("'$checkout'")]);
                    });
            })
            ->groupBy('room.id')
            ->get();

        return $rooms;
    }

    public function getOffers($checkin, $checkout)
    {


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
                    ->from('booking')
                    ->whereColumn('room.id', 'booking.room_id')
                    ->where(function (Builder $query) use ($checkin, $checkout) {
                        $query->whereBetween(DB::raw("'$checkin'"), ['booking.check_in', 'booking.check_out'])
                            ->orWhereBetween(DB::raw("'$checkout'"), ['booking.check_in', 'booking.check_out'])
                            ->orWhereBetween('booking.check_in', [DB::raw("'$checkin'"), DB::raw("'$checkout'")])
                            ->orWhereBetween('booking.check_out', [DB::raw("'$checkin'"), DB::raw("'$checkout'")]);
                    });
            })
            ->groupBy('room.id')
            ->get();

        return $rooms;
    }
}

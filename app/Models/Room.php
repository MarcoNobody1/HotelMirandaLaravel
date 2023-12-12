<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use App\Models\RoomPhoto;
use App\Models\Amenity;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';

    public function getPhotos(): HasMany
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public static function organizePhotos($rooms)
    {
        $photoArray = [];

        foreach ($rooms as $room) {
            foreach ($room->getPhotos as $photo) {
                array_push($photoArray, $photo->photo_url);
            }
        }

        return $photoArray;
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }

    public static function getRooms($checkin, $checkout)
    {

        $rooms = Room::where('room.availability', 'Available')
            ->whereNotExists(function (Builder $subquery) use ($checkin, $checkout) {
                $subquery->selectRaw(1)
                    ->from('booking')
                    ->whereColumn('room.id', 'booking.room_id')
                    ->where(function (Builder $query) use ($checkin, $checkout) {
                        $query->whereBetween('booking.check_in', [$checkin, $checkout])
                            ->orWhereBetween('booking.check_out', [$checkin, $checkout])
                            ->orWhere(function ($q) use ($checkin, $checkout) {
                                $q->where('booking.check_in', '<', $checkin)
                                    ->where('booking.check_out', '>', $checkout);
                            });
                    });
            })
            ->groupBy('room.id')
            ->get();

        return $rooms;
    }


    public static function getAvailableRoom($checkin, $checkout, $id)
    {
        $room = Room::where('room.availability', 'Available')
            ->where('room.id', $id)
            ->whereNotExists(function (Builder $subquery) use ($checkin, $checkout) {
                $subquery->selectRaw(1)
                    ->from('booking')
                    ->whereColumn('room.id', 'booking.room_id')
                    ->where(function (Builder $query) use ($checkin, $checkout) {
                        $query->whereBetween('booking.check_in', [$checkin, $checkout])
                            ->orWhereBetween('booking.check_out', [$checkin, $checkout])
                            ->orWhere(function ($q) use ($checkin, $checkout) {
                                $q->where('booking.check_in', '<', $checkin)
                                    ->where('booking.check_out', '>', $checkout);
                            });
                    });
            })
            ->groupBy('room.id')
            ->get();

        return $room;
    }

    public function getOffers($checkin, $checkout)
    {

        $rooms = Room::where('room.availability', 'Available')
        ->where('room.availability', 'Available')
            ->where('room.discount', '!=', 0)
        ->whereNotExists(function (Builder $subquery) use ($checkin, $checkout) {
            $subquery->selectRaw(1)
                ->from('booking')
                ->whereColumn('room.id', 'booking.room_id')
                ->where(function (Builder $query) use ($checkin, $checkout) {
                    $query->whereBetween('booking.check_in', [$checkin, $checkout])
                        ->orWhereBetween('booking.check_out', [$checkin, $checkout])
                        ->orWhere(function ($q) use ($checkin, $checkout) {
                            $q->where('booking.check_in', '<', $checkin)
                                ->where('booking.check_out', '>', $checkout);
                        });
                });
        })
        ->groupBy('room.id')
        ->get();

    return $rooms;
    }
}

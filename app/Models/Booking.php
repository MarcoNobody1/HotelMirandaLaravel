<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'email', 'phone', 'order_date', 'check_in', 'check_out', 'special_request', 'room_id', 'price', 'status'];
    protected $table = 'booking';
    public $timestamps = false;
}

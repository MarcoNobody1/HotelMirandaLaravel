<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {

        $currentUser = Auth::user()->id;
        $orders = Order::with('room')->with('user')->where('user_id', $currentUser)->get();

        return view('orders', ['orders' => $orders]);
    }

    public function create()
    {
        $numbers = Room::orderBy('number')->pluck('number');

        $roomsId = Room::pluck('id');

        return view('roomservice', ['numbers' => $numbers, 'rooms' => $roomsId]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        return view('editorder', ['order' => $order]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'type' => 'required|in:food,room,movies,other',
            'description' => 'required|string',
        ]);

        $order->update([
            'type' => $request->input('type'),
            'description' => $request->input('description'),

        ]);

        return Redirect::to('/orders');
    }

    public function destroy(Request $request): RedirectResponse
    {

        $orderId = $request->input("id");

        Order::destroy($orderId);

        return Redirect::to('/orders');
    }
}

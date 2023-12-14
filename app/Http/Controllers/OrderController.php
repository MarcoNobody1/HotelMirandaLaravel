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
        $roomsData = Room::orderBy('number')->select('id', 'number')->get();

        return view('roomservice', ['rooms' => $roomsData]);
    }

    public function store(Request $request): RedirectResponse
    {

        $data = $request->all();

        $action = Order::create($data);

        if ($action){
            return Redirect::to('/roomservice')->with('Success', 'Your request is sended');
        } else {
            return Redirect::to('/roomservice')->with('Error', 'Something went wrong. Please, try again.');
        }
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

        $action = $order->update([
            'type' => $request->input('type'),
            'description' => $request->input('description'),

        ]);

        if ($action > 0){
            return Redirect::to('/orders')->with('Success', 'Your order was updated successfully');
        } else {
            return Redirect::to('/orders')->with('Error', 'Something went wrong. Please, try again.');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {

        $orderId = $request->input("id");

        $action = Order::destroy($orderId);

        if ($action > 0){
            return Redirect::to('/orders')->with('Success', 'Your order was deleted successfully');
        } else {
            return Redirect::to('/orders')->with('Error', 'Something went wrong. Please, try again.');
        }
    }
}

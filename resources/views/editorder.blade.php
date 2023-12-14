<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="/orders" class="inline-block mx-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000" d="M19 11H7.14l3.63-4.36a1 1 0 1 0-1.54-1.28l-5 6a1.19 1.19 0 0 0-.09.15c0 .05 0 .08-.07.13A1 1 0 0 0 4 12a1 1 0 0 0 .07.36c0 .05 0 .08.07.13a1.19 1.19 0 0 0 .09.15l5 6A1 1 0 0 0 10 19a1 1 0 0 0 .64-.23a1 1 0 0 0 .13-1.41L7.14 13H19a1 1 0 0 0 0-2" />
                        </svg>
                    </a>
                    <strong class="text-xl">Order Nº {{$order->id}}</strong>
                    <form class="max-w-sm mx-auto" action="{{ route('editorder.update', ['id' => $order->id])}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Request Type</label>
                        <select name="type" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="food" @if($order->type == 'food') selected @endif>Food</option>
                            <option value="room" @if($order->type == 'room') selected @endif>Room Utilities</option>
                            <option value="movies" @if($order->type == 'movies') selected @endif>Movies</option>
                            <option value="other" @if($order->type == 'other') selected @endif>Other</option>
                        </select>
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Specify the subject of your order.</p>
                        <br>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input name="description" type="text" id="description" aria-describedby="helper-text-explanation" value="{{$order->description}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Food, Room, Service...">
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Explain your order briefly and concisely.</p>
                        <br>
                        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
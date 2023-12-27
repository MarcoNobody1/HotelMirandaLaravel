<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room Service') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('Success'))
                    {{ toastify()->success(session('Success'));}}
                    @elseif (session('Error'))
                    {{ toastify()->error(session('Error'));}}
                    @endif
                    <form class="max-w-sm mx-auto" method="POST" action="{{ route('roomservice.create')}}">
                        @csrf
                        @method('POST')
                        <label for="room_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Number</label>
                        <select name="room_id" id="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected hidden>Select your room</option>
                            @foreach ($rooms as $room)
                            <option value="{{$room->id}}">{{$room->number}}</option>
                            @endforeach
                        </select>
                        <br>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Request Type</label>
                        <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected hidden>Select type subject</option>
                            <option value="food">Food</option>
                            <option value="room">Room Utilities</option>
                            <option value="movies">Movies</option>
                            <option value="other">Other</option>
                        </select>
                        <br>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill="#000000" d="M8.5 17.5h7v-1h-7zm0-4h7v-1h-7zM6.615 21q-.69 0-1.152-.462Q5 20.075 5 19.385V4.615q0-.69.463-1.152Q5.925 3 6.615 3H14.5L19 7.5v11.885q0 .69-.462 1.152q-.463.463-1.153.463zM14 8h4l-4-4z" />
                                </svg>
                            </div>
                            <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe your request (e.g. I want chicken nuggets)">
                            <input type="hidden" value="{{Auth::user()->id}}" id="user_id" name="user_id">

                        </div>
                        <br>
                        <div class="flex justify-center">
                            <button type="submit" class="px-3 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 text-white me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill="none" stroke="#FFF" stroke-width="2" d="M22 3L2 11l18.5 8zM10 20.5l3-4.5m2.5-6.5L9 14l.859 6.012c.078.546.216.537.306-.003L11 15z" />
                                </svg>
                                Send Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<svg width="64" height="64" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path fill="#000000" d="M8.5 17.5h7v-1h-7zm0-4h7v-1h-7zM6.615 21q-.69 0-1.152-.462Q5 20.075 5 19.385V4.615q0-.69.463-1.152Q5.925 3 6.615 3H14.5L19 7.5v11.885q0 .69-.462 1.152q-.463.463-1.153.463zM14 8h4l-4-4z" />
</svg>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>
    @if (session('Success'))
    {{ toastify()->success(session('Success'));}}
    @elseif (session('Error'))
    {{ toastify()->error(session('Error'));}}
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Your Orders
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">These are the last orders you have requested.</p>
                            </caption>
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Room Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Guest
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Options
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Options</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->room->number }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $order->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $order->type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $order->description }}
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <a href="editorder/{{$order->id}}" class="py-1.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 hover: w-100">
                                            Edit
                                        </a>

                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <form method="post" action="{{ route('order.destroy')}}">
                                            @csrf
                                            @method('delete')
                                            <div class="flex justify-start">
                                                <input name="id" type="hidden" value="{{$order->id}}">
                                                <x-danger-button class="ms-3">
                                                    {{ __('Delete Order') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
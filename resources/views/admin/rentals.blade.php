@extends('layouts.myapp')
@section('content')
    {{-- <div class="flex h-screen bg-gray-50 dark:bg-gray-900 w-10/12" > --}}
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl ">
        <div class="flex flex-col flex-1 w-full">
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid mb-32 ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Rentals Details
                    </h2>
                    

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap overflow-scroll table-auto">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3 w-24">Rental ID</th>
                                        <th class="px-4 py-3">Customer Name</th>
                                        <th class="px-4 py-3 w-48">Car Details</th>
                                        <th class="px-4 py-3 w-26">Start Date</th>
                                        <th class="px-4 py-3 w-24">End Date</th>
                                        <th class="px-4 py-3">Duration</th>                                        
                                        <th class="px-4 py-3">Total Cost</th>
                                        <th class="px-4 py-3">Payment Status</th>
                                        <th class="px-4 py-3">Rental Status</th>
                                        <th class="px-4 py-3 ">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">


                                    @forelse ($rentals as $reservation)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3  text-sm">
                                                    #{{ $reservation->id }}
                                             </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">                                                    
                                                    <p class="font-semibold">{{ $reservation->user->name }}</p>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $reservation->car->name }} <br>
                                                {{ $reservation->car->brand }} 

                                            </td>

                                            <td class="px-4 py-3  text-sm">
                                                {{ Carbon\Carbon::parse($reservation->start_date)->format('y-m-d') }} </td>
                                            <td class="px-4 py-3  text-sm">
                                                {{ Carbon\Carbon::parse($reservation->end_date)->format('y-m-d') }} </td>

                                            <td class=" text-xs">
                                                <p class="px-4 py-3 text-sm">
                                                    {{ Carbon\Carbon::parse($reservation->end_date)->diffInDays(Carbon\Carbon::parse($reservation->start_date)) }}
                                                    days </p>
                                            </td>                                            

                                            <td class="px-4 py-3 text-sm">
                                                {{ $reservation->car->daily_rent_price * $reservation->days }} $
                                            </td>


                                            <td class="px-4 py-3 text-sm ">
                                                @if ($reservation->payment_status == 'Pending')
                                                    <span
                                                        class="p-2 text-white rounded-md bg-yellow-300 ">{{ $reservation->payment_status }}</span>
                                                @elseif ($reservation->payment_status == 'Canceled')
                                                    <span
                                                        class="p-2 text-white rounded-md bg-red-500 ">{{ $reservation->payment_status }}</span>
                                                @elseif ($reservation->payment_status == 'Paid')
                                                    <span
                                                        class="p-2 text-white rounded-md bg-green-500 px-5">{{ $reservation->payment_status }}</span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3 text-sm ">
                                                @if ($reservation->status == 'Pending')
                                                    <span
                                                        class="p-2 text-white rounded-md bg-yellow-300 ">{{ $reservation->status }}</span>
                                                @elseif ($reservation->status == 'Completed')
                                                    <span
                                                        class="p-2 text-white rounded-md bg-black ">{{ $reservation->status }}</span>
                                                @elseif ($reservation->status == 'Ongoing')
                                                    <span
                                                        class="p-2 text-white rounded-md bg-green-500 px-4">{{ $reservation->status }}</span>
                                                @elseif ($reservation->status == 'Canceled')
                                                    <span
                                                        class="p-2 text-white rounded-md bg-red-500 ">{{ $reservation->status }}</span>
                                                @endif
                                            </td>


                                            <td class="px-4 py-3 w-36 text-sm flex flex-col justify-center">

                                                <a class="p-2 mb-1 text-white bg-pr-500 hover:bg-pr-400 font-medium rounded text-center"
                                                    href="{{ route('editStatus', ['rental' => $reservation->id]) }}">
                                                    <button>Edit Status </button>
                                                </a>

                                                <a class="p-2 mb-1 text-white bg-indigo-500 hover:bg-indigo-600 font-medium rounded text-center"
                                                    href="{{ route('editPayment', ['rental' => $reservation->id]) }}">
                                                    <button>Edit payment </button>
                                                </a>

                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-center my-12 w-full">
                           
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        function scrollToReservatios() {
            window.scrollTo({
                top: 300,
                behavior: 'smooth'
            });
        }
    </script>
@endsection

@extends('layouts.myapp')
@section('content')
    <div class="mx-auto max-w-screen-xl">

        {{-- Admins --}}
        {{-- <div id="reservations" class="mt-12">
            <div class="flex align-middle justify-center">
                <hr class=" mt-8 h-0.5 w-1/2 bg-pr-500">
                <p class="my-2 mx-8  p-2 font-car font-bold text-gray-600 text-lg ">Admins</p>
                <hr class=" mt-8 h-0.5 w-1/2 bg-pr-500">
                <a href="{{ route('addAdmin') }}" class="flex  w-40  border-2 border-pr-500 hover:text-white hover:bg-pr-400 font-car font-medium p-1 " >
                    <button>Add New Admin</button>
                </a>
                <hr>
            </div>

        </div>

        <div class="grid md:grid-cols-3  gap-6 mt-6">
            @foreach ($admins as $admin)
                <div class="bg-white shadow-xl rounded-md flex  justify-start items-center mx-2 ">
                    <img src="{{asset('images/user.png')}}" alt=""> 
                    <div class="my-3 ">
                        <h2 class="font-car text-gray-900 font-semibold text-xl">{{ $admin->name }}</h2>
                        <h3 class=" text-gray-700 font-medium ">{{ $admin->email }}</h3>
                    </div>
                </div>
            @endforeach

        </div> --}}


        {{-- Customers --}}
        <div id="reservations" class="mt-12">
            <div class="flex align-middle justify-center">
                <hr class=" mt-8 h-0.5 w-1/2 bg-pr-500">
                <p class="my-2 mx-8  p-2 font-car font-bold text-gray-600 text-lg ">Customers</p>
                <hr class=" mt-8 h-0.5 w-1/2 bg-pr-500">
                <a href="{{ route('addCustomer') }}" class="flex  w-40  border-2 border-pr-500 hover:text-white hover:bg-pr-400 font-car font-medium p-1 " >
                    <button>Add New Customer</button>
                </a>
                <hr>
            </div>

        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs mb-12">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap overflow-scroll table-auto text-center">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">                            
                            <th class="text-center px-4 py-3 w-48">Customer Name</th>
                            <th class="text-center px-4 py-3 w-24">Phone</th>                            
                            <th class="text-center px-4 py-3 w-24">Email</th>
                            <th class="text-center px-4 py-3 w-30">Address</th>                            
                            <th class="text-center w-56 px-4 py-3">Rentals</th>
                            <th class="text-center px-4 py-3 w-26">Actions</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($customers as $customer)
                            <tr class="text-gray-700 dark:text-gray-400">                               
                                
                                <td class="px-4 py-3 text-sm">
                                    <p>
                                        {{ $customer->name }}
                                    </p>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p>
                                        {{ $customer->phone }}
                                    </p>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p>
                                        {{ $customer->email }}
                                    </p>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p>
                                        {{ $customer->address }}
                                    </p>
                                </td>                                
                                <td class="px-4 py-3 text-sm text-center">
                                    @if ($customer->rentals->count() > 0)
                                        <p>
                                            <span class=" font-bold text-">{{ $customer->rentals->count() }} </span>
                                            Rentals
                                        </p>
                                    @else
                                        No Active Rentals!!!
                                    @endif
                                </td>

                                <td class="flex my-4 py-3  px-6  space-x-1 ">
                                    <a href="{{ route('userDetails', ['user' => $customer->id]) }}" class="bg-slate-700  text-white p-2 rounded-md font-medium dark:text-blue-500 hover:bg-slate-900">
                                        View
                                    </a>

                                    <a href="{{ route('editCustomer', ['user' => $customer->id]) }}"
                                        class="bg-amber-600  text-white p-2 rounded-md font-medium dark:text-blue-500 hover:bg-amber-900">Edit</a>
                                    <form action="{{ route('deleteUser', ['user' => $customer->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-700 font-medium text-white p-2 rounded-md dark:text-red-500 hover:bg-red-900">Remove</button>
                                    </form>

                                </td>



                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                </table>
            </div>
            <div class="flex justify-center my-12 w-full">
        {{ $customers->links('pagination::tailwind') }}
    </div>
        </div>


    </div>
@endsection

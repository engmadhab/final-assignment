@extends('layouts.myapp')
@section('content')
    <div class="max-w-screen-xl p-3 mx-auto mt-10 bg-gray-200 rounded-md shadow-xl">
        <form action="">
           <div class="flex justify-center md:flex-row flex-col md:gap-28 gap-4">
                <div class="flex justify-evenly md:flex-row flex-col md:gap-16 gap-2">
                    <input type="text" placeholder="Brand" name="brand"
                        class="block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    <input type="text" placeholder="Car Type" name="car_type"
                        class="block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    <input type="number" placeholder="$ Daily minimum rent price" name="min_price"
                        class="block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                    <input type="number" placeholder="$ Daily maximum rent price" name="max_price"
                        class="block  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pr-400 sm:text-sm sm:leading-6">
                </div>
                <div>
                    <button class="w-20 p-2 font-medium text-white rounded-md bg-pr-400 hover:bg-pr-500" type="submit">
                        Search</button>
                    <a href={{ route('cars') }}>

                        <button class="w-20 p-2 font-medium text-white rounded-md bg-pr-400 hover:bg-pr-500" type="button">
                            All
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-6 mb-2 grid md:grid-cols-3  justify-center items-center mx-auto max-w-screen-xl">
        @forelse ($cars as $car)
            <div
                class="relative flex flex-col w-full max-w-xs m-10 overflow-hidden bg-white border border-gray-100 shadow-md">
                <a class="relative flex mx-2 mt-2 overflow-hidden h-60" href="{{ route('car.reservation', ['car' => $car->id]) }}">
                    <img loading="lazy" class="object-cover" src="{{ $car->image }}" alt="product image" />
                    
                </a>
                <div class="px-5 pb-5 mt-4">
                    <div>
                        <h5 class="text-xl font-bold tracking-tight text-slate-900">{{ $car->brand }} {{ $car->model }}
                            {{ $car->car_type }}</h5>
                    </div>
                    <div class="flex items-center justify-between mt-2 mb-5">
                        <p>
                            <span class="text-3xl font-bold text-slate-900">${{ $car->daily_rent_price }}</span>                            
                        </p>

                        <div class="flex items-center">
                            @for ($i = 0; $i < $car->stars; $i++)
                                <svg aria-hidden="true" class="w-5 h-5 text-pr-300" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            @endfor
                            <span
                                class="mr-2 ml-3 rounded bg-pr-300 px-2.5 py-0.5 text-xs font-semibold">{{ $car->stars }}.0</span>
                        </div>
                    </div>
                    <a href="{{ route('car.reservation', ['car' => $car->id]) }}"
                        class="flex items-center justify-center rounded-md bg-slate-900 hover:bg-pr-400 px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4 focus:ring-blue-300">
                        
                        Book Now </a>
                </div>
            </div>
        @empty
            <div class="mx-auto max-w-screen-xl h-[300px] items-center ">
                <p class="mx-auto"></p>
            </div>
            <div class="mx-auto max-w-screen-xl h-[300px] items-center ">
                <p class="mx-auto mt-[100px] text-4xl font-medium font-car  ">no car fond ! </p>
            </div>
            <div class="mx-auto max-w-screen-xl h-[300px] items-center ">
                <p class="mx-auto"></p>
            </div>
        @endforelse
    </div>


    <div class="flex justify-center w-full mb-12">
        {{ $cars->links('pagination::tailwind') }}
    </div>
@endsection

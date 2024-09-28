@extends('layouts.myapp')
@section('content')
    <div class="mx-auto max-w-screen-xl ">
        
        <div class="flex md:flex-row flex-col justify-around  items-center px-6 pt-6">
            
            <div class="md:m-12 p-6 md:w-1/2">
                <img loading="lazy" src="/images/shop1.png" alt="shop image">
            </div>
            <div class=" relative md:m-12 m-6 md:w-1/2 md:p-6">

                
                <h3 class="font-car font-bold text-3xl">Welcome to  our Car Rental Service , where your journey is our priority!</h3>
                <p class="text-justify pt-4">At Car Rental Service, we are passionate about making transportation easy, accessible, and reliable. With years of experience in the car rental industry, we have built a reputation for delivering high-quality vehicles, excellent customer service, and affordable rates.</p>
                <p class="text-justify pt-4">Our shop is strategically positioned near major transportation hubs, including airports, train stations,
                    and bus terminals, making it incredibly convenient for you to pick up and drop off your rental vehicle.
                    Upon arrival, our friendly staff will warmly greet you, ensuring a smooth and efficient rental process
                    from start to finish.</p>
            </div>

        </div>
        <div class="flex md:flex-row flex-col justify-around  items-center px-6 pt-6">

            <div class="md:m-12 p-6 md:w-1/2 md:order-last ">
                <img loading="lazy" src="/images/shop_2.jpg" alt="shop image">
            </div>

            <div class="relative md:m-12 m-6 md:w-1/2 md:p-6">
                <h3 class="font-car font-bold text-3xl">Our Mission</h3>
                <p class="text-justify">Our mission is to provide you with a seamless car rental experience that gives you the freedom to explore without limitations. Whether you're on a business trip, family vacation, or just need a reliable ride for daily errands, we are committed to offering the perfect vehicle to meet your needs.</p>
                <h3 class="font-car font-bold text-3xl pt-2">Our Story</h3>
                <p class="text-justify">Founded in 2024, Car Rental Service started with a small fleet of cars and a big vision: to make car rentals simple, affordable, and accessible to everyone. Over the years, we have expanded our services, added new vehicle categories, and opened multiple locations to serve a growing number of customers.</p>
            </div>


        </div>
        <div class=" p-3 mb-8">
            
        </div>

    </div>
@endsection

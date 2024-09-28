@extends('layouts.myapp')
@section('content')
    <div class="mt-16">
        <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-center text-gray-900 font-car">Contact
            Us</h2>
        <p class="mb-8 font-light text-center text-gray-500 font-car lg:mb-16 dark:text-gray-400 sm:text-xl">
                If you have any questions, please feel free to contact us.
            </p>
    </div>
    <div class="flex md:flex-row flex-col justify-between max-w-screen-xl md:px-16 px-8 mx-auto gap-12 ">
        <div class="md:w-1/2 order-last md:order-first mb-12 ">
            <form action="#" class="space-y-8" id="contact-form">
                <div class="flex justify-between">
                    <div class="w-full mr-5">
                        <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First
                            Name</label>
                        <input type="text" id="firstName"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="First Name" required>
                    </div>

                    <div class="w-full ">
                        <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last
                            Name</label>
                        <input type="text" id="lastName"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="Last Name" required>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="w-full mr-5">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="email" id="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="yourname@domain.com" required>
                    </div>

                    <div class="w-full ">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone
                            Number</label>
                        <input type="number" id="phone"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                            placeholder="+88 01 2345 6789" required>
                    </div>
                </div>
                <div>
                    <label for="subject"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                    <select name="subject" id="subject"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        <option value="0" disabled selected>Select subject</option>
                        <option value="reservation">Rent</option>
                        <option value="payment">Payment</option>
                        <option value="car problem">Car Problem</option>
                        <option value="cancelation">Cancelation</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                        message</label>
                    <textarea id="message" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Leave a comment..."></textarea>
                </div>
                <button type="submit"
                    class="p-3 mb-16 font-bold border rounded-md border-pr-400 text-pr-400 hover:text-white hover:bg-pr-400">Send
                    message</button>
            </form>
        </div>
        <div class="grid mx-auto text-center gap-4 ">
            <div>
                <h2 class="text-lg font-bold text-gray-800 font-car">Contact information:</h2>
                <p class="text-sm font-light text-gray-700 font-car">Rental Car Services</p>
                <p class="text-sm font-light text-gray-700 font-car">Address: Uttara Dhaka</p>
                <p class="text-sm font-light text-gray-700 font-car">Phone: +8801747 654201</p>

            </div>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            function showPopup() {
                alert('Thank you! We have received your message.');
            }

            $('#contact-form').submit(function(e) {
                e.preventDefault();

                showPopup();

            });
        });
    </script>
@endsection

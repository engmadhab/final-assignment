# Car Rental Laravel Project

This is a car rental project developed for the ostad assignment Project. It is built using the Laravel framework and provides a web application for managing car rental operations.

## Live website:


## Features

-   User Registration and Authentication
-   Car Listing and Management
-   Rental Booking and Management
-   Admin Panel for managing cars, bookings, and users


## Interfaces:


## Installation

1. Clone the repository: https://github.com/engmadhab/final-assignment

2. Navigate to the project directory: `cd final-assignment`

3. Install the dependencies using Composer: `composer install`

4. Create a copy of the `.env.example` file and rename it to `.env`. Configure the database settings in the `.env` file.

<!-- 5. Generate an application key: `php artisan key:generate` -->

5. Run the database migrations: `php artisan migrate`

6. Seed the database users table with a Demo admin: `php artisan db:seed --class=adminDemo` (login as admin at '/admin')

7. `npm install` && `npm run dev`

8. Create the symbolic link: `php artisan storage:link`

9. Start the development server: `php artisan serve`

10. Visit `http://localhost:8000` in your browser to access the application.

## Usage

-   Register a user account or login with existing credentials.
-   Explore the available cars and their details.
-   Make a booking by selecting a car and providing the required information.
-   Admin users can access the admin panel by visiting `http://localhost:8000/admin` and using their credentials.
-   Admins can manage cars, bookings, and users through the admin panel.

## Contributing

We welcome contributions to enhance the project! If you find any issues or have suggestions, please open an issue or submit a pull request.

## Authors
-   Madhab Chandra Shill (madhabkumarjoy@gmail.com)


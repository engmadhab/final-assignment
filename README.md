# Car Rental Web Application Using Laravel

This Car Rental Web Application allows users to browse available cars, select a car, and book it for a specified rental period. The system ensures that cars are available for the chosen dates before confirming the booking. It includes role-based access control, where administrators can manage cars and rentals, while customers can view their bookings.

## Project Presentation Video:



## Features

-   User Registration and Authentication
-   Car Listing and Management
-   Rental Booking and Management
-   Admin Panel for managing cars, bookings, and users

## Interfaces

- Admin Dashboard - for managing cars, rentals, and customers.
- Frontend - for users to browse available cars, make bookings, and view rental history.

## Installation

1. Clone the repository: https://github.com/engmadhab/final-assignment

2. Navigate to the project directory: `cd final-assignment`

3. Install the dependencies using Composer: `composer install`

4. Create a copy of the `.env.example` file and rename it to `.env`. Configure the database settings in the `.env` file.

5. Generate an application key: `php artisan key:generate` 

6. Run the database migrations: `php artisan migrate`

7. Seed the database users table with a Demo admin: `php artisan db:seed --class=adminDemo` (login as admin at '/admin')

8. `npm install` && `npm run dev`

9. Create the symbolic link: `php artisan storage:link`

10. Start the development server: `php artisan serve`

11. Visit `http://localhost:8000` in your browser to access the application.

## Usage

-   Register a user account or login with existing credentials.
-   Explore the available cars and their details.
-   Make a booking by selecting a car and providing the required information.
-   Admin users can access the admin panel by visiting `http://localhost:8000/admin` and using their credentials.
-   Admins can manage cars, bookings, and users through the admin panel.

## Authors
-   Madhab Chandra Shill 


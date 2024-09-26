@component('mail::message')
# New Car Rental Notification

A new car rental has been completed. Below are the details:

**Rental Information:** {{ $rentalDetails['customerName'] }}


Please ensure all necessary records are updated accordingly.

Best,  

@endcomponent

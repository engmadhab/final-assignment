@component('mail::message')
## New Car Rental Notification

A new car rental has been completed. Below are the details:

 
# This {{ $rentalDetails['carName'] }} Rented By {{ $rentalDetails['customerName'] }}  <br>

**Car Model:** {{ $rentalDetails['carModel'] }} <br>
**Car Type:** {{ $rentalDetails['carBrand'] }} <br>

**Total amount:** ${{ $rentalDetails['totalAmount'] }}


Please ensure all necessary records are updated accordingly.

Best,  

@endcomponent

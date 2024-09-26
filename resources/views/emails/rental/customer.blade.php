@component('mail::message')
# Your Car Rental Confirmation

Thank you for choosing **** for your car rental needs! We are pleased to confirm your reservation.

**Rental Details:** {{ $rentalDetails['carModel'] }} <br>
Total amount: {{ $rentalDetails['totalAmount'] }}

If you have any questions or need to make changes to your reservation, please don’t hesitate to reach out to us.

Best regards,  

@endcomponent

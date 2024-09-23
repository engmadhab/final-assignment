<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reservation Invoice</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        @media print {
            @page {
                size: A3;
            }
        }

        ul {
            padding: 0;
            margin: 0 0 1rem 0;
            list-style: none;
        }

        body {
            font-family: "Inter", sans-serif;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        table th,
        table td {
            border: 1px solid silver;
        }

        table th,
        table td {
            text-align: right;
            padding: 8px;
        }

        h1,
        h4,
        p {
            margin: 0;
        }

        .container {
            padding: 20px 0;
            width: 1000px;
            max-width: 90%;
            margin: 0 auto;
        }

        .inv-title {
            padding: 10px;
            border: 1px solid silver;
            text-align: center;
            margin-bottom: 30px;
        }

        .inv-logo {
            width: 150px;
            display: block;
            margin: 0 auto;
            margin-bottom: 40px;
        }

        /* header */
        .inv-header {
            display: flex;
            margin-bottom: 20px;
        }

        .inv-header> :nth-child(1) {
            flex: 2;
        }

        .inv-header> :nth-child(2) {
            flex: 1;
        }

        .inv-header h2 {
            font-size: 20px;
            margin: 0 0 0.3rem 0;
        }

        .inv-header ul li {
            font-size: 15px;
            padding: 3px 0;
        }

        /* body */
        .inv-body table th,
        .inv-body table td {
            text-align: left;
        }

        .inv-body {
            margin-bottom: 30px;
        }

        /* footer */
        .inv-footer {
            display: flex;
            flex-direction: row;
        }

        .inv-footer> :nth-child(1) {
            flex: 2;
        }

        .inv-footer> :nth-child(2) {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="inv-title">
            <h1>Invoice # {{ rand() }}__{{ $reservation->id }}</h1>
        </div>
        <p style="margin-bottom: 30px; font-weight: bold"></p>
        <div class="inv-header">
            <div>
                <h2 style="color: #ff9b00">Car Rental</h2>
                <ul>
                    <li>Madhab Chandra Shill | Dhaka Bangladesh</li>
                    <li>+8801747654201 | madhabkumarjoy@gmail.com</li>
                </ul>
                <h2>Customer</h2>
                <ul>
                    <li>{{ $reservation->user->name }} | {{ $reservation->user->address }}</li>
                    <li>{{ $reservation->user->phone }} | {{ $reservation->user->email }}</li>                    
                </ul>
            </div>

        </div>
        <div class="inv-body">
            <table>
                <thead>
                    <th>Car</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Duration</th>
                    <th>Price per day</th>
                    <th>Rental price</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h4>{{ $reservation->car->name }}</h4>
                            <p>{{ $reservation->car->brand }}</p>
                            <p>{{ $reservation->car->model }}</p>
                        </td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>{{ $reservation->days }}</td>
                        <td>{{ $reservation->price_per_day }} $ </td>
                        <td>{{ $reservation->total_price }} $ </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="inv-footer">
            <div>
                <!-- required -->
            </div>
            <div>
                <table>
                    <tr>
                        <th>Sub total</th>
                        <td>{{ $reservation->total_price }} $ </td>
                    </tr>                    
                    <tr>
                        <th style="color: #ff9b00">Total to pay</th>                       

                            <td>{{ $reservation->total_price}} $ </td>
                    </tr>
                </table>
            </div>

        </div>
        <h3 style="text-align: center; margin-top: 30px">Thank you for choosing us</h3>
    </div>
</body>

</html>

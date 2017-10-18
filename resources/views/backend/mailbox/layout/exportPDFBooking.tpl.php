<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <title>Title</title>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <style>
            *{
                box-sizing: border-box;
            }
            body {
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 14px;
                line-height: 1.42857143;
                color: #333;
                background-color: #fff;
            }
            strong {
                font-weight: 700;
            }
            hr {
                margin-top: 20px;
                margin-bottom: 20px;
                border: 0;
                border-top: 1px solid #eee;
            }
            h1, h2, h3 {
                margin-top: 20px;
                margin-bottom: 10px;
            }
            h4, h5, h6 {
                margin-top: 10px;
                margin-bottom: 10px;
            }
            h1, h2, h3, h4, h5, h6 {
                font-family: inherit;
                font-weight: 500;
                line-height: 1.1;
                color: inherit;
            }
            h3 {
                font-size: 24px;
            }
            h4 {
                font-size: 18px;
            }
            a {
                color: #337ab7;
                text-decoration: none;
            }
            a {
                background-color: transparent;
            }
            table {
                background-color: transparent;
            }
            table {
                border-spacing: 0;
                border-collapse: collapse;
            }
            th {
                text-align: left;
            }
            td, th {
                padding: 0;
            }
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }
            .table-bordered {
                border: 1px solid #ddd;
            }
            .table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
                border-top: 0;
            }
            .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
                border-bottom-width: 2px;
            }
            .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
                border: 1px solid #ddd;
            }
            .table>thead>tr>th {
                vertical-align: bottom;
                border-bottom: 2px solid #ddd;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                padding: 8px;
                line-height: 1.42857143;
                vertical-align: top;
                border-top: 1px solid #ddd;
            }
            .atl-table thead tr th {
                text-align: center;
            }
            .atl-table thead tr th {
                text-align: center;
            }
            .atl-table tbody tr td {
                vertical-align: middle;
            }
            .text-center {
                text-align: center;
            }
            .text-uppercase {
                text-transform: uppercase;
            }
            .text-info {
                color: #31708f;
            }
        </style>
    </head>
    <body style="padding-left: 20px;padding-right: 20px;">
        <div>
            <img style="width: 33%; padding-top:20px; margin-bottom: 27px; float: left ; padding-right:30px" src="<?php echo SITE_DIR.'public/backend/assets/img/logo_main.png'; ?>">
            <div style="float: left;padding-top:-20px;"> <strong style="font-size: 17px;">ASIA TRAVEL & LEISURE </strong><br>
                <strong>Add</strong>: Suite 707, Thang Long Bld, Hoan Kiem, Hanoi, Vietnam. <br>
                <strong>Tel</strong>: +844 3942 9442, <strong>Fax</strong>: +844 3942 9442 <br>
                <strong>Email</strong>: sales@travelvietnam.com <br>
                <strong>Website</strong>: www.travelvietnam.com
            </div>
        </div>
        <hr style="clear: both">
        <?php
            $tour = json_decode($data['tour'], true);
            $booking = json_decode($data['bookinginformation'], true);
            $customer = json_decode($data['customerinformation'], true);
            $metaBooking = json_decode($data['metaBooking'], true);
            $deposit = json_decode($data['depositinformation'], true);
            $accomodation = json_decode($data['accomodationservice'], true);
            $ticket = json_decode($data['ticketservice'], true);
            $car = json_decode($data['carservice'], true);
            $other = json_decode($data['otherservice'], true);
            $metaBooking = json_decode($data['metaBooking'], true);
        ?>
        <div class="text-center">
            <h3 class="text-uppercase"><?php echo isset($tour['tour_title']) ? $tour['tour_title'] : ''; ?></h3>
        </div>
        <div>
            <table style="margin-left: 20px;margin-right: 20px;">
                <tr>
                    <th style="width: 22%">Booking code:</th>
                    <td><strong><?php echo $booking['booking_code']; ?></strong></td>
                </tr>
                <tr>
                    <th>Full name</th>
                    <td><?php echo $customer['name']; ?></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><?php echo $customer['address']; ?></td>
                </tr>
                <tr>
                    <th>Start date:</th>
                    <td><?php echo $booking['booking_start_date']; ?></td>
                </tr>
                <tr>
                    <th>End date:</th>
                    <td><?php echo $booking['booking_end_date']; ?></td>
                </tr>
                <tr>
                    <th>Passport number:</th>
                    <td><?php echo  $customer['passport']; ?></td>
                </tr>
                <tr>
                    <th>Passport expired:</th>
                    <td><?php echo  $customer['expired']; ?></td>
                </tr>
                <tr>
                    <th>Pickup address:</th>
                    <td><?php echo  $metaBooking['pickup']; ?></td>
                </tr>
                <tr>
                    <th>Office:</th>
                    <td><?php echo  $booking['booking_office']; ?></td>
                </tr>
                <tr>
                    <th>Special note:</th>
                    <td><?php echo $metaBooking['specialnote']; ?></td>
                </tr>
            </table>
            <br>
            <hr>
        </div>
        <?php if (!empty($deposit)): ?>
            <h4 class="text-uppercase"><strong>Deposit</strong>:</h4>
            <table class="table table-bordered atl-table">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Date</th> 
                        <th>Note</th>
                    </tr>        
                </thead>
                <tbody>
                    <?php foreach (json_decode($data['depositinformation'],true) as $deposit) {
                    ?>
                        <tr>
                            <td>$ <?php echo isset($deposit['amount']) ? $deposit['amount'] : ''; ?></td>
                            <td><?php echo isset($deposit['date']) ? $deposit['date'] : ''; ?></td>
                            <td><?php echo isset($deposit['note']) ? $deposit['note'] : ''; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <hr>
        <?php endif ?>

        <?php if (!empty($accomodation)): ?>
            <h4 class="text-uppercase"><strong>accommodation</strong>:</h4>
            <table class="table table-bordered atl-table">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Name</th>
                        <th>Roomtype</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Nunber Night</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php foreach ($accomodation as $acc) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo isset($acc['location']) ? $acc['location'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($acc['accName']) ? $acc['accName'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($acc['roomName']) ? $acc['roomName'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($acc['start']) ? $acc['start'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($acc['end']) ? $acc['end'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($acc['quantity']) ? $acc['quantity'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($acc['nightNumber']) ? $acc['nightNumber'] : ''; ?></td>
                            <td class="text-center">$ <?php echo isset($acc['price']) ? $acc['price'] : ''; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <hr>
        <?php endif ?>
        <?php if (!empty($ticket)): ?>
            <h4 class="text-uppercase"><strong>ticket</strong>:</h4>
            <table class="table table-bordered atl-table">
                <thead>
                    <tr>
                        <th class="uk-width-3-10 uk-text-center">From-To</th>
                        <th class="uk-width-1-10 uk-text-center">Code</th>
                        <th class="uk-width-1-10 uk-text-center">Date</th>
                        <th class="uk-width-1-10 uk-text-center">Class</th>
                        <th class="uk-width-1-10 uk-text-center">Start time</th>
                        <th class="uk-width-1-10 uk-text-center">End time</th>
                        <th class="uk-width-1-10 uk-text-center">Reservation Code</th>
                        <th class="uk-width-1-10 uk-text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ticket as $tick) {
                    ?>
                        <tr>
                             <td class="uk-text-center uk-text-middle"><?php echo isset($tick['fromTo']) ? $tick['fromTo'] : ''; ?></td>
                                <td class="uk-text-center uk-text-middle"><?php echo isset($tick['code']) ? $tick['code'] : ''; ?></td>
                                <td class="uk-text-center uk-text-middle"><?php echo isset($tick['date']) ? $tick['date'] : ''; ?></td>
                                <td class="uk-text-center uk-text-middle"><?php echo isset($tick['class']) ? $tick['class'] : ''; ?></td>
                                <td class="uk-text-center uk-text-middle"><?php echo isset($tick['startTime']) ? $tick['startTime'] : ''; ?></td>
                                <td class="uk-text-center uk-text-middle"><?php echo isset($tick['endTime']) ? $tick['endTime'] : ''; ?></td>
                                <td class="uk-text-center uk-text-middle"><?php echo isset($tick['reservationCode']) ? $tick['reservationCode'] : ''; ?></td>
                                <td class="uk-text-center uk-text-middle"><?php echo isset($tick['price']) ? $tick['price'] : ''; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <hr>
        <?php endif ?>
        <?php if (!empty($car)): ?>
            <h4 class="text-uppercase"><strong>car</strong>:</h4>
            <table class="table table-bordered atl-table">
                <thead>
                    <tr>
                        <th>Name car</th>
                        <th>Driver</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (json_decode($data['carservice'],true) as $car) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo isset($car['carName']) ? $car['carName'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($car['driverName']) ? $car['driverName'] : ''; ?></td>
                            <td class="text-center">$ <?php echo isset($car['price']) ? $car['price'] : ''; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <hr>
        <?php endif ?>

        <?php if (!empty($other)): ?>
            <h4 class="text-uppercase"><strong>other</strong>:</h4>
            <table class="table table-bordered atl-table">
                <thead>
                    <tr>
                        <th class="uk-width-4-10 uk-text-center">Name service</th>
                        <th class="uk-width-3-10 uk-text-center">Quantity</th>
                        <th class="uk-width-3-10 uk-text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($other as $othe) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo isset($othe['serviceName']) ? $othe['serviceName'] : ''; ?></td>
                            <td class="text-center"><?php echo isset($othe['quantity']) ? $othe['quantity'] : ''; ?></td>
                            <td class="text-center">$ <?php echo isset($othe['price']) ? $othe['price'] : ''; ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <hr>
        <?php endif ?>
        
        <br>
        <?php if (!empty($visa)): ?>
            <h4 class="text-uppercase"><strong>Visa information</strong>:</h4>
            <table class="table table-bordered atl-table">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>City</th>
                        <th>Customer</th>
                        <th>Passport number</th>
                        <th>Expired date</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (json_decode($data['visaservice'],true) as $visa) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $visa['visa_country'] ?></td>
                            <td class="text-center"><?php echo $visa['visa_city'] ?></td>
                            <td class="text-center"><?php echo $visa['visa_customer'] ?></td>
                            <td class="text-center"><?php echo $visa['visa_passport'] ?></td>
                            <td class="text-center"><?php echo $visa['visa_expired'] ?></td>
                            <td class="text-center"><?php echo $visa['visa_price'] ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
            <hr>
        <?php endif ?>
    </body>
</html>

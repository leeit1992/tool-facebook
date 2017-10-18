<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <title>Title</title>
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
            dl {
                margin-top: 0;
                margin-bottom: 20px;
            }
            dt {
                font-weight: 700;
            }
            dd {
                margin-left: 0;
            }
            dd, dt {
                line-height: 1.42857143;
            }
            ol, ul {
                margin-top: 0;
                margin-bottom: 10px;
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
        <div class="text-center">
            <h3 class="text-uppercase"><?php echo isset($tour['tour_title']) ? $tour['tour_title'] : ''; ?></h3>
            Customized Proposal for <strong><?php echo isset($customer['name']) ? $customer['name'] : ''; ?></strong> -
            <?php if ($metaBooking['numofday'] > 0): ?>
                <?php echo isset($metaBooking['numofday']) ? $metaBooking['numofday'] .'days/' : ''; ?><?php echo isset($metaBooking['numofday']) ? ($metaBooking['numofday'] - 1) . 'nights' : ''; ?>
            <?php endif ?><br>
            <span class="text-info">Hanoi - Halong - Hue - Hoi An - Saigon - Mekong Delta - Siem Reap - Bangkok - Koh Shamui</span>
        </div>
        <br>
        <div>
            <table style="width:100%;margin-left: 20px;margin-right: 20px;">
                <tr>
                    <th>Name of group:</th>
                    <td><strong><?php echo isset($customer['name']) ? $customer['name'] : ''; ?></strong></td>
                </tr>
                <tr>
                    <th>Contact person:</th>
                    <td><strong><?php echo isset($customer['name']) ? $customer['name'] : ''; ?></strong></td>
                </tr>
                <tr>
                    <th>Tour code:</th>
                    <td><strong><?php echo isset($booking['booking_code']) ? $booking['booking_code'] : ''; ?></strong></td>
                </tr>
                <tr>
                    <th>Length of trip:</th>
                    <?php if ($metaBooking['numofday'] > 0): ?>
                        <td><?php echo isset($metaBooking['numofday']) ? $metaBooking['numofday'] .'days/' : ''; ?><?php echo isset($metaBooking['numofday']) ? ($metaBooking['numofday'] - 1) . 'nights' : ''; ?></td> 
                    <?php else: ?>
                        <td></td>
                    <?php endif ?>
                    
                </tr>
                <tr>
                    <th>Number of guests:</th>
                    <td><strong><?php echo !empty($metaBooking['numofguests']) ? $metaBooking['numofguests'] . ' people' : ''; ?></strong></td>
                </tr>
                <tr>
                    <th>Destination:</th>
                    <td>Vietnam, Cambodia</td>
                </tr>
                <tr>
                    <th>Start date:</th>
                    <td><?php echo isset($booking['booking_start_date']) ? $booking['booking_start_date'] : ''; ?></td>
                </tr>
                <tr>
                    <th>End date:</th>
                    <td><?php echo isset($booking['booking_end_date']) ? $booking['booking_end_date'] : ''; ?></td>
                </tr>
                <tr>
                    <th>Services:</th>
                    <td>Accommodation/Transaportation/Entrance fee/Guider/Meals per itinerary</td>
                </tr>
                <tr>
                    <th>Arrival flight:</th>
                    <td><strong>AF5096</strong> /  9.30 am.</td>
                </tr>
                <tr>
                    <th>Separture flight:</th>
                    <td><strong>AF0126</strong> /  11.30 am.</td>
                </tr>
                <tr>
                    <th>Visa:</th>
                    <td><strong>Visa on Arrival</strong></td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td><?php echo isset($tour['tour_description']) ? $tour['tour_description'] : ''; ?></td>
                </tr>
                <tr>
                    <th>Date of proposal:</th>
                    <td><strong><?php echo date( 'j F Y', strtotime( $booking['booking_postdate'] )) ?></strong></td>
                </tr>
                <tr>
                    <th>Date of revised:</th>
                    <td><strong>19 May 2017</strong></td>
                </tr>
                <tr>
                    <th>Proposed by:</th>
                    <td><strong><?php echo isset($user['user_name']) ? $user['user_name'] : '' ?></strong></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><strong><?php echo isset($user['user_email']) ? $user['user_email'] : '' ?></strong></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <img style="float: right;margin-top: -140px;width: 210px;height: 140px" src="<?php echo SITE_DIR . $user['user_avatar']; ?>">
                    </td>
                </tr>
            </table>
            <br>
            <hr>
        </div>
        
        <?php if (!empty($accommodation)): ?>
            <div>
                <h4 class="text-uppercase"><strong>accommodation</strong>:</h4>
                <table class="table table-bordered atl-table">
                    <thead>
                        <tr>
                            <th>City</th>
                            <th>Hotel</th>
                            <th>Type</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>Status</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php foreach ($accommodation as $acc): ?>
                            <tr>
                                <td><strong><?php echo isset($acc['location']) ? $acc['location'] : ''; ?></strong></td>
                                <td>
                                    <strong><?php echo isset($acc['accName']) ? $acc['accName'] : ''; ?></strong><br>
                                    <a style="font-size: 10px;" href="<?php echo isset($acc['website']) ? $acc['website'] : ''; ?>"><?php echo isset($acc['website']) ? $acc['website'] : ''; ?></a></td>
                                <td class="text-center text-middle"><?php echo isset($acc['roomName']) ? $acc['roomName'] : ''; ?></td>
                                <td class="text-center"><?php echo isset($acc['start']) ? $acc['start'] : ''; ?></td>
                                <td class="text-center"><?php echo isset($acc['end']) ? $acc['end'] : ''; ?></td>
                                <td class="text-center"><span class="text-success" style="font-size: 11px">Confirmed</span></td>
                                <td class="text-center"><span style="font-size: 11px;"># 720128</span></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                </table>
                <hr>
            </div>
        <?php endif ?>
        <?php if (!empty($ticket)): ?>
            <div>
                <h4 class="text-uppercase"><strong>flight, train</strong>:</h4>
                <table class="table table-bordered atl-table">
                    <thead>
                        <tr>
                            <th>From - To</th>
                            <th>Flight, Train</th>
                            <th>Date</th>
                            <th>Class</th>
                            <th>Time</th>
                            <th style="font-size: 12px">Reservation code</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php foreach ($ticket as $tick): ?>
                                <tr>
                                    <td><span class="text-uppercase"><?php echo isset($tick['fromTo']) ? $tick['fromTo'] : ''; ?></span></td>
                                    <td class="text-center"><em><?php echo isset($tick['code']) ? $tick['code'] : ''; ?></em></td>
                                    <td class="text-center"><?php echo isset($tick['date']) ? $tick['date'] : ''; ?></td>
                                    <td class="text-center"><span style="font-size: 11px"><?php echo isset($tick['class']) ? $tick['class'] : ''; ?></span></td>
                                    <td class="text-center"><strong><?php echo isset($tick['startTime']) ? $tick['startTime'] : ''; ?> - <?php echo isset($tick['endTime']) ? $tick['endTime'] : ''; ?></strong></td>
                                    <td class="text-center"><span style="color:orange"><?php echo isset($tick['reservationCode']) ? $tick['reservationCode'] : ''; ?></span></td>
                                </tr>
                            <?php endforeach ?>
                            
                        </tbody>
                </table>
                <hr>
            </div>
         <?php endif ?>
        <div>
            <h4><strong class="text-uppercase">privare tour rate</strong>:Price quoted in US dollars per person double occupancy.</h4>
            <table class="table table-bordered atl-table">
                <thead>
                    <tr>
                        <th>Gruop size</th>
                        <th>2 persons</th>
                        <th>4 persons</th>
                        <th>6 persons</th>
                        <th>Single Supp'</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td>Land Tour/pp</td>
                            <td class="text-center"><strong>3,257.00</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Flight/pp</td>
                            <td class="text-center"><strong>860.00</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total/pp</td>
                            <td class="text-center"><strong>4,117.00</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
            </table>

            <h4><strong>Total: US$ 4,117.00 x 2 people = US$ 8,234.000</strong></h4>

            <dl>
                <dt><strong>Includes</strong>:</dt>
                <dd>
                    <ul>
                        <li>4 domestic flights: Hanoi – Hue, Danang – Ho Chi Minh City, BKK – USM</li>
                        <li>3 International flights: Hanoi – Hue, Danang – Ho Chi Minh City</li>
                    </ul>
                </dd>

                <dt><strong>Excludes</strong>:</dt>
                <dd>
                    <ul>
                        <li>International flights</li>
                        <li>Meals other than those mentioned in the itinerary</li>
                    </ul>
                </dd>
            </dl>
            <hr>
        </div>

        <div>
            <h4 class="text-uppercase"><strong>BRIEF ITINERARY</strong>:</h4>
            <table class="table table-bordered atl-table">
                <tbody>
                    <?php $day = 1; ?>
                    <?php foreach ($intinerary as $inti): ?>
                        
                        <tr>
                            <td>Day <?php echo $day; ?> – <?php echo date( 'l, j F Y', strtotime( $inti['inti_start_date'] ) ) ?></td>
                            <td><?php echo $inti['inti_title'] ?></td>
                        </tr>
                        <?php $day++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <dl>
                <dt><strong class="text-uppercase">ITINERARY</strong>:</dt>
                <dd>
                    <?php $day = 1; ?>
                    <?php foreach ($intinerary as $inti): ?>
                        <strong>Day <?php echo $day; ?> -<?php echo date( 'l, j F Y', strtotime( $inti['inti_start_date'] ) ) ?>: <?php echo $inti['inti_title'] ?>.</strong>
                        <br><?php echo $inti['inti_description'] ?>
                        <br><em>Meals: Dinner.</em>
                        <?php 
                            $service = json_decode($inti['inti_service'], true);
                            if (!empty($service['acc'])) {
                                echo '<br><em>Accommodation:';
                                foreach ($service['acc'] as $acc) {
                                    echo $acc['accId'] . ' ';
                                }
                                echo '.</em><br>';
                            }  
                        ?>
                        <?php $day++; ?>
                        <br>
                    <?php endforeach ?>

                    <br><strong><ins>Notes:</ins></strong>
                    <br><em>Please be aware that flight time, hotels and all others logistics, services and days of travel are subject to availability. Where flights are cancelled or delayed Travel Vietnam will endeavor to secure alternative arrangements of similar value as noted in our booking conditions. </em>
                </dd>
            </dl>
            <hr>
        </div>

        <strong>
            Contact person:<br>
            <?php echo isset($user['user_name']) ? $user['user_name'] : '' ?> - <?php echo isset($user['user_phone']) ? $user['user_phone'] : '' ?> - Travel Consultant <br>
            Hotline: Mr. Alan Hoang - 84.982 661 133 - Sales Director <br><br>
            TRAVEL VIETNAM - A division of Asia Travel & Leisure <br>
        </strong>
        <dl>
            <dt><strong>HANOI HEAD OFFICE</strong></dt>
            <dd>
                Add: Suite 707, Thang Long Bld., 115 Le Duan St., Hanoi, Vietnam. <br>
                Tel: (84) 439 429 444 – Fax: (84) 439 429 442 <br>
                Email: sales@travelvietnam.com <br>
                Website: www.travelvietnam.com
            </dd>
            
            <dt>HO CHI MINH CITY – VIETNAM</dt>
            <dd>
                Add: 6th Floor, Sovilaco Bld., 1 Pho Quang St., Tan Binh Dist, HCMC. <br>
                T: (84) 839 972 255 – F: (84) 839 972 256
            </dd>

            <dt>SIEM REAP – CAMBODIA</dt>
            <dd>
                Add: 67 Oum Khun Street, Khum Svay Dankum, Siem Reap. <br>
                T: (855) 63 967 008 – F: (855) 63 967 009
            </dd>

            <dt>LUANG PRABANG – LAOS</dt>
            <dd>
                Add: Samsanthai Road, Ban Thong Cha Leaun, Luang Prabang. <br>
                T: (856) 71 919 444 – F: (856) 71 919 333
            </dd>

            <dt>YANGON – MYANMAR</dt>
            <dd>
                Add: 7th Floor, 158 Building, 45 Street, Botataung Township, Yangon. <br>
                T: (95) 973 121 788 – F: (95) 1 9010470
            </dd>
        </dl>

        <br><em><strong>Did you know?</strong>Travel Vietnam can organize any additional accommodations.<br>
        Call us on + 84.4.39429444 to speak to one of our experts or email us to request a quote.</em>
    </body>
</html>
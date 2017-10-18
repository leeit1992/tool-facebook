<div id="page-admin-booking">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Bookings Management</h3>
            
            <?php View('backend/booking/layout/manageBookingFilter.tpl', [ 'mdBooking' => $mdBooking ]); ?>
            <br>
            <?php View('backend/booking/layout/manageBookingAction.tpl'); ?>
            <br>
                <table class="uk-table uk-table-hover">
                    <thead class="atl-table-background">
                    <tr>
                        <th class=uk-text-center">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-width-1-10 uk-text-nowrap">Code</th>
                        <th class="uk-width-1-10 uk-text-nowrap">Code random</th>
                        <th class="uk-width-1-10 uk-text-nowrap">Office</th>
                        <th class="uk-width-2-10 uk-text-nowrap">Start Date</th>
                        <th class="uk-width-2-10 uk-text-nowrap">End Date</th>
                        <th class="uk-width-1-10 uk-text-nowrap">Status</th>
                        <th class="uk-width-1-10 uk-text-nowrap">Create date</th>
                        <th class="uk-width-1-10 uk-text-nowrap uk-text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-booking-not-js">
                        <?php foreach ($listBooking as $items): ?>
                        <tr class="atl-booking-item-<?php echo $items['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $items['id'] ?>" />
                            </td>
                            <td>
                                <?php echo isset($items['booking_code']) ? $items['booking_code'] : ''; ?>
                            </td>
                            <td>
                                <?php
                                    $infoB = $mdBooking->getMetaData($items['id'], 'booking_info');
                                    $infoBooking = json_decode($infoB, true);
                                    echo !empty($infoBooking['random']) ? $infoBooking['random'] : '';
                                ?>
                            </td>
                            <td>
                                <?php
                                    $office = $mdOffice->getOfficeBy('id', $items['booking_office']);
                                    echo !empty($office) ? $office[0]['office_name'] : '';
                                ?>
                            </td>
                            <td>
                                <?php $datet = isset($items['booking_start_date']) ? date('d-m-Y',strtotime($items['booking_start_date'])) : '';
                                    echo ($datet == '01-01-1970') ? '' : $datet;
                                ?>
                            </td>
                            <td>
                                <?php $datet = isset($items['booking_end_date']) ? date('d-m-Y',strtotime($items['booking_end_date'])) : '';
                                    echo ($datet == '01-01-1970') ? '' : $datet;
                                ?>
                            </td>
                            <td>
                                <?php echo isset($items['booking_status']) ? $items['booking_status'] : ''; ?>
                            </td>
                            <td>
                                <?php echo isset($items['booking_postdate']) ? date('d-m-Y',strtotime($items['booking_postdate'])) : ''; ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-booking/' . $items['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <?php 
                                $idUserCurrent = Session()->get('atl_user_id');
                                if ( $idUserCurrent == $items['booking_author']): ?>
                                    <a href="#" class="atl-manage-booking-delete-js" data-id="<?php echo $items['id'] ?>">
                                        <i class="md-icon material-icons">delete</i>
                                    </a>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-booking-js"></tbody>
                </table>
            
            <br>
            <?php
                View('backend/booking/layout/manageBookingAction.tpl');
                echo $pagination;
            ?>
        </div>
        <?php 
            View(
                'backend/booking/layout/addBookingButton.tpl',
                [
                    'link' => url('/atl-admin/add-booking'),
                    'pdf' => false
                ]
            );
        ?>
    </div>  
</div>

<?php 
registerScrips( array(
    'admin-booking-manage' => assets('backend/js/booking/admin-booking-manage.min.js'),
) );
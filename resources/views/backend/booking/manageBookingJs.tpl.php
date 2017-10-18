<?php if (is_array($bookings) || is_object($bookings)): ?>
    <?php foreach ($bookings as $items): ?>
        <tr class="atl-booking-item-<?php echo $items['id'] ?>">
            <td class="uk-text-center">
                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $items['id'] ?>" />
            </td>
            <td>
                <?php echo isset($items['booking_code']) ? $items['booking_code'] : ''; ?>
            </td>
            <td>
                <?php
                    $infoBooking = json_decode($items['booking_info'], true);
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
                <a href="#" class="atl-manage-booking-delete-js" data-id="<?php echo $items['id'] ?>">
                    <i class="md-icon material-icons">delete</i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif ?>


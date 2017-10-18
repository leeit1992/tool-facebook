<div class="atl-service-list uk-margin-top">
    <div class="md-card atl-intinerary--item">
        <div class="md-card-toolbar atl-card-toolbar">
            <div class="md-card-toolbar-actions">
                <i class="uk-icon-minus md-icon  atl-intinerary--minimize uk-icon-square-o" data-status="close" data-uk-tooltip="{pos:\'Minimize\'}"></i>
            </div>
            <h3 class="md-card-toolbar-heading-text uk-text-upper">
                Services Booking
            </h3>
        </div>
        <div class="md-card-content atl-intinerary--item-content close">
            <div class="uk-width-medium-1-1">
                <table class="uk-table uk-table-condensed">
                    <thead>
                        <tr>
                            <th class="uk-width-2-10 uk-text-nowrap">Service Type</th>
                            <th class="uk-width-3-10 uk-text-nowrap">Service Name</th>
                            <th class="uk-width-1-10 uk-text-nowrap">Unit</th>
                            <th class="uk-width-1-10 uk-text-nowrap uk-text-center">Price</th>
                            <th class="uk-width-1-10 uk-text-center uk-text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $nameId = 'atl_booking';
                            if (isset($services['acc'])) {
                                View('backend/layout/booking/service/acc.tpl', 
                                    [
                                        'svData' => $services['acc'],
                                        'idBooking' => $idBooking,
                                        'mdAccomodation' => $mdAccomodation,
                                        'mdCruise' => $mdCruise,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'self' => $self
                                    ]
                                );
                            }
                            if (isset($services['ticket'])) {
                                View('backend/layout/booking/service/ticket.tpl', 
                                    [
                                        'svData' => $services['ticket'],
                                        'idBooking' => $idBooking,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'self' => $self
                                    ]
                                );
                            }
                            if (isset($services['car'])) {
                                View('backend/layout/booking/service/car.tpl', 
                                    [
                                        'svData' => $services['car'],
                                        'idBooking' => $idBooking,
                                        'mdCar' => $mdCar,
                                        'mdDriver' => $mdDriver,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'self' => $self
                                    ]
                                ); 
                            }
                            if (isset($services['guider'])) {
                                View('backend/layout/booking/service/guider.tpl', 
                                    [
                                        'svData' => $services['guider'],
                                        'idBooking' => $idBooking,
                                        'mdGuider' => $mdGuider,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'self' => $self
                                    ]
                                ); 
                            }
                            if (isset($services['other'])) {
                                View('backend/layout/booking/service/other.tpl', 
                                    [
                                        'svData' => $services['other'],
                                        'idBooking' => $idBooking,
                                        'mdOtherService' => $mdOtherService,
                                        'mdUser' => $mdUser,
                                        'helpPrice' => $helpPrice,
                                        'self' => $self
                                    ]
                                ); 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        <div class="uk-grid">
            <div class="uk-width-medium-1-2"></div>
            <div class="uk-width-medium-1-2">
                <table class="uk-table uk-table-striped">
                    <tbody>
                    <tr>
                        <td>Price Total</td>
                        <td><?php echo isset($priceTotalServ) ? $helpPrice->formatPrice($priceTotalServ) : ''; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

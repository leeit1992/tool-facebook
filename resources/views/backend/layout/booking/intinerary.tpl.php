<div class="atl-service-list uk-margin-top">
	<div class="md-card atl-intinerary--item">
        <div class="md-card-toolbar atl-card-toolbar">
        	<div class="md-card-toolbar-actions">
				<i class="uk-icon-minus md-icon  atl-intinerary--minimize uk-icon-square-o" data-status="close" data-uk-tooltip="{pos:\'Minimize\'}"></i>
			</div>
            <h3 class="md-card-toolbar-heading-text uk-text-upper">
                Intinerary
            </h3>
        </div>
        <div class="md-card-content atl-intinerary--item-content close"> 
            <?php 
                $nameInti = 'atl_booking[intinerary]';
            ?>
            <div class="uk-width-medium-1-1">
                <?php foreach ($intinerary as $items): ?>
                    <span class='md-list-heading'><?php echo isset($items['inti_title']) ? $items['inti_title'] : ''; ?></span>
                    <input type="hidden" name="<?php echo $nameId; ?>[id]" value="<?php echo isset($items['id']) ? $items['id'] : '' ;?>">
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
                                $serviceInti = isset($items['inti_service']) ? json_decode($items['inti_service'], true) : '';
                                if (isset($serviceInti['acc'])) {
                                    View('backend/layout/booking/service/acc.tpl', 
                                        [
                                            'svData' => $serviceInti['acc'],
                                            'idInti'     => $items['id'],
                                            'idBooking' => $idBooking,
                                            'mdAccomodation' => $mdAccomodation,
                                            'mdCruise' => $mdCruise,
                                            'mdUser' => $mdUser,
                                            'helpPrice' => $helpPrice,
                                            'self' => $self
                                        ]
                                    );
                                }
                                if (isset($serviceInti['ticket'])) {
                                    View('backend/layout/booking/service/ticket.tpl', 
                                        [
                                            'svData' => $serviceInti['ticket'],
                                            'idInti'     => $items['id'],
                                            'idBooking' => $idBooking,
                                            'mdUser' => $mdUser,
                                            'helpPrice' => $helpPrice,
                                            'self' => $self
                                        ]
                                    );
                                }
                                if (isset($serviceInti['car'])) {
                                    View('backend/layout/booking/service/car.tpl', 
                                        [
                                            'svData' => $serviceInti['car'],
                                            'idInti'     => $items['id'],
                                            'idBooking' => $idBooking,
                                            'mdCar' => $mdCar,
                                            'mdDriver' => $mdDriver,
                                            'mdUser' => $mdUser,
                                            'helpPrice' => $helpPrice,
                                            'self' => $self
                                        ]
                                    ); 
                                }
                                if (isset($serviceInti['guider'])) {
                                    View('backend/layout/booking/service/guider.tpl', 
                                        [
                                            'svData' => $serviceInti['guider'],
                                            'idInti'     => $items['id'],
                                            'idBooking' => $idBooking,
                                            'mdGuider' => $mdGuider,
                                            'mdUser' => $mdUser,
                                            'helpPrice' => $helpPrice,
                                            'self' => $self
                                        ]
                                    ); 
                                }
                                if (isset($serviceInti['other'])) {
                                    View('backend/layout/booking/service/other.tpl', 
                                        [
                                            'svData' => $serviceInti['other'],
                                            'idInti'     => $items['id'],
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
                <?php endforeach ?>
            </div>
            <div class="uk-grid">
                <div class="uk-width-medium-1-2"></div>
                <div class="uk-width-medium-1-2">
                    <table class="uk-table uk-table-striped">
                        <tbody>
                        <tr>
                            <td>Price Total</td>
                            <td><?php echo isset($priceTotalInti) ? $helpPrice->formatPrice($priceTotalInti) : ''; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

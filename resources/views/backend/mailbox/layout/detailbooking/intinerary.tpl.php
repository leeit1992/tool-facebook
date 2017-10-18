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
            switch ($role) {
                case 'operator':
                    ?>
                    <div class="uk-width-medium-1-1">
                        <?php foreach ($intinerary as $items): ?>
                            <?php 
                                $nameId = $nameInti.'['.$items['keyrandom'].']';
                            ?>
                            <span class='md-list-heading'><?php echo isset($items['inti_title']) ? $items['inti_title'] : ''; ?></span>
                            <input type="hidden" name="<?php echo $nameId; ?>[id]" value="<?php echo isset($items['id']) ? $items['id'] : '' ;?>">
                            <table class="uk-table uk-table-condensed">
                                <thead>
                                    <tr>
                                        <th class="uk-width-medium-3-10 uk-text-nowrap">Service Type</th>
                                        <th class="uk-width-medium-3-10 uk-text-nowrap">Service Name</th>
                                        <th class="uk-width-medium-3-10 uk-text-nowrap">Unit</th>
                                        <th class="uk-width-medium-1-10 uk-text-nowrap uk-text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $serviceInti = isset($items['inti_service']) ? json_decode($items['inti_service'], true) : '';
                                        if (isset($serviceInti['acc'])) {
                                            View('backend/mailbox/layout/detailbooking/service/acc.tpl', 
                                                [
                                                    'svData' => $serviceInti['acc'],
                                                    'nameId' => $nameId,
                                                    'mdAccomodation' => $mdAccomodation,
                                                    'mdCruise' => $mdCruise,
                                                    'self' => $self
                                                ]
                                            );
                                        }
                                        if (isset($serviceInti['ticket'])) {
                                            View('backend/mailbox/layout/detailbooking/service/ticket.tpl', 
                                                [
                                                    'svData' => $serviceInti['ticket'],
                                                    'nameId' => $nameId,
                                                    'self' => $self
                                                ]
                                            );
                                        }
                                        if (isset($serviceInti['car'])) {
                                            View('backend/mailbox/layout/detailbooking/service/car.tpl', 
                                                [
                                                    'svData' => $serviceInti['car'],
                                                    'nameId' => $nameId,
                                                    'mdCar' => $mdCar,
                                                    'mdDriver' => $mdDriver,
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                        if (isset($serviceInti['guider'])) {
                                            View('backend/mailbox/layout/detailbooking/service/guider.tpl', 
                                                [
                                                    'svData' => $serviceInti['guider'],
                                                    'nameId' => $nameId,
                                                    'mdGuider' => $mdGuider,
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                        if (isset($serviceInti['other'])) {
                                            View('backend/mailbox/layout/detailbooking/service/other.tpl', 
                                                [
                                                    'svData' => $serviceInti['other'],
                                                    'nameId' => $nameId,
                                                    'mdOtherService' => $mdOtherService,
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                    ?>
                                </tbody>
                            </table>
                        <?php endforeach ?>
                    </div>
                    <?php
                    break;
                case 'rect':
                    ?>
                    <div class="uk-grid uk-grid-divider uk-grid-medium" style="width: 100%;">
                        <div class="uk-width-medium-8-10">
                        <?php foreach ($intinerary as $items): ?>
                            <span class='md-list-heading'><?php echo isset($items['inti_title']) ? $items['inti_title'] : ''; ?></span>
                            <table class="uk-table uk-table-condensed">
                                <thead>
                                    <tr>
                                        <th class="uk-width-medium-3-10 uk-text-nowrap">Service Type</th>
                                        <th class="uk-width-medium-3-10 uk-text-nowrap">Service Name</th>
                                        <th class="uk-width-medium-3-10 uk-text-nowrap">Unit</th>
                                        <th class="uk-width-medium-1-10 uk-text-nowrap uk-text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $nameId =  $nameInti . '['.$items['keyrandom'].']';
                                        $serviceInti = isset($items['inti_service']) ? json_decode($items['inti_service'], true) : '';
                                        if (isset($serviceInti['acc'])) {
                                            View('backend/mailbox/layout/detailbooking/service/acc.tpl', 
                                                [
                                                    'svData' => $serviceInti['acc'],
                                                    'nameId' => $nameId,
                                                    'mdAccomodation' => $mdAccomodation,
                                                    'mdCruise' => $mdCruise,
                                                    'self' => $self,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border'
                                                ]
                                            );
                                        }
                                        if (isset($serviceInti['ticket'])) {
                                            View('backend/mailbox/layout/detailbooking/service/ticket.tpl', 
                                                [
                                                    'svData' => $serviceInti['ticket'],
                                                    'nameId' => $nameId,
                                                    'self' => $self,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border'
                                                ]
                                            );
                                        }
                                        if (isset($serviceInti['car'])) {
                                            View('backend/mailbox/layout/detailbooking/service/car.tpl', 
                                                [
                                                    'svData' => $serviceInti['car'],
                                                    'nameId' => $nameId,
                                                    'mdCar' => $mdCar,
                                                    'mdDriver' => $mdDriver,
                                                    'self' => $self,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border'
                                                ]
                                            ); 
                                        }
                                        if (isset($serviceInti['guider'])) {
                                            View('backend/mailbox/layout/detailbooking/service/guider.tpl', 
                                                [
                                                    'svData' => $serviceInti['guider'],
                                                    'nameId' => $nameId,
                                                    'mdGuider' => $mdGuider,
                                                    'self' => $self,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border'
                                                ]
                                            ); 
                                        }
                                        if (isset($serviceInti['other'])) {
                                            View('backend/mailbox/layout/detailbooking/service/other.tpl', 
                                                [
                                                    'svData' => $serviceInti['other'],
                                                    'nameId' => $nameId,
                                                    'mdOtherService' => $mdOtherService,
                                                    'self' => $self,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border'
                                                ]
                                            ); 
                                        }
                                    ?>
                                </tbody>
                            </table>
                        <?php endforeach ?>
                        </div>
                        <div class="uk-width-medium-2-10">
                            <?php foreach ($intinerary as $items): ?>
                                <?php 
                                    $nameId = $nameInti.'['.$items['keyrandom'].']';
                                ?>
                                <span class='md-list-heading'><?php echo isset($items['inti_title']) ? $items['inti_title'] : ''; ?></span>
                                <input type="hidden" name="<?php echo $nameId; ?>[id]" value="<?php echo isset($items['id']) ? $items['id'] : '' ;?>">
                                <table class="uk-table uk-table-condensed">
                                    <thead>
                                        <tr>
                                            <th class="uk-text-nowrap uk-text-center">Expense</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $serviceInti = isset($items['inti_service']) ? json_decode($items['inti_service'], true) : '';
                                            if (isset($serviceInti['acc'])) {
                                                View('backend/mailbox/layout/detailbooking/serviceExpense/acc.tpl', 
                                                    [
                                                        'svData' => $serviceInti['acc'],
                                                        'nameId' => $nameId,
                                                        'mdAccomodation' => $mdAccomodation,
                                                        'mdCruise' => $mdCruise,
                                                        'self' => $self
                                                    ]
                                                );
                                            }
                                            if (isset($serviceInti['ticket'])) {
                                                View('backend/mailbox/layout/detailbooking/serviceExpense/ticket.tpl', 
                                                    [
                                                        'svData' => $serviceInti['ticket'],
                                                        'nameId' => $nameId,
                                                        'self' => $self
                                                    ]
                                                );
                                            }
                                            if (isset($serviceInti['car'])) {
                                                View('backend/mailbox/layout/detailbooking/serviceExpense/car.tpl', 
                                                    [
                                                        'svData' => $serviceInti['car'],
                                                        'nameId' => $nameId,
                                                        'mdCar' => $mdCar,
                                                        'mdDriver' => $mdDriver,
                                                        'self' => $self
                                                    ]
                                                ); 
                                            }
                                            if (isset($serviceInti['guider'])) {
                                                View('backend/mailbox/layout/detailbooking/serviceExpense/guider.tpl', 
                                                    [
                                                        'svData' => $serviceInti['guider'],
                                                        'nameId' => $nameId,
                                                        'mdGuider' => $mdGuider,
                                                        'self' => $self
                                                    ]
                                                ); 
                                            }
                                            if (isset($serviceInti['other'])) {
                                                View('backend/mailbox/layout/detailbooking/serviceExpense/other.tpl', 
                                                    [
                                                        'svData' => $serviceInti['other'],
                                                        'nameId' => $nameId,
                                                        'mdOtherService' => $mdOtherService,
                                                        'self' => $self
                                                    ]
                                                ); 
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php
                    break;
            }
            ?>
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

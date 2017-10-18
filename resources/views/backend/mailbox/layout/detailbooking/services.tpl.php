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
            <?php 
            switch ($role) {
                case 'operator':
                    ?>
                    <div class="uk-width-medium-1-1">
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
                                    $nameId = 'atl_booking';
                                    if (isset($services['acc'])) {
                                        View('backend/mailbox/layout/detailbooking/service/acc.tpl', 
                                            [
                                                'svData' => $services['acc'],
                                                'nameId' => $nameId,
                                                'mdAccomodation' => $mdAccomodation,
                                                'mdCruise' => $mdCruise,
                                                'self' => $self
                                            ]
                                        );
                                    }
                                    if (isset($services['ticket'])) {
                                        View('backend/mailbox/layout/detailbooking/service/ticket.tpl', 
                                            [
                                                'svData' => $services['ticket'],
                                                'nameId' => $nameId,
                                                'self' => $self
                                            ]
                                        );
                                    }
                                    if (isset($services['car'])) {
                                        View('backend/mailbox/layout/detailbooking/service/car.tpl', 
                                            [
                                                'svData' => $services['car'],
                                                'nameId' => $nameId,
                                                'mdCar' => $mdCar,
                                                'mdDriver' => $mdDriver,
                                                'self' => $self
                                            ]
                                        ); 
                                    }
                                    if (isset($services['guider'])) {
                                        View('backend/mailbox/layout/detailbooking/service/guider.tpl', 
                                            [
                                                'svData' => $services['guider'],
                                                'nameId' => $nameId,
                                                'mdGuider' => $mdGuider,
                                                'self' => $self
                                            ]
                                        ); 
                                    }
                                    if (isset($services['other'])) {
                                        View('backend/mailbox/layout/detailbooking/service/other.tpl', 
                                            [
                                                'svData' => $services['other'],
                                                'nameId' => $nameId,
                                                'mdOtherService' => $mdOtherService,
                                                'self' => $self
                                            ]
                                        ); 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    break;
                case 'rect':
                    ?>
                    <div class="uk-grid uk-grid-divider uk-grid-medium" style="width: 100%;">
                        <div class="uk-width-medium-8-10">
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
                                        $nameId = 'atl_booking';
                                        if (isset($services['acc'])) {
                                            View('backend/mailbox/layout/detailbooking/service/acc.tpl', 
                                                [
                                                    'svData' => $services['acc'],
                                                    'nameId' => $nameId,
                                                    'mdAccomodation' => $mdAccomodation,
                                                    'mdCruise' => $mdCruise,
                                                    'self' => $self,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border'

                                                ]
                                            );
                                        }
                                        if (isset($services['ticket'])) {
                                            View('backend/mailbox/layout/detailbooking/service/ticket.tpl', 
                                                [
                                                    'svData' => $services['ticket'],
                                                    'nameId' => $nameId,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border',
                                                    'self' => $self
                                                ]
                                            );
                                        }
                                        if (isset($services['car'])) {
                                            View('backend/mailbox/layout/detailbooking/service/car.tpl', 
                                                [
                                                    'svData' => $services['car'],
                                                    'nameId' => $nameId,
                                                    'mdCar' => $mdCar,
                                                    'mdDriver' => $mdDriver,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border',
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                        if (isset($services['guider'])) {
                                            View('backend/mailbox/layout/detailbooking/service/guider.tpl', 
                                                [
                                                    'svData' => $services['guider'],
                                                    'nameId' => $nameId,
                                                    'mdGuider' => $mdGuider,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border',
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                        if (isset($services['other'])) {
                                            View('backend/mailbox/layout/detailbooking/service/other.tpl', 
                                                [
                                                    'svData' => $services['other'],
                                                    'nameId' => $nameId,
                                                    'mdOtherService' => $mdOtherService,
                                                    'readonly' => 'readonly',
                                                    'atlDelBorder' => 'atl-del-border',
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="uk-width-medium-2-10">
                            <table class="uk-table uk-table-condensed">
                                <thead>
                                    <tr>
                                        <th class="uk-text-nowrap uk-text-center">Expesen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $nameId = 'atl_booking';
                                        if (isset($services['acc'])) {
                                            View('backend/mailbox/layout/detailbooking/serviceExpense/acc.tpl', 
                                                [
                                                    'svData' => $services['acc'],
                                                    'nameId' => $nameId,
                                                    'mdAccomodation' => $mdAccomodation,
                                                    'mdCruise' => $mdCruise,
                                                    'self' => $self
                                                ]
                                            );
                                        }
                                        if (isset($services['ticket'])) {
                                            View('backend/mailbox/layout/detailbooking/serviceExpense/ticket.tpl', 
                                                [
                                                    'svData' => $services['ticket'],
                                                    'nameId' => $nameId,
                                                    'self' => $self
                                                ]
                                            );
                                        }
                                        if (isset($services['car'])) {
                                            View('backend/mailbox/layout/detailbooking/serviceExpense/car.tpl', 
                                                [
                                                    'svData' => $services['car'],
                                                    'nameId' => $nameId,
                                                    'mdCar' => $mdCar,
                                                    'mdDriver' => $mdDriver,
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                        if (isset($services['guider'])) {
                                            View('backend/mailbox/layout/detailbooking/serviceExpense/guider.tpl', 
                                                [
                                                    'svData' => $services['guider'],
                                                    'nameId' => $nameId,
                                                    'mdGuider' => $mdGuider,
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                        if (isset($services['other'])) {
                                            View('backend/mailbox/layout/detailbooking/serviceExpense/other.tpl', 
                                                [
                                                    'svData' => $services['other'],
                                                    'nameId' => $nameId,
                                                    'mdOtherService' => $mdOtherService,
                                                    'self' => $self
                                                ]
                                            ); 
                                        }
                                    ?>
                                </tbody>
                            </table>
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
                            <td><?php echo isset($priceTotalServ) ? $helpPrice->formatPrice($priceTotalServ) : ''; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

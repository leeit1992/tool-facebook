<div id="atl-page-handle-office">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Offices Management</h3>
            
            <?php View('backend/office/layout/manageOfficeFilter.tpl', [ 'mdOffice' => $mdOffice ]); ?>
            <br>
            <?php View( $manageAction ); ?>
            <br>
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-hover">
                    <thead>
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Name</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">City</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">County</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Phone</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Email</th>
                        <th class="uk-width-1-6 uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-office-not-js">
                        <?php foreach ($listOffice as $lO): ?>
                        <tr class="atl-office-item-<?php echo $lO['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $lO['id'] ?>" />
                            </td>
                            <td class="uk-text-center">
                                <?php echo isset($lO['office_name'])?$lO['office_name']:''?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $officeCityJson = $mdOffice->getMetaData( $lO['id'], 'office_city' );
                                    $officeCity = !empty($officeCityJson) ? json_decode($officeCityJson) : array();
                                    foreach ($officeCity as $oC) {
                                        echo $oC->name;
                                    }
                                ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $officeCo = json_decode($mdOffice->getMetaData( $lO['id'], 'office_country' ));
                                    if (isset($officeCountry) && is_array($officeCountry)) {
                                        foreach ($officeCountry as $oC) {
                                            echo $oC->name;
                                        }
                                    }
                                ?>
                                <?php 
                                    $officeCountryJson = $mdOffice->getMetaData( $lO['id'], 'office_country' );
                                    $officeCountry = !empty($officeCountryJson) ? json_decode($officeCountryJson) : array();
                                    foreach ($officeCountry as $oC) {
                                        echo $oC->name;
                                    }
                                ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $officePhone = $mdOffice->getMetaData( $lO['id'], 'office_phone' );
                                    echo isset($officePhone)?$officePhone:''; ?>
                            </td>
                            <td class="uk-text-center">
                                <?php 
                                    $officeEmail = $mdOffice->getMetaData( $lO['id'], 'office_email' );
                                    echo isset($officeEmail)?$officeEmail:''; ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-office/' . $lO['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a class="atl-manage-office-delete-js" data-id="<?php echo $lO['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-office-js"></tbody>
                </table>
            </div>
            <br>
            <?php
                View( $manageAction );
                echo $pagination;
            ?>
        </div>
        <?php 
            View(
                $addButton,
                [
                    'link' => url('/atl-admin/add-office'),
                    'title' => 'office'
                ]
            ); 
        ?>
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-admin-office' => assets('backend/js/page-admin-office.min.js'),
    ) );

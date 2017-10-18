<div id="page-admin-location" class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Add Location</h3>
        <div class="uk-grid" data-uk-grid-margin>
            <?php View('backend/location/layout/addLocation.tpl', [ 'locations' => $locations, 'infoLocation' => $infoLocation, 'self' => $self ]) ?>
            <div class="uk-width-medium-6-10">
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content">
                        <div class="uk-grid">
                            <div class="uk-width-medium-2-3"> </div>
                            <div class="uk-width-medium-1-3">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon"><i class="uk-icon-search"></i></span>
                                    <div class="md-input-wrapper">
                                        <input type="text" class="md-input atl-location-manage-search-js">
                                        <span class="md-input-bar"></span>
                                    </div>       
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php View('backend/location/layout/manageLocationAction.tpl') ?>
                        <br>
                        <div class="uk-overflow-container">
                            <table class="uk-table">
                                <caption>List location</caption>
                                <thead>
                                    <tr>
                                        <th> <input type="checkbox" class="atl-checkbox-primary-js"> Location Name</th>
                                        <th>Location Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody class="atl-list-location-not-js">
                                <?php foreach ($locations as $value) : ?>
                                    <tr class="atl-location-item-<?php echo $value['id'] ?>">
                                        <td> <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>"> <?php echo $value['location_name_display'] ?></td>
                                        <td><?php echo $self->mdLocation->typeLocation( $value['location_type'] ) ?></td>
                                        <td>
                                            <a href="<?php echo url('/atl-admin/manage-location/' . $value['id']) ?>">
                                                <i class="md-icon material-icons">&#xE254;</i>
                                            </a>
                                            <a href="#" class="atl-manage-location-delete-js" data-id="<?php echo $value['id'] ?>">
                                                <i class="md-icon material-icons">&#xE872;</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tbody class="atl-list-location-js"></tbody>
                            </table>
                        </div>
                        <br>
                        <?php View('backend/location/layout/manageLocationAction.tpl') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if( !empty( $infoLocation ) ) {
        View('backend/location/layout/addLocationButton.tpl');
    }
    ?>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;"></div>
</div>
<?php 
registerScrips( array(
    'page-admin-location' => assets('backend/js/page-admin-location.min.js'),
) );
<div id="atl-page-handle-car">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Cars Management</h3>
            <?php View('backend/car/layout/manageCarFilter.tpl', [ 'mdCar' => $mdCar ]); ?>
            <br>
            <?php View( $manageAction ); ?>
            <br>
                <table class="uk-table atl-table-hover">
                    <thead class="atl-table-background">
                    <tr>
                        <th class="uk-text-center uk-text-nowrap">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap"> 
                            Image 
                        </th>
                        <th class="uk-width-2-5 uk-text-nowrap">Name</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Seats</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-car-not-js">
                        <?php foreach ($listCar as $value): ?>
                        <tr class="atl-car-item-<?php echo $value['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td class="uk-text-center">
                            <?php
                                $car_image = $mdCar->getMetaData( $value['id'], 'car_image' );
                                if (!empty($car_image)) { ?>
                                    <img class="md-user-image" style="height: 34px;" src="<?php echo url($car_image); ?>">
                            <?php  }
                            ?>
                            </td>
                            <td>
                                <?php echo isset($value['service_name']) ? $value['service_name']: '' ?>
                            </td>
                            <td class="uk-text-center">
                                <?php echo $mdCar->getMetaData( $value['id'], 'car_seats' ); ?>
                                
                            </td>
                           
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-car/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a href="#" class="atl-manage-car-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-car-js"></tbody>
                </table>
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
                    'link' => url('/atl-admin/add-car'),
                    'title' => 'car'
                ]
            );
        ?>
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-admin-car' => assets('backend/js/page-admin-car.min.js')
    ) );

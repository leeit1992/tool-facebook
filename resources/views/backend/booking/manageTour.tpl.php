<div id="page-admin-booking">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Tour Template Management</h3>
            
                <table class="uk-table uk-table-hover">
                    <thead class="atl-table-background">
                    <tr>
                        <th class=uk-text-center">
                            <input type="checkbox" class="atl-checkbox-primary-js" />
                        </th>
                        <th class="uk-width-4-10">Name tour</th>
                        <th class="uk-width-3-10">Created by</th>
                        <th class="uk-width-2-10">Created date</th>
                        <th class="uk-width-1-10 uk-text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-tour-not-js">
                        <?php foreach ($listTour as $items): ?>
                        <tr class="atl-tour-item-<?php echo $items['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $items['id'] ?>" />
                            </td>
                            <td>
                                <?php echo isset($items['tour_title']) ? $items['tour_title'] : ''; ?>
                            </td>
                            <td>
                                <?php
                                    $user = $mdUser->getUserBy('id', $items['tour_author']);
                                    echo !empty($user) ? $user[0]['user_name'] : '';
                                ?>
                            </td>
                            <td>
                                <?php echo isset($items['tour_postdate']) ? date('d-m-Y',strtotime($items['tour_postdate'])) : ''; ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="#" class="atl-manage-tour-delete-js" data-id="<?php echo $items['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-tour-js"></tbody>
                </table>
            
            <br>
            <?php View('backend/booking/layout/manageTourAction.tpl'); ?>
            <?php echo $pagination; ?>
        </div>
    </div>  
</div>

<?php 
registerScrips( array(
    'admin-booking-manage' => assets('backend/js/booking/admin-booking-manage.min.js'),
) );
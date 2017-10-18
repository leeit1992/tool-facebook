<div id="page-admin-cruise">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Cruise Management</h3>
            <?php View('backend/cruise/layout/manageFilter.tpl'); ?>
            <br>
            <?php View( $manageAction ); ?>
            <br>
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-hover">
                    <thead>
                    <tr>
                        <th> 
                            <input type="checkbox" class="atl-checkbox-primary-js"/> 
                        </th>
                        <th class="uk-width-1-10 uk-text-center"> 
                            Image 
                        </th>
                        <th class="uk-width-2-10 uk-text-left">Title</th>
                        <th class="uk-width-2-10 uk-text-center">Star</th>
                        <th class="uk-width-2-10 uk-text-center">Author</th>
                        <th class="uk-width-2-10 uk-text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-cruise-not-js">
                        <?php foreach ($listCruise as $value): ?>
                        <tr class="atl-cruise-item-<?php echo $value['id'] ?>">
                            <td>
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td class="uk-text-center">
                                <img  style="height: 50px;" src="<?php echo url( $value['cruise_feature_image']) ?>">
                            </td>
                            <td class="uk-text-left">
                               <?php echo $value['service_title'] ?>
                            </td>

                            <td class="uk-text-center">
                               <?php echo $value['cruise_star'] ?>
                               <i class="uk-icon-star-o"></i>
                            </td>
                            <td class="uk-text-center">
                               <?php 
                                    $infoUser = $mdUser->getUserby( 'id', $value['service_author'] );

                                    if( !empty( $infoUser ) ) {
                                        echo '<a target="__blank" href="' . url('/atl-admin/edit-cruise/' . $value['service_author']) . '" >' . ucfirst( $infoUser[0]['user_name'] ) . '</a>';
                                    }
                               ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-cruise/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a class="atl-manage-cruise-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-cruise-js"></tbody>
                </table>
            </div>
            <br>
            <?php
                View( $manageAction );
                echo $pagination;
            ?>
        </div>
        <?php View(
            $addButton,
            [
                'link' => url('/atl-admin/add-cruise'),
                'title' => 'cruise'
            ]
        ); ?>
        
    </div>  
</div>

<?php 
    registerScrips( array(
        'page-cruise' => assets('backend/js/page-admin-cruise-debug.js')
    ) );

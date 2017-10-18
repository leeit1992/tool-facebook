<div id="page-admin-accommodation">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Acomodation Management</h3>
            
            <?php View('backend/accomodation/layout/manageFilter.tpl'); ?>
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
                    <tbody class="atl-list-acm-not-js">
                        <?php foreach ($listAccomodation as $value): ?>
                        <tr class="atl-acm-item-<?php echo $value['id'] ?>">
                            <td>
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td class="uk-text-center">
                                <img  style="height: 50px;" src="<?php echo url( $value['acmdt_feature_image']) ?>">
                            </td>
                            <td class="uk-text-left">
                               <?php echo $value['service_title'] ?>
                            </td>

                            <td class="uk-text-center">
                               <?php echo $value['acmdt_star'] ?>
                               <i class="uk-icon-star-o"></i>
                            </td>
                            <td class="uk-text-center">
                               <?php 
                                    $infoUser = $mdUser->getUserby( 'id', $value['service_author'] );

                                    if( !empty( $infoUser ) ) {
                                        echo '<a target="__blank" href="' . url('/atl-admin/edit-accomodation/' . $value['service_author']) . '" >' . ucfirst( $infoUser[0]['user_name'] ) . '</a>';
                                    }
                               ?>
                            </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-accomodation/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a href="#" class="atl-manage-accomodation-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-acm-js"></tbody>
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
                'link' => url('/atl-admin/add-accomodation'),
                'title' => 'accomodation'
            ]
        ); ?>
        
    </div>  
</div>

<?php 
registerScrips( array(
    'page-accommodation' => assets('backend/js/page-admin-accommodation-debug.js'),
) );

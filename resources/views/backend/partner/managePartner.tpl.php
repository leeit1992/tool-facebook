<div id="atl-page-handle-partner">
    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <h3 class="heading_a uk-margin-bottom">Partners Management</h3>
            
            <?php View('backend/partner/layout/managePartnerFilter.tpl', [ 'mdPartner' => $mdPartner ]); ?>
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
                        <th class="uk-width-2-5 uk-text-center uk-text-nowrap">Name</th>
                        <th class="uk-width-1-5 uk-text-center uk-text-nowrap">Service</th>
                        <th class="uk-width-2-5 uk-text-center uk-text-nowrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="atl-list-partner-not-js">
                        <?php foreach ($listPartner as $value): ?>
                        <tr class="atl-partner-item-<?php echo $value['id'] ?>">
                            <td class="uk-text-center">
                                <input type="checkbox" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                            </td>
                            <td class="uk-text-center">
                                <?php echo $value['partner_name'] ?>
                            </td>
                           <td class="uk-text-center">
                               <?php
                                    $service = (array) json_decode($mdPartner->getMetaData($value['id'],'partner_service'));
                                    $text ='';
                                    foreach ($service as $val) {
                                        if (!empty($val->name)) {
                                            $text .= $val->name.' - ';
                                        }
                                    }
                                    echo trim($text,' - ');
                               ?>
                           </td>
                            <td class="uk-text-center">
                                <a href="<?php echo url('/atl-admin/edit-partner/' . $value['id']) ?>">
                                    <i class="md-icon material-icons">edit</i>
                                </a>
                                <a href="#" class="atl-manage-partner-delete-js" data-id="<?php echo $value['id'] ?>">
                                    <i class="md-icon material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tbody class="atl-list-partner-js"></tbody>
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
                    'link' => url('/atl-admin/add-partner'),
                    'title' => 'partner'
                ]
            ); 
        ?>
    </div>  
</div>

<?php 
registerScrips( array(
    'page-admin-partner' => assets('backend/js/page-admin-partner.min.js'),
) );
<div id="atl-page-handle-log">
    <div class="md-card">
        <?php View('backend/log/manageLogFilter.tpl' , [ 'mdLogs' => $mdLogs , 'listUser' => $listUser ]); ?>
    </div>
    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-1">
                    <div class="uk-overflow-container">
                        <table class="uk-table">
                            <thead>
                                <tr>
                                    <th class="uk-text-center" >
                                        <input type="hidden" class="atl-checkbox-primary-js" />
                                    </th>
                                    <th>Log Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="atl-list-log-not-js">
                                <?php foreach ($listLogs as $value) : ?>
                                <tr class="atl-log-item-<?php echo $value['id'] ?>">
                                    <td class="uk-text-center">
                                        <input type="hidden" class="atl-checkbox-child-js" value="<?php echo $value['id'] ?>" />
                                    </td>
                                    <td><?php echo $value['logs'] ?></td>
                                    <td class="uk-text-nowrap">
                                        <a  class="atl-manage-log-delete-js" data-id="<?php echo $value['id'] ?>">
                                            <i class="md-icon material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tbody class="atl-list-log-js"></tbody>
                        </table>
                    </div>
                    <?php echo $pagination; ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php 
registerScrips( array(
    'page-admin-log' => assets('backend/js/page-admin-log.min.js'),
) );

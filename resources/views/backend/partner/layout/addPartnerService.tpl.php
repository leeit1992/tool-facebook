<div class="md-card-toolbar">
    <h3 class="md-card-toolbar-heading-text">
        Manage Service
    </h3>
</div>
<div class="md-card-content large-padding">
    <div class="uk-overflow-container">
        <table class="uk-table">
            <thead>
                <tr>
                    <th class="uk-width-3-10 ">Service</th>
                    <th class="uk-width-5-10 uk-text-nowrap">Desc</th>
                    <th class="uk-width-1-10 uk-text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (!empty($service)) { 
                foreach ($service as $key => $item) {
                    ?>
                    <tr>
                        <td>
                            <?php 
                                echo $self->renderInput( 
                                    array( 
                                        'name'  => 'atl_partner_service['.$key.'][name]', 
                                        'type'  => 'text', 
                                        'class' => 'md-input',
                                        'value' => isset( $item['name'] ) ? $item['name'] : ''
                                    ) 
                                ); 
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo $self->renderInput( 
                                    array( 
                                        'name'  => 'atl_partner_service['.$key.'][desc]', 
                                        'type'  => 'text', 
                                        'class' => 'md-input',
                                        'value' => isset( $item['desc'] ) ? $item['desc'] : ''
                                    ) 
                                ); 
                            ?>
                        </td>
                        <td class="uk-text-center uk-text-middle">
                            <a class="atl-partner-service-delete">
                                <i class="material-icons md-24">delete</i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
            } ?>
            </tbody>
            <tfoot>
                <tr><td colspan="4">
                    <a class="atl-partner-service-add">
                        <i class="material-icons md-24"></i>
                    </a>
                </td></tr>
            </tfoot>
        </table>
    </div>   
</div>

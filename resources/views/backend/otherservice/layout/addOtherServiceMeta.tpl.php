<div class="md-card">
    <div class="md-card-toolbar">
        <h3 class="md-card-toolbar-heading-text">
            Service Custom
        </h3>
    </div>
    <div class="md-card-content large-padding">
        <div class="uk-overflow-container">
            <table class="uk-table">
                <thead>
                    <tr>
                        <th class="uk-width-4-10">Meta key</th>
                        <th class="uk-width-5-10">Meta value</th>
                        <th class="uk-width-1-10">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($meta)) {
                        foreach ($meta as $key => $item) {
                        ?>
                            <tr>
                                <td>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_otherservice_meta['.$key.'][key]', 
                                                'type'  => 'text', 
                                                'class' => 'md-input atl-required-js',
                                                'value' => isset( $item['key'] ) ? $item['key'] : ''
                                            )
                                        ); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $self->renderInput( 
                                            array( 
                                                'name'  => 'atl_otherservice_meta['.$key.'][value]', 
                                                'type'  => 'text', 
                                                'class' => 'md-input atl-required-js',
                                                'value' => isset( $item['value'] ) ? $item['value'] : ''
                                            )
                                        ); 
                                    ?>
                                </td>
                                <td class="uk-text-right uk-text-middle">
                                    <a href="#" class="atl-otherservice-meta-delete">
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
                        <a class="atl-otherservice-meta-add">
                            <i class="material-icons md-24"></i>
                        </a>
                    </td></tr>
                </tfoot>
            </table>
        </div>      
    </div>
</div>

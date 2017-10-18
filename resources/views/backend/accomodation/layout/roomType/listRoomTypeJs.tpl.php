<script id="atl-room-type-handle-tpl" type="text/html">
    <div class="atl-room-type-item atl-row-js atl-room-type-<%= id %>">
        <div class="uk-accordion-title">
            <h3 contenteditable><%= roomTypeName %></h3>
            <div class="atl-accordion-action">
                <a class="atl-accordion-edit" data-uk-modal="{target:'#addRoomType'}" data-id="<%= id %>" href="#"><i class="md-icon material-icons">edit</i></a> 
               <a class="atl-accordion-trash" data-id="<%= id %>" href="#"><i class="md-icon material-icons">delete</i></a> 
            </div>
        </div>
        <div class="uk-accordion-content">
            <div class="uk-form-row">
                <div class="uk-grid">
                    <% if( noType ) { %>
                    <div class="uk-width-medium-1-1">
                        <div class="md-input-wrapper md-input-filled">
                            <label>Price base room type</label>
                            <?php 
                                echo $self->renderInput( 
                                    array( 
                                        'name'  => 'atl_room_type_price_base', 
                                        'type'  => 'text', 
                                        'class' => 'md-input masked_input',
                                        'value' => '',
                                        'attr' => [
                                            'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                            'data-inputmask-showmaskonhover' => 'false'
                                        ]
                                    ) 
                                ); 
                            ?>
                        </div>
                    </div>
                    <% } %>
                    <% if( singleRoom ) { %>
                    <div class="uk-width-medium-1-<%= singleRoomWidth %>">
                        <div class="md-input-wrapper md-input-filled">
                            <label>Price base for single room</label>
                            <?php 
                                echo $self->renderInput( 
                                    array( 
                                        'name'  => 'atl_room_type_price_base_sg', 
                                        'type'  => 'text', 
                                        'class' => 'md-input masked_input',
                                        'value' => '',
                                        'attr' => [
                                            'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                            'data-inputmask-showmaskonhover' => 'false'
                                        ]
                                    ) 
                                ); 
                            ?>
                        </div>
                    </div>
                    <% } %>
                    <% if( doubleRoom ) { %>
                    <div class="uk-width-medium-1-<%= doubleRoomWidth %>">
                        <div class="md-input-wrapper md-input-filled">
                            <label>Price base for double room</label>
                            <?php 
                                echo $self->renderInput( 
                                    array( 
                                        'name'  => 'atl_room_type_price_base_db', 
                                        'type'  => 'text', 
                                        'class' => 'md-input masked_input',
                                        'value' => '',
                                        'attr' => [
                                            'data-inputmask' => "'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'",
                                            'data-inputmask-showmaskonhover' => 'false'
                                        ]
                                    ) 
                                ); 
                            ?>
                        </div>
                    </div>
                    <% } %>
                </div>
            </div>
            <div class="uk-form-row">
                <div class="uk-grid">
                    <% if( noType ) { %>
                    <div class="uk-width-medium-1-1">
                        <a class="atl-modal-open" data-id="<%= id %>" data-type="all" data-atl-modal="#atlRoomTypePricing">Manage Price</a>
                    </div>
                    <% } %>
                    <% if( singleRoom ) { %>
                    <div class="uk-width-medium-1-<%= singleRoomWidth %>">
                        <a class="atl-modal-open" data-id="<%= id %>" data-type="sg" data-atl-modal="#atlRoomTypePricing">Manage Price Single Room</a>
                    </div>
                    <% } %>
                    <% if( doubleRoom  ) { %>
                    <div class="uk-width-medium-1-<%= doubleRoomWidth %>">
                        <a class="atl-modal-open" data-id="<%= id %>"  data-type="db" data-atl-modal="#atlRoomTypePricing">Manage Price Double Room</a>
                    </div>
                    <% } %>
                </div>
            </div>
        </div>
    </div>
</script>
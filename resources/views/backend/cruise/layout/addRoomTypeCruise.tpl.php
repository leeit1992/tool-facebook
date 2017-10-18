<div id="atl-popin-room-type-cruise" class="uk-width-medium-1-1">
    <label class="uk-margin-bottom">Room Type for Cruise</label>

    <span class="uk-form-help-block uk-margin-bottom">Add attach the contract file to record.</span>

    <div class="uk-accordion atl-room-type-cruise-items" data-uk-accordion="{ collapse: false }">
    <?php View('backend/cruise/layout/roomTypeCruise/listRoomTypeCruise.tpl', [ 'roomTypeCruise' => $roomTypeCruise, 'self' => $self ] ); ?>
    </div>
    <?php View('backend/cruise/layout/roomTypeCruise/listRoomTypeCruiseJs.tpl', [ 'self' => $self ] ); ?>

    <a class="md-btn atl-btn-add-roomtype-cruise" data-uk-modal="{target:'#addRoomTypeCruise'}"  data-uk-tooltip="{pos:'bottom'}"  title="Open to add room type cruise.">Add Room Type Cruise</a>
    <div class="uk-modal" id="addRoomTypeCruise">
        <div class="uk-modal-dialog uk-modal-dialog-large">
            <div id="atl-form-roomtypecruise" action="" method="POST">
                <div class="atl-modal-head">
                    <h1>Add Room Type Cruise</h1>
                    <button type="button" class="uk-modal-close uk-close"></button>
                </div>
                <div class="uk-modal-content uk-margin-top">  
                    <div class="uk-grid uk-margin-top">
                        <div class="uk-width-large-7-10">
                            <p>
                                <label>Title</label>
                                <div class="md-input-wrapper">
                                    <input type="text" name="atl_roomtypecruise_name" class="md-input atl-room-type-cruise-name-js">
                                    <span class="md-input-bar"></span>
                                </div>
                                <span class="uk-form-help-block uk-margin-bottom">Enter the name of room type cruise.</span>
                            </p>
                            <p>
                                <label>Description</label>
                                <div class="md-input-wrapper">
                                    <?php $adminEditor->init('atl_roomtypecruise_desc', '') ?>
                                </div>
                                <span class="uk-form-help-block uk-margin-bottom">Enter the name of room type cruise.</span>
                            </p>
                            <p>
                                <label>Number of rooms</label>
                                <div class="md-input-wrapper">
                                    <input type="text" name="atl_roomtypecruise_num" class="md-input">
                                    <span class="md-input-bar"></span>
                                </div>
                                <span class="uk-form-help-block uk-margin-bottom">Enter the name of room type cruise.</span>
                            </p>
                            <p>
                                <label>Price base</label>
                                <div class="md-input-wrapper">
                                    <input class="md-input masked_input" type="text" name="atl_roomtypecruise_price_basic" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false">
                                    <span class="md-input-bar"></span>
                                </div>
                                <span class="uk-form-help-block uk-margin-bottom">Price base of room type cruise.</span>
                            </p>
                            
                            <p>
                                <input type="checkbox" id="atl-single-room" class="atl-checkbox-room" />
                                <label for="atl-single-room" class="inline-label">Single Room</label>
                            </p>
                            <p>
                                <input type="checkbox" id="atl-double-room" class="atl-checkbox-room" />
                                <label for="atl-double-room" class="inline-label">Double Room</label>
                            </p>  
                            <p>
                                <input type="checkbox" id="atl-other-room" class="atl-checkbox-room"/>
                                <label for="atl-other-room" class="inline-label">Other</label>
                            </p>

                            <!--  Manage price  -->
                                <div class="uk-overflow-container atl-manage-price-list" data-name="atl_manage_price">
                                            
                                </div>
                            <!-- End manage price-->

                            <!-- Extra price -->
                                <div class="uk-overflow-container atl-extra-list" data-name="atl_extra_rtc">
                                    <label>Extra price</label>
                                    <table class="uk-table">
                                        <thead>
                                            <tr>
                                                <th class="uk-width-4-10 uk-text-nowrap">Title</th>
                                                <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Type</th>
                                                <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                                                <th class="uk-width-2-10 uk-text-right uk-text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="atl-extra-items"> </tbody>
                                    </table>
                                    <a class="atl-add-extra"><i class="material-icons md-24">&#xE145;</i></a>
                                </div>
                            <!-- End Extra price -->
                            </p>
                        </div>
                        <div class="uk-width-large-3-10">
                            <div class="md-card">
                                <div class="md-card-content">
                                    <h3 class="heading_c uk-margin-medium-bottom">Feature Image</h3>
                                    <div class="atl-featured-image-cruise-wrap">
                                                    </div>
                                    <a class="atl-rt-featured-image-cruise-js">Set featured image</a>            
                                </div>
                            </div>
                            <div class="md-card">
                                <div class="md-card-content">
                                    <h3 class="heading_c uk-margin-medium-bottom">Gallery</h3>
                                    <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 atl-featured-gallery-cruise-wrap">
                                                    </div>
                                    <a class="atl-rt-gallery-cruise-js">Choose image gallery</a>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>

                <div class="uk-grid">
                     <div class="uk-width-medium-1-1">
                        <button class="md-btn atl-add-roomtypecruise-js" type="button">Save</button>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

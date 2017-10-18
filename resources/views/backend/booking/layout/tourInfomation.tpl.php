<div class="md-card-content">
    <h3 class="heading_a" style="color: #1977d2;">Tour Infomation</h3>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <select id="atl-booking-tour-template" data-md-selectize>
                            <option value="">Choose Tour Template</option>
                            <option value="1">Tour Custom</option>
                            <?php foreach ($listTemplateTour as $key => $value): ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['tour_title']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <?php 
        if( !empty( $tour ) ) {
            echo $self->renderInput( 
                array(
                    'name' => 'atl_tour_id', 
                    'type' => 'hidden', 
                    'value' => $tour['id']
                ) 
            );
        }
    ?>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1 uk-grid-margin">
                        <label>Tour Title</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_booking[tour][title]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input label-fixed',
                                    'value' => isset( $tour['tour_title'] ) ? $tour['tour_title'] : ''
                                )
                            ); 
                        ?>
                    </div> 
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <label>Tour Description</label>
                        <textarea class="md-input label-fixed" name="atl_booking[tour][description]" ><?php echo isset( $tour['tour_description']) ?  $tour['tour_description'] : ''; ?></textarea>
                    </div> 
                </div>

                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <h3 class="heading_a">
                            Attach File Itinerary
                            <span class="sub-heading">Upload and choose file intinerary.</span>
                        </h3>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="uk-form-file md-btn md-btn-primary atl-choose-file-intinerary">
                                    Select
                                    <input name="atl_booking[tour][fileIntinerary]" type="hidden">
                                </div>
                                <span style="width: 200px; overflow: hidden; display: inline-block;" class="atl-choose-file-intinerary-text">File not selected</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-grid atl-intinerary">
                    <?php 
                        View(
                        '/backend/booking/layout/curentDataTour.tpl', 
                            [ 
                                'bookingTemplate' => $bookingTemplate,
                                'listIntinerary' => $listIntinerary, 
                                'self' => $self
                            ]
                        ) 
                    ?>
                </div>
       
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <a class="md-btn md-btn-primary atl-intinerary-add-js" href="#">
                            <i class="uk-icon-plus uk-icon-white"></i> Add Intinerary
                        </a>
                        <a class="md-btn md-btn-primary atl-tour-add-js" href="#">
                            <i class="uk-icon-plus uk-icon-white"></i> Save Tour Template
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="md-card atl-intinerary-desc-template" style="display: none;">
    <div class="md-card-content">
        <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#tabs_inti_template'}">
            <li class="uk-width-1-3 uk-active"><a href="#">Intinerary</a></li>
        </ul>
        <ul id="tabs_inti_template" class="uk-switcher uk-margin atl-intinerary-desc-tpl-list">
            <li>
                <ul class="md-list md-list-addon atl-intinerary-desc-tpl-list-c"></ul>
            </li>
        </ul>
        <div class="uk-text-right">
            <button type="button" class="md-btn md-btn-flat atl-t-d-t-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary atl-intinerary-desc-user">Use</button>
        </div>
    </div>
</div>

<div class="uk-modal" id="atl-intinerary-save-desc">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Add template intinerary</h3>
        </div>
        <div class="uk-grid">
            <div class="uk-width-medium-1-1 uk-grid-margin">
                <label>Title</label>
                <textarea class="atl-intinerary-desc-content" style="display: none;"></textarea>
                <?php 
                    echo $self->renderInput( 
                        array( 
                            'name'  => 'atl-intinerary-desc-title', 
                            'type'  => 'text', 
                            'class' => 'md-input label-fixed',
                            'value' => ''
                        )
                    ); 
                ?>
            </div> 
            <div class="uk-width-1-1">
                <div id="file_upload-drop" class="uk-file-upload">
                    <img class="atl-intinerary-thumb-js" src="">
                    <p class="uk-text">Image description</p>
                    <p class="uk-text-muted uk-text-small uk-margin-small-bottom">or</p>
                    <a class="uk-form-file md-btn">
                        choose file
                        <input type="file" class="atl-intinerary-desc-thumb" onchange="ATLLIB.fileReader(event, '.atl-intinerary-thumb-js', true)">
                    </a>
                </div>
            </div>
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary atl-inti-save-desc">Save Intinerary</button>
        </div>
    </div>
</div>


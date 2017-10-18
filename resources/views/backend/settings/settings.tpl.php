<div id="atl-page-handle-setting" class="md-card">
    <form action="" method="post" id="atl-form-setting" enctype="multipart/form-data">
        <div class="md-card-toolbar">
            <h3 class="md-card-toolbar-heading-text">
                Setting General
            </h3>
        </div>
        <div class="md-card-content large-padding">
            <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <select id="select_demo_1" name="atl_settings[time_log]" data-md-selectize>
                            <option value="">Choose Time</option>
                            <optgroup label="Hour">
                                <?php for ($i = 1; $i <= 24; $i++) {
                                    $selected = isset( $settings['time_log'] ) ? selected( $settings['time_log'], 'h' . $i ) : ''; 
                                    echo '<option ' . $selected . ' value="h' . $i . '"> ' . $i . 'h </option>';
                                } ?>
                            </optgroup>
                            <optgroup label="Day">
                                 <?php for ($i = 1; $i <= 30; $i++) { 
                                    $selected = isset( $settings['time_log'] ) ? selected( $settings['time_log'], 'd' . $i ) : ''; 
                                    echo '<option ' . $selected . ' value="d' . $i . '"> ' . $i . ' Day </option>';
                                } ?>
                            </optgroup>
                            <optgroup label="Week">
                                 <?php for ($i = 1; $i <= 52; $i++) {
                                    $selected = isset( $settings['time_log'] ) ? selected( $settings['time_log'], 'w' . $i ) : ''; 
                                    echo '<option ' . $selected . ' value="w' . $i . '"> ' . $i . ' Week </option>';
                                } ?>
                            </optgroup>
                        </select>
                        <span class="uk-form-help-block">Set time automatic remove log system.</span>
                    </div>
                    <div class="uk-form-row">
                        <label>Number pagination</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_settings[number_pagination]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input',
                                    'value' => isset($settings['number_pagination']) ? $settings['number_pagination'] : '',
                                )
                            ); 
                        ?>
                        <span class="uk-form-help-block">Set value number pagination.</span>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="uk-form-row">
                        <label>Thousand Separator</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_settings[thousand_separator]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input',
                                    'value' => isset($settings['thousand_separator']) ? $settings['thousand_separator'] : '',
                                )
                            ); 
                        ?>
                        <span class="uk-form-help-block">Set value thousand separator.</span>
                    </div>
                    <div class="uk-form-row">
                        <label>Decimal Separator</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_settings[decimal_separator]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input',
                                    'value' => isset($settings['decimal_separator']) ? $settings['decimal_separator'] : '',
                                )
                            ); 
                        ?>
                        <span class="uk-form-help-block">Set value decimal separator.</span>
                    </div>
                    <div class="uk-form-row">
                        <label>Number of Decimal</label>
                        <?php 
                            echo $self->renderInput( 
                                array( 
                                    'name'  => 'atl_settings[number_decimal]', 
                                    'type'  => 'text', 
                                    'class' => 'md-input',
                                    'value' => isset($settings['number_decimal']) ? $settings['number_decimal'] : '',
                                )
                            ); 
                        ?>
                        <span class="uk-form-help-block">Set value number of decimal.</span>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-10">
                <span class="uk-input-group-addon">
                    <button type="submit" class="md-btn">Save</button>
                </span>
            </div> 
        </div>
    </form>
    <div class="uk-notify uk-notify-bottom-right atl-notify-js" style="display: none;"></div>
</div>

<?php  
    registerScrips(
        [
            'rangeslider' => assets( 'backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js' ),
            'forms_advanced' => assets( 'backend/assets/js/pages/forms_advanced.min.js' ),
            'page-admin-setting' => assets('backend/js/page-admin-setting.min.js'),
        ]
    );

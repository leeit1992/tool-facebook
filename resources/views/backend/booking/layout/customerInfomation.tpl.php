<div class="md-card-content">
    <h3 class="heading_a" style="color: #1977d2;">Customer Infomation</h3>
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <label>Full Name</label>
                        <?php
                            echo $self->renderInput(
                                array(
                                    'name'  => 'atl_booking[customer][name]',
                                    'type'  => 'text',
                                    'class' => 'md-input label-fixed',
                                    'value' => isset($customer['name']) ? $customer['name'] : ''
                                )
                            );
                        ?>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label>Phone Number</label>
                        <?php
                            echo $self->renderInput(
                                array(
                                    'name'  => 'atl_booking[customer][phone]',
                                    'type'  => 'text',
                                    'class' => 'md-input label-fixed',
                                    'value' => isset($customer['phone']) ? $customer['phone'] : ''
                                )
                            );
                        ?>
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <div class="uk-input-group">
                            <label>Birthday</label>
                            <input type="text" name="atl_booking[customer][birthday]" class="md-input label-fixed" data-uk-datepicker="{format:'DD.MM.YYYY'}" value="<?php echo isset($customer['birthday']) ? $customer['birthday'] : '' ?>"/>
                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label>Email</label>
                        <?php
                            echo $self->renderInput(
                                array(
                                    'name'  => 'atl_booking[customer][email]',
                                    'type'  => 'text',
                                    'class' => 'md-input masked_input label-fixed',
                                    'value' => isset($customer['email']) ? $customer['email'] : '',
                                    'attr' => [
                                                'data-inputmask' => "'alias': 'email'",
                                                'data-inputmask-showmaskonhover' => 'false'
                                            ]
                                )
                            );
                        ?>

                    </div> 
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2">
                        <label>Passport number</label>
                        <?php
                            echo $self->renderInput(
                                array(
                                    'name'  => 'atl_booking[customer][passport]',
                                    'type'  => 'text',
                                    'class' => 'md-input label-fixed',
                                    'value' => isset($customer['passport']) ? $customer['passport'] : ''
                                )
                            );
                        ?>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label>Passport expired date</label>
                        <?php
                            echo $self->renderInput(
                                array(
                                    'name'  => 'atl_booking[customer][expired]',
                                    'type'  => 'text',
                                    'class' => 'md-input label-fixed',
                                    'value' => isset($customer['expired']) ? $customer['expired'] : ''
                                )
                            );
                        ?>
                    </div> 
                </div>
            </div>
        </div>
        <div class="uk-width-medium-1-2">
             <div class="uk-form-row">
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <label>Address</label>
                        <?php
                            echo $self->renderInput(
                                array(
                                    'name'  => 'atl_booking[customer][address]',
                                    'type'  => 'text',
                                    'class' => 'md-input label-fixed',
                                    'value' => isset($customer['address']) ? $customer['address'] : ''
                                )
                            );
                        ?>
                    </div>
                    <div class="uk-width-medium-1-1">
                        <label class="atl-label">Country</label>
                        <select id="select_demo_1" name="atl_booking[customer][country]" data-md-selectize>
                            <option value="">Select country</option>
                            <?php
                            foreach ($listCountry as $country) {
                                $selected = isset($customer['country']) ? selected($customer['country'], $country['id']) : '';
                                ?>
                                <option <?php echo $selected ?> value="<?php echo $country['id']; ?>"> <?php echo $country['location_name'] ?></option>
                                <?php                                                                                               }
                            ?>
                        </select>
                    </div> 
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php
registerScrips(array(
    'rangeSlider' => assets('backend/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js'),
    'inputmask' => assets('backend/bower_components/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js'),
    'forms_advanced' => assets('backend/assets/js/pages/forms_advanced.min.js'),
));
<div class="uk-width-1-1 atl-contract-add">
    <button class="md-btn" type="button" data-uk-tooltip="{pos:'bottom'}"  title="Add file contract dialog box." data-uk-modal="{target:'#modal_default'}">
        Attach the contract
    </button>
    <div class="uk-modal" id="modal_default">
        <div class="uk-modal-dialog">
            <button type="button" class="uk-modal-close uk-close"></button>
            <div class="uk-form-row">
                <div class="uk-grid">
                    <?php 
                        $self->renderInputWrap(
                            array( 
                                'wClass' => 'uk-margin-bottom',
                                'label' => 'Contract Name',
                                'name'  => '', 
                                'type'  => 'text', 
                                'class' => 'md-input atl-contract-name-js',
                                'desc'  => 'Enter the contract name.'
                            ) 
                        );
                        $self->renderInputWrap(
                            array( 
                                'wClass' => 'uk-margin-bottom',
                                'label' => 'Contract start date',
                                'name'  => '', 
                                'type'  => 'text', 
                                'class' => 'md-input atl-contract-date-js',
                                'desc'  => 'The start date on contract.',
                                'attr'  => [
                                            'data-uk-datepicker' => "{format:'DD.MM.YYYY'}"
                                        ]
                            ) 
                        );
                        $self->renderInputWrap(
                            array( 
                                'wClass' => 'uk-margin-bottom',
                                'label' => 'Contract expiry date',
                                'name'  => '', 
                                'type'  => 'text', 
                                'class' => 'md-input atl-contract-expiry-js',
                                'desc'  => 'The expiry on contract.',
                                'attr'  => [
                                            'data-uk-datepicker' => "{format:'DD.MM.YYYY'}"
                                        ]
                            ) 
                        );
                    ?>
                </div>
                <div class="uk-grid uk-margin-bottom">
                    <div class="uk-width-1-1">
                        <div class="uk-form-file md-btn md-btn-primary">
                            <button type="button" class="md-btn atl-choose-contract-file-js">Choose File</button>
                        </div>
                        <div class="uk-form-file uk-text-primary atl-contract-attact-js">
                        </div>
                    </div>
                </div>
                <div class="uk-grid">
                     <div class="uk-width-medium-1-1">
                        <button class="md-btn atl-add-contract-file-js" type="button">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

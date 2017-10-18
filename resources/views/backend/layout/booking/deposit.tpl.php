<div class="md-card-toolbar atl-card-toolbar">
    <div class="md-card-toolbar-actions">
        <i class="uk-icon-minus md-icon  atl-intinerary--minimize uk-icon-square-o" data-status="close" data-uk-tooltip="{pos:\'Minimize\'}"></i>
    </div>
    <h3 class="md-card-toolbar-heading-text uk-text-upper">
        Deposit Information
    </h3>
</div>
<div class="md-card-content atl-intinerary--item-content close">
    <div class="uk-width-large-1-1">
        <table class="uk-table">
            <thead>
            <tr>
                <th class="uk-width-1-5 uk-text-nowrap">Amount</th>
                <th class="uk-width-1-5 uk-text-nowrap">Date</th>
                <th class="uk-width-1-5 uk-text-nowrap">Status</th>
                <th class="uk-width-3-5 uk-text-nowrap">Note</th>
            </tr>
            </thead>
            <tbody class="atl-deposit-items">
                <?php if (is_array($deposit) || is_object($deposit)): ?>
                    <?php foreach ($deposit as $items): ?>
                        <tr>
                            <td class="uk-text-middle">
                                <input type="text" value="<?php echo isset($items['amount']) ? $items['amount'] : ''; ?>" readonly class="atl-del-border masked_input md-input md-input-width-medium uk-text-center" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" data-inputmask-showmaskonhover="false" />
                            </td>
                            <td class="uk-text-middle"><?php echo isset($items['date']) ? date('d-m-Y', strtotime($items['date'])) : ''; ?></td>
                            <td class="uk-text-middle"><?php echo isset($items['status']) ? $items['status'] : ''; ?></td>
                            <td class="uk-text-middle"><?php echo isset($items['note']) ? $items['note'] : ''; ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>


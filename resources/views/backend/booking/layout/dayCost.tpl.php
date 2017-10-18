<?php
$newArgsLeft   = [];
$newArgsRight  = [];
$payAllService = [];
foreach ($listIntinerary as $key => $value) {
    if (0 == $key%2) {
        $newArgsLeft[] = $value;
    } else {
        $newArgsRight[] = $value;
    }
}
?>
<div id="atl-check-list-summary" class="md-card-content">
    <div class="uk-grid atl-table-summary">
        <div class="uk-width-medium-1-2">
            <?php 
                $apiChecklist->dayCosTemplate([
                    'dataService' => $newArgsLeft,
                    'mdUser' => $mdUser,
                    'helpPrice' => $helpPrice
                ], $payAllService);
            ?>
        </div>

        <div class="uk-width-medium-1-2">
            <?php 
                $apiChecklist->dayCosTemplate([
                    'dataService' => $newArgsRight,
                    'mdUser' => $mdUser,
                    'helpPrice' => $helpPrice
                ], $payAllService);
            ?>
        </div>
        <div class="uk-modal" id="atl_apply_pay">
            <div class="uk-modal-dialog">
                <?php
                    $infoUserPay = $mdUser->getUserBy('id', Session()->get('atl_user_id'));
                    $userAddress = $mdUser->getMetaData(Session()->get('atl_user_id'), 'user_address');
                ?>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Payment Confirmation</h3>
                </div>

                <div class="uk-grid">
                    <div class="uk-width-medium-1-2 uk-margin-medium-bottom">
                        <div class="uk-input-group">
                            <label for="uk_dp_start">Confirm Date</label>
                            <input class="md-input label-fixed atl-summary-date" name="atl_summary[date]" type="text">
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-input-group">
                            <label for="uk_dp_start">Name Of Confirmer</label>
                            <input class="md-input label-fixed" name="atl_summary[name]" type="text">
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2 uk-margin-medium-bottom">
                        <div class="uk-input-group">
                            <label for="uk_dp_start">Contact Of Confirmer</label>
                            <input class="md-input label-fixed" name="atl_summary[contact]" type="text">
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-input-group">
                            <label for="uk_dp_start">Confirm Code</label>
                            <input class="md-input label-fixed" name="atl_summary[code]" type="text">
                        </div>
                    </div>
                </div>

                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                    <button type="button" class="md-btn md-btn-flat md-btn-flat-primary atl-summary-pay-sv-apply">Apply</button>
                </div>
            </div>
        </div>
        <?php 
        $payAllColor = 'atl-summary-price-red';
        if( empty( $payAllService ) ) {
            $payAllColor = 'atl-summary-price-blue';
        }
        ?>

        <div class="uk-width-medium-1-1">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2"></div>
                <div class="uk-width-medium-1-2">
                    <table class="uk-table uk-table-striped">
                        <tbody>
                        <tr>
                            <td>Total NETT Cost</td>
                            <td class="atl-summary-price-total <?php echo $payAllColor ?>">
                                <?php echo isset($priceTotalInti) ? $helpPrice->formatPrice($priceTotalInti) : ''; ?>    
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
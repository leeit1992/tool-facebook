<div class="md-card-content">
    <div class="uk-grid">
        <div class="uk-width-medium-1-1">
            <?php 
                $apiChecklist->peymentTemplate([
                    'dataInti' => $listIntinerary,
                    'mdUser' => $mdUser,
                    'helpPrice' => $helpPrice
                ]);
            ?>
            <div class="uk-width-medium-1-1">
            <div class="uk-grid">
                <div class="uk-width-medium-1-2"></div>
                <div class="uk-width-medium-1-2">
                    <table class="uk-table uk-table-striped">
                        <tbody>
                        <tr>
                            <td>Total NETT Cost</td>
                            <td class="atl-summary-price-total">
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
</div>
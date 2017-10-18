<div class="uk-grid">
    <div class="uk-width-medium-1-3">
        <label>Partner Service</label>
        <select class="atl-manage-otherservice-filter-js" data-md-selectize>
                <option value="0">All</option>
            <?php
            foreach ($partners as $partner) {
            ?>
                <option value="<?php echo $partner['id']; ?>"> <?php echo $partner['partner_name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="uk-width-medium-1-3">
    </div>
    <div class="uk-width-medium-1-3">
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon material-icons material-icons">search</i>
            </span>
            <div class="md-input-wrapper"><label>Search</label><input type="text" class="md-input atl-otherservice-manage-search-js" name="atl_otherservice_address" value=""><span class="md-input-bar"></span></div>
        </div>
    </div>
</div>

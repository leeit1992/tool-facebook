<div class="md-card-content">
    <div class="uk-grid" data-uk-grid-margin="">
        <div class="uk-width-medium-2-10">
            <select class="atl-manage-log-filter-js" data-md-selectize data-type="module">
                <option value="">Module Logs</option>
                <?php foreach ($mdLogs->getModuleLog() as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"> <?php echo $value; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="uk-width-medium-2-10">
            <select class="atl-manage-log-filter-js" data-md-selectize data-type="user">
                <option value="">User Logs</option>
                <?php 
                    foreach ($listUser as $lU) { ?>
                        <option value="<?php echo $lU['id']; ?>"><?php echo $lU['user_name']; ?></option>
                <?php }
                ?>
            </select>
        </div>
        <div class="uk-width-medium-2-10">
            <div class="md-input-wrapper">
                <label>Datetime</label>
                <input class="md-input atl-manage-log-filter-js" data-type="date" type="text" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                <span class="md-input-bar"></span>
            </div>
        </div>
        <div class="uk-width-medium-3-10"></div>
        <div class="uk-width-medium-1-10">
            <a class="md-btn atl-manage-log-deleteall-js">Clear</a>
        </div>
    </div>
</div>

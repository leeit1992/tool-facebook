<div class="uk-grid">
    <div class="uk-width-medium-2-3">
        <div class="uk-vertical-align">
            <div class="uk-vertical-align-middle">
                <ul class="uk-subnav uk-subnav-pill atl-manage-car-filter-js">
                    <li class="uk-active">
                        <a href="<?php echo url( '/atl-admin/manage-car' ) ?>">All</a>
                    </li>
                    <?php 
                        foreach ($mdCar->getTypeCar() as $key => $value) {
                             echo '<li><a data-type="' . $key . '" href="' . url( '/atl-admin/manage-car?type=' .$key ) . '">' . $value . '</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="uk-width-medium-1-3">
        <div class="uk-input-group">
            <span class="uk-input-group-addon">
                <i class="md-list-addon-icon material-icons material-icons">search</i>
            </span>
            <div class="md-input-wrapper"><label>Search</label><input type="text" class="md-input atl-car-manage-search-js" name="atl_car_address" value=""><span class="md-input-bar"></span></div>
        </div>
    </div>
</div>

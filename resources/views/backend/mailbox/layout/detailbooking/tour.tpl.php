<div class="md-card-toolbar atl-card-toolbar">
    <div class="md-card-toolbar-actions">
        <i class="uk-icon-minus md-icon  atl-intinerary--minimize uk-icon-square-o" data-status="close" data-uk-tooltip="{pos:\'Minimize\'}"></i>
    </div>
    <h3 class="md-card-toolbar-heading-text uk-text-upper">
        Tour Information
    </h3>
</div>
<div class="md-card-content atl-intinerary--item-content close">
    <div class="uk-grid uk-grid-divider uk-grid-medium">
		<div class="uk-width-small-1-1">
            <div class="uk-grid uk-grid-large">
                <div class="uk-width-large-2-10">
                    <span class="uk-text-muted uk-text-small">Tour name</span>
                </div>
                <div class="uk-width-large-8-10">
                    <span class="uk-text-large uk-text-middle"><?php echo isset($tour[0]['tour_title']) ? $tour[0]['tour_title'] : ''; ?></span>
                </div>
            </div>
        	<hr class="atl-grid-divider">
            <div class="uk-grid uk-grid-large">
                <div class="uk-width-large-2-10">
                    <span class="uk-text-muted uk-text-small">Tour description</span>
                </div>
                <div class="uk-width-large-8-10">
                    <span class="uk-text-large uk-text-middle"><?php echo isset($tour[0]['tour_description']) ? $tour[0]['tour_description'] : ''; ?></span>
                </div>
            </div>
        	<hr class="atl-grid-divider">
        </div>     
    </div>
</div>

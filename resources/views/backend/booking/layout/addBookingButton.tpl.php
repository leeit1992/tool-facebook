<div class="md-fab-wrapper">
	<?php if ($pdf === true): ?>
    	<a class="md-fab md-fab-accent md-fab-small" href="<?php echo url('/atl-admin/exportpdf-booking/'.$id);  ?>">
	        <i class="uk-icon-file-pdf-o uk-icon-small"></i>
	    </a>
	    <br>
    <?php endif ?>
    <a class="md-fab md-fab-accent md-fab-small" title="Add new booking" href="<?php echo $link; ?>">
        <i class="material-icons">&#xE145;</i>
    </a>
</div>
<?php 
foreach ($roomTypeCruise as $key => $value):
?>
<div class="atl-room-type-cruise-item atl-room-type-cruise-<?php echo $value['id'] ?>">
    <div class="uk-accordion-title">
        <h3><?php echo $value['service_title'] ?></h3>
        <div class="atl-accordion-action">
           <a class="atl-accordion-edit" data-uk-modal="{target:'#addRoomTypeCruise'}" data-id="<?php echo $value['id'] ?>"><i class="md-icon material-icons">edit</i></a> 
           <a class="atl-accordion-trash" data-id="<?php echo $value['id'] ?>"><i class="md-icon material-icons">delete</i></a> 
        </div>
    </div>
</div>
<?php endforeach; ?>

<script id="atl-room-type-cruise-handle-tpl" type="text/html">
    <div class="atl-room-type-cruise-item atl-row-js atl-room-type-cruise-<%= id %>">
        <div class="uk-accordion-title">
            <h3 contenteditable><%= roomTypeCruiseName %></h3>
            <div class="atl-accordion-action">
                <a class="atl-accordion-edit" data-uk-modal="{target:'#addRoomTypeCruise'}" data-id="<%= id %>" href="#"><i class="md-icon material-icons">edit</i></a> 
               <a class="atl-accordion-trash" data-id="<%= id %>" href="#"><i class="md-icon material-icons">delete</i></a> 
            </div>
        </div>
    </div>
</script>

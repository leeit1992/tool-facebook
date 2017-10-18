<div class="uk-modal" id="atl_find_accomodation">
    <div class="uk-modal-dialog">
        <button type="button" class="uk-modal-close uk-close"></button>
       
        <ul class="uk-tab" data-uk-tab="{connect:'#atl_find_accomodation_tab'}">
            <li class="uk-active"><a href="#">Find by name</a></li>
            <li><a href="#">Find by Location</a></li>
            <li><a href="#">Find by Star</a></li>
        </ul>
        
        <ul id="atl_find_accomodation_tab" class="uk-switcher uk-margin">
            <li data-type="byName">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label>Accomodation Title</label>
                        <input type="text" class="md-input atl-bk-sv-find-data" />
                    </div> 
                </div>
            </li>
            <li data-type="byLocation">
                <div class="atl-select">
                    <select class="atl-selectize atl-bk-sv-find-data">
                        <option value="">Choose Location</option>
                        <option value="1">Tour Custom</option>
                        <option value="a">Item A</option>
                        <option value="b">Item B</option>
                        <option value="c">Item C</option>
                    </select>
                </div>
            </li>
            <li data-type="byStar">
                <div class="atl-select">
                    <select class="atl-selectize atl-bk-sv-find-data">
                        <option value="">Choose Star</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                    </select>
                </div>
            </li>
        </ul>

        <div class="uk-grid">
            <div class="uk-width-medium-1-1">
                <input type="radio" name="atl_find_acc_by" value="acc" id="atl_find_acc_by1" data-md-icheck checked />
                <label for="atl_find_acc_by1" class="inline-label">Accomodation</label>

                <input type="radio" name="atl_find_acc_by" value="cruise" id="atl_find_acc_by2" data-md-icheck />
                <label for="atl_find_acc_by2" class="inline-label">Cruise</label>
            </div> 
        </div>
        <div class="uk-grid-margin">
             <button type="button" class="md-btn md-btn-primary atl-bk-sv-find-start">Find</button>
        </div>
       
        <form id="atl-service-form-add-accm">
            <ul class="md-list md-list-addon atl-bk-sv-hotel-list"> </ul>
        </form>
        <hr class="uk-grid-divider">
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary atl-bk-sv-accm-add">Add</button>
        </div>
    </div>
    </div>
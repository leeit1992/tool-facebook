<?php 
    if( !empty( $listIntinerary ) ) {
        if (is_array($listIntinerary) || is_object($listIntinerary))
        {
            foreach ($listIntinerary as $key => $value) {
                echo $self->renderInput( 
                    array(
                        'name' => 'atl_intinerary_id['. $value['keyrandom'].']', 
                        'type' => 'hidden', 
                        'value' => $value['id']
                    ) 
                );
            }

            foreach ($listIntinerary as $items){
                $bookingTemplate->render( 'intinerary', 
                        [ 'itemId' => $items['keyrandom'], 'dataArgs' => $items  ] 
                    );
            }
        }

    }
    
?>
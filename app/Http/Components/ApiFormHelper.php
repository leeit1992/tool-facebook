<?php
namespace App\Http\Components;

class ApiFormHelper 
{
	/**
     * $getInstance - Support singleton module.
     * @var null
     */
    private static $getInstance = null;

	private function __wakeup(){}

    private function __clone(){}

    private function __construct(){}

    public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
    }

    /**
	 * Handle render input form.
	 * 
	 * @param  array  $args Attr input
	 * @return string
	 */
	public function renderInput( $args = array() ){
        $atts = parametersExtra(
            array(
                'type'  => '',
                'name'  => '',
                'class' => '',
                'value' => '',
                'attr'  => array(),
            ),
            $args
        );

        $attrInput = '';
        foreach ($atts['attr'] as $key => $value) {
        	if( empty( $value ) ) {
        		$attrInput .= ' ' .$key. ' ';
        	}else{
        		$attrInput .= ' ' .$key . '="' . $value . '" ';
        	}
           
        }

        return '<input class="'.$atts['class'].'" type="'.$atts['type'].'" name="'.$atts['name'].'"  value="'.$atts['value'].'" '.$attrInput.'>';
    }

    /**
	 * Handle render input form.
	 * 
	 * @param  array  $args Attr input
	 * @return string
	 */
	public function inputValidateInt( $args = array() ){
        $atts = parametersExtra(
            array(
                'type'  => '',
                'name'  => '',
                'class' => '',
                'value' => '',
                'attr'  => array(),
            ),
            $args
        );

        $attrInput = '';
        foreach ($atts['attr'] as $key => $value) {
        	if( empty( $value ) ) {
        		$attrInput .= ' ' .$key. ' ';
        	}else{
        		$attrInput .= ' ' .$key . '="' . $value . '" ';
        	}
           
        }

        return '
        	<input class="'.$atts['class'].'" type="'.$atts['type'].'" name="'.$atts['name'].'_js"  value="'.$atts['value'].'" '.$attrInput.'>
        	<input type="hidden" name="'.$atts['name'].'" value="'.$atts['value'].'">
        	';
    }

    public function renderInputWrap($args){
    	?>
    	<div class="uk-width-medium-<?php echo isset( $args['w'] ) ? $args['w'] : '1-1'; ?> <?php echo isset( $args['wClass'] ) ? $args['wClass'] : ''; ?>">
            <div class="md-input-wrapper md-input-filled">
                <label><?php echo isset( $args['label'] ) ? $args['label'] : ''; ?></label>
                <?php 
                    echo $this->renderInput( 
                        $args
                    ); 
                ?>
                <span class="uk-form-help-block"><?php echo isset( $args['desc'] ) ? $args['desc'] : ''; ?></span>
            </div>
        </div>
    	<?php
    }

}
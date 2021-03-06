<?php
namespace app\Http\Components\Frontend;

use Atl\Routing\Controller as baseController;
use App\Http\Components\Frontend\DataMenu;
use App\Model\UserModel;

class Controller extends baseController
{
    public function __construct() {
        parent::__construct();
        $this->addButton    = 'frontend/template/addButton.tpl';
        $this->manageAction = 'frontend/template/manageAction.tpl';
    }

    /**
     * Load template default.
     * 
     * @param string $path       Template file name.
     * @param array  $parameters Parameters for template.
     *
     * @return string
     */
    public function loadTemplate($path, $parameters = array(), $options = array())
    {
        $output = View(
            'frontend/layout/header.tpl',
            [
                'menuAdmin' => DataMenu::getInstance($this->getRoute()),
            ]
        );

        $output .= View(
            'frontend/layout/sidebar.tpl',
            [
                'menuAdmin' => DataMenu::getInstance($this->getRoute()),
            ]
        );
        $output .= View($path, $parameters);
        $output .= View(
                    'frontend/layout/footer.tpl',
                    [
                        'media' => !empty($options['media']) ? $options : false,
                    ]
                    );

        return $output;
    }

    /**
     * Check curent access. login or not login.
     */
    public function userAccess()
    {
        if (true !== Session()->has('avt_user_id')) {
            redirect(url('/atl-login'));
        }
    }

    /**
     * Check curent access. admin or not admin.
     */
    public function checkAdmin()
    {
        if ( 'admin' !== Session()->get('avt_user_role') ) {
            redirect(url('/user-tool/error-404?url='.$route));
        }
    }


    /**
     * Get number pagination.
     */
    public function getNumberPagination()
    {
        $settings = $this->apiSetting->getSettings();
        if (!empty($settings['number_pagination'])) {
            return $settings['number_pagination'];
        }

        return 10;
    }

    /**
     * Handle render input form.
     * 
     * @param array $args Attr input
     *
     * @return string
     */
    public function renderInput($args = array())
    {
        $atts = parametersExtra(
            array(
                'type' => '',
                'name' => '',
                'class' => '',
                'value' => '',
                'attr' => array(),
            ),
            $args
        );

        $attrInput = '';
        foreach ($atts['attr'] as $key => $value) {
            if (empty($value)) {
                $attrInput .= ' '.$key.' ';
            } else {
                $attrInput .= ' '.$key.'="'.$value.'" ';
            }
        }

        return '<input class="'.$atts['class'].'" type="'.$atts['type'].'" name="'.$atts['name'].'"  value="'.$atts['value'].'" '.$attrInput.'>';
    }

    /**
     * Handle render input form.
     * 
     * @param array $args Attr input
     *
     * @return string
     */
    public function inputValidateInt($args = array())
    {
        $atts = parametersExtra(
            array(
                'type' => '',
                'name' => '',
                'class' => '',
                'value' => '',
                'attr' => array(),
            ),
            $args
        );

        $attrInput = '';
        foreach ($atts['attr'] as $key => $value) {
            if (empty($value)) {
                $attrInput .= ' '.$key.' ';
            } else {
                $attrInput .= ' '.$key.'="'.$value.'" ';
            }
        }

        return '
            <input class="'.$atts['class'].'" type="'.$atts['type'].'" name="'.$atts['name'].'_js"  value="'.$atts['value'].'" '.$attrInput.'>
            <input type="hidden" name="'.$atts['name'].'" value="'.$atts['value'].'">
            ';
    }

    public function renderInputWrap($args)
    {
        ?>
        <div class="uk-width-medium-<?php echo isset($args['w']) ? $args['w'] : '1-1';
        ?> <?php echo isset($args['wClass']) ? $args['wClass'] : '';
        ?>">
            <div class="md-input-wrapper md-input-filled">
                <label><?php echo isset($args['label']) ? $args['label'] : '';
        ?></label>
                <?php 
                    echo $this->renderInput(
                        $args
                    );
        ?>
                <span class="uk-form-help-block"><?php echo isset($args['desc']) ? $args['desc'] : '';
        ?></span>
            </div>
        </div>
        <?php

    }

    /**
     * Handle chek is md5.
     * 
     * @param string $md5 String md5
     *
     * @return bool
     */
    public function isValidMd5($md5 = '')
    {
        return preg_match('/^[a-f0-9]{32}$/', $md5);
    }

    /**
     * Handle redirect to page 404.
     * 
     * @param string $route Link or router project
     */
    public function redirect404($route)
    {
        redirect(url('/user-tool/error-404?url='.$route));
    }

    /**
     * convertDateToYmd 
     * Handle format date.
     * 
     * @param string $dateString Date string.
     *
     * @return string
     */
    public function convertDateToYmd($dateString)
    {
        return date('Y-m-d', strtotime($dateString));
    }

    /**
     * Setting config pagination
     * 
     * @return void
     */
    public function configPagination( $page='', $ofset='', $totalRow='', $baseUrl='' ) {
        $config['pageStart']  = $page;
        $config['ofset']      = $ofset;
        $config['totalRow']   = $totalRow;
        $config['baseUrl']    = $baseUrl;
        $config['classes']    = 'uk-pagination uk-margin-medium-top';
        $config['nextLink']   = '<i class="uk-icon-angle-double-right"></i>';
        $config['prevLink']   = '<i class="uk-icon-angle-double-left"></i>';
        $config['tagOpen']    = '';
        $config['tagClose']   = '';
        $config['tagOpenPageCurrent']  = '<li class="uk-active"><span>';
        $config['tagClosePageCurrent'] = '<span></li>';
        
        return $config;
    }

    public function countDay($startDate, $endDate){
        $startTimeStamp = strtotime($startDate);
        $endTimeStamp = strtotime($endDate);

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff/86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);

        return $numberDays;
    }
}

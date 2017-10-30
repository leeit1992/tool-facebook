<?php

namespace App\Http\Components\Frontend;

/**
 * adminDataMenu
 * Config data menu nav admin.
 *
 * @version  1.0
 * @author  HaLe 
 * @package  ATL
 */
class DataMenu
{   
    /**
     * $getInstance - Support singleton module.
     * @var null
     */
    private static $getInstance = null;

    protected static $route = null;

    protected $menuService = [];

    private function __wakeup(){}

    private function __clone(){}

    private function __construct(){}

    public static function getInstance( $route = null )
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        self::$route = $route;

        return self::$getInstance;
    }

    /**
     * dataMenu
     * Data menu action admin.
     */
    public function dataMenu()
    {   

        $menu['Dashboard'] = [
                'label' => 'Dashboard',
                'icon'  => '<i class="material-icons md-36">&#xE8F0;</i>',
                'conditionOpen' => ['Backend\MainController'],
                'display' => '',
                'link'  => url('/user-tool'),
                'display' => '',
            ];

        $menu['service'] = [
            'label'   => 'Dịch vụ',
            'icon'    => '<i class="material-icons md-36">&#xE86D;</i>',
            'conditionOpen' => ['Frontend\ServiceController'],
            'display' => '',
            'submenu' => [
                [
                    'label' => 'Đăng ký dịch vụ',
                    'link'  => url('/user-tool/send-mailbox'),
                    'conditionOpen' => ['sendMailbox'],
                ],
                [
                    'label' => 'Quản lý dịch vụ',
                    'link'  => url('/user-tool/manage-service'),
                    'conditionOpen' => ['manageService'],
                ],
                [
                    'label' => 'Thêm gói dịch vụ',
                    'link'  => url('/user-tool/add-packet-service'),
                    'conditionOpen' => ['handlePacketService'],
                ]
            ]
        ];

        $menu['action-tool'] = [
            'label'   => 'Tools',
            'icon'    => '<i class="material-icons md-36">&#xE8DC;</i>',
            'conditionOpen' => ['Frontend\ToolController'],
            'display' => '',
            'submenu' => [
                [
                    'label' => 'Tăng like bài viết',
                    'link'  => url('/user-tool/up-like'),
                    'conditionOpen' => ['upLikePost'],
                ],
                [
                    'label' => 'Tăng like fanpage',
                    'link'  => url('/user-tool/up-lie-page'),
                    'conditionOpen' => ['upLikePage'],
                ],
                [
                    'label' => 'Tăng comments',
                    'link'  => url('/user-tool/add-comment'),
                    'conditionOpen' => ['addComment'],
                ],
                [
                    'label' => 'Tăng share',
                    'link'  => url('/user-tool/up-share'),
                    'conditionOpen' => ['upShare'],
                ],

                [
                    'label' => 'Tăng follow',
                    'link'  => url('/user-tool/up-follow'),
                    'conditionOpen' => ['upFollow'],
                ],

                [
                    'label' => 'Auto like/ Thả tim',
                    'link'  => url('/ser-tool/up-like-and-heart'),
                    'conditionOpen' => ['upLineAndDropHeart'],
                ]
            ]
        ];

        $menu['token'] = [
            'label'   => 'Taì khoản facebook',
            'icon'    => '<i class="material-icons md-36">&#xE853;</i>',
            'conditionOpen' => ['Frontend\TokenController'],
            'display' => '',
            'submenu' => [
                [
                    'label' => 'Quản lý TK facebook',
                    'link'  => url('/user-tool/facebook-acc'),
                    'conditionOpen' => ['facebookManage'],
                ],
                [
                    'label' => 'Quản lý token',
                    'link'  => url('/user-tool/manage-token'),
                    'conditionOpen' => ['manageToken'],
                ]
            ]
        ];

        $menu['bank'] = [
            'label'   => 'Tài chính',
            'icon'    => '<i class="material-icons md-36">attach_money</i>',
            'conditionOpen' => ['Frontend\PayController'],
            'display' => '',
            'submenu' => [
                [
                    'label' => 'Thông tin thanh toán',
                    'link'  => url('/user-tool/manage-pay'),
                    'conditionOpen' => ['managePay'],
                ],
                [
                    'label' => 'Thêm TT thanh toán',
                    'link'  => url('/user-tool/add-pay'),
                    'conditionOpen' => ['handlePay'],
                ]
            ]
        ];

        $menu['user'] = [
                'label'   => 'Thành viên',
                'icon'    => '<i class="material-icons md-36">&#xE87C;</i>',
                'conditionOpen' => ['Frontend\UserController'],
                'display' => '',
                'submenu' => [
                    [
                        'label' => 'Quản lý thành viên',
                        'link'  => url('/user-tool/manage-user'),
                        'conditionOpen' => ['manageUsers'],
                    ],
                    [
                        'label' => 'Thêm thành viên',
                        'link'  => url('/user-tool/add-user'),
                        'conditionOpen' => ['handleUser'],
                    ]
                ]
        ];

        $menu['config'] = [
            'label'   => 'Cài đặt',
            'icon'    => '<i class="material-icons md-36">settings</i>',
            'conditionOpen' => ['Backend\LogsController', 'Backend\SettingsController'],
            'display' => '',
            'submenu' => [
                [
                    'label' => 'Cài đặt chung',
                    'link'  => url('/atl-admin/settings'),
                    'conditionOpen' => [],
                ],
                [
                    'label' => 'Logs',
                    'link'  => url('/atl-admin/logs'),
                    'conditionOpen' => ['manageLogs'],
                ]
            ]
        ];

        return $menu;
    }

    /**
     * Render menu html.
     * 
     * @return string
     */
    public function menuNav(){   
        $control = self::$route['_controller'];
        $action  = self::$route['_action'];
    ?>
    <div class="menu_section">
        <ul>
            <?php 
            foreach ( $this->dataMenu() as $key => $value ): 
            $ruleDisplay = $this->menuService;
            if( !in_array( $key, $ruleDisplay ) ) :
            ?>

            <?php if( !isset( $value['submenu'] ) && 'none' !== $value['display'] ): ?>
            <li <?php echo ( in_array( $control, $value['conditionOpen'] ) ) ? 'class="current_section"' : '' ?> title="Dashboard">
                <a href="<?php echo $value['link'] ?>">
                    <span class="menu_icon"><?php echo $value['icon'] ?></span>
                    <span class="menu_title"><?php echo $value['label'] ?></span>
                </a>
            </li>
            <?php endif; ?>

            <?php if( isset( $value['submenu'] ) && 'none' !== $value['display'] ): ?>
            <li <?php echo ( in_array( $control, $value['conditionOpen'] ) ) ? 'class="current_section submenu_trigger act_section"' : '' ?>>
                <a href="#">
                    <span class="menu_icon"><?php echo $value['icon'] ?></span>
                    <span class="menu_title"> <?php echo $value['label'] ?></span>
                </a>
                <ul <?php echo ( in_array( $control, $value['conditionOpen'] ) ) ? 'style="display: block;"' : '' ?>>
                    <?php foreach ($value['submenu'] as $submenu): ?>
                    <li <?php echo ( in_array( $action, $submenu['conditionOpen'] ) ) ? 'class="act_item submenu_trigger act_section"' : '' ?>>
                        <a href="<?php echo $submenu['link'] ?>"> 
                            <?php echo $submenu['label'] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>  
        </ul>
    </div>
    <?php
    }

    public function serviceMenu(){
        ?>

        <style type="text/css">
            ul.atl-menu-service { display: inline-block; width: 100%; }
            ul.atl-menu-service li { display: inline-block; width: 32.33%;}
            ul.atl-menu-service li a{ display: inline-block; padding-top: 15px; padding-bottom: 15px; }
            ul.atl-menu-service li:hover{background-color: #1976d2;}
            ul.atl-menu-service li:hover a .uk-text-muted{color: white !important; }
            ul.atl-menu-service li:hover a i{color: white !important; }
        </style>
        <div class="uk-grid uk-dropdown-grid" data-uk-grid-margin>
            <div class="uk-width-2-3">
                <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-top uk-margin-bottom uk-text-center" data-uk-grid-margin>
                    <ul class="atl-menu-service" data-uk-tab="{connect:'#tabs_6'}">
                        <?php 
                        foreach ( $this->dataMenu() as $key => $value ): 
                        $ruleDisplay = $this->menuService;
                        if( in_array( $key, $ruleDisplay ) ) :
                        ?>
                        <li>
                            <a href="#">
                               <?php echo $value['icon'] ?>
                                <span class="uk-text-muted uk-display-block"><?php echo $value['label'] ?></span>
                            </a>
                        </li>
                        <?php endif; endforeach; ?>
                    </ul> 
                </div>
            </div>
            <div class="uk-width-1-3">
                <ul id="tabs_6" class="uk-switcher">
                    <?php 
                    foreach ( $this->dataMenu() as $key => $value ): 
                    $ruleDisplay = $this->menuService;
                    if( in_array( $key, $ruleDisplay ) ) :
                    ?>
                    <li>
                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                            <li class="uk-nav-header">
                                <?php echo $value['label'] ?>
                            </li>
                             <?php foreach ($value['submenu'] as $submenu): ?>
                            <li>
                               <a href="<?php echo $submenu['link'] ?>"> <?php echo $submenu['label'] ?> </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endif; endforeach; ?>
                </ul>

            </div>

        </div>
        <?php
    }
}

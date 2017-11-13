<?php
namespace App\Http\Controllers\Frontend;

use Atl\Foundation\Request;
use Atl\Validation\Validation;
use App\Http\Components\Frontend\Controller as baseController;

use App\Model\BuyModel;
use App\Model\TokenModel;
use App\Model\ServiceModel;
use App\Http\Components\ApiPackageService;

class ShellController extends baseController
{
    public function __construct() {
        parent::__construct();

        $this->mdBuy = new BuyModel;
        $this->mdToken = new TokenModel;
        $this->mdService = new ServiceModel;

        $this->apiBuyCheck = ApiPackageService::getInstance();

    }

    public function action(Request $request){
        $listBuy = $this->mdBuy->getBy('buy_type', 'auto'); // list row auto
        $sec = "1";

        $startAction = $request->get('startAction');
        $startUid = 0;
        if($startAction < count($listBuy) ) : // start action <= count listbuy thì mới chạy
            $infoBuy = $listBuy[$request->get('startAction')]; // lấy ra row dữ liệu tương ứng với start action
            echo 'ID FB : '.$infoBuy['buy_fb'] . ' -- ';
            // Cái này ông không cần đông vào nhé.
            //$infoService = $this->mdService->getBy('id', $infoBuy['buy_packet']);

            // $accessToken = $this->mdToken->getLinmitbyType(0, 1, 1);
            // $listPost = $this->getPostUser($infoBuy['buy_fb'], $infoService[0]['metaDate']['post_limit'], $accessToken[0]['token']);

            $checkBuy = json_decode($this->apiBuyCheck->checkStatusPackage($infoBuy['id']), true);
            if( $checkBuy['expire'] ):
                //kiểm tra tài khoản đã dùng đủ số lần giới hạn trong ngày?
                $limitPost = $this->mdService->getMetaData( $infoBuy['buy_packet'], 'post_limit' );
                if ( $infoBuy['buy_run_day'] < $limitPost ):
                    $argsIDTest = $this->argsIDTest();
                    $startUid = ( $request->get('startUid') ) ? $request->get('startUid') : $startUid;
                    if ( $startUid < count($argsIDTest) ):
                        $argsPost = ( $infoBuy['buy_posts'] != null ) ? json_decode( $infoBuy['buy_posts'], true ) : [];
                        // kiểm tra post đã được like,comment hay chưa?
                        if ( !in_array( $argsIDTest[ $startUid ], $argsPost ) ):
                            // xử lý tăng like
                            echo $argsIDTest[ $startUid ];
                            // thêm post ID đã like vào array
                            array_push( $argsPost, $argsIDTest[ $startUid ] );
                            //lưu vào CSDL
                            $this->mdBuy->save( 
                                [
                                    'buy_posts' => json_encode( $argsPost ),
                                ],
                                $infoBuy['id']
                            );
                        else:
                            echo 'ĐÃ LIKE RỒI';
                        endif;
                        $startUid = $startUid + 1; // tự động + thêm 1
                    else:
                        $startUid = 0;
                        $startAction = $startAction + 1; // tự động + thêm 1
                        // cập nhật +1 số lần post/ ngày
                        $this->mdBuy->save( 
                            [
                                'buy_run_day' => $infoBuy['buy_run_day'] + 1,
                            ],
                            $infoBuy['id']
                        );
                    endif;
                else:
                    echo 'LIMIT POST IN DAY  ---   ';
                    $startAction = $startAction + 1; // tự động + thêm 1
                endif;
                ?>
                    <html>
                        <head>
                        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo url('/user-tool/auto-cronjob?startAction='.$startAction. '&startUid='. $startUid)?>'">
                        </head>
                        <body>
                        <?php
                            echo "Watch the page reload itself in 10 second!";
                        ?>
                        </body>
                    </html>
                <?php
            endif;
        endif;
    }

    public function getPostUser($uid, $limit, $token){

        $versionApi = 'v2.11';
        $data = @file_get_contents('https://graph.facebook.com/'.$versionApi.'/'.$uid.'?fields=posts.limit('.$limit.')&access_token='.$token);
        $listData = json_decode($data, true);

        $argsPostIds = [];
        if( is_array($listData) ) {
            foreach ($listData['posts']['data'] as $posts) {
                $argsPostIds[] = $posts['id'];
            }
        }
        return $argsPostIds;
    }

    public function argsIDTest(){
        // return [
        //     '268984651355_79874654616',
        //     '265456456456_79874654616',
        //     '262323232234_79874654616',
        //     '269898989898_79874654616',
        // ];
        return [
            '1111',
            '2222',
            '3333',
            '4444',
        ];
    }
}

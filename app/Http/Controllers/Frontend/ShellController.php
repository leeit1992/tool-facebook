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
        $startUid = ( $request->get('startUid') ) ? $request->get('startUid') : 0;
        $sttCount = ( $request->get('sttCount') ) ? $request->get('sttCount') : 0;
        if($startAction < count($listBuy) ) : // start action <= count listbuy thì mới chạy
            $infoBuy = $listBuy[$request->get('startAction')]; // lấy ra row dữ liệu tương ứng với start action
            echo 'ID FB : '.$infoBuy['buy_fb'] . ' -- ';
            // Cái này ông không cần đông vào nhé.
            //$infoService = $this->mdService->getBy('id', $infoBuy['buy_packet']);

            // $accessToken = $this->mdToken->getLinmitbyType(0, 1, 1);
            // $listPost = $this->getPostUser($infoBuy['buy_fb'], $infoService[0]['metaDate']['post_limit'], $accessToken[0]['token']);

            $checkBuy = json_decode($this->apiBuyCheck->checkStatusPackage($infoBuy['id']), true);

                if ( $checkBuy['expire'] && $checkBuy['limit'] ):
                    $argsIDTest = $this->argsIDTest();
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
                            $sttCount = 1;
                        else:
                            echo 'ĐÃ LIKE RỒI';
                        endif;
                        $startUid = $startUid + 1; // tự động + thêm 1
                    else:
                        $infoBuy['buy_run_day'] = ( $infoBuy['buy_used_day'] != date("Y-m-d") ) ? 0 : $infoBuy['buy_run_day'];
                        if ( $sttCount == 1) {
                            $this->mdBuy->save( 
                                [
                                    'buy_run_day' => $infoBuy['buy_run_day'] + 1,
                                    'buy_used_day' => date("Y-m-d")
                                ],
                                $infoBuy['id']
                            );
                        }
                        $startUid = 0;
                        $sttCount = 0;
                        $startAction = $startAction + 1; // tự động + thêm 1
                    endif;
                else:
                    echo 'LIMIT POST IN DAY  ---   ';
                    $startAction = $startAction + 1; // tự động + thêm 1
                endif;
                ?>
                    <html>
                        <head>
                        <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo url('/user-tool/auto-cronjob?startAction='.$startAction. '&startUid='. $startUid. '&sttCount='. $sttCount)?>'">
                        </head>
                        <body>
                        <?php
                            echo "Watch the page reload itself in 10 second!";
                        ?>
                        </body>
                    </html>
                <?php
        endif;
    }

     public function action2(Request $request){
        $listBuy = $this->mdBuy->getBy('buy_type', 'auto');

        for ($i=0; $i < count($listBuy); $i++) { 
            $infoBuy = $listBuy[$i]; // gán thông tin gói
            print_r($infoBuy);

            $checkBuy = json_decode($this->apiBuyCheck->checkStatusPackage($infoBuy['id']), true); // kiểm tra gói còn thời hạn sử dụng không
            
            if ( $checkBuy['expire'] && $checkBuy['limit'] ) {
                $argsIDTest = $this->argsIDTest2();
                // lấy danh sách ID post đã like, cooment
                $argsPost = ( $infoBuy['buy_posts'] != null ) ? json_decode( $infoBuy['buy_posts'], true ) : [];
                $statusInsert = false; // thiết lập trạng thái thêm like,comment
                for ($j=0; $j < count( $argsIDTest ); $j++) {
                    if ( !in_array( $argsIDTest[ $j ], $argsPost ) ) {
                        echo $argsIDTest[ $j ] .' - ';
                        array_push( $argsPost, $argsIDTest[ $j ] );
                        //lưu vào CSDL
                        $statusInsert = true; // đã thêm  
                    } else {
                        echo ' - Đã like - ';
                    }
                }
                $infoBuy['buy_run_day'] = ( $infoBuy['buy_used_day'] != date("Y-m-d") ) ? 0 : $infoBuy['buy_run_day'];
                if ( $statusInsert ) { //tăng số lần sử dụng trong ngày
                    $this->mdBuy->save( 
                        [
                            'buy_run_day'  => $infoBuy['buy_run_day'] + 1,
                            'buy_posts'    => json_encode( $argsPost ),
                            'buy_used_day' => date("Y-m-d")
                        ],
                        $infoBuy['id']
                    );
                }
            } else {
                echo 'full';
            }
        }
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
     public function argsIDTest2(){
        // CAI NAY LÀ DỮ LIỆU DEMO.. CÒN ĐƯA VÀO SỬ DỤNG THÌ TÔI SẼ QUERY TỪ DB CỦA FB ĐỂ LẤY SỐ LƯỢNG BÀI VIẾT TÙY THEO GÓI.

        // VD USER ĐĂNG KÝ LÀ 1110000 TÊN LÀ NGỌC
        // MUA GOI CB100 => 100 LIKE/ 1 BÀI GIỚI HẠN 5 BÀI TRÊN ngày
        // GIỚI HẠN 5 BÀI NGHĨA LÀ DÙ 1 NGÀY THẰNG ĐÓ CÓ ĐĂNG 10 BÀI VIẾT LÊN TƯỜNG. THÌ TÔI CÓ QUERY RA 10 BÀI CỦA NÓ NHƯNG CHỈ XỬ LÝ 5 BÀI THÔI.

        // SỐ CÒN LẠI KO TÍNH CHO NGÀY HÔM SAU. NGÀY NÀO TÍNH POST CỦA BÀI ĐÓ. VD MAI NÓ CÓ 2 BÀI POST LÊN TƯỞNG. THÌ CHỈ LẤY 2 BÀI ĐÓ THÔI VÀ KO LẤY 5 BÀI CHƯA ĐƯỢC XỬ TỪ HÔM TRƯỚC 

        // TÔI SẼ DÙNG QUERY FB DỂ LẤY RA NHƯNG BÀI TRONG NGÀY CỦA NÓ. VÀ XỬ LÝ. CÁI ARRAY BÊN DƯỚI LÀ DEMO ĐẤY. SẼ TRẢ VỀ ID BÀI VIETS 
        return [
            '111',
            '222',
            '333',
            '444'
        ];
    }
}
// gioi han la 5/ ngay dung ko.. gio snag ngay moi xem nao
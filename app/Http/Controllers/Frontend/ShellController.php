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
        $listBuy = $this->mdBuy->getBy('buy_type', 'auto');
     
        $sec = "1";

        $startAction = $request->get('startAction')+ 1;
        if($startAction <= count($listBuy) ) :
            $infoBuy = $listBuy[$request->get('startAction')];
            $accessToken = $this->mdToken->getLinmitbyType(0, 1, 1);

            $infoService = $this->mdService->getBy('id', $infoBuy['buy_packet']);

            // $listPost = $this->getPostUser($infoBuy['buy_fb'], $infoService[0]['metaDate']['post_limit'], $accessToken[0]['token']);

            $checkBuy = json_decode($this->apiBuyCheck->checkStatusPackage($infoBuy['id']), true);
            if( $checkBuy['expire'] ):
           
        ?>
        <html>
            <head>
            <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo url('/user-tool/auto-cronjob?startAction='.$startAction)?>'">
            </head>
            <body>
            <?php
                echo "Watch the page reload itself in 10 second!";
            ?>
            </body>
        </html>
        <?php
        endif; endif;
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
}

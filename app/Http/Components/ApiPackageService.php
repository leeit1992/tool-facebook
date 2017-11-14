<?php
namespace App\Http\Components;
use App\Model\BuyModel;
use App\Model\ServiceModel;

class ApiPackageService
{
    /**
     * $getInstance - Support singleton module.
     *
     * @var null
     */
    private static $getInstance = null;

    private function __wakeup() {}

    private function __clone( ) {}

    private function __construct() {}

    public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
    }

    public function checkStatusPackage( $id ) {
        $mdBuy = new BuyModel;
        $mdService = new ServiceModel;

        $status = [];
        $status['expire'] = true;
        $status['limit'] = true;
        $countUsed = 0;
        $infoBuy = $mdBuy->getBy( 'id', $id );

        $date = $this->countDay( $infoBuy[0]['buy_created'], date("Y-m-d H:i:s") );
        if ( $date > $infoBuy[0]['buy_date']*30 ) {
            $status['expire'] = false;
        }
        if ( !$status['expire'] ) {
            return json_encode( $status );
        }
        $post_limit = $mdService->getMetaData( $infoBuy[0]['buy_packet'], 'post_limit' );
        if ( $infoBuy[0]['buy_used_day'] == date("Y-m-d") ) {
            $countUsed = $infoBuy[0]['buy_run_day']; 
        }
        if ( $countUsed >= $post_limit ) {
            $status['limit'] = false;
        }

        return json_encode( $status );
    }

    public function countDay( $startDate, $endDate ) {
        $startTimeStamp = strtotime( $startDate );
        $endTimeStamp = strtotime( $endDate );

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff/86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);

        return $numberDays;
    }
}

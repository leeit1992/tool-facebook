# atl-framework
Framework MVC for team

## Get Started

[Composer Download](https://getcomposer.org/doc/00-intro.md).

``` bash
$ composer install
```

Library PHP
``` bash
PATH: travel\app\Http\Components\Library

$ composer install
```

## Use API get Car;

``` php

use App\Http\Components\ApiCar;

$apiCar = ApiCar::getInstance();

// get info car by length
// $id : key of car
$apiCar->getinfoCar( $id );

// get price car by type and length
// $id : key of car (number)
// $length : Length of distance km (number)

$apiCar->getCarPrice( $id, $length);

// get all car
$apiCar->getAllCar();

```

## Use API get Partner by Service;

``` php

use App\Http\Components\ApiPartner;

$apiPartner = ApiPartner::getInstance();

// $service : name service (string) -- ex: car,hotel,...
$apiPartner->getPartnerByService( $service );

```

## Use API get Orther Service;

``` php

use App\Http\Components\ApiOtherService;

$apiOtherService = ApiOtherService::getInstance();

//  Get list other service
$apiOtherService->getListOtherServiceBy();

//  Get list other service by partner 
$apiOtherService->getListOtherServiceBy($id);

//  Get prince other service by id  
$apiOtherService->getPrinceOtherServiceById($id);

//  Get list meta other service by id 
$apiOtherService->getMetaOtherServiceById($id);

```


## Use API related Cruise;

``` php

use App\Http\Components\ApiCruise\ApiCruise;

$apiCruise = ApiCruise::getInstance();

//  Get roomtypes by id cruise
$apiCruise->getRoomTypesByCruise($id);

//  Get Extra Price  by id RoomType
$apiCruise->getExtraPriceByRoomType($id);

//  Pricing Room type 
$apiCruise->pricingRoomType( $data );

// ex:
//   $data = [
//         'id'    => 19,
//         'price' => [
//                        'roomtype'  =>  [
//                                        'day'    => 9,
//                                        'name'   => 'single'
//                                    ],
//                        'extra' =>  [
//                                       ['title' => 'wifi',
//                                          'unit'   => 2],
//                                        ['title' => 'water leave',
//                                          'unit'   => 2]
//                                    ]
//                    ]
//       ];
```

## Use API related Accomodation;

``` php

use App\Http\Components\ApiAccomodation\ApiAccomodation;

$apiAccomodation = ApiAccomodation::getInstance();

//  Pricing Room type 
$apiAccomodation->pricingRoomType( $data );

// ex:
//   $data = [
//         'id'    => 19,
//         'price' => [
//                        'roomtype'  =>  [
//                                        'day'    => 9,
//                                        'name'   => 'single'
//                                    ],
//                        'extra' =>  [
//                                       ['title' => 'wifi',
//                                          'unit'   => 2],
//                                        ['title' => 'water leave',
//                                          'unit'   => 2]
//                                    ]
//                    ]
//       ];
```

## Use API related Booking;

``` php

use App\Http\Components\ApiBooking\ApiBooking;

$apiBooking = ApiBooking::getInstance();

//  Pricing Booking for all Service 
$apiBooking->pricingBooking( $id );
// $id (int) : key id of booking
```
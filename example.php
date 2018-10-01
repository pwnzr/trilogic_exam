<?php

require_once('vendor/autoload.php');
require_once('generated-conf/config.php');
date_default_timezone_set('Europe/Ljubljana');
// PropelORM is ready for use.
// Your code goes here ...

//naročila na dan 1.8.2018
$searchDate  = '2018-08-01';
$orderDay = OrdersQuery::create()
	->filterByDate(array("min" => $searchDate. " 00:00:00", "max" => $searchDate. " 23:59:59"))
	->find();
$izpis = "Vsa naročila na dan 1.8.2018: \n" . $orderDay;
//naročila uporabnika z ID 2
$orderUser = OrdersQuery::create()
	->filterByUserId(2)
	->find();
$izpis .= "\nVsa naročila uporabnika z ID 2: \n" . $orderUser;
//naročila s statusom 3 in uporabnikom 2
$orderStatus = OrdersQuery::create()
	->filterByStatus(3)
	->filterByUserId(2)
	->find();
$izpis .= "\nVsa naročila s statusom 3 in uporabnikom 2:\n" . $orderStatus ;
//vsa naročila z vrednostjo nad 10
$ordersOver = OrdersQuery::create()
	->filterByValue(array('min' => 10))
	->find();
$izpis .= "\nVsa naročila z vrednostjo nad 10:\n" . $ordersOver;
//vsoto vrednosti vseh naročil, po datumu
$ordersSum = OrdersQuery::create()
	->withColumn('SUM(Value)')
	->groupBy('Date')
	->find();
$izpis .= "\nVsota vseh naročil po datumu:\n" . $ordersSum;
//izpis queryjev
echo $izpis . "\n\n";

//preračunavanje razdalje

//izpis krajev in restavracij iz tabele orders


$test = OrdersQuery::create()                                     
	->select(array('Id','UserId','RestaurantId','AddressId','Value','Date','Status'))
	->find();
	

foreach ($test as $testIds){
	$testOne = OrdersQuery::create()                                   
	->filterById($testIds['Id'])
	->find();
	$restaurantId = $testIds['RestaurantId'];
	$addressId = $testIds['AddressId'];
	$restaurantLat = RestaurantsQuery::create()
		->filterById($restaurantId)
		->select('Lat')
		->find();
	$restaurantLng = RestaurantsQuery::create()
		->filterById($restaurantId)
		->select('Lng')
		->find();
	$addressLat = AddressesQuery::create()
		->filterById($addressId)
		->select('Lat')
		->find();
	$addressLng = AddressesQuery::create()
		->filterById($addressId)
		->select('Lng')
		->find();
	$restaurants =RestaurantsQuery::create()
		->filterById($restaurantId)
		->select(array('Id','Name','Lat','Lng'))
		->find();

	$lat1 = (float)$restaurantLat[0];
	$lng1 = (float)$restaurantLng[0];
	$lat2 = (float)$addressLat[0];
	$lng2 = (float)$addressLng[0];	

	$distances = new Restaurants();
	
	if ($distances->latLngToDistance($lat1,$lng1,$lat2,$lng2) >= 2000){
		echo 'Naročilo je izven radija dostave:' . $testOne;	
	}

}









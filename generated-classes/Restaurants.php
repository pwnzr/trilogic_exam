<?php

use Base\Restaurants as BaseRestaurants;

/**
 * Skeleton subclass for representing a row from the 'restaurants' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */

class Restaurants extends BaseRestaurants //15
{
	/**
	* Calculate the distance between two points.
	* @param $lat1 float Latitude of point 1.
	* @param $lng1 float Longitude of point 1.
	* @param $lat2 float Latitude of point 2.
	* @param $lng2 float Longitude of point 2.
	* @return float Distance in meters
	*/	
	/*public function addressLat()
	{
		$addressId = OrdersQuery::create()                                      
			->orderByDate()
			->select('AddressId')
			->find();	
		$lat2 = AddressesQuery::create()
			->filterById($addressId)
			->select('lat')
			->find();
	}
	public function addressLng()
	{
		$addressId = OrdersQuery::create()                                      
			->orderByDate()
			->select('AddressId')
			->findOne();	
		$lng2 = AddressesQuery::create()
			->filterById($addressId)
			->select('lat')
			->find();
	}*/

	public function latLngToDistance($lat1, $lng1, $lat2, $lng2)
	{
		
		$north = ($lat2 - $lat1) * 110574;
		$mean_lat = ($lat2 + $lat1) / 2.0;
		$east = ($lng2 - $lng1) * 111320 * cos($mean_lat / 180.0 * pi());
		return sqrt(pow($north, 2) + pow($east, 2));
		

	}

	

}

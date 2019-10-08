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
	public $id;
	public $name;
	public $lat1;
	public $lng1;
	public static $number_of_restaurants = 0;
	public function setRestaurant($id,$name,$lat,$lng){
		$this-> id = $id;
		$this-> name = $name;
		$this-> lat1 = $lat;
		$this-> lng1 = $lng;
		Restaurants::$number_of_restaurants++;
		//echo 'Ime restavracije je:' . $this-> name = $name . ' in leži na kordinatah: ' . $this-> lat1 . '; ' . $this-> lng1 = $lng;
	} 


	public function latLngToDistance($addr_id,$address, $lat2, $lng2)
	{
		
		$north = ($lat2 - $this-> lat1) * 110574;
		$mean_lat = ($lat2 + $this-> lat1) / 2.0;
		$east = ($lng2 - $this-> lng1) * 111320 * cos($mean_lat / 180.0 * pi());
		if( sqrt(pow($north, 2) + pow($east, 2)) < 2000 ) {
			return true;
		} else {
			//echo 'Naslov ' . $address . ' ni znotraj radija dostave ' . $this-> name . '. Radij je' . sqrt(pow($north, 2) + pow($east, 2)) . "\n";
			return false;
		};
	}

	

}

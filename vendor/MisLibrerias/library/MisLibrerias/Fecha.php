<?php
namespace MisLibrerias;

class Fecha {

	static function getFecha() {
		//return date("m-d-Y");
		
		$format = 'd-m-Y';
		$date = \DateTime::createFromFormat($format, date("d-m-Y"));
		return  $date->format('d-m-Y') ;
		
	}
	static function formatFechaDMY($date) {
		//return date("m-d-Y");


		if($date != ""){
			$date = new \DateTime($date);
			return  $date->format('d-m-Y') ;
		}else{
			return "";
		}



	}

}

?>
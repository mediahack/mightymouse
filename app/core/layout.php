<?php
/**
 * Layout
 *
 * Provides utilities for layouts
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class Layout{

	public function __construct($cfg = null){
		$_cfg = !empty($cfg) ? '\App\Config\\'.$cfg : '\App\Config\Main'; 
		$this->config = new $_cfg;
	}

	/**
	* This allows you to load partial PHP layouts into your main layout
	* 
	* @param 	String 	$inc 	Name of the partial file to load
	**/
	public static function partial($inc){

		ob_start();
		include BASE_DIR . '/layout/' . $inc . '.php';
		$part = ob_get_contents();
		ob_end_clean();
		
		return $part;
		
	}	
}

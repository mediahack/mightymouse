<?php
/**
 * Config
 *
 * Common utils and functions
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace app\core;

class Config{

	/**
	* Returns the config array value specified
	*
	* @param 	String 	$name 	The name of the config file to load
	* @return 	Array 	$array 		The config associative array from the file	
	**/
	static public function load($name){
		return include __DIR__ . '/../config/' . $name . '.php';
	}

}
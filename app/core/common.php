<?php
/**
 * Common
 *
 * Common utils and functions
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class Common{

	/**
	* This function vomits out the value of the subject in a readable form.
	* 
	* @param 	Mixed 	$obj 	The subject we wish to inspect
	**/
	static public function dump($obj){
		echo '<pre>'; 
		print_r($obj);
		exit();
	}	

	/**
	* Print our the memory being used by the current request
	**/
	static public function usage(){
		echo '\n<b>Memory Usage</b><pre>' . 
		number_format(memory_get_usage() - START_MEMORY_USAGE) . ' bytes\n'.
		number_format(memory_get_usage()) . ' bytes (process)\n' .
		number_format(memory_get_peak_usage(TRUE)) . ' bytes (process peak)\n' .
		'</pre><b>Execution Time</b><pre>'.
		round((microtime(true) - START_TIME), 5) . ' seconds</pre>';
	}

	/**
	 * Create a random 32 character MD5 token
	 *
	 * @return string
	 */
	public function token(){
		return md5(str_shuffle(chr(mt_rand(32, 126)) . uniqid() . microtime(TRUE)));
	}
}

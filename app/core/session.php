<?php
/**
 * Session
 *
 * Session setup and management 
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class Session{

	/**
	* Constructor. Sets up our session and applies any config values passed in.
	**/
	public function __construct($name = null, $cache_expire = null, $start = false){
		$this->start();

		if(!empty($name)) session_name($name);
		if(!empty($timeout)) session_cache_expire($cache_expire);

	}

	/**
	* Starts the session
	**/
	public function start(){
		session_start();
	}

	/**
	* Destroys the session
	**/
	public function destroy(){
		session_destroy();
	}
}
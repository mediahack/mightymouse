<?php
/**
 * Error
 *
 * Provide basic error management.
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class Error{
	
	static public function Message($msg, $kill = null){
		if( $kill == 'kill' )
			Common::dump($msg);
		else 
			error_log($msg);
	}

	static public function e404(){
		include __DIR__ .'../../view/error/404.php';
		exit();
	}
}
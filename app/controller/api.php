<?php
/**
 * API
 *
 * This is a controller to provide some RESTFUL API calls and such.
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Controller;

class Api extends \App\Core\Controller{

	public function __construct(){
		$this->layout = null;
		header('Content-type: application/json');
	}

	public function indexAction(){

		exit;
	}

}

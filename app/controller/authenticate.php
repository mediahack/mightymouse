<?php
/**
 * Authenticate
 *
 * A lot of web apps have some kind of authentication needs. Fullfill them here!
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Controller;

class Authenticate extends \App\Core\Controller{

	public function indexAction(){
		$this->loginAction();
	}

	public function loginAction(){
		// Your auth code here.
	}

	public function logoutAction(){
		$sess = new \App\Core\Session;
		$sess->destroy();
		header('location: /');
	}

}

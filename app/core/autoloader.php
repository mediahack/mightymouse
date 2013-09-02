<?php
/**
 * AutoLoader
 *
 * Simple autoloader and register class
 *
 * @package		XENG-MVC
 * @author		Ed DeCoste
 * @copyright	(c) 2012 XENG-MVC Framework
 * @license		MIT
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class AutoLoader{

	public function __construct(){
		$this->register();
	}

	public function register(){
		$inc = get_include_path() .
			PATH_SEPARATOR . BASE_DIR . '/../' .
			PATH_SEPARATOR . BASE_DIR . '/../vendor/' ;

		set_include_path($inc);
		spl_autoload_extensions('.php');
		spl_autoload_register();

		return $this;
	}
}

<?php
/**
 * Dispatcher
 *
 * This builds your routes and dispatches the users requests
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class Dispatcher{

	/**
	* Main entry point of the dispatcher
	* 
	* @param 	Mixed 	$config 	The config object to pass to our controller
	**/
	static public function go($config){
		
		$router = new \App\Core\Router;

		$className = $router->setController();

		$controller = new $className($config);
				
		// These are the name aliases for controller and action
		$c = strtolower($router->controller);	
		$a = $router->action;
		$actionMethod = $a . 'Action';

		if(method_exists($controller, $actionMethod)){
			
			$params = $router->params();	
			
			$controller
				->init()
				->setParams($params)
				->$actionMethod();

			if(is_dir(__DIR__ . '/../view/'.$c)){

				if(file_exists(__DIR__ . '/../view/'.$c.'/'.$a.'.php')){

					new View($controller, $c, $a);

					if(DEBUG)
						\App\Core\Common::usage();
				}
			}	
			else{
				#exit('View ');
			}
		}
		else{
			throw new \Exception('Invalid Request Method: ' . $actionMethod);
		}
			
		return;
		
	}
}
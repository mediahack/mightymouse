<?php
/**
 * Router
 *
 * This is the router for all our application front controller requests
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class Router{

	private $routes;
	public $controller;
	public $controllerName;
	public $action;
	public $actionName;

	/**
	* Most of the heavy lifting and setup.
	**/
	public function __construct(){
		// Lets load the main configuration file
		$config = new \App\Config\Main;
		#\App\Core\Common::dump($config);

		// This gets sets our URL property to an array based on our get string URL parameter
		// forwarded in by our web servers rewrite rules
		$this->url = (isset($_GET['url'])) ? explode('/', $_GET['url']) : array();

		if( !empty($this->url) && $config->root == $this->url[0]) array_shift($this->url);
		#else{ exit('not root '. $this->url[0]); }

		// and now we load the routes
		$this->routes = \App\Core\Config::load('routes'); 

		// sets the defaults
		if(empty($this->url)){
			$this->controller = (isset($this->routes['default']['c'])) ? strtolower($this->routes['default']['c']) : 'index';
			$this->action = (isset($this->routes['default']['a'])) ? strtolower($this->routes['default']['a']) : 'index';
		}
		else{
			$this->controller = (isset($this->url[0]) && !empty($this->url[0])) ? strtolower($this->url[0]) : 'index'; // controller
			$this->action = (isset($this->url[1]) && !empty($this->url[1])) ? strtolower($this->url[1]) : 'index'; // action
		}

		// check the requested controller
		$this->checkAlias($this->controller, $this->action);
	}

	/**
	* Checks to see if our Controller+Action are aliases so we can map them
	* to the desired Controller+Action.
	*
	* @param 	String 	$aliasController 	Name of the Aliased controller
	* @param 	String 	$aliasAction	 	Name of the Aliased action
	**/
	public function checkAlias($aliasController, $aliasAction){

		foreach($this->routes as $key => $vals){
			if($key == $aliasController){
				if(array_key_exists('c', $vals) && array_key_exists('a', $vals)){
					$this->controller = $vals['c'];
					$this->action = $vals['a'];
				}
				else{
					foreach($vals as $sKey => $sVals){
						if($sKey == $aliasAction){
							$this->controller = $sVals['c'];
							$this->action = $sVals['a'];
						}
					}
				}
			}
		}

		return $this;
	}

	/**
	* This creates a params property that consist of the GET string key/value pairs without
	* the controller and action.
	**/
	public function params(){
		// These 2 lines remove our route from the params
		if( isset($this->url[0]) && $this->url[0] == $this->controller ) array_shift($this->url);
		if( isset($this->url[0]) && $this->url[0] == $this->action ) array_shift($this->url);

		$this->params = $this->url;

		return $this->params;
	}

	/**
	* Sets the active controller
	**/
	public function setController(){

		try{
			$className = '\App\Controller\\'.ucfirst($this->controller);	

			if( empty($this->controller) || !class_exists($className)){
				#\App\Core\Common::dump($this->url);
				#throw new \Exception('invalid controller set.');	
				header('HTTP/1.0 404 Page Not Found');
				\App\Core\Error::e404();
			}

			return $className;
		}
		catch(\LogicException $e){
			#header('HTTP/1.0 404 Page Not Found');
			\App\Core\Error::e404();
			exit($e->getMessage());
		}
		catch(\Exception $e){
			exit($e->getMessage());
		}
	}

}
<?php
/**
 * View
 *
 * Template View class for building, rendering and managing
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Core;

class View{

	/**
	* Constructor
	*
	* @param Object $controller The controller class object
	* @param String $c	 The name of the controller
	* @param String $a 	The name of the action
	**/
	public function __construct($controller, $c, $a){
		$this->controller = $controller;
		$this->controllerName = $c;
		$this->actionName = $a;
		$this->set();
		$this->render();
	}

	/**
	* The render function puts together the layout, css, js and controller action 
	* content.
	**/
	public function render(){

		$config = $this->controller->config;
		$css = $this->controller->css;
		$js = $this->controller->js;

		ob_start();
		include __DIR__ . '/../view/'.$this->controllerName.'/'.$this->actionName.'.php';
		$contents = ob_get_contents();
		ob_end_clean();

		ob_get_flush();

		if(!empty($this->controller->layout)){
			include __DIR__ . '/../layout/'.$this->controller->layout.'.php';	
		}
		else{
			echo $contents;
		}
	}

	/**
	* This makes controller properties available to the view object
	**/
	public function set(){
		foreach((array)$this->controller as $k => $v){
			$this->$k = $v;
		}

		return $this;
	}

}
<?php
/**
 * Controller
 *
 * Base controller functionality. All controllers extend this class.
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */

namespace App\Core;

class Controller{
	
	public $view;
	public $params;
	public $config;
	public $layout = 'main';
	public $css;
	public $js;

	/**
	* @param 	Array 	$url 	The Query String used to call the Controller
	**/
	public function __construct($config = null){
		
		$this->config = !empty($config) ? $config : new \App\Config\Main;
	}

	public function indexAction(){
		$this->view->message = 'Default Application Controller';
	}

	/**
	* Main function is to initialize the view property
	**/
	public function init(){
		$this->view = new \stdClass;
		return $this;
	}

	/**
	* Sets params property. Params are typically the URL GET params
	**/
	public function setParams($params){
		$this->params = $params;
		return $this;
	}

	/**
	* This includes a CSS file by URL into the page layout
	*
	* @param 	String 	$src 	The URL to the CSS file 
	**/
	public function css($src){
		$this->css .= '<link rel="stylesheet" href="' . $src . '">' . "\n";
		return $this;
	}

	/**
	* This includes a JS file by URL into the page layout. If the
	* type is anything other than link then it writes the contents 
	* of the source JS file into to the view template wrapped in a 
	* script tag.
	*
	* @param 	String 	$src 	The URL to the CSS file 
	* @param 	String 	$type 	Type of embed to use
	**/
	public function js($src, $type = 'link'){
		if($type == 'link')
			$this->js .= '<script src="' . $src . '"></script>' . "\n";
		else{
			ob_start();
			include PUBLIC_DIR . $src;
			$this->js .= '<script>' . ob_get_contents() . '</script>';
			ob_end_clean();
		}

		return $this;
	}

	/**
	* Outputs the view buffer
	*
	* @param 	String 	$format 	This determines the HEADER and mime type we're rendering
	**/
	public function output($format = null){
		switch($format){
			case 'json':
				return \json_encode($this->view);
			default:
				return $this->view;	
		}
	}
}

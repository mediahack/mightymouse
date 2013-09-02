<?php
/**
 * Main Config
 *
 * This provides an main configuration entry point for your app
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
namespace App\Config;

class Main extends \App\Core\Config{

	public function __construct(){
		$this->root = '/';
		$this->name = 'MightyMouse PHP MVC Framework'; 
		$this->company = "Supersonic Bionic, LLC";
		$this->description = "This is where we make all the things";
		$this->session_name = 'MM_SESSION';
		$this->session_timeout = 15;

		$this->site = new \stdClass;
		$this->site->domain = 'DOMAIN.TLD';

		$this->http_protocol = (isset($_SERVER['HTTP_DO_PROTO']) ? $_SERVER['HTTP_DO_PROTO'].'://' : ($_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://'));
		$this->base_host = $this->site->domain;
		$this->base_url = $this->http_protocol . $this->base_host;
		$this->clean_url = $this->root;
		$this->index_url = $this->base_url . $this->clean_url;

		// JS Libraries
		$this->libs = new \stdClass;
		$this->libs->jquery = '//code.jquery.com/jquery-1.9.1.js';
		$this->libs->jquery_local = '/js/vendor/jquery.min.js';
	}
}

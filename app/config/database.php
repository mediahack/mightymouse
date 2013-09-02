<?php
/**
 * Database Config
 *
 * Provides configuration storage of your databases 
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
return array(
	'default' => array(
		'type' => '',
		'host' => 'localhost',
		'db' => '',
		'user' => '',
		'pass' => ''
	),
	'mongodb' => array(
		'type' => 'mongodb',
		'host' => '127.0.0.1',
		'port' => '27017',
		'db' => '',
		'user' => '',
		'pass' => ''
	),
	'mysql' => array(
		'type' => 'mysql',
		'host' => '127.0.0.1',
		'db' => '',
		'user' => '',
		'pass' => ''
	),
);
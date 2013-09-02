<?php
/**
 * Route Config
 *
 * Setup your route alias configuration. The examples below can be removed or
 * modified to suit your needs. 
 *
 * KEEP the default route! You can modify the controller and action, but don't
 * delete it.
 *
 * @package		MM - Mighty Mouse PHP MVC Framework
 * @author		Ed aka mediahack
 * @copyright	(c) 2013 Supersonic Bionic, LLC
 * @license		see \LICENSE.txt
 ********************************** 80 Columns *********************************
 */
return array(
	'default' => array('c' => 'Index', 'a' => 'index'), // DO NOT REMOVE
	'login' => array(
		'index' => array('c' => 'Authenticate', 'a' => 'login'),
		'validate' => array('c' => 'Authenticate', 'a' => 'validate'),
		),
	'logout' => array('c' => 'Authenticate', 'a' => 'logout'),
	'my' => array(
		'account' => array('c' => 'Account', 'a' => 'management'),
	),
	'signup' => array('c' => 'Account', 'a' => 'signup'),
	':username' => array('c' => 'Profile', 'a' => 'index')
);
<?php
define('DEBUG', false);
define('START_TIME', microtime(true));
define('START_MEMORY_USAGE', memory_get_usage());
define('BASE_DIR', dirname(__FILE__));
define('PUBLIC_DIR', dirname(__FILE__) . '/../public/');
define('AJAX_REQUEST', strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest');

use \App\Core as Core, \App\Config as Config;

require_once BASE_DIR . '/core/autoloader.php';
$loader = new Core\AutoLoader();

$c = new Config\Main();

new Core\Session($c->session_name, $c->session_timeout, true);

Core\Dispatcher::go($c);

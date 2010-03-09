<?php
require_once(dirname(__FILE__).'/../shumvc/lib/vendor/doctrine/Doctrine.php');
require_once(dirname(__FILE__).'/../shumvc/lib/vendor/shumvc/Shumvc.php');
require_once(dirname(__FILE__).'/../shumvc/lib/vendor/serpent/serpent.class.php');

spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Shumvc', 'autoload'));

// Define the app name
define('APP_NAME', 'development');

session_start();

include(dirname(__FILE__).'/../shumvc/config/config.php');
include(dirname(__FILE__).'/../shumvc/config/bootstrap.php');

ini_set('display_errors',1);
error_reporting(E_ALL);

$parsed_uri = parse_url($_SERVER['REQUEST_URI']);
$uri = preg_replace(sprintf(':^%s:', DEPLOYMENT_URL), '', $parsed_uri['path']);

$front_controller = new Shumvc_FrontController();
$front_controller->dispatch($uri);

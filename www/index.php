<?php
require_once(dirname(__FILE__).'/../lib/vendor/doctrine/Doctrine.php');
require_once(dirname(__FILE__).'/../lib/vendor/shumvc/Shumvc.php');
require_once(dirname(__FILE__).'/../lib/vendor/serpent/serpent.class.php');

spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Shumvc', 'autoload'));

session_start();

include(dirname(__FILE__).'/../config/config.php');
include(dirname(__FILE__).'/../config/bootstrap.php');

$parsed_uri = parse_url($_SERVER['REQUEST_URI']);
$uri = preg_replace(sprintf(':^%s:', DEPLOYMENT_URL), '', $parsed_uri['path']);

$front_controller = new Shumvc_FrontController();
$front_controller->dispatch($uri);

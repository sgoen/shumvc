<?php
session_start();

include('bootstrap.php');

// Define the url in which the project exists for proper url handling
define('DEPLOYMENT_URL', '/phpmvc/web/');

$parsed_uri = parse_url($_SERVER['REQUEST_URI']);
$uri = preg_replace(sprintf(':^%s:', DEPLOYMENT_URL), '', $parsed_uri['path']);

$front_controller = new Shumvc_FrontController();
$front_controller->dispatch($uri);

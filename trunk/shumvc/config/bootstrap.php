<?php
require_once(dirname(__FILE__).'/../lib/vendor/doctrine/Doctrine.php');
require_once(dirname(__FILE__).'/../lib/vendor/shumvc/Shumvc.php');
require_once(dirname(__FILE__).'/../lib/vendor/serpent/serpent.class.php');

spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Shumvc', 'autoload'));

// Doctrine ...
Doctrine::loadModels(DIR_MODELS);
$manager = Doctrine_Manager::getInstance();

// At this point no actual connection to the database is created
$conn = Doctrine_Manager::connection(SHUMVC_DB_TYPE.'://'.SHUMVC_DB_USER.':'.SHUMVC_DB_PASS.'@'.SHUMVC_DB_HOST.'/'.SHUMVC_DB_NAME);

// The first time the connection is needed, it is instantiated
// This query triggers the connection to be created
$conn->execute('SHOW TABLES');

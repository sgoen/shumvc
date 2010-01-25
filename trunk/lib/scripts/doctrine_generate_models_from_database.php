<?php

// php script to generate models from a mysql db to
// the app/models directory

require_once(dirname(__FILE__) . '/../vendor/doctrine/Doctrine.php');

spl_autoload_register(array('Doctrine', 'autoload'));
$manager = Doctrine_Manager::getInstance();

$conn = Doctrine_Manager::connection('mysql://phpmvc:test@localhost/phpmvc');

$conn->execute('SHOW TABLES');

Doctrine_Core::generateModelsFromDb('../../app/models', array('doctrine'), array('generateTableClasses' => true));

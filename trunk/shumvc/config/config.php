<?php

// First off, define the base dir off the app for easy set up of the other options
define('DIR_BASEDIR', dirname(__FILE__).'/..');

$array = array(
    // Define the url in which the project exists for proper url handling
    'DEPLOYMENT_URL' => '/shumvc/www/',
    
    // Define the directories
    'DIR_APP' => DIR_BASEDIR.'/apps/'.APP_NAME.'/',
    'DIR_TEMPLATES' => DIR_BASEDIR.'/apps/'.APP_NAME.'/templates',
    'DIR_TEMPLATES_C' => DIR_BASEDIR.'/apps/'.APP_NAME.'/templates_c',
    'DIR_MODELS' => DIR_BASEDIR.'/models',
    
    // Define Serpent options
    'SERPENT_FORCE_COMPILE' => true,
    'SERPENT_DEFAULT_RESOURCE' => 'file',
    'SERPENT_DEFAULT_COMPILER' => 'serpent',
    'SERPENT_CHARSET' => 'utf-8',
                                                                              
    // Define the default shumvc properties such as title etc.
    'SHUMVC_APP_TITLE' => 'Shumvc - Hello World',
    'SHUMVC_APP_STYLE' => 'default.css',
    'SHUMVC_DEFAULT_CONTROLLER' => 'helloworld',
    
    // Database parameters
    'SHUMVC_DB_TYPE' => 'mysql',
    'SHUMVC_DB_HOST' => 'localhost',
    'SHUMVC_DB_NAME' => 'phpmvc',
    'SHUMVC_DB_USER' => 'phpmvc',
    'SHUMVC_DB_PASS' => 'test',
);

Shumvc::define_array($array, $keys);

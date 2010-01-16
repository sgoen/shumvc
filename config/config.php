<?php

// First off, define the base dir off the app for easy set up of the other options
define('DIR_BASEDIR', dirname(__FILE__).'/..');

$array = array(
    // Define the url in which the project exists for proper url handling
    'DEPLOYMENT_URL' => '/',
    
    // Define the directories
    'DIR_APP' => DIR_BASEDIR.'/app',
    'DIR_TEMPLATES' => DIR_BASEDIR.'/app/templates',
    'DIR_TEMPLATES_C' => DIR_BASEDIR.'/app/templates_c',
    
    // Define Serpent options
    'SERPENT_FORCE_COMPILE' => true,
    'SERPENT_DEFAULT_RESOURCE' => 'file',
    'SERPENT_DEFAULT_COMPILER' => 'serpent',
    'SERPENT_CHARSET' => 'utf-8',
    
    // Define the default page properties such as title etc.
    'SHUMVC_APP_TITLE' => 'Shumvc - Hello World',
    'SHUMVC_APP_STYLE' => 'default.css',
);

Shumvc::define_array($array, $keys);

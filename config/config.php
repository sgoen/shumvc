<?php
// Define the url in which the project exists for proper url handling
define('DEPLOYMENT_URL', '/');
// Define the directories
define('DIR_APP', dirname(__FILE__).'/../app');
define('DIR_TEMPLATES', DIR_APP.'/templates');
define('DIR_TEMPLATES_C', DIR_APP.'/templates_c');
// Define Serpent options
define('SERPENT_FORCE_COMPILE', true);
define('SERPENT_DEFAULT_RESOURCE', 'file');
define('SERPENT_DEFAULT_COMPILER', 'serpent');
define('SERPENT_CHARSET', 'utf-8');

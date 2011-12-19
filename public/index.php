<?php
//Test
set_time_limit(30);

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('LIB_PATH')
    || define('LIB_PATH', realpath(dirname(__FILE__) . '/../library'));

// http://stackoverflow.com/questions/2510556/zend-framework-auto-switch-production-staging-test-etc
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Add library to include path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

// Zend_Application
require_once 'Zend/Application.php';

// Create application
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/config/application.ini'
);

// Bootstrap and run the application
$application->bootstrap()
            ->run();

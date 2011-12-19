<?php
define('BASE_PATH', realpath(dirname(__FILE__) . '/../'));
define('APPLICATION_PATH', BASE_PATH . '/application');
defined('LIB_PATH')
    || define('LIB_PATH', realpath(dirname(__FILE__) . '/../library'));

set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

// Define application environment
define('APPLICATION_ENV', 'testing');

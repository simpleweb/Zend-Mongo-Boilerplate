<?php
/**
 * Bootstraps our app setting things such as namespaces, config, routes etc.
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initFrontController()
    {

        $front = Zend_Controller_Front::getInstance();

        $front->setControllerDirectory(array('default' => APPLICATION_PATH.'/app/controllers'))
            ->setParam('useModules', true);

        $front->setDefaultModule('default');
        return $front;
    }

    protected function _initAutoload()
    {

        Zend_Loader_Autoloader::getInstance()
            ->registerNamespace('Shanty_');
        //setFallbackAutoloader(true);

        $moduleLoader = new Zend_Application_Module_Autoloader(
            array(
                'namespace' => '',
                'basePath' => APPLICATION_PATH.'/app'
            )
        );

        //Controllers not added to auto loading by default.
        //http://framework.zend.com/manual/en/zend.loader.autoloader-resource.html
        $moduleLoader->addResourceType('controller', 'controllers/', 'Controller');
        $moduleLoader->addResourceType('email', 'emails/', 'Email');

        return $moduleLoader;
    }

    protected function _initConfig()
    {

        $config = new Zend_Config_Xml(APPLICATION_PATH . '/config/config.xml', APPLICATION_ENV);
        Zend_Registry::set('config', $config);

    }

    protected function _initDb()
    {

        $config = Zend_Registry::get('config');

        //Setup mongo
        $connection = new Shanty_Mongo_Connection($config->mongo);
        Shanty_Mongo::addMaster($connection);

    }

    protected function _initCache()
    {
        return;
        //Cache
        $frontendOptions = array(
           'lifetime' => 7200, // cache lifetime of 2 hours
           'automatic_serialization' => true,
           'caching' => false
        );

        $backendOptions = array(
            'cache_dir' => APPLICATION_PATH.'/app/cache/' // Directory where to put the cache files
        );

        // getting a Zend_Cache_Core object
        $cache = Zend_Cache::factory(
            'Core',
            'File',
            $frontendOptions,
            $backendOptions
        );

        Zend_Registry::set('cache', $cache);
        Zend_Db_Table_Abstract::setDefaultMetadataCache($cache);

    }

    protected function _initRoutes()
    {

        $config = Zend_Registry::get('config');

        // Get Front Controller Instance
        $front = Zend_Controller_Front::getInstance();
        //$front->setParam('useDefaultControllerAlways', true);

        // Get Router
        $router = $front->getRouter();

            /*
            $defaultRoute = new Zend_Controller_Router_Route(
                ':controller/:action/*',
                array(
                    'controller' => 'index',
                    'action'     => 'index'
                )
            );

          

        $router->addRoute('defaut', $defaultRoute);

*/
    }

    protected function _initErrorHandling()
    {

        $front = Zend_Controller_Front::getInstance();
        $config = Zend_Registry::get('config');
        $front->throwExceptions($config->exceptions);
        
    }

    protected function _initLogging()
    {
        $front = Zend_Controller_Front::getInstance();
        $logger = new Zend_Log(new Zend_Log_Writer_Null());
        $writer = new Zend_Log_Writer_Syslog(array('application' => 'default'));
        $logger->addWriter($writer);
        Zend_Registry::set('logger', $logger);
    }
}


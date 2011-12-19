<?php
require_once 'IndexControllerTest.php';
require_once 'SpacesControllerTest.php';
require_once 'AppTest.php';
require_once 'ContactTest.php';
require_once 'UserTest.php';
require_once 'BillingTest.php';
require_once 'TokenTest.php';

class AllTests extends PHPUnit_Framework_TestSuite
{
    public static function suite()
    {

        $suite = new AllTests('PHPUnit Framework');
        $suite->addTestSuite('DefaultTest');

        return $suite;
    }

    public function setUp()
    {

        $this->application = new Zend_Application(
            APPLICATION_ENV,
            APPLICATION_PATH . '/config/application.ini'
        );

        $this->bootstrap = array($this, 'appBootstrap');
        $this->application->bootstrap();

        //Drop testing database.
        $m = Shanty_Mongo::getWriteConnection();
        $m->selectDB($m->getDatabase())->drop();

        //Run seed data.
        $seedfiled = (string) realpath(APPLICATION_PATH.'/../seed/');
        echo shell_exec('cd ' . $seedfiled . ' && ./load.sh db_testing');

        parent::setUp();
    }

    protected function tearDown()
    {
    }
}
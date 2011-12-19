<?php
/**
 * Although this controller appears to do nothing, it is default route for when no space is specified, so will bounce out
 * to login because of the secure base controller.
 */
class IndexController extends Zend_Controller_Action
{
    function init()
    {
        parent::init();
    }
    function indexAction()
    {
    }

}
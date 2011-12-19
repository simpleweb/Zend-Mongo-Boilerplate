<?php
/**
 * User notifications view helper
 * 
 * This helper is used to determine what (if any) notifications should be
 * displayed to the current user, on the current page.
 * 
 * @package Swm
 * @subpackage View Helpers
 * @author Chris Mytton
 * @copyright Simpleweb 2010
 */
/**
* 
*/
class My_View_Helper_Notification extends Zend_View_Helper_Abstract
{
    /**
     * An array of arrays, each one containing a notification
     *
     * @var array
     **/
    protected $_notifications = array();
    
    /**
     * Contains markup for building the notifications
     *
     * @var array
     **/
    protected $_markup = array(
        'startTag'      => '<div class="alert-message block-message info">',
        'noteStart'     => '',
        'dismissButton' => '<a href="#" class="close" data-notification-id="%d">&times;</a>',
        'titleFormat'   => '<h4 class="notificationTitle">%s</h4>',
        'noteEnd'       => '',
        'endTag'        => '</div>',
    );
    
    /**
     * Main view helper method
     * 
     * This can be used to add notifications to the helper, or if no arguments
     * are passed, it can be used to access, and configure, the object itself.
     * 
     * Each note must be an instance
     * 
     * When passed with no arguments you can configure the object using a 'set'
     * method:
     * (Inside the controller)
     * $this->view->notification()->setTitleFormat('<h1 class="custom">%s</h1>');
     * 
     * When echoed with no arguments the helper builds the notifications and displays them.
     */
    public function notification(Model_v2_NotificationRow $notification = null)
    {
        if (!is_null($notification)) {
            $this->_notifications[] = $notification;
        }
        
        return $this;
    }
    
    public function __call($method, $args)
    {
        if (strpos($method, 'set') === 0) {
            $name = substr($method, 3);
            $name[0] = strtolower($name[0]);
            
            if (isset($this->_markup[$name])) {
                if (!count($args)) {
                    throw new Zend_Exception('Please provide one argument to set up the notification helper.');
                }
                return $this->_markup[$name] = $args[0];
            }
        }
        // if (in_array($method, array('titleFormat', 'startTag', 'endTag', 'dismissButton', 'noteStart', 'noteEnd'))) {
        //             // Get the property name
        //             $property = '_' . $method;
        //             
        //             $this->$property = $args[0];
        //         }
        throw new Zend_Exception("The method {$method} was not found, and was not trapped in __call.");
    }
    
    public function __toString()
    {
        // Fail fast
        if (empty($this->_notifications)) {
            return '';
        }
        
        return $this->_formatNotifications();
    }
    
    protected function _formatNotifications()
    {
        extract($this->_markup);
        
        $html = $startTag;
        
        foreach ($this->_notifications as $note) {
            // Check if we need a dismiss button
            $dismiss = ($note->Sticky == 0) ? sprintf($dismissButton, $note->NotificationID) : '';
            
            // Now add the elements together to make a note
            $html .= $noteStart . 
            $dismiss . 
            sprintf($titleFormat, $note->Title) . 
            stripslashes($note->Content) . 
            $noteEnd;
        }
        
        $html .= $endTag;
        
        return $html;
    }
}

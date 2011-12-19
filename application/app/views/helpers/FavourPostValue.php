<?
/**
 * Simple helperto get param data in to views
 **/
class My_View_Helper_FavourPostValue {
	
	public function __construct() {
	
	    $front   = Zend_Controller_Front::getInstance(); 
        $modules = $front->getControllerDirectory();
        if (empty($modules)) {
            require_once 'Zend/View/Exception.php';
            throw new Zend_View_Exception('Action helper depends on valid front controller instance');
        }

        $request = $front->getRequest(); 

        if (empty($request)) {
            require_once 'Zend/View/Exception.php';
            throw new Zend_View_Exception('Action view helper requires both a registered request and response object in the front controller instance');
        }

        $this->request = clone $request;

	}
	
	/**
	 * Returns a param.
	 */
	public function FavourPostValue($postField, $alternativeData) {

		if($this->request->isPost()) {
			return $this->request->getParam($postField);
		} else { 
			return $alternativeData;
		}
		
	}
	
}
?>
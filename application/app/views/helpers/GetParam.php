<?
/**
 * Simple helperto get param data in to views
 **/
class My_View_Helper_GetParam {
	
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
	public function GetParam($param, $dbRow = null) {

		if($this->request->isPost()) {
			return $this->request->getParam($param);
		} elseif (isset($dbRow)){
			
			if(!is_array($dbRow)) {

				// LM - a bit simpler, and works with the new models!
				return $dbRow->$param;

				/*
				$class = new ReflectionObject($dbRow);
				
				//TODO - find why reflection is broken and getProperty doesn't work.'
				
				// if($class->hasProperty($param)) {
				 //	$param = $class->getProperty($param);
				// }
				 
				$properties = $class->getProperties();
				for ($i = 0; $i < count($properties); $i++) {
					$name = $properties[$i]->getName();
					if($name==$param) {
						return $properties[$i]->getValue($dbRow);
					}
				}*/

			} else {
				
				if(array_key_exists($param, $dbRow)) {
					return $dbRow[$param];
				} else {
					return "";
				}
			}
			
		} else { 
			return $this->request->getParam($param);
		}
		
	}
	
}
?>

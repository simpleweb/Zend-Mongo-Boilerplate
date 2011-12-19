<?
class My_View_Helper_TimeRemaining {

	public function TimeRemaining($days) {
		
		$trans = Zend_Registry::get('Zend_Translate');
		
		if($days == 1) {
			return $trans->_('Expires today');
		} else {
		    return $days . $trans->_(' days left');
		}
		
	}
}
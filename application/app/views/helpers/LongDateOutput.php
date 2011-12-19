<?
class My_View_Helper_LongDateOutput {

	public function LongDateOutput($date = null) {
		
		//TODO - Translate these strings.
		if(!isset($date)) {
			return 'never';
		}
		
		$activityDate = new Zend_Date($date);
		return $activityDate->toString('EEEE, d MMMM yyyy @ HH:mm');
		
	}
}
?>
<?
class My_View_Helper_FriendlyDateOutput {

	public function FriendlyDateOutput($date = null) {
		
		//TODO - Translate these strings.
		if(!isset($date)) {
			return 'never';
		}
		
		$activityDate = new Zend_Date($date);
		$justNow = new Zend_Date();
		$justNow->sub(5, Zend_Date::MINUTE);
		
		//TODO - make increments more granular.
		if($activityDate->isLater($justNow)) {
			
			return 'just now';
			
		} elseif ($activityDate->isToday()) { //Today

			return 'today at ' . $activityDate->toString('h:mm a');
			
		} elseif ($activityDate->isYesterday()) { //Yesterday
			
			return 'yesterday ' . $activityDate->toString('h:mm a');
			
		} else { //General date that isn't just now, today or yesterday.
			
			return $activityDate->toString('EEEE, d MMMM yyyy');
		}		
		
	}
}
?>
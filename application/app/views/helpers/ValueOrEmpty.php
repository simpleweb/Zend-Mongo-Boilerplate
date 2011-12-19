<?
/**
 * Outputs the passed in value unless it's missing, in which case empty is output.
 **/
class My_View_Helper_ValueOrEmpty {
	
	/**
	 * Returns a param.
	 */
	public function ValueOrEmpty($value, $empty) {
		
		$return = null;

		if(isset($value)) {
			
			if(is_array($value)) {
				
				//Use first value found in array.
				for($i = 0; $i < count($value); $i++) {
					if(!empty($value[$i])) {
						$return = $value[$i];
						break;
					}
				}
				
			} elseif(!empty($value)) {
				$return = $value;
			} else {
				$return = $empty;
			}
			
		}

		if(!isset($return)) {
			$return = $empty;
		}
		
		return $return;
		
	}
	
}
?>
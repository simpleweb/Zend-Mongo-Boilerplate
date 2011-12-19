<?php
class My_View_Helper_AddressOutput { 
	
	public function AddressOutput($addressObject) {
		
		$addressLine1 = '';
		$addressLine2 = '';
		$addressLine3 = '';
		$postcode = '';
		$country = '';
		
		if(is_array($addressObject)) {
			$addressLine1 = $addressObject['AddressLine1'];
			$addressLine2 = $addressObject['AddressLine2'];
			$addressLine3 = $addressObject['AddressLine3'];
			$country = $addressObject['Country'];
			$postcode = $addressObject['Postcode'];
		} else {
			$addressLine1 = $addressObject->AddressLine1;
			$addressLine2 = $addressObject->AddressLine2;
			$addressLine3 = $addressObject->AddressLine3;
			$country = $addressObject->Country;
			$postcode = $addressObject->Postcode;
		}
		
		$address = '';
		
		if(isset($addressLine1) && !empty($addressLine1)) {
			$address .= $addressLine1 . ', ';
		}

		if(isset($addressLine2) && !empty($addressLine2)) {
			$address .= $addressLine2 . '<br/>';
		}
		
		if(isset($addressLine3) && !empty($addressLine3)) {
			$address .= $addressLine3 . '<br/>';
		}
		
		if(isset($postcode) && !empty($postcode)) {
			$address .= $postcode . '<br/>';
		}
		
		if(isset($country) && !empty($country) && !empty($address)) {
			$address .= $country . '<br/>';
		}
		
		return $address;
				
	}
	
}
?>
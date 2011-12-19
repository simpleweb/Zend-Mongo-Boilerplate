<?php
class My_View_Helper_FormErrorOutput { 
	
	public function FormErrorOutput($errors, $group = 'default') {
		
		if(!isset($errors)) {
			return;
		}
		
		if(!isset($errors[$group])) {
			return;
		}
		
		$output = '<div class="alert-message block-message error"><p><strong>Oops! There were errors:</strong></p><ul>';

		foreach($errors[$group] as $key => $field) {

			foreach($field as $error) {
				
				if(!empty($error['fieldname'])) {
					$output .= '<li class="'.$error['class'].'">'. $error['fieldname'] . ' - ' . $error['message'] . '</li>';
				} else {
					$output .= '<li class="'.$error['class'].'">' . $error['message'] . '</li>';
				}
			}
			
		}
		
		$output .= '</ul></div>';

		return $output;
		
		
	}

}
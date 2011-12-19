<?php
class My_View_Helper_FormFieldError { 
	
	public function FormFieldError($errors, $field, $group = 'default') {

		if(!isset($errors)) {
			return;
		}
		
		if(!isset($errors[strtolower($group)][strtolower($field)])) {
			return;
		}
		
		return 'error';
	
	}

}
?>
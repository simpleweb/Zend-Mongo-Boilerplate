<?php
class My_View_Helper_Pluralize
{
    public function pluralize($amount, $singular, $multiple)
    {
    	if($amount == 1) {
    		return sprintf($singular, $amount);
    	} else {
    		return sprintf($multiple, $amount);
    	}
    }
}
?>
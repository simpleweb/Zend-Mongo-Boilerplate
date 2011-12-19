<?php
/**
 * Outputs the passed in value unless it's missing, in which case empty is output.
 **/
class My_View_Helper_Truncate {

    /**
     * Outputs shortened version of string if too long.
     */
    public function Truncate($value, $length = 20, $includeHellip = true) {

        $return = null;

        if(strlen($value) > $length) {

            $value = substr($value, 0, $length);

            if($includeHellip) {
                $value .= '&hellip;';
            }

        }

        return $value;

    }

}
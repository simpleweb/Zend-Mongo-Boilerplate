<?php
class My_View_Helper_NavOutput { 
	
	public function NavOutput($nav, $group = 'actionmenu', $ulClass = 'paneActions menu') {
		
		if(!isset($nav)) {
			return;
		}
		
		if(!isset($nav[$group])) {
			return;
		}
		
		$output = null;

		$count = 0;
		$totalCount = count($nav[$group]);
		
		foreach($nav[$group] as $key => $navItem) {	
			$liClass = '';
			$count = $count + 1;
			if(is_numeric($key)) {
				
				if($count == $totalCount) {
					$liClass='last ';
				}
				
				$liClass .= $navItem['class'];
				
				$output .= '<li class="' . $liClass . '"><a href="'. $navItem['url'] .'">' . $navItem['label'] . '</a></li>';
			}
		}
		
		if(isset($output)) {
			$output = '<ul class="'.$ulClass.'">' . $output . '</ul>';
			
			/*if (array_key_exists('header', $nav[$group])) {
				$output = '<div class="menuItem websites"><h5>' . $nav[$group]['header']. '</h5>'.$output.'</div>';
			}*/
		}
		
		return $output;
		
		
	}
	
}
?>

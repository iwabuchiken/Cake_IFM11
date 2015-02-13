<?php
//REF http://www.programmersvilla.com/forums/topic/how-to-create-custom-helper-in-cakephp/

class MytestHelper extends AppHelper{
	
	public function testFunction($arg1){
		
		$path_Utils = join(DS, array(ROOT, APP_DIR, "Lib", "utils"));
		
		require_once $path_Utils.DS."utils.php";
		
		return Utils::conv_Float_to_TimeLabel($arg1);
		
// 		return ".$arg1.";
	}
	
	public function 
	build_Path_ContAction($cont, $action) {
		
		return array('controller' => $cont, 
				    	'action' => $action);
		
	}
	
	public function 
	build_Path_ContActionParam($cont, $action, $param) {
		
		$arry = array();
		
		$arry['controller'] = $cont;
		$arry['action'] = $action;
		$arry['?'] = $param;
		
		return $arry;
		
	}
	
}
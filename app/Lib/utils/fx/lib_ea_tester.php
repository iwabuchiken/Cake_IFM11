<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
class LibEaTester {
	
	/********************
	* fx_tester_T_1__Exec
	* 	at : 2020/01/06 13:10:56
	********************/
	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
		//_20200106_142418:caller
		//_20200106_142421:head
		//_20200106_142425:wl
		/********************
		 * step : B : j1 : N : 1
		 * 		log
		 ********************/
		$msg = "\n"; $msg .= "(step : B : j1 : N : 1) position ==> NOT taken";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg
				, __FILE__, __LINE__);
		
		/********************
		 * step : B : j1 : N : 2
		 * 		detect : pattern
		 ********************/
		$resultOf_Detect_Pattern = true;
		
		/********************
		 * step : B : j2
		 * 		pattern ==> detected ?
		 ********************/
		if ($resultOf_Detect_Pattern == true) {
			/********************
			 * step : B : j2 : Y
			 * 		pattern ==> detected
			 ********************/
			/********************
			 * step : B : j2 : Y : 1
			 * 		log
			 ********************/
			$msg = "\n"; $msg .= "(step : B : j2 : Y : 1) pattern ==> detected";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg
					, __FILE__, __LINE__);
			
			//_20200106_143611:next
			
		} else {
			/********************
			 * step : B : j2 : N
			 * 		pattern ==> NOT detected
			 ********************/
			/********************
			 * step : B : j2 : N : 1
			 * 		log
			 ********************/
			$msg = "\n"; $msg .= "(step : B : j2 : N : 1) pattern ==> NOT detected";
			
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg
					, __FILE__, __LINE__);
				
			
			
		}//if ($resultOf_Detect_Pattern == true)
		
		
		
		
	}//public static function loop_J1_N($lo_BarDatas, $flg_Position) {
	
	/********************
	* fx_tester_T_1__Exec
	* 	at : 2020/01/06 13:10:56
	********************/
	public static function fx_tester_T_1__Exec($lo_BarDatas) {
		//_20200106_130954:caller
		//_20200106_130959:head
		//_20200106_131002:wl
		
		/********************
		* step : A : 1
		* 		prep
		********************/
		// len
		$lenOf_LO_BarDatas = count($lo_BarDatas);
		
		debug("\$lenOf_LO_BarDatas => " . $lenOf_LO_BarDatas);
		
		// flags
// 		$flg_Position = true;
// 		debug("debug : \$flg_Position ==> true : " . $flg_Position);
		$flg_Position = false;
		
		// counter
		$cntOf_Loop = 0;
		
		$maxOf_Loop = 10;
		
		// loop control
		$num_Loop_Start = 0;
		
		/********************
		* step : B
		* 		for-loop
		********************/
		/********************
		* step : B : 0
		* 		setup
		********************/
		for ($i = $num_Loop_Start; $i < $lenOf_LO_BarDatas; $i++) {
			/********************
			* step : B : 1
			* 		
			********************/
			/********************
			* step : B : 2
			* 		stopper
			********************/
			// count
			$cntOf_Loop += 1;
			
			// judge
			if ($cntOf_Loop > $maxOf_Loop) {

				$msg = "\n"; $msg .= "(step : B : 2) stopper : loop ==> maxed out : \$cntOf_Loop = $cntOf_Loop / \$maxOf_Loop = $maxOf_Loop";
				$msg .= "\n"; $msg .= "breaking the loop...";
				Utils::write_Log__Fx_Admin(
						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
						, $msg, __FILE__, __LINE__);
				
				debug("loop ==> maxed out : \$cntOf_Loop = $cntOf_Loop / \$maxOf_Loop = $maxOf_Loop");
				debug("breaking the loop...");
				
				break;
				
			}//if ($cntOf_Loop > $maxOf_Loop)
			;

			/********************
			 * step : B : j1
			 * 		position ==> taken?
			 ********************/
			if ($flg_Position == true) {
				/********************
				 * step : B : j1 : Y
				 * 		position ==> taken
				 ********************/
				/********************
				 * step : B : j1 : Y : 1
				 * 		log
				 ********************/
				$msg = "\n"; $msg .= "(step : B : j1 : Y : 1) position ==> taken";
				Utils::write_Log__Fx_Admin(
						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
						, $msg, __FILE__, __LINE__);
			
			} else {
				/********************
				 * step : B : j1 : N
				 * 		position ==> NOT taken
				 ********************/
				//_20200106_142418:caller
				LibEaTester::loop_J1_N($lo_BarDatas, $flg_Position);
				
// 				/********************
// 				 * step : B : j1 : N : 1
// 				 * 		log
// 				 ********************/
// 				$msg = "\n"; $msg .= "(step : B : j1 : N : 1) position ==> NOT taken";
					
// 				Utils::write_Log__Fx_Admin(
// 						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 						, $msg
// 						, __FILE__, __LINE__);
				
				
				
			}//if ($flg_Position == true)
			
			
					
		}//for ($i = $num_Loop_Start; $i < $lenOf_LO_BarDatas; $i++)
		
	}//public static function fx_tester_T_1__Exec($lo_BarDatas)
		
}//class Libfx
	
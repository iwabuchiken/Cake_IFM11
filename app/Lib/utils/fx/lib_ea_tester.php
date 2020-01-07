<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
class LibEaTester {
	
	/********************
	* j2_Y_4_2
	* 	at : 2020/01/07 15:24:28
	********************/
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
	public static function j2_Y_4_2($pos, $idxOf_Loop, $bd, $val_TP, $val_SL, $val_SPREAD, $pr_TP, $pr_SL) {
		//_20200107_152525:caller
		//_20200107_152528:head
		//_20200107_152532:wl
		
		$pos->st_idx	= $idxOf_Loop;
		$pos->st_pr		= $bd->price_Open;
			
		$pos->cu_idx	= $idxOf_Loop;
		$pos->cu_pr		= $bd->price_Close;
			
		// position ==> BUY
		$pos->rf_idx	= $idxOf_Loop;
		$pos->rf_pr		= $bd->price_High;
			
		$pos->val_TP		= $val_TP;
		$pos->val_SL		= $val_SL;
		$pos->val_SPREAD		= $val_SPREAD;
			
		$pos->pr_TP		= $pr_TP;
		$pos->pr_SL		= $pr_SL;
		
		//report
		//debug
		$msg = "\n"; $msg .= "(step : B : j2 : Y : 4) Pos ==> init comp. !!";
		$msg .= "\n";
			
		$msg .= "\$pos->st_idx\t" . $pos->st_idx . "\t" . "\$pos->st_pr\t" . $pos->st_pr;
		$msg .= "\n";
		
		$msg .= "\$pos->val_TP\t" . $pos->val_TP . "\t" . "\$pos->val_SL\t" . $pos->val_SL;
		$msg .= "\n";
		
		$msg .= "\$pos->pr_TP\t" . $pos->pr_TP . "\t" . "\$pos->pr_SL\t" . $pos->pr_SL;
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, __FILE__, __LINE__);
		
		
	}//public static function j2_Y_4_2() {
		
	/********************
	* init_Pos
	* 	at : 2020/01/07 15:24:28
	********************/
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
	public static function init_Pos() {
		//_20200107_145547:caller
		//_20200107_145550:head
		//_20200107_145553:wl
		
		/********************
		* step : 1
		* 	init
		********************/
		$pos = new Pos;
		
		$pos->st_idx	= -1;
		$pos->st_pr	= 0.0;
		
		$pos->cu_idx	= -1;
		$pos->cu_pr	= 0.0;
		
		$pos->rf_idx	= -1;
		$pos->rf_pr	= 0.0;
		
		// the bar to exit;
		$pos->ext_idx	= -1;
		$pos->ext_pr	= 0.0;
		
		$pos->base_idx	= -1;
		$pos->base_pr	= 0.0;
		
		$pos->trail_starting_idx	= -1;
		$pos->trail_starting_pr	= 0.0;
		
		# values, margins;
		$pos->val_TP	= 0.0;
		$pos->val_SL	= 0.0;
		$pos->val_SPREAD	= 0.0;
		
		$pos->pr_TP	= 0.0;
		$pos->pr_SL	= 0.0;
		
		/********************
		 * step : 2
		 * 	return
		 ********************/
		return $pos;
		
	}//public static function init_Pos()
	
	/********************
	* fx_tester_T_1__Exec
	* 	at : 2020/01/06 13:10:56
	********************/
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos) {
	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos, $lo_Vals) {
		//_20200106_142418:caller
		//_20200106_142421:head
		//_20200106_142425:wl
		/********************
		 * step : 0
		 * 		prep : unpack
		 * 		$lo_Vals = [
				'val_TP'	=> 0.10
				, 'val_SL'	=> 0.05
				, 'val_SPREAD'	=> 0.01
		];
		 ********************/
		$val_TP			= $lo_Vals['val_TP'];
		$val_SL			= $lo_Vals['val_SL'];
		$val_SPREAD		= $lo_Vals['val_SPREAD'];
		
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
			/********************
			 * step : B : j2 : Y : 2
			 * 		flag ==> True
			 ********************/
			// change ==> flag
			$flg_Position = true;
			
			/********************
			 * step : B : j2 : Y : 3
			 * 		calc
			 ********************/
			$bd = $lo_BarDatas[$idxOf_Loop];
			
			$pr_Open = $bd->price_Open;
			
// 			$val_TP			= 0.10;
// 			$val_SL			= 0.05;
// 			$val_SPREAD		= 0.03;
			
			$pr_TP			= $bd->price_Open + ($val_TP + $val_SPREAD);
			$pr_SL			= $bd->price_Open - ($val_SL + $val_SPREAD);
			
			//debug
			$msg = "\n"; $msg .= "(* step : B : j2 : Y : 3) calc ==> comp";
			
			$msg .= "\n"; $msg .= "\$pr_Open = $pr_Open\n\$pr_TP = $pr_TP\n\$pr_SL = $pr_SL\n" .
					"\$val_TP = $val_TP\n\$val_SL = $val_SL\n\$val_SPREAD = $val_SPREAD";
			
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg
					, __FILE__, __LINE__);
				
			
			/********************
			 * step : B : j2 : Y : 4
			 * 		Pos ==> init
			 * $st_idx,$st_pr,$cu_idx,$cu_pr,$rf_idx,$rf_pr,$ext_idx,$ext_pr,$base_idx,$base_pr,$trail_starting_idx,$trail_starting_pr,$val_TP,$val_SL,$val_SPREAD,$pr_TP,$pr_SL
			 ********************/
			/********************
			 * step : B : j2 : Y : 4.1
			 * 		default vals
			 ********************/
			//_20200106_175914:next
			$pos = LibEaTester::init_Pos();
			
			/********************
			 * step : B : j2 : Y : 4.2
			 * 		set ==> new vals
			 ********************/
			//_20200107_152525:caller
			LibEaTester::j2_Y_4_2($pos, $idxOf_Loop, $bd, $val_TP, $val_SL, $val_SPREAD, $pr_TP, $pr_SL);
			
// 			$pos->st_idx	= $idxOf_Loop;
// 			$pos->st_pr		= $bd->price_Open;
			
// 			$pos->cu_idx	= $idxOf_Loop;
// 			$pos->cu_pr		= $bd->price_Close;
			
// 			// position ==> BUY
// 			$pos->rf_idx	= $idxOf_Loop;
// 			$pos->rf_pr		= $bd->price_High;
			
// 			$pos->val_TP		= $val_TP;
// 			$pos->val_SL		= $val_SL;
// 			$pos->val_SPREAD		= $val_SPREAD;
			
// 			$pos->pr_TP		= $pr_TP;
// 			$pos->pr_SL		= $pr_SL;
			
// 			//debug
// 			$msg = "\n"; $msg .= "(step : B : j2 : Y : 4) Pos ==> init comp. !!!!";
// 			$msg .= "\n";
			
// 			 $msg .= "\$pos->st_idx\t" . $pos->st_idx . "\t" . "\$pos->st_pr\t" . $pos->st_pr;
// 			$msg .= "\n";
				
// 			 $msg .= "\$pos->val_TP\t" . $pos->val_TP . "\t" . "\$pos->val_SL\t" . $pos->val_SL;
// 			$msg .= "\n";
				
// 			 $msg .= "\$pos->pr_TP\t" . $pos->pr_TP . "\t" . "\$pos->pr_SL\t" . $pos->pr_SL;
// 			$msg .= "\n";
			
// 			Utils::write_Log__Fx_Admin(
// 					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 					, $msg, __FILE__, __LINE__);
				
// 			//test
// 			$pos = new Pos;
			
// 			$bd = $lo_BarDatas[$idxOf_Loop];
			
// 			$pos->st_pr = $bd->price_Open;
			
// 			debug("\$pos->st_pr ==> " . $pos->st_pr);

			/********************
			 * step : B : j2 : Y : 5
			 * 		get ==> bar type
			 ********************/
			//_20200107_153029:next
					
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
		
		/********************
		 * step : C : X
		 * 		return
		 ********************/
		/********************
		 * step : C : X : 1
		 * 		set
		 ********************/
		$valOf_Ret = [$flg_Position, $pos];
// 		$valOf_Ret = [$flg_Position];
		
		/********************
		 * step : C : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
		
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
		
		// Pos instance
		$pos = new Pos;
		
		// list of vals
		$lo_Vals = [
				'val_TP'	=> 0.10
				, 'val_SL'	=> 0.05
				, 'val_SPREAD'	=> 0.01
		];
		
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
				//$valOf_Ret = [$flg_Position, $pos];
// 				$valOf_Ret = LibEaTester::loop_J1_N($lo_BarDatas, $flg_Position, $i, $pos);
				$valOf_Ret = LibEaTester::loop_J1_N($lo_BarDatas, $flg_Position, $i, $pos, $lo_Vals);
				
				// unpack
				$flg_Position	= $valOf_Ret[0];
				$pos			= $valOf_Ret[1];
				
				debug("\$flg_Position => " . $flg_Position);
				
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
	
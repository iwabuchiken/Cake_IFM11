<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
class LibEaTester {
	
	/********************
	* get_Bar_Type
	* 	at : 2020/01/09 17:56:19
	* 
	* @return : [$strOf_Bar_Type]
	* 
	********************/
	public static function get_Bar_Type__BUY($pos, $bd) {
		//_20200112_133506:caller
		//_20200112_133510:head
		//_20200112_133513:wl
		/********************
		 * step : 0 : 1
		 * 		prep : vars
		 ********************/
		$strOf_Bar_Type = "UNKNOWN";
		
		/********************
		 * step : 1
		 * 		prep : conditions ==> for j1
		 ********************/
		$cond_1 = ($bd->price_Low <= $pos->pr_SL);
		
		
// 		debug("\$cond_1 => '". ($cond_1 == true ? "yes" : "no") . "'");
		
// 		debug("\$bd->price_Low = " . number_format($bd->price_Low, 3) . " / " . "\$pos->pr_SL = " . number_format($pos->pr_SL, 3));
		
		/********************
		 * step : j1
		 * 		$bd->price_Low <= $pos->pr_SL ?
		 ********************/
		if ($cond_1 == true) {
			/********************
			 * step : j1 : Y
			 * 		$bd->price_Low <= $pos->pr_SL
			 ********************/
			/********************
			 * step : j1 : Y : 1
			 * 		log
			 ********************/
			//_20200112_135454:tmp
			$msg	= "\n";
			
			$msg	.= "(get_Bar_Type : step : j1 : Y : 1) \$bd->price_Low <= \$pos->pr_SL (SL)";
			$msg	.= "\n";
			
			$msg	.= "\$bd->price_Low\t" . number_format($bd->price_Low, 3);
			$msg	.= "\n";
			
			$msg	.= "\$pos->pr_SL\t" . number_format($pos->pr_SL, 3);
			$msg	.= "\n";
			
			$msg	.= "\$bd->price_Low - \$pos->pr_SL\t" . number_format($bd->price_Low - $pos->pr_SL, 3);
			$msg	.= "\n";
			
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
		
			/********************
			 * step : j1 : Y : 2
			 * 		set : bar type string
			 ********************/
			// C8
			$strOf_Bar_Type = CONS::$strOf_BarType__SL;
// 			$strOf_Bar_Type = "C8";
			
		} else {
			/********************
			 * step : j1 : N
			 * 		$bd->price_Low > $pos->pr_SL
			 ********************/
			/********************
			 * step : j1 : N : 1
			 * 		log
			 ********************/
			$msg	= "\n";
				
			$msg	.= "(get_Bar_Type : step : j1 : N : 1) \$bd->price_Low > \$pos->pr_SL (not SL)";
			$msg	.= "\n";

			$msg	.= "\$bd->price_Low\t" . number_format($bd->price_Low, 3);
			$msg	.= "\n";
				
			$msg	.= "\$pos->pr_SL\t" . number_format($pos->pr_SL, 3);
			$msg	.= "\n";
				
			$msg	.= "\$bd->price_Low - \$pos->pr_SL\t" . number_format($bd->price_Low - $pos->pr_SL, 3);
			$msg	.= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);

			/********************
			 * step : j1 : N : 2
			 * 		set : conditions
			 ********************/
			$cond_2 = ($bd->price_High >= $pos->pr_TP);

			/********************
			 * step : j2
			 * 		$bd->price_High >= $pos->pr_TP ?
			 ********************/
			if ($cond_2 == true) {
				/********************
				 * step : j2 : Y
				 * 		$bd->price_High >= $pos->pr_TP
				 ********************/
				/********************
				 * step : j2 : Y : 1
				 * 		log
				 ********************/
				$msg	= "\n";
				
				$msg	.= "(get_Bar_Type : step : j2 : Y : 1) \$bd->price_High >= \$pos->pr_TP (TP)";
				$msg	.= "\n";
				
				$msg	.= "\$bd->price_High\t" . number_format($bd->price_High, 3);
				$msg	.= "\n";
				
				$msg	.= "\$pos->pr_TP\t" . number_format($pos->pr_TP, 3);
				$msg	.= "\n";
				
				$msg	.= "\$bd->price_High - \$pos->pr_TP\t" . number_format($bd->price_High - $pos->pr_TP, 3);
				$msg	.= "\n";
				
				Utils::write_Log__Fx_Admin(
						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
						, $msg, __FILE__, __LINE__);
				
			} else {
				/********************
				 * step : j2 : N
				 * 		$bd->price_High < $pos->pr_TP
				 ********************/
				/********************
				 * step : j2 : N : 1
				 * 		log
				 ********************/
				$msg	= "\n";
				
				$msg	.= "(get_Bar_Type : step : j2 : Y : 1) \$bd->price_High < \$pos->pr_TP (not TP)";
				$msg	.= "\n";
				
				$msg	.= "\$bd->price_High\t" . number_format($bd->price_High, 3);
				$msg	.= "\n";
				
				$msg	.= "\$pos->pr_TP\t" . number_format($pos->pr_TP, 3);
				$msg	.= "\n";
				
				$msg	.= "\$bd->price_High - \$pos->pr_TP\t" . number_format($bd->price_High - $pos->pr_TP, 3);
				$msg	.= "\n";
				
				Utils::write_Log__Fx_Admin(
						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
						, $msg, __FILE__, __LINE__);
				
				//_20200112_142119:next
				/********************
				 * step : j2 : N : 2
				 * 		conditions
				 ********************/
				$cond_3	= ($bd->price_High >= $pos->trail_starting_pr);
				
				/********************
				 * step : j3
				 * 		$bd->price_High >= $pos->$trail_starting_pr ? (trail start ?)
				********************/
				if ($cond_3 == true) {
					/********************
					 * step : j3 : Y
					 * 		$bd->price_High >= $pos->$trail_starting_pr (trail ==> start)
					 ********************/
					/********************
					 * step : j3 : Y : 1
					 * 		log
					 ********************/
					$msg	.= "\n";
					$msg	= "(step : j3 : Y : 1)";
					$msg	.= " ";
// 					$msg	.= "\n";
					$msg	.= "\$bd->price_High >= \$pos->trail_starting_pr (trail ==> start)";
					$msg	.= "\n";
						
					$msg	.= "\$bd->price_High\t" . number_format($bd->price_High, 3);
					$msg	.= "\n";
						
					$msg	.= "\$pos->trail_starting_pr\t" . number_format($pos->trail_starting_pr, 3);
					$msg	.= "\n";
						
					Utils::write_Log__Fx_Admin(
							CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
							, $msg, __FILE__, __LINE__);
				
				} else {
					/********************
					 * step : j3 : N
					 * 		$bd->price_High < $pos->$trail_starting_pr (trail ==> NOT start)
					 ********************/
					/********************
					 * step : j3 : N : 1
					 * 		log
					 ********************/
					$msg	= "\n";
					$msg	.= "(step : j3 : N : 1)";
					$msg	.= " ";
					
					$msg	.= "\$bd->price_High < \$pos->trail_starting_pr (trail ==> NOT start)";
					$msg	.= "\n";
				
					$msg	.= "\$bd->price_High\t" . number_format($bd->price_High, 3);
					$msg	.= "\n";
				
					$msg	.= "\$pos->trail_starting_pr\t" . number_format($pos->trail_starting_pr, 3);
					$msg	.= "\n";
				
					Utils::write_Log__Fx_Admin(
							CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
							, $msg, __FILE__, __LINE__);
				
					/********************
					 * step : j3 : N : 2
					 * 		conditions
					 ********************/
					$cond_4	= ($bd->price_High == $bd->price_Close);
					
					/********************
					 * step : j4
					 * 		$bd->price_High == $bd->price_Close ?
					 ********************/
					if ($cond_4 == true) {
						/********************
						 * step : j4 : Y
						 * 		$bd->price_High == $bd->price_Close ==> C5
						 ********************/
						/********************
						 * step : j4 : Y : 1
						 * 		log
						 ********************/
						//_20200116_170153:fix
						$msg	= "\n";
						$msg	.= "(step : j4 : Y : 1)";
						$msg	.= " ";
							
						$msg	.= "\$bd->price_High == \$bd->price_Close";
						$msg	.= "\n";
						
						$msg	.= "\$bd->price_High\t" . number_format($bd->price_High, 3);
						$msg	.= "\n";
						
						$msg	.= "\$bd->price_Close\t" . number_format($bd->price_Close, 3);
						$msg	.= "\n";
						
						$msg	.= "\$bd->price_Close - \$bd->price_High\t"
									 . number_format($bd->price_Close - $bd->price_High, 3);
						$msg	.= "\n";
						
						Utils::write_Log__Fx_Admin(
								CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
								, $msg, __FILE__, __LINE__);

						/********************
						 * step : j4 : Y : 2
						 * 		set : bar type
						 ********************/
						$strOf_Bar_Type = CONS::$strOf_BarType__C5;
						
					} else {
						/********************
						 * step : j4 : N
						 * 		$bd->price_High <> $bd->price_Close ==> C4
						 ********************/
						/********************
						 * step : j4 : N : 1
						 * 		log
						 ********************/
						$msg	.= "\n";
						$msg	= "(step : j4 : N : 1)";
						$msg	.= " ";
							
						$msg	= "\$bd->price_High <> \$bd->price_Close";
						$msg	.= "\n";
						
						$msg	.= "\$bd->price_High\t" . number_format($bd->price_High, 3);
						$msg	.= "\n";
						
						$msg	.= "\$bd->price_Close\t" . number_format($bd->price_Close, 3);
						$msg	.= "\n";
						
						$msg	.= "\$bd->price_Close - \$bd->price_High\t"
								. number_format($bd->price_Close - $bd->price_High, 3);
						$msg	.= "\n";
						
						Utils::write_Log__Fx_Admin(
								CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
								, $msg, __FILE__, __LINE__);
						
						/********************
						 * step : j4 : N : 2
						 * 		set : bar type
						 ********************/
						$strOf_Bar_Type = CONS::$strOf_BarType__C4;
						
					}//if ($cond_4 == true)
					
					
					
					
						
				}//if ($cond_3 == true)
				
								
			}//if ($cond_2 == true)
					
		}//if ($cond_1 == true)
		
		
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		set val
		 ********************/
		$valOf_Ret = [$strOf_Bar_Type];
// 		$valOf_Ret = ["UNKNOWN"];
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
	}//get_Bar_Type__BUY($pos, $bd)
	
	/********************
	* get_Bar_Type
	* 	at : 2020/01/09 17:56:19
	* 
	* @return : $valOf_Ret = $typeOf_Bar;
	* 
	********************/
// 	public static function get_Bar_Type($pos, $bd) {
	public static function get_Bar_Type($pos, $bd, $typeOf_Position) {
		//_20200109_175550:caller
		//_20200109_175554:head
		//_20200109_175557:wl
		
// 		debug("get_Bar_Type");
		
		/********************
		* step : 0
		* 		prep : vars
		********************/
		$typeOf_Bar = "";
		
		/********************
		* step : j1
		* 		position ==> SELL or BUY ?
		********************/
		if ($typeOf_Position == "SELL") {
			/********************
			* step : j1 : A1
			* 		SELL
			********************/
			$msg	= "\n";
			
			$msg	.= "(get_Bar_Type : step : j1 : A1 : SELL)";
			$msg	.= "\n";
			
			$msg	.= "\$typeOf_Position => SELL";
			$msg	.= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
// 			debug("\$typeOf_Position => SELL");
			
		} else if ($typeOf_Position == "BUY") {
			/********************
			* step : j1 : A2
			* 		BUY
			********************/
			$msg	= "\n";
			
			$msg	.= "(get_Bar_Type : step : j1 : A2 : BUY)";
			$msg	.= "\n";
			
			$msg	.= "\$typeOf_Position => BUY";
			$msg	.= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
			
			//_20200109_181021:next
			//_20200112_133506:caller
			$valOf_Ret__received = LibEaTester::get_Bar_Type__BUY($pos, $bd);
			
			$typeOf_Bar = $valOf_Ret__received[0];

			$msg	= "(get_Bar_Type : step : j1 : A2 (continued))\$typeOf_Bar => $typeOf_Bar";
			$msg	.= "\n";
			
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
		} else {
			/********************
			* step : j1 : AX
			* 		unknown
			********************/
			$msg	= "\n";
			
			$msg	.= "(get_Bar_Type : step : j1 : AX : unknown) : '$typeOf_Position'";
			$msg	.= "\n";
			
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg, __FILE__, __LINE__);
				
		}//if ($typeOf_Position == "SELL")
		
		//_20200113_124813:next
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		$valOf_Ret = $typeOf_Bar;
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
	}//public static function get_Bar_Type($pos, $bd) {
	
	/********************
	* j2_Y_4_2
	* 	at : 2020/01/07 15:24:28
	********************/
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
	public static function j2_Y_4_2(
			$pos, $idxOf_Loop, $bd
			, $val_TP, $val_SL, $val_SPREAD
			, $pr_TP, $pr_SL
			, $val_Trail_Starting
			) {
// 			$pos, $idxOf_Loop, $bd, $val_TP, $val_SL, $val_SPREAD, $pr_TP, $pr_SL) {
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
		
		$pos->val_Trail_Starting		= $val_Trail_Starting;
		
		$pos->trail_starting_pr		= $pos->val_Trail_Starting + $pos->st_pr;
		
		
		//report
		//debug
		$msg = "\n"; $msg .= "(step : B : j2 : Y : 4) Pos ==> init comp. !!";
		$msg .= "\n";
			
		$msg .= "\$pos->st_idx\t" . $pos->st_idx . "\t" . "\$pos->st_pr\t" . number_format($pos->st_pr, 3);
		$msg .= "\n";
		
		$msg .= "\$pos->val_TP\t" . number_format($pos->val_TP, 3)
						. "\t" . "\$pos->val_SL\t" . number_format($pos->val_SL, 3);
		$msg .= "\n";
		
		$msg .= "\$pos->pr_TP\t" . number_format($pos->pr_TP, 3)
						. "\t" . "\$pos->pr_SL\t" . number_format($pos->pr_SL, 3);
		$msg .= "\n";
			
		$msg .= "\$pos->trail_starting_idx\t" . $pos->trail_starting_idx
						. "\t" . "\$pos->trail_starting_pr\t" . number_format($pos->trail_starting_pr, 3);
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
	* show_Basic_Pos_Data
	* 	at : 2020/01/12 17:44:31
	********************/
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos) {
	public static function show_Basic_Pos_Data($pos, $fname, $file_line) {
		//_20200112_173841:caller
		//_20200112_173843:head
		//_20200112_173846:wl

		//report
		//debug
		$msg = "\n"; $msg .= "(show_Basic_Pos_Data)";
		$msg .= "\n";
			
		$msg .= "\$pos->st_idx\t" . $pos->st_idx . "\t" . "\$pos->st_pr\t" . number_format($pos->st_pr, 3);
		$msg .= "\n";
		
		$msg .= "\$pos->cu_idx\t" . $pos->cu_idx . "\t" . "\$pos->cu_pr\t" . number_format($pos->cu_pr, 3);
		$msg .= "\n";
		
		$msg .= "\$pos->rf_idx\t" . $pos->rf_idx . "\t" . "\$pos->rf_pr\t" . number_format($pos->rf_pr, 3);
		$msg .= "\n";
		
		$msg .= "\$pos->ext_idx\t" . $pos->ext_idx . "\t" . "\$pos->ext_pr\t" . number_format($pos->ext_pr, 3);
		$msg .= "\n";
		
		$msg .= "\$pos->val_TP\t" . number_format($pos->val_TP, 3)
		. "\t" . "\$pos->val_SL\t" . number_format($pos->val_SL, 3)
		. "\t" . "\$pos->val_SPREAD\t" . number_format($pos->val_SPREAD, 3);
		$msg .= "\n";
		
		$msg .= "\$pos->pr_TP\t" . number_format($pos->pr_TP, 3)
		. "\t" . "\$pos->pr_SL\t" . number_format($pos->pr_SL, 3);
		$msg .= "\n";
			
		$msg .= "\$pos->trail_starting_idx\t" . $pos->trail_starting_idx
		. "\t" . "\$pos->trail_starting_pr\t" . number_format($pos->trail_starting_pr, 3);
		$msg .= "\n";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, $fname, $file_line);
		
	}//public static function show_Basic_Pos_Data($pos, __FILE__, __LINE__) {

	/********************
	 * show_Basic_Pos_Data__Build_Lines
	 * 	at : 2020/01/12 17:44:31
	 ********************/
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos) {
	public static function show_Basic_Pos_Data__Build_Lines
	($pos, $lo_BarDatas, $fname, $file_line) {
// 	public static function show_Basic_Pos_Data__Build_Lines($pos, $fname, $file_line) {
		//_20200112_173841:caller
		//_20200112_173843:head
		//_20200112_173846:wl
		/********************
		* step : 1
		* 		prep : bardata
		********************/
		$bd = $lo_BarDatas[$pos->st_idx];
		
		//report
		//debug
// 		$msg = "\n"; $msg .= "(show_Basic_Pos_Data)";
		$msg = "\n"; $msg .= "(show_Basic_Pos_Data__Build_Lines)";
		$msg .= "\n";
			
		$msg .= "\$pos->st_idx\t" . $pos->st_idx 
				. "\t" 
				. "\$pos->st_pr\t" . number_format($pos->st_pr, 3)
				. "\t"
				. "\$lo_BarDatas[$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime
				;
		$msg .= "\n";
	
		$msg .= "\$pos->cu_idx\t" . $pos->cu_idx . "\t" . "\$pos->cu_pr\t" . number_format($pos->cu_pr, 3);
		$msg .= "\n";
	
		$msg .= "\$pos->rf_idx\t" . $pos->rf_idx . "\t" . "\$pos->rf_pr\t" . number_format($pos->rf_pr, 3);
		$msg .= "\n";
	
		$msg .= "\$pos->ext_idx\t" . $pos->ext_idx . "\t" . "\$pos->ext_pr\t" . number_format($pos->ext_pr, 3);
		$msg .= "\n";
	
		$msg .= "\$pos->val_TP\t" . number_format($pos->val_TP, 3)
		. "\t" . "\$pos->val_SL\t" . number_format($pos->val_SL, 3)
		. "\t" . "\$pos->val_SPREAD\t" . number_format($pos->val_SPREAD, 3);
		$msg .= "\n";
	
		$msg .= "\$pos->pr_TP\t" . number_format($pos->pr_TP, 3)
		. "\t" . "\$pos->pr_SL\t" . number_format($pos->pr_SL, 3);
		$msg .= "\n";
			
		$msg .= "\$pos->trail_starting_idx\t" . $pos->trail_starting_idx
		. "\t" . "\$pos->trail_starting_pr\t" . number_format($pos->trail_starting_pr, 3);
		$msg .= "\n";
			
		// return
		return $msg;
		
// 		Utils::write_Log__Fx_Admin(
// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 				, $msg, $fname, $file_line);
	
	}//public static function show_Basic_Pos_Data__Build_Lines($pos, $fname, $file_line) {
	
	/********************
	 * show_LO_Pos_Data__Build_Lines
	 * 	at : 2020/01/30 18:10:48
	 ********************/
	public static function show_LO_Pos_Data__Build_Lines($lo_Pos, $lo_BarDatas) {
		//_20200130_181154:caller
		//_20200130_181158:head
		//_20200130_181201:wl
	
		$lenOf_LO_Pos = count($lo_Pos);
		
		//show
		$msg = "\n";
		
		$msg .= "st_idx\tst_pr";
		$msg .= "\t";
		
		$msg .= "cu_idx\tcu_pr";
		$msg .= "\t";
		
		$msg .= "ext_idx\text_pr";
		$msg .= "\t";
		
		$msg .= "rf_idx\trf_pr";
		$msg .= "\t";
		
		$msg .= "base_idx\tbase_pr";
		$msg .= "\t";
		
		$msg .= "\n";
		
		//_20200128_174019:next
		for ($i = 0; $i < $lenOf_LO_Pos; $i++) {
		
			$pos = $lo_Pos[$i];
			
// 			$msg .= "-----------------------------------";
// 			$msg .= "\n";
			
			//_20200130_182020:next
			// start
			$msg .= $pos->st_idx . "\t" . $pos->st_pr;
			$msg .= "\t";
			
			// current
			$msg .= $pos->cu_idx . "\t" . $pos->cu_pr;
			$msg .= "\t";
			
			// exit
			$msg .= $pos->ext_idx . "\t" . $pos->ext_pr;
			$msg .= "\t";
			
			// refer
			$msg .= $pos->rf_idx . "\t" . $pos->rf_pr;
			$msg .= "\t";
			
			// base
			$msg .= $pos->base_idx . "\t" . $pos->base_pr;
			$msg .= "\t";
			
			// separator
			$msg .= "\n";
						
// 			// exit
// 			$msg .= "\$pos->ext_idx\t" . $pos->ext_idx;
// 			$msg .= " / ";
// 			$msg .= "\$pos->ext_pr\t" . $pos->ext_pr;
// 			$msg .= "\n";
			
// 			// date time
// 			$msg .= "\$lo_BarDatas[\$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime;
// 			$msg .= "\n";
// 			$msg .= "\n";
			
// 			$msg .= "\$pos->st_idx\t" . $pos->st_idx;
// 			$msg .= " / ";
// 			$msg .= "\$pos->st_pr\t" . $pos->st_pr;
// 			$msg .= "\n";
			
// 			// current
// 			$msg .= "\$pos->cu_idx\t" . $pos->cu_idx;
// 			$msg .= " / ";
// 			$msg .= "\$pos->cu_pr\t" . $pos->cu_pr;
// 			$msg .= "\n";
			
// 			// exit
// 			$msg .= "\$pos->ext_idx\t" . $pos->ext_idx;
// 			$msg .= " / ";
// 			$msg .= "\$pos->ext_pr\t" . $pos->ext_pr;
// 			$msg .= "\n";
			
// 			// date time
// 			$msg .= "\$lo_BarDatas[\$pos->st_idx]->dateTime\t" . $lo_BarDatas[$pos->st_idx]->dateTime;
// 			$msg .= "\n";
// 			$msg .= "\n";
			
		}//for ($i = 0; $i < $lenOf_LO_Pos; $i++)
		
		//debug
		$msg .= "len => $lenOf_LO_Pos";
		
		
		// return
		return $msg;
	
	}//public static function show_LO_Pos_Data__Build_Lines($lo_Pos) {
	
	
	
	/********************
	 * show_Basic_BarData_Data
	 * 	at : 2020/01/12 17:44:31
	 ********************/
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos) {
	public static function show_Basic_BarData_Data($bd, $fname, $file_line) {
		//_20200120_161219:caller
		//_20200120_161225:head
		//_20200120_161228:wl
	
		//report
		//debug
		$msg = "\n"; $msg .= "(show_Basic_BarData_Data)";
		$msg .= "\n";
			
		$msg .= "\$bd->dateTime\t" . $bd->dateTime;
		$msg .= "\n";
	
		$msg .= "\$bd->price_Open\t" . number_format($bd->price_Open, 3);
		$msg .= "\n";
	
		$msg .= "\$bd->price_Close\t" . number_format($bd->price_Close, 3);
		$msg .= "\n";
		$msg .= "\n";
	
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg, $fname, $file_line);
	
	}//public static function show_Basic_BarData_Data($pos, $fname, $file_line)
	
	/********************
	 * show_Basic_BarData_Data__Build_lines
	 * 	at : 2020/01/30 17:55:52
	 ********************/
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos) {
	public static function show_Basic_BarData_Data__Build_lines($bd, $fname, $file_line) {
		//_20200120_161219:caller
		//_20200120_161225:head
		//_20200120_161228:wl
	
		//report
		//debug
		$msg = "\n"; $msg .= "(show_Basic_BarData_Data)";
		$msg .= "\n";
			
		$msg .= "\$bd->dateTime\t" . $bd->dateTime;
		$msg .= "\n";
	
		$msg .= "\$bd->price_Open\t" . number_format($bd->price_Open, 3);
		$msg .= "\n";
	
		$msg .= "\$bd->price_Close\t" . number_format($bd->price_Close, 3);
		$msg .= "\n";
		$msg .= "\n";
	
		// return
		return $msg;
			
// 		Utils::write_Log__Fx_Admin(
// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 				, $msg, $fname, $file_line);
	
	}//public static function show_Basic_BarData_Data__Build_lines($bd, $fname, $file_line)

	/********************
	 * loop_J1_N
	 * 	at : 2020/01/12 17:44:40
	 ********************/
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop) {
	// 	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos) {
	public static function loop_J1_N($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos, $lo_Vals) {
		//_20200106_142418:caller
		//_20200106_142421:head
		//_20200106_142425:wl
		/********************
		 * step : 0 : 1
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
		 * step : 0 : 2
		 * 		vars
		********************/
		$typeOf_Bar = "";
	
		/********************
		 * step : B : j1 : N : 1
		 * 		log
		 ********************/
		$msg = "\n"; $msg .= "(loop_J1_N :: step : B : j1 : N : 1) position ==> NOT taken";
			
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg
				, __FILE__, __LINE__);
	
		/********************
		 * step : B : j1 : N : 2
		 * 		detect : pattern
		********************/
		//_20200114_115250:tmp
		$resultOf_Detect_Pattern = true;
		// 		$resultOf_Detect_Pattern = false;
	
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
			$msg = "\n"; $msg .= "(loop_J1_N :: step : B : j2 : Y : 1) pattern ==> detected";
	
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
				
			$val_Trail_Starting	= CONS::$val_Trail_Starting;
			// 			$val_Trail_Starting	= 0.4;
				
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
			LibEaTester::j2_Y_4_2(
					$pos, $idxOf_Loop, $bd
					, $val_TP, $val_SL, $val_SPREAD
					, $pr_TP, $pr_SL
					, $val_Trail_Starting
			);
			// 			LibEaTester::j2_Y_4_2($pos, $idxOf_Loop, $bd, $val_TP, $val_SL, $val_SPREAD, $pr_TP, $pr_SL);
	
			//debug
			//_20200112_173733:tmp
			//_20200112_173841:caller
			LibEaTester::show_Basic_Pos_Data($pos, __FILE__, __LINE__);
				
			/********************
			 * step : B : j2 : Y : 5
			 * 		get ==> bar type
			********************/
			//_20200107_153029:next
			//_20200109_175550:caller
			$typeOf_Position = "BUY";
				
			$valOf_Ret__received = LibEaTester::get_Bar_Type($pos, $bd, $typeOf_Position);
				
			$typeOf_Bar = $valOf_Ret__received;
				
			//debug
			$msg = "\n"; $msg .= "(loop_J1_N :: step : B : j2 : Y : 5) get ==> bar type ; $typeOf_Bar";
			$msg .= "\n";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg
					, __FILE__, __LINE__);
	
		} else {//if ($resultOf_Detect_Pattern == true) {
			/********************
			 * step : B : j2 : N
			 * 		pattern ==> NOT detected
			 ********************/
			/********************
			 * step : B : j2 : N : 1
			 * 		log
			 ********************/
			$msg = "\n"; $msg .= "(loop_J1_N :: step : B : j2 : N : 1) pattern ==> NOT detected";
				
			Utils::write_Log__Fx_Admin(
					CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
					, $msg
					, __FILE__, __LINE__);
	
			//_20200113_175050:next
				
			//_
			$typeOf_Bar = CONS::$strOf_Pattern_Detection__Undetected;
				
		}//if ($resultOf_Detect_Pattern == true)
	
		/********************
		 * step : C : X
		 * 		return
		 ********************/
		/********************
		 * step : C : X : 1
		 * 		set
		 ********************/
		// 		//test:20200117_122008
		// 		$msg = "\n"; $msg .= "(loop_J1_N :: step : C : X : 1) TESTING... ==> \$typeOf_Bar set to --> "
		// 						. CONS::$strOf_BarType__SL . "(CONS::\$strOf_BarType__SL)";
			
		// 		Utils::write_Log__Fx_Admin(
		// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
		// 				, $msg
		// 				, __FILE__, __LINE__);
	
		// 		$valOf_Ret = [$flg_Position, $pos, CONS::$strOf_BarType__SL];
		//_20200114_121654:next
		$valOf_Ret = [$flg_Position, $pos, $typeOf_Bar];
		// 		$valOf_Ret = [$flg_Position, $pos];
		// 		$valOf_Ret = [$flg_Position];
	
		/********************
		 * step : C : X : 2
		 * 		return
		********************/
		return $valOf_Ret;
	
	
	}//public static function loop_J1_N($lo_BarDatas, $flg_Position) {
	
	
	
	/********************
	* loop_J1_N
	* 	at : 2020/01/12 17:44:40
	********************/
	public static function loop_J1_Y($lo_BarDatas, $flg_Position, $idxOf_Loop, $pos, $lo_Vals) {
		//_20200202_145137:caller
		//_20200202_145140:head
		//_20200202_145143:wl
		/********************
		 * step : 0 : 1
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
		 * step : 0 : 2
		 * 		vars
		 ********************/
		$typeOf_Bar = "";
		
		$lo_Log_Lines = array();
		
		// bar data
		$bd = $lo_BarDatas[$idxOf_Loop];
		
		/********************
		 * step : B : j1 : Y : 1
		 * 		log
		 ********************/
		$msg = "\n"; $msg .= "(loop_J1_Y :: step : B : j1 : Y : 1) position ==> taken";
			
		array_push($lo_Log_Lines, $msg);
		
// 		Utils::write_Log__Fx_Admin(
// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 				, $msg
// 				, __FILE__, __LINE__);
		
			
				
		/********************
		 * step : B : j1 : Y : 2
		 * 		get ==> bar type
		 ********************/
		//_20200107_153029:next
		//_20200109_175550:caller
		$typeOf_Position = "BUY";
		
		$valOf_Ret__received = LibEaTester::get_Bar_Type($pos, $bd, $typeOf_Position);
		
		$typeOf_Bar = $valOf_Ret__received;
		
		//debug
		$msg = "\n"; $msg .= "(loop_J1_Y :: step : B : j1 : Y : 2) get ==> bar type ; $typeOf_Bar";
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, $msg
				, __FILE__, __LINE__);
				
		/********************
		 * step : C : X
		 * 		return
		 ********************/
		/********************
		 * step : C : X : 1
		 * 		set
		 ********************/
// 		//test:20200117_122008
// 		$msg = "\n"; $msg .= "(loop_J1_N :: step : C : X : 1) TESTING... ==> \$typeOf_Bar set to --> "
// 						. CONS::$strOf_BarType__SL . "(CONS::\$strOf_BarType__SL)";
			
// 		Utils::write_Log__Fx_Admin(
// 				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
// 				, $msg
// 				, __FILE__, __LINE__);
		
// 		$valOf_Ret = [$flg_Position, $pos, CONS::$strOf_BarType__SL];
		//_20200114_121654:next
		$valOf_Ret = [$flg_Position, $pos, $typeOf_Bar];
// 		$valOf_Ret = [$flg_Position, $pos];
// 		$valOf_Ret = [$flg_Position];
		
		/********************
		 * step : C : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
		
	}//public static function loop_J1_Y
	
	/********************
	* fx_tester_T_1__Exec
	* 	at : 2020/01/06 13:10:56
	********************/
// 	public static function fx_tester_T_1__Exec($lo_BarDatas) {
	public static function fx_tester_T_1__Exec($lo_BarDatas, $_num_Loop_Start) {
		//_20200201_160828:caller
		//_20200201_160833:head
		//_20200201_160836:wl
		
		/********************
		* step : A : 0
		* 		prep : log lines
		********************/
		//_20200130_175642:marker
		$lo_Log_Lines = array();
		
		/********************
		* step : A : 1
		* 		prep
		********************/
		// len
		$lenOf_LO_BarDatas = count($lo_BarDatas);
		
		// flags
// 		$flg_Position = true;
		$flg_Position = false;
		
		// counter
		$cntOf_Loop = 0;
		
		$maxOf_Loop = 10;
		
		// loop control
		$num_Loop_Start = $_num_Loop_Start;
// 		$num_Loop_Start = 0;
		
		// Pos instance
		$pos = new Pos;
		
		// list of vals
		$lo_Vals = [
				'val_TP'	=> 0.10
				, 'val_SL'	=> 0.05
				, 'val_SPREAD'	=> 0.01
		];

		// valof return
		$valOf_Ret__received = [];
		
		// for-loop index
		$idxOf_For_Loop = -1;
		
		/********************
		* step : B
		* 		for-loop
		********************/
		/********************
		* step : B : 0
		* 		setup
		********************/
		//debug:20200121_171036
		$msg	= "\$_num_Loop_Start\t" . $_num_Loop_Start;
		$msg	.= "\n";

		// append
		array_push($lo_Log_Lines, $msg);
		
		//_20200201_163626:next
		for ($i = $num_Loop_Start; $i < $lenOf_LO_BarDatas; $i++) {
			
			/********************
			* step : B : 0
			* 		prep
			********************/
			$idxOf_For_Loop = $i;
			
			
			/********************
			* step : B : 1
			* 		loop start
			********************/
			$msg = "(step : B : 1) ========================= [loop : \$i = $i]";
			$msg .= "\n";
			
			// append
			array_push($lo_Log_Lines, $msg);
				
			/********************
			* step : B : 1 : 1
			* 		debug : show bar data
			********************/
			$msg = LibEaTester::show_Basic_BarData_Data__Build_lines(
								$lo_BarDatas[$i]
								, CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin);

			// append
			array_push($lo_Log_Lines, $msg);
				
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
				
				// append
				array_push($lo_Log_Lines, $msg);
				
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

				// append
				array_push($lo_Log_Lines, $msg);
				
				/********************
				 * step : B : j1 : Y : 2
				 * 		processing : j1_Y_2
				 ********************/
				//_20200202_144153:tmp
				$msg = "\n"; $msg .= "(step : B : j1 : Y : 2) processing : j1_Y_2";
				
				// append
				array_push($lo_Log_Lines, $msg);
				
				//debug
				Utils::write_Log__Fx_Admin(
						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
						, join("", $lo_Log_Lines), __FILE__, __LINE__);
				
				$lo_Log_Lines = array();
				
				//_20200106_142418:caller
				//$valOf_Ret = [$flg_Position, $pos];
				// 				$valOf_Ret = LibEaTester::loop_J1_N($lo_BarDatas, $flg_Position, $i, $pos);
				
				// $valOf_Ret = [$flg_Position, $pos, $typeOf_Bar]
				//_20200202_145137:caller
				$valOf_Ret__received = LibEaTester::loop_J1_Y($lo_BarDatas, $flg_Position, $i, $pos, $lo_Vals);
				
// 				/********************
// 				 * step : C : post-j1 : 1
// 				 * 		log
// 				********************/
// 				// unpack
// 				$flg_Position	= $valOf_Ret__received[0];
// 				$pos			= $valOf_Ret__received[1];
// 				$typeOf_Bar		= $valOf_Ret__received[2];
				
			} else {
				/********************
				 * step : B : j1 : N
				 * 		position ==> NOT taken
				 ********************/
				/********************
				 * step : B : j1 : N : 1
				 * 		log
				 ********************/
				//debug
				$msg = "\n";
				
				$msg .= "(step : B : j1 : N : 1) position ==> NOT taken";
				$msg .= "\n";
				
				// append
				array_push($lo_Log_Lines, $msg);

				Utils::write_Log__Fx_Admin(
						CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
						, join("", $lo_Log_Lines), __FILE__, __LINE__);
				
				$lo_Log_Lines = array();
				
				//_20200106_142418:caller
				$valOf_Ret__received = LibEaTester::loop_J1_N($lo_BarDatas, $flg_Position, $i, $pos, $lo_Vals);
				
// 				//_20200202_151340:next
// 				/********************
// 				 * step : C : post-j1 : 1
// 				 * 		log
// 				 ********************/
// 				// unpack
// 				$flg_Position	= $valOf_Ret__received[0];
// 				$pos			= $valOf_Ret__received[1];
// 				$typeOf_Bar		= $valOf_Ret__received[2];

// 				//debug
// 				$msg = "\n";
				
// 				$msg .= "(step : C : post-j1 : 1) LibEaTester::loop_J1_N ==> returned";
// 				$msg .= "\n";
				
// 				//ref https://stackoverflow.com/questions/2795177/how-to-convert-boolean-to-string
// 				$msg .= "\$flg_Position\t" . var_export($flg_Position, true);
// 				$msg .= "\n";
				
// 				$msg .= "\$pos : st_idx = " . $pos->st_idx
// 						 . "(" . (($pos->st_idx >= 0) ? $lo_BarDatas[$pos->st_idx]->dateTime . ")" : "NO ENTRY") . ")"
// 						. " / "
// 						. "\$pos->st_pr = " . $pos->st_pr;
// 				$msg .= "\n";
					
// 				$msg .= "\$typeOf_Bar\t$typeOf_Bar";
// 				$msg .= "\n";
				
// 				// append
// 				array_push($lo_Log_Lines, $msg);
				
			}//if ($flg_Position == true)

			//_20200202_151340:next
			/********************
			 * step : C : post-j1 : 1
			 * 		log
			 ********************/
			// unpack
			$flg_Position	= $valOf_Ret__received[0];
			$pos			= $valOf_Ret__received[1];
			$typeOf_Bar		= $valOf_Ret__received[2];
			
			//debug
			$msg = "\n";
			$msg .= "[" . Utils::get_CurrentTime() . " : " . basename(__FILE__) . " : " . __LINE__ . "]\n";
			
			$msg .= "(step : C : post-j1 : 1) LibEaTester::loop_J1_N ==> returned";
			$msg .= "\n";
			
			//ref https://stackoverflow.com/questions/2795177/how-to-convert-boolean-to-string
			$msg .= "\$flg_Position\t" . var_export($flg_Position, true);
			$msg .= "\n";
			
			$msg .= "\$pos : st_idx = " . $pos->st_idx
			. "(" . (($pos->st_idx >= 0) ? $lo_BarDatas[$pos->st_idx]->dateTime . ")" : "NO ENTRY") . ")"
					. " / "
					. "\$pos->st_pr = " . $pos->st_pr;
			$msg .= "\n";
				
			$msg .= "\$typeOf_Bar\t$typeOf_Bar";
			$msg .= "\n";
			
			// append
			array_push($lo_Log_Lines, $msg);
			
			/********************
			 * step : D : 1
			 * 		for-loop : continue admin
			 ********************/
			/********************
			 * step : D : 1 : 1
			 * 		log
			 ********************/
			//_20200116_142816:next
			$msg = "(step : D : 1 : 1) for-loop : continue admin";
			$msg .= "\n";

			// append
			array_push($lo_Log_Lines, $msg);
				
			/********************
			 * step : D : 1 : 2
			 * 		dispatch
			 ********************/
			if ($typeOf_Bar == CONS::$strOf_Pattern_Detection__Undetected) {
				/********************
				 * step : D : 1 : 2-1
				 * 		UNDETECTED
				 ********************/
				//_20200116_173730:next
			
			} else if ($typeOf_Bar == CONS::$strOf_BarType__C4) {
				/********************
				 * step : D : 1 : 2-2
				 * 		C4
				 ********************/
				$msg = "(step : D : 1 : 2-2) C4";
				$msg .= "\n";
				
				$msg .= "[" . Utils::get_CurrentTime() . " : " . basename(__FILE__) . " : " . __LINE__ . "]\n";
				$msg .= "\n";
				
				$msg .= "calling ==> LibEaTester::show_Basic_Pos_Data__Build_Lines";
				$msg .= "\n";
					
				$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $lo_BarDatas, __FILE__, __LINE__);
				
				// append
				array_push($lo_Log_Lines, $msg);
				
			} else if ($typeOf_Bar == CONS::$strOf_BarType__C5) {
				/********************
				 * step : D : 1 : 2-3
				 * 		C5
				 ********************/
				
			} else if ($typeOf_Bar == CONS::$strOf_BarType__SL) {
				/********************
				 * step : D : 1 : 2-4
				 * 		SL
				 ********************/
				/********************
				 * step : D : 1 : 2-4 : 1
				 * 		log
				 ********************/
				$msg = "(step : D : 1 : 2-4 : 1) SL";
				$msg .= "\n";

				$msg .= "[" . Utils::get_CurrentTime() . " : " . basename(__FILE__) . " : " . __LINE__ . "]\n";
				$msg .= "\n";
				
				$msg .= "calling ==> LibEaTester::show_Basic_Pos_Data__Build_Lines";
				$msg .= "\n";

				$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $lo_BarDatas, __FILE__, __LINE__);
				
				// append
				array_push($lo_Log_Lines, $msg);
				
				/********************
				 * step : D : 1 : 2-4 : 2
				 * 		set val : loop num
				 ********************/
				$msg = "(step : D : 1 : 2-4 : 2) set val : loop num";
				$msg .= "\n";
					
				// append
				array_push($lo_Log_Lines, $msg);
				
				$valOf_Ret__received[3] = $i;
				
				/********************
				 * step : D : 1 : 2-4 : 3
				 * 		pos data ==> update
				 ********************/
				//_20200203_142642:next
				
				
				/********************
				 * step : D : 1 : 2-4 : X
				 * 		loop ==> break
				 ********************/
				$msg = "(step : D : 1 : 2-4 : X) for-loop ==> breaking... (\$i = $i)";
				$msg .= "\n";
				
				// append
				array_push($lo_Log_Lines, $msg);
				
				break;
				
// 				LibEaTester::show_Basic_Pos_Data($pos, __FILE__, __LINE__);
				
			} else if ($typeOf_Bar == CONS::$strOf_BarType__TP) {
				/********************
				 * step : D : 1 : 2-5
				 * 		TP
				 ********************/
				/********************
				 * step : D : 1 : 2-5 : 1
				 * 		log
				 ********************/
				$msg = "(step : D : 1 : 2-5 : 1) TP";
				$msg .= "\n";

				$msg .= "[" . Utils::get_CurrentTime() . " : " . basename(__FILE__) . " : " . __LINE__ . "]\n";
				$msg .= "\n";
				
				$msg .= "calling ==> LibEaTester::show_Basic_Pos_Data__Build_Lines";
				$msg .= "\n";
				
				$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $lo_BarDatas, __FILE__, __LINE__);
				
				// append
				array_push($lo_Log_Lines, $msg);
				
				/********************
				 * step : D : 1 : 2-5 : 2
				 * 		set val : loop num
				********************/
				$msg = "(step : D : 1 : 2-5 : 2) set val : loop num";
				$msg .= "\n";
					
				// append
				array_push($lo_Log_Lines, $msg);
				
				$valOf_Ret__received[3] = $i;
				
				/********************
				 * step : D : 1 : 2-5 : 3
				 * 		loop ==> break
				 ********************/
				$msg = "(step : D : 1 : 2-5 : 3) for-loop ==> breaking... (\$i = $i)";
				$msg .= "\n";
				
				// append
				array_push($lo_Log_Lines, $msg);
				
				break;		
						
			} else {
				/********************
				 * step : D : 1 : 2-X
				 * 		unknown bar type
				 ********************/
				/********************
				 * step : D : 1 : 2-X : 1
				 * 		log
				 ********************/
				$msg = "(step : D : 1 : 2-X : 1) unknown bar type";
				$msg .= "\n";

				$msg .= "[" . Utils::get_CurrentTime() . " : " . basename(__FILE__) . " : " . __LINE__ . "]\n";
				$msg .= "\n";
				
				$msg .= "calling ==> LibEaTester::show_Basic_Pos_Data__Build_Lines";
				$msg .= "\n";
				
				$msg .= LibEaTester::show_Basic_Pos_Data__Build_Lines($pos, $lo_BarDatas, __FILE__, __LINE__);
				
				// append
				array_push($lo_Log_Lines, $msg);
				
			}//if ($typeOf_Bar == )
			
			
		}//for ($i = $num_Loop_Start; $i < $lenOf_LO_BarDatas; $i++)

		/********************
		 * step : ??
		 * 		log
		 ********************/
		Utils::write_Log__Fx_Admin(
				CONS::$dpath_Log_Fx_Admin, CONS::$fname_Log_Fx_Admin
				, join("", $lo_Log_Lines), __FILE__, __LINE__);

		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		// loop index
		$valOf_Ret__received[3] = $idxOf_For_Loop;
		
		$valOf_Ret = $valOf_Ret__received;
		
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		return $valOf_Ret;
		
	}//public static function fx_tester_T_1__Exec($lo_BarDatas)
		
}//class Libfx
	
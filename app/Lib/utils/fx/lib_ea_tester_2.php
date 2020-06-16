<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
class LibEaTester_2 {

	/********************
	 * is_Trailing($_bardata, $pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log)
	 *
	 * at : 2020/06/05 12:35:59
	 *
	 * @return boolean
	 *
	 ********************/
	// 	public static function set_Vals_To_Pos($pos, $i, $bardata) {
	public static function
	is_Trailing($_bardata, $pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
		//caller:20200606_181304	
		//head:20200606_181307
		//wl:20200606_181311
		/********************
		 * step : 1
		 * 		prep : vars
		 ********************/
		$pr_Close = $_bardata->price_Close;
		
		/********************
		 * step : 1 : 1
		 * 		prep : trail starting price
		 ********************/
		if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY) {
		
			$pr_Trail_Start = $pos->st_pr + $pos->val_Trail_Starting + $pos->val_SPREAD;
		
		} else if ($_strOf_Position_Type == CONS::$strOf_Position_Type__SELL) {
			
			$pr_Trail_Start = $pos->st_pr - $pos->val_Trail_Starting - $pos->val_SPREAD;
			
		} else {
		
			$msg = "[FUNC : is_Trailing]";
			$msg .= "\n";
			
			$msg .= "unknown position type : $_strOf_Position_Type";
			$msg .= "\n";
			
			$msg .= "using default val : CONS::\$strOf_Position_Type__BUY (CONS::$strOf_Position_Type__BUY)";
			$msg .= "\n";
			
			// separator
			$msg .= "\n";
			
			//debug : write
			Utils::write_Log__Fx_Admin(
					$_dpath_Log, $_fname_Log
					, $msg, __FILE__, __LINE__);

			// set val
			$pr_Trail_Start = $pos->st_pr + $pos->val_Trail_Starting + $pos->val_SPREAD;
			
		}//if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY)

		/********************
		 * step : 2
		 * 		judge
		 ********************/
		if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY) {
		
			$cond_1_Trail_Start = ($pr_Close >= $pr_Trail_Start);
		
		} else if ($_strOf_Position_Type == CONS::$strOf_Position_Type__SELL) {
				
			$cond_1_Trail_Start = ($pr_Close <= $pr_Trail_Start);
				
		} else {
		
			$msg = "[FUNC : is_Trailing]";
			$msg .= "\n";
				
			$msg .= "unknown position type : \$cond_1_Trail_Start ==> set to true (default)";
			$msg .= "\n";
				
			// separator
			$msg .= "\n";
				
			//debug : write
			Utils::write_Log__Fx_Admin(
					$_dpath_Log, $_fname_Log
					, $msg, __FILE__, __LINE__);
		
			// set val
			$cond_1_Trail_Start = true;
				
		}//if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY)		

		/********************
		 * step : X
		 * 		return
		 ********************/
		return $cond_1_Trail_Start;
		
		//dummy
// 		return false;
		
	}//is_Trailing($_bardata, $pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
	
	/********************
	 * is_TP
	 *
	 * at : 2020/06/05 12:35:59
	 *
	 * @return boolean
	 *
	 ********************/
	// 	public static function set_Vals_To_Pos($pos, $i, $bardata) {
	public static function
	is_TP($_bardata, $_pr_TP, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
		//caller:20200605_123614	
		//head:20200605_123619
		//wl:20200605_123623
	
		/********************
		 * step : 1
		 * 		prep
		 ********************/
		$pr_Close = $_bardata->price_Close;
	
		/********************
		 * step : 2
		 * 		cond.
		 ********************/
		if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY) {
	
			$cond_1 = ($pr_Close >= $_pr_TP);
	
		} else if ($_strOf_Position_Type == CONS::$strOf_Position_Type__SELL) {
				
			$cond_1 = ($pr_Close <= $_pr_TP);
				
		} else {
	
			$msg = "unknown position type : $_strOf_Position_Type";
			$msg .= "\n";
	
			$msg .= "using default ==> BUY";
			$msg .= "\n";
	
			// write log
			Utils::write_Log__Fx_Admin(
					$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
					, $msg, $_dpath_Log, $_fname_Log);
	
			$cond_1 = ($pr_Close >= $_pr_TP);
	
		}//if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY)
			
		/********************
		 * step : 3
		 * 	judge
		 ********************/
		return $cond_1;
	
	}//is_TP
	
	/********************
	 * is_SL
	 *
	 * at : 2020/06/04 17:53:11
	 *
	 * @return void
	 *
	 ********************/
// 	public static function set_Vals_To_Pos($pos, $i, $bardata) {
	public static function 
	is_SL($_bardata, $_pr_SL, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
		//caller:20200604_175459
		//head:20200604_175507
		//wl:20200604_175511

		/********************
		 * step : X
		 * 		debug
		 ********************/
		//debug
		$msg = "\n";
		$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";
		
		$msg .= "(is_SL) starting...";
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				$_dpath_Log, $_fname_Log
				, $msg, __FILE__, __LINE__);
		
		/********************
		 * step : 1
		 * 		prep
		 ********************/
		$pr_Close = $_bardata->price_Close;
		
		/********************
		 * step : 2
		 * 		cond.
		 ********************/
		 if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY) {
		 	
		 	$cond_1 = ($pr_Close <= $_pr_SL);
		 	
		 } else if ($_strOf_Position_Type == CONS::$strOf_Position_Type__SELL) {
		 
		 	$cond_1 = ($pr_Close >= $_pr_SL);
		 
		 } else {

		 	$msg = "unknown position type : $_strOf_Position_Type";
		 	$msg .= "\n";
		 	
		 	$msg .= "using default ==> BUY";
		 	$msg .= "\n";
		 	
		 	// write log
		 	Utils::write_Log__Fx_Admin(
		 			$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
		 			, $msg, $_dpath_Log, $_fname_Log);
		 	
		 	$cond_1 = ($pr_Close <= $_pr_SL);
// 		 	$cond_1 = ($pr_Close >= $_pr_SL);
		 	
		 }//if ($_strOf_Position_Type == CONS::$strOf_Position_Type__BUY)

		 
		 /********************
		  * step : X
		  * 		debug
		  ********************/
		 //debug
		 $msg = "\n";
		 $msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		 $msg .= "\n";
		 
		 $msg .= "(is_SL) ending...";
		 $msg .= "\n";
		 
		 Utils::write_Log__Fx_Admin(
		 		$_dpath_Log, $_fname_Log
		 		, $msg, __FILE__, __LINE__);
		 	
		 /********************
		  * step : 3
		  * 	judge
		  ********************/
		return $cond_1;
		
	}//is_SL($bardata, $_dpath_Log, $_fname_Log) {
		
	/********************
	 * set_Vals_To_Pos__First_Occasion
	 *
	 * at : 2020/06/04 17:53:11
	 *
	 * @return void
	 *
	 ********************/
// 	public static function set_Vals_To_Pos($pos, $i, $bardata) {
	public static function 
	set_Vals_To_Pos__First_Occasion(
			$_pos
			, $_i
			, $_bardata
			
			, $_strOf_Position_Type
			
			, $_val_TP
			, $_val_SL
			, $_val_SPREAD
			, $_val_FxTester_Trail_Starting_Diff
		) {
// 	($_pos, $_i, $_bardata, $_val_TP, $_val_SL, $_val_SPREAD) {
		//caller:20200604_123001
		//head:20200604_123006
		//wl:20200604_123014

		/********************
		 * step : 0
		 * 		calc
		 ********************/
		//ref //ref:20200604_122301 / LibEaTester
		$pr_TP			= $_bardata->price_Open + ($_val_TP + $_val_SPREAD);
		$pr_SL			= $_bardata->price_Open - ($_val_SL + $_val_SPREAD);
		
		/********************
		 * step : 1
		 * 		starting
		 ********************/
		$_pos->st_idx	= $_i;
		$_pos->st_pr		= $_bardata->price_Open;
		
		/********************
		 * step : 2
		 * 		current
		 ********************/
		$_pos->cu_idx	= $_i;
		$_pos->cu_pr		= $_bardata->price_Open;
		
		/********************
		 * step : 3
		 * 		TP, SL, SPREAD
		 ********************/
		$_pos->val_TP			= $_val_TP;
		$_pos->val_SL			= $_val_SL;
		$_pos->val_SPREAD		= $_val_SPREAD;

		/********************
		 * step : 4
		 * 		$pr_TP, $pr_SL
		 ********************/
		$_pos->pr_TP		= $pr_TP;
		$_pos->pr_SL		= $pr_SL;

		/********************
		 * step : 5
		 * 		$val_Trail_Starting
		 ********************/
		$_pos->val_Trail_Starting	= $_val_FxTester_Trail_Starting_Diff;

		/********************
		 * step : 6
		 * 		$position_type
		 ********************/
		$_pos->position_type	= $_strOf_Position_Type;
		
	}//set_Vals_To_Pos__First_Occasion
	
	/********************
	 * update_Pos__First_Bar
	 *
	 * at : 2020/06/08 13:54:04
	 *
	 * @return void
	 *
	 ********************/
	// 	public static function set_Vals_To_Pos($pos, $i, $bardata) {
	public static function
	update_Pos__First_Bar(
			$_bardata
			, $_pos
			, $idxOf_For_Loop
			, $_strOf_Position_Type
			, $_dpath_Log, $_fname_Log
			
			) {
//caller:20200608_135413
//head:20200608_135418
//wl:20200608_135422
	
		/********************
		 * step : 1
		 * 		prep
		 ********************/
		
		//code:20200608_135648:c
		$msg = "\n";
		
		$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";
		
		$msg .= "update_Pos__First_Bar ==> starting...";
		$msg .= "\n";
		
		/********************
		 * step : 2
		 * 		update
		 ********************/
		/********************
		 * step : 2
		 * 		current
		 ********************/
		//debug
		$msg .= "\$_pos->cu_pr (before)" . "\t" . number_format($_pos->cu_pr, 3);
		$msg .= "\n";
		
		//code:20200608_140904:c
		$_pos->cu_idx	= $idxOf_For_Loop;
		$_pos->cu_pr	= $_bardata->price_Close;

		//debug
		$msg .= "\$_pos->cu_pr (after)" . "\t" . number_format($_pos->cu_pr, 3);
		$msg .= "\n";
		

		/********************
		 * step : X
		 * 		debug
		 ********************/
		$msg .= "\n";
		$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";
		
		$msg .= "update_Pos__First_Bar ==> exiting...";
		$msg .= "\n";
		
		Utils::write_Log__Fx_Admin(
				$_dpath_Log, $_fname_Log
				, $msg, __FILE__, __LINE__);
		
		
	}//update_Pos__First_Bar($_bardata, $_pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
	
	/********************
	 * update_Pos
	 *
	 * at : 2020/06/06 11:33:58
	 *
	 * @return void
	 *
	 ********************/
	// 	public static function set_Vals_To_Pos($pos, $i, $bardata) {
	public static function
// 	update_Pos($_bardata, $_pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
	update_Pos($_bardata, $_pos, $idxOf_Loop, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
//caller:20200606_113407
//head:20200606_113413
//wl:20200606_113416
	
		/********************
		 * step : 1
		 * 		prep
		 ********************/

		/********************
		 * step : X
		 * 		debug
		 ********************/
		$msg = "\n";
		$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";
		
		$msg .= "(update_Pos) starting...";
		$msg .= "\n";
		
// 		$msg .= "\$_dpath_Log = $_dpath_Log";
// 		$msg .= "\n";
		
// 		$msg .= "\$_fname_Log = $_fname_Log";
// 		$msg .= "\n";
		
// 		debug($msg);
		
// 		Utils::write_Log__Fx_Admin(
// 				$_dpath_Log, $_fname_Log
// 				, $msg, __FILE__, __LINE__);

// 		$msg = "\n";
// 		$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
// 		$msg .= "\n";
		
// 		$msg .= "(update_Pos) ending...";
// 		$msg .= "\n";
		
// 		debug($msg);
		
		/********************
		 * step : 2
		 * 		$pos ==> update
		 ********************/
		/********************
		 * step : 2 : 1
		 * 		$pos : current
		 ********************/
		//code:20200615_163128:c
		// index
		$_pos->cu_idx	= $idxOf_Loop;
		
		// price
		$_pos->cu_pr		= $_bardata->price_Close;

		//debug
		$msg = "\n";
		$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
		$msg .= "\n";

		/********************
		 * step : X
		 * 		debug
		 ********************/
		$msg .= "(update_Pos) ending...";
		$msg .= "\n";

		Utils::write_Log__Fx_Admin(
				$_dpath_Log, $_fname_Log
				, $msg, __FILE__, __LINE__);
		
	}//update_Pos($_bardata, $_pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
	
	/********************
	 * judge_Bar_SL_TP_Trail
	 *
	 * at : 2020/06/14 12:55:58
	 *
	 * @return void
	 ********************/
	public static function
	judge_Bar_SL_TP_Trail__BUY
	($bardata, $pos, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester) {
//caller:20200614_125632
//head:20200614_125635
//wl:20200614_125639
	
	/********************
	 * step : 1
	 * 		prep
	 ********************/

// 	/********************
// 	 * step : X
// 	 * 		debug
// 	 ********************/
// 	//debug
// 	$msg = "\n";
// 	$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
// 	$msg .= "\n";
	
// 	$msg .= "(judge_Bar_SL_TP_Trail__BUY) starting...";
// 	$msg .= "\n";
	
// 	Utils::write_Log__Fx_Admin(
// 			$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 			, $msg, __FILE__, __LINE__);
	
	/********************
	 * step : 1 : 1
	 * 		prep : vars
	 ********************/
	$price_SL = $pos->pr_SL;
	$price_TP = $pos->pr_TP;
	$price_Trail_Starting = $pos->trail_starting_pr;
	
	// start
	$price_Start = $pos->st_pr;
	$idx_Start = $pos->st_idx;
	
	// current (previous close)
	$price_Current = $pos->cu_pr;
	$idx_Current = $pos->cu_idx;

	$bardata_Date_Time = $bardata->dateTime;
	
	// bar data
	$price_Close = $bardata->price_Close;
	
	/********************
	 * step : 1 : 2
	 * 		debug
	 ********************/
	//code:20200614_132656:c
	//log
	$msg = "\n";
	
	$msg .= $msg = "[" . basename(__FILE__) . " : " . __LINE__ . "]";
	$msg .= "\n";
	
	$msg .= "(judge_Bar_SL_TP_Trail__BUY)";
	$msg .= "\n";
	
	$msg .= sprintf("\$price_SL\t%.03f\n\$price_TP\t%.03f\n\$price_Trail_Starting\t%.03f"
				, $price_SL, $price_TP, $price_Trail_Starting
			);
	$msg .= "\n";
	
	$msg .= sprintf("\$pos->val_Trail_Starting\t%.03f"
				, $pos->val_Trail_Starting
			);
	$msg .= "\n";
	
	$msg .= sprintf("\$price_Start\t%.03f (idx = %d)"
				, $price_Start, $idx_Start
			);
	$msg .= "\n";
	
	$msg .= sprintf("\$price_Current\t%.03f (idx = %d)"
				, $price_Current, $idx_Current
			);
	$msg .= "\n";
	
	$msg .= sprintf("\$price_Close\t%.03f"
				, $price_Close
			);
	$msg .= "\n";
	
	$msg .= sprintf("\$bardata_Date_Time\t%s"
				, $bardata_Date_Time
			);
	$msg .= "\n";
	
	// separator
	$msg .= "\n";
	
	Utils::write_Log__Fx_Admin(
			$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			, $msg, __FILE__, __LINE__);
	
	/********************
	 * step : 2
	 * 		judge : SL
	 ********************/
	/********************
	 * step : 2 : 1
	 * 		judge
	 ********************/
	//code:20200614_134638:c
	$cond_1__Is_SL = LibEaTester_2::is_SL(
			$bardata
			, $pos->pr_SL
			, CONS::$strOf_Position_Type__BUY
			, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			);

	$msg = "\n";
	
	$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
	$msg .= "\n";
	$msg .= "(step : 2 ==> judge : SL)";
	$msg .= "\n";
	
	$msg .= ($cond_1__Is_SL == true) ? "is_SL ==> true" : "is_SL ==> false";
	$msg .= "\n";
	
	// separator
	$msg .= "\n";

	Utils::write_Log__Fx_Admin(
			$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			, $msg, __FILE__, __LINE__);

	/********************
	 * step : 2 : 2
	 * 		return
	 ********************/
	if ($cond_1__Is_SL == true) {
	
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		$strOf_BarResult = CONS::$strOf_BarResult__SL;
			
		// dummy
		$valOf_Ret = array($strOf_BarResult);
	
		/********************
		 * step : X : 2
		 * 		return
		 ********************/
		// return
		return $valOf_Ret;
					
	}//if ($cond_1__Is_SL == true)
	;

	//code:20200614_135039:c
	/********************
	 * step : 3
	 * 		judge : TP
	 ********************/
	/********************
	 * step : 3 : 1
	 * 		judge
	 ********************/
	$cond_2__Is_TP = LibEaTester_2::is_TP(
			$bardata
			, $pos->pr_TP
			, CONS::$strOf_Position_Type__BUY
			, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
	);
	
	$msg = "\n";
	
	$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
	$msg .= "\n";
	$msg .= "(step : 3 ==> judge : TP)";
	$msg .= "\n";
	
	$msg .= ($cond_2__Is_TP == true) ? "is_TP ==> true" : "is_TP ==> false";
	$msg .= "\n";
	
	// separator
	$msg .= "\n";
	
	Utils::write_Log__Fx_Admin(
			$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			, $msg, __FILE__, __LINE__);
	
	/********************
	 * step : 3 : 2
	 * 		return
	 ********************/
	if ($cond_2__Is_TP == true) {
	
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : X : 1
		 * 		prep
		 ********************/
		$strOf_BarResult = CONS::$strOf_BarResult__TP;
			
		// dummy
		$valOf_Ret = array($strOf_BarResult);
	
		/********************
		 * step : X : 2
		 * 		return
		********************/
		// return
		return $valOf_Ret;
			
	}//if ($cond_2__Is_TP == true)	
		
	/********************
	 * step : 4
	 * 		judge : Trail
	 ********************/
	//code:20200614_135508:c
	/********************
	 * step : 4 : 1
	 * 		judge
	 ********************/
	$cond_3__Is_Trail = LibEaTester_2::is_Trailing(
			$bardata
			, $pos
			, CONS::$strOf_Position_Type__BUY
			, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			);
// 	$cond_3__Is_Trail = LibEaTester_2::is_TP(
// 			$bardata
// 			, $pos->pr_TP
// 			, CONS::$strOf_Position_Type__BUY
// 			, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
// 	);
	
	$msg = "\n";
	
	$msg .= "[" . basename(__FILE__) . " : " . __LINE__ . "]";
	$msg .= "\n";
	$msg .= "(step : 4 ==> judge : Trail)";
	$msg .= "\n";
	
	$msg .= ($cond_3__Is_Trail == true) ? "is_Trail ==> true" : "is_Trail ==> false";
	$msg .= "\n";
	
	// separator
	$msg .= "\n";
	
	Utils::write_Log__Fx_Admin(
			$_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester
			, $msg, __FILE__, __LINE__);	

	/********************
	 * step : 4 : 2
	 * 		return
	 ********************/
	if ($cond_3__Is_Trail == true) {
	
		/********************
		 * step : X
		 * 		return
		 ********************/
		/********************
		 * step : 4 : 2 : 1
		 * 		prep
		 ********************/
		$strOf_BarResult = CONS::$strOf_BarResult__Trail;
			
		// dummy
		$valOf_Ret = array($strOf_BarResult);
	
		/********************
		 * step : 4 : 2 : 2
		 * 		return
		********************/
		// return
		return $valOf_Ret;
			
	}//if ($cond_3__Is_Trail == true)
	
	/********************
	 * step : X
	 * 		return
	 ********************/
	/********************
	 * step : X : 1
	 * 		prep : set ==> default
	 ********************/
	$strOf_BarResult = CONS::$strOf_BarResult__Within;
// 	$strOf_BarResult = CONS::$strOf_BarResult__SL;
		
	// dummy
	$valOf_Ret = array($strOf_BarResult);

	/********************
	 * step : X : 2
	 * 		return
	 ********************/
	// return
	return $valOf_Ret;
	
	}//judge_Bar_SL_TP_Trail__BUY($bardata, $pos, $_dpath_Log_Fx_Tester__Full, $_fname_Log_Fx_Tester) {
	
}//class Libfx
	
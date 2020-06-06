<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
class LibEaTester_2 {

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
	set_Vals_To_Pos__First_Occasion($_pos, $_i, $_bardata, $_val_TP, $_val_SL, $_val_SPREAD) {
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
		
	}//set_Vals_To_Pos__First_Occasion
	
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
	update_Pos($_bardata, $_pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
//caller:20200606_113407
//head:20200606_113413
//wl:20200606_113416
	
		/********************
		 * step : 1
		 * 		prep
		 ********************/
		
	}//update_Pos($_bardata, $_pos, $_strOf_Position_Type, $_dpath_Log, $_fname_Log) {
	
}//class Libfx
	
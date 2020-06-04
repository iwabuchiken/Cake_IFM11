<?php

require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
// require_once '../utils/cons.php';
// require_once 'utils/cons.php';
// require_once 'cons.php';
	
class LibEaTester_2 {
	
	/********************
	 * extract_Ticket_Numbers
	 *
	 * at : 2020/04/13 15:47:30
	 *
	 * @return
	 * 		array of ticket numbers
	 // 			array(
	 // 				(int) 0 => (int) 19572576,
	 // 				(int) 1 => (int) 19573570,
	 // 				(int) 2 => (int) 19574058,
	 // 				(int) 3 => (int) 19592951
	 // 			)
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
	
}//class Libfx
	
<?php

// require_once 'cons.php';
require_once 'C:/WORKS_2/WS/Eclipse_Luna/Cake_IFM11/app/Lib/utils/cons.php';
	
class Pos {

/*
 *     Pos = {
             
            "st_idx" : -1
            , "st_pr" : 0.0
             
            , "cu_idx" : -1
            , "cu_pr" : 0.0
             
            #_20190811_122717:tmp
            # the bar : for later referral
            , "rf_idx" : -1
            , "rf_pr" : 0.0
             
            #_20190814_102053:tmp
            # the bar to exit
            , "ext_idx" : -1
            , "ext_pr" : 0.0
            
            #_20191112_155744:tmp
            , "base_idx" : -1
            , "base_pr" : 0.0
             
            , "trail_starting_idx" : -1
            , "trail_starting_pr" : 0.0
             
            # values, margins
            , "val_TP" : 0.0
            , "val_SL" : 0.0
            , "val_SPREAD" : 0.0
             
            , "ts_TP" : 0.0
            , "ts_SL" : 0.0
             
            }    
 * 
 */
	public $st_idx	= -1;
	public $st_pr	= 0.0;

	public $cu_idx	= -1;
	public $cu_pr	= 0.0;
	
	public $rf_idx	= -1;
	public $rf_pr	= 0.0;
	
	// the bar to exit;
	public $ext_idx	= -1;
	public $ext_pr	= 0.0;
	
	public $base_idx	= -1;
	public $base_pr	= 0.0;
	
	public $trail_starting_idx	= -1;
	public $trail_starting_pr	= 0.0;
	
	# values, margins;
	public $val_TP	= 0.0;
	public $val_SL	= 0.0;
	public $val_SPREAD	= 0.0;
	
	public $pr_TP	= 0.0;
	public $pr_SL	= 0.0;
// 	public $ts_TP	= 0.0;
// 	public $ts_SL	= 0.0;
		
}//class Pos {
	
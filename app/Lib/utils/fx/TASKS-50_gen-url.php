<?php 

/********************
//ref https://stackoverflow.com/questions/10262532/running-php-script-from-the-command-line
php -f C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\utils\fx\TASKS-50_gen-url.php

********************/

	/********************
	* build_URL()
	* 	at : 2020/09/25 11:48:20
	* 	[2] res free# JVEMV6 44#TASKS_49 / 44. currency / TASKS-49. combined-list-gen-stats / 20200925_105653
	********************/
	function
	build_URL() {
		
		/********************
		* step : 1
		* 		get : strings
		********************/
		//next:20200925_120949
		$nameOf_Dir					= "20200909_115319[eap-2.id-1].[AUDJPY-5].dir";
		
		$nameOf_TicketsData_Log_File	= "[ea-4_tester-1].(20200909_115319).(tickets-data).log";
		
		$nameOf_Statement_File		= "DetailedStatement.[m5].[20200921_154212].htm";
		
		/********************
		* step : 2
		* 		build : url
		********************/
		$strOf_url = "http://localhost/Eclipse_Luna/Cake_IFM11/fx_utilities/util_3__Gen_Trading_Result_List" 
					. "?param_Dpath_File_Tickets_Data=" 
						. "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal"
						."\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files\\Logs\\" 
						. $nameOf_Dir
					."&param_Fname_File_Tickets_Data="
						. $nameOf_TicketsData_Log_File
					."&param_Fname_File_Statement="
						. $nameOf_Statement_File
					."&param_Dpath_File_Statement="
						. "C:\\Users\\iwabuchiken\\AppData\\Roaming\\MetaQuotes\\Terminal"
						. "\\34B08C83A5AAE27A4079DE708E60511E\\MQL4\\Files\\Logs\\"
						. $nameOf_Dir;
		
		// return
		return $strOf_url;
		
	}//build_URL
	
	
	/********************
	* build_URL()
	* 	at : 2020/09/25 11:48:20
	* 	[2] res free# JVEMV6 44#TASKS_49 / 44. currency / TASKS-49. combined-list-gen-stats / 20200925_105653
	********************/
	function
	open_url($url_built){

		// build : command
		$strOf_Cmd = "C:\\WORKS_2\\Programs\\opera\\launcher.exe \"$url_built\"";
// 		$strOf_Cmd = "C:\\WORKS_2\\Programs\\opera \"$url_built\"";
		
		//debug
		$msg = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
		$msg .= " cmd => '$strOf_Cmd'";
		
		$msg .= "\n";
		
		print ($msg);

		// open url
		$res = exec($strOf_Cmd);
		//debug
		$msg = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
		$msg .= " result => '$res'";
		
		$msg .= "\n";
		
		print ($msg);
		
		
		// return
// 		return $strOf_url;
		
	}//open_url($url_built)
	
	
	/********************
	* execute()
	* 	at : 2020/03/09 16:24:18
	* 	res free# JVEMV6 44#10.2_44 / 44. currency / 10. prog-php / 2. tester /  XXXX
	********************/
	function
	execute() {
		
		// url
		$url_built = build_URL();
		
		//debug
		$msg = "[" . basename(__FILE__) . ":" . __LINE__ . "]";
		$msg .= " url => $url_built";
		
		$msg .= "\n";
		$msg .= "\n";
		
		print ($msg);

		// accsess
		open_url($url_built);
		
		
// 		test_Slice_Array();
		
	}//execute
	
// 	combine_arrays();

	execute();
	
?>

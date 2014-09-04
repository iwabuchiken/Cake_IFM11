<?php

class CONS {

	/******************************
	
		Paths and names
	
	******************************/
	public static $dname_Utils		= "utils";
	public static $dname_Log			= "log";
	public static $dname_Doc			= "docs";
	
	public static $fname_Log			= "log.txt";
	public static $fname_Log_trunk		= "log";
	public static $fname_Log_ext		= ".txt";
	public static $fname_Log_Suffix_Local	= "_local";
	public static $fname_Log_Suffix_Remote	= "_remote";
	
	// 		const dbName_Local = "development.sqlite3";
	// 		private final $dbName_Local = "development.sqlite3";
	public static $dbName_Local = "development.sqlite3";

	public static $local_HostName = "localhost";

	public static $timeLabelTypes = array(

			"rails" => "railsType",	// "yyyy-MM-dd H:i:s"
			"basic" => "basicType",	// "yyyy/MM/dd H:i:s"
			"serial" => "serialType"	// "yyyyMMdd_His"
	);

	/****************************************
		* csv files
	****************************************/
	public static $logFile_maxLineNum = 3000;

	/****************************************
		* Session keys
	****************************************/

}//class CONS

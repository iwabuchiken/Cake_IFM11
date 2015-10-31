<?php

class CONS {

	/*******************************
		admins
	*******************************/
	public static $adminData_Image_data_Range_Start = "image_data_Range_Start";
	
	public static $adminData_Image_data_Range_End = "image_data_Range_End";
	
	/*******************************
	 server
	*******************************/
	public static $name_Server_Remote = "benfranklin.chips.jp";
	
	public static $name_Server_Local = "localhost";
	
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

	/*******************************
		Images
	*******************************/
	// filter: file_name
	public static $str_Filter_File_Name = "filter_file_name";
	public static $str_Filter_File_Name_all = "*";
	
	public static $str_Filter_RadioButtons_Name_File_Name = "RBs_AND_OR_File_Name";
	public static $str_Filter_RadioButtons_File_Name_AND = "AND";
	public static $str_Filter_RadioButtons_File_Name_OR = "OR";
	
	// filter: memo
	public static $str_Filter_Memo = "filter_memo";
	public static $str_Filter_Memo_all = "*";
	
	public static $str_Filter_RadioButtons_Name_Memo = "RBs_AND_OR_Memo";
	public static $str_Filter_RadioButtons_Memo_AND = "AND";
	public static $str_Filter_RadioButtons_Memo_OR = "OR";
	
	// filter: table name
	public static $str_Filter_RadioButtons_Name_TableName = "RBs_AND_OR_TableName";
	public static $str_Filter_RadioButtons_TableName_AND = "AND_TableName";
	public static $str_Filter_RadioButtons_TableName_OR = "OR_TableName";
	
	public static $str_Filter_TableName = "filter_table_name";
	public static $str_Filter_TableName_all = "*";
	
	/*******************************
		paginate
	*******************************/
	public static $paginate_Modulus = 15;

	/*******************************
		DB
	*******************************/
	public static $tname_IFM11		= "ifm11";
	
// 	2015/10/26 00:50:00.378
	public static $query_Range_Start = "2015/10/20 00:00:00.000";
	
	public static $query_Range_End = "2015/10/27 00:00:00.000";
	
}//class CONS

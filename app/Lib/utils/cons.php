<?php

class CONS {

	/*******************************
		admins
	*******************************/
	public static $adminData_Image_data_Range_Start = "image_data_Range_Start";
	
	public static $adminData_Image_data_Range_End = "image_data_Range_End";
	
	public static $adminKey_last_Added_From_DBFile = "last_Added_From_DBFile";
	
	public static $adminVal_last_Added_From_DBFile = "2015/10/01 00:00:00.000";
	
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

	public static $dpath_ImageFiles_List = 
				"/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data/image_files_list"
// 				"/home/users/2/chips.jp-benfranklin/web/cake_apps/Cake_IFM11/app/Lib/data/image_files_list"
	
				;
// 				."/cake_apps/Cake_IFM11/app/Lib/data"
// 				."/image_files_list";
	
// 	public static $dpath_Realm_DB_Files = implode(
// 								DIRECTORY_SEPARATOR,
// 								array(
// 									"app", "Lib", "data", "csv", "xcode_memos"
// 								) 
// 						);
// // 	app\Lib\data\csv\xcode_memos

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
	
	// RB --> radio button
	public static $str_Filter_RadioButtons_Name_Memo = "RBs_AND_OR_Memo";
	public static $str_Filter_RadioButtons_Memo_AND = "AND";
	public static $str_Filter_RadioButtons_Memo_OR = "OR";
	
	// filter: table name
	public static $str_Filter_RadioButtons_Name_TableName = "RBs_AND_OR_TableName";
	public static $str_Filter_RadioButtons_TableName_AND = "AND_TableName";
	public static $str_Filter_RadioButtons_TableName_OR = "OR_TableName";
	
	public static $str_Filter_TableName = "filter_table_name";
	public static $str_Filter_Id = "filter_id";
	
	public static $str_Filter_TableName_all = "*";
	
	// "Utils::build_URL__Sort"-related
	public static $dflt_SortName = "id";
	
	public static $dflt_SortDirection = "asc";
	
	public static $str_Sort_ASC = "asc";
	
	public static $str_Sort_DESC = "desc";

	// file_name
	public static $key_Build_URL__Column_FileName = "file_name";
	
	public static $key_Param__Column_FileName = "file_name";
	
	public static $key_Param__Sort_Direction__DEFAULT = "asc";
	
	// id
	public static $key_Build_URL__Column_ID = "id";
	
	public static $key_Param__Column_ID = "id";
	
	// page variables
	public static $pageVar_AndOr_Memo	= "pageVar_AndOr_Memo";
	
	
	/*******************************
		paginate
	*******************************/
	public static $paginate_Modulus = 15;

	/*******************************
		DB
	*******************************/
	public static $tname_IFM11		= "ifm11";
	
	public static $tname_SQLITE_AudioFiles		= "audio_files";
	
	public static $tname_Realm_DB_File_Names	= "realm_db_file_names";
	
// 	2015/10/26 00:50:00.378
	public static $query_Range_Start = "2015/10/20 00:00:00.000";
	
	public static $query_Range_End = "2015/10/27 00:00:00.000";

	/*******************************
		session
	*******************************/
	public static $session_Key_Search_String = "search_string";
	
	public static $session_Key_Switch_Direction = "switch_direction";
	
	public static $session_Key_Direction = "direction";
	
	public static $session_Value__Direction_ASC = "asc";
	
	public static $session_Value__Direction_DESC = "desc";

	/*******************************
		param values
	*******************************/
	public static $param_Val_Switch_Direction__ON = "on";
	
	public static $param_Val_Switch_Direction__OFF = "off";
	
	/*******************************
		section: memos
	*******************************/
	public static $clear_search_string = "*";

	/*******************************
	 section: images
	*******************************/
// 	public static $dflt_SortName = "id";
	
// 	public static $dflt_SortDirection = "asc";
	
// 	public static $str_Sort_ASC = "asc";
	
// 	public static $str_Sort_DESC = "desc";
	
// 	public static $key_Build_URL__Column_FileName = "file_name";
	
// 	public static $key_Param__Column_FileName = "file_name";
	
// 	public static $key_Param__Sort_Direction__DEFAULT = "asc";
	
	/*******************************
	 
	 Articles controller
	 
	 *******************************/
	/*******************************
		basics
	 *******************************/
	public static $aryOf_Genre_Names = ["politics", "national", "international", "business"];

	/*******************************
	 	genre names
	 *******************************/
	public static $strOf_Genre_Name__Intl = "international";
	public static $strOf_Genre_Name__National = "national";
	public static $strOf_Genre_Name__Politics = "politics";
	public static $strOf_Genre_Name__Business = "business";

}//class CONS

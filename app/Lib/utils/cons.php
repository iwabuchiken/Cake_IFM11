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
	public static $fname_Log_ext_Log		= ".log";
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

	/************************************************************
	 	fx_admin 
	 ************************************************************/
	/******************************
	 	fx_admin : utils
	 ******************************/
	// ascending, datetime
	public static $strOf_Sort_Direction_LO_BarDatas__ASC = "ascending";
	// descending, datetime
	public static $strOf_Sort_Direction_LO_BarDatas__DSC = "descending";
	
	/******************************
	 	fx_admin : Paths and names 
	 ******************************/
	public static $dpath_Log_Fx_Admin = "Log_Fx_Admin";
	public static $fname_Log_Fx_Admin = "log_fx_admin.log";
// 	public static final $fname_Log_Fx_Admin__Orig = "log_fx_admin.log";	//=> "Error: Cannot declare property CONS::$fname_Log_Fx_Admin__Orig final, the final modifier is allowed only for methods and classes"
	
	public static $dpath_Log_Fx_Admin__Ticket_Num = "Log_Fx_Admin__Ticket_Num";
	public static $fname_Log_Fx_Admin__Ticket_Num = "log_fx_admin__Ticket_Num.log";
	
	/************************************************************
	 	lib_ea_tester
	 ************************************************************/
	/******************************
	 	general
	 ******************************/
	public static 	$strOf_Pattern_Detection__Undetected = "UNDETECTED";
	
	/******************************
	 	bar types
	 ******************************/
	public static	$strOf_BarType__SL = "C8";
	public static	$strOf_BarType__TP = "C3";
	
	public static	$strOf_BarType__C4 = "C4";	# $bd->price_High <> $bd->price_Close
	public static	$strOf_BarType__C5 = "C5";	# $bd->price_High == $bd->price_Close
	
	/******************************
	 	prices
	 ******************************/
	public static 	$val_Trail_Starting = 0.04;
	
	/******************************
	 	Paths and names : fx : testers
	 ******************************/
	public static 	$fname_FX_Tester_CSV_File = "44_5.1_10_rawdata.(AUDJPY).(Period-M15).(NumOfUnits-18000).(Bars-18000).20200116_171429.[SLICE-30].csv";
	
	/****************************************
		* csv files
	****************************************/
	public static $logFile_maxLineNum = 3000;

	/****************************************
		* Session keys
	****************************************/

	/*******************************
		Images (Cake_IFM)
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
	
	/**************************************************************
	 
	 Articles controller
	 
	 **************************************************************/
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

	/*******************************
	 	keywords
	 *******************************/
	public static $strOf_Keyword_Line_Delimiter = "=";
	
	public static $strOf_LO_LabelsOf_Article_Group__Intl  = "lo_LabelsOf_Article_Group__Intl";
	
	public static $strOf_KW  = "kw_";
// 	public static $strOf_LO_KW_group_Korea  = "kw_Intl_Korea";
// 	public static $strOf_LO_KW_group_Korea  = "kw_group_Korea";
	
	/*******************************
	 	paths, file names
	 *******************************/
	//C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\app\Lib\data\article_keywords\articles_keyword_lists.dat
	public static $dpath_Articles_Keywords_External_Files = 
						"C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data\\article_keywords";
	
	public static $fname_Articles_Keywords_External_Files = "articles_keyword_lists.dat";
	public static $fname_Articles_Keywords_External_Files__Politics = "articles_keyword_lists_politics.dat";
	public static $fname_Articles_Keywords_External_Files__National = "articles_keyword_lists_national.dat";
	public static $fname_Articles_Keywords_External_Files__Business = "articles_keyword_lists_business.dat";

	/**************************************************************
		Ifm controller
		at : 2020/01/09 08:11:24
	**************************************************************/
	public static $OP_0_1	= "0-1";      # 0-1) start xampp, filezilla, open folder, open files.bat
	public static $OP_1	= "1";          # 1) change_file_names.bat
	public static $OP_1_2	= "1-2";      # 1-2) Delete_in-db-existing-files.bat
	public static $OP_1_3	= "1-3";      # 1-3) Delete temporary-purpose files
	
	//_20200109_135951:next
	public static $OP_2_0	= "2-0";      # 2-0) edit_memos.9-0.bat
	public static $OP_4	= "4";          # 4) edit_memos.8.open-csv-file.bat - ショートカット
	public static $OP_5	= "5";          # 5) edit_memos.3.insert-to-db.bat - ショートカット
	
	public static $OP_7	= "7";      # 7) edit_memos.12.delete-image-files.bat - ショートカット
	public static $OP_8	= "8";      # 8) edit_memos.4.delete-photos.bat - ショートカット
	public static $OP_9	= "9";      # 9) edit_memos.13.validate-admin-value.bat - ショートカット
	public static $OP_9_1	= "9-1";	# "9-1) upload db file.txt";
	
	public static $OP_10	= "10";	# "edit_memos.14.add-data-to-remote.bat";
	public static $OP_10_1	= "10-1";	# "10-1) edit_memos.14.add-data-to-remote.history.txt";
	
	public static $OP_11	= "11";	# "edit_memos.15.validate-update.bat";
	public static $OP_11_0	= "11-0";	# "11-0) update date.txt";
	public static $OP_11_1	= "11-1";	# "11-1) open update page.bat";
	
	public static $OP_12	= "12";	# "edit_memos.5.copy-image-files.bat";
	public static $OP_13	= "13";	# "13) image_move-uploaded-files.bat";
	
	public static $OP_14	= "14";	# "upload image files";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	
	public static $OP_15	= "15";	# "close apps";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	public static $OP_16	= "16";	# "9-2) upload db file";

	// strings
	public static $OP_0_1_String_1	= "0-1) start xampp, filezilla, open folder, open files.bat";

	public static $OP_1_String_1	= "1) change_file_names.bat";
	public static $OP_1_2_String_1	= "1-2) Delete_in-db-existing-files.bat";
	public static $OP_1_3_String_1	= "";

	public static $OP_2_0_String_1	= "2-0) edit_memos.9-0.bat";
	public static $OP_4_String_1	= "4) edit_memos.8.open-csv-file.bat - ショートカット";
	public static $OP_5_String_1	= "edit_memos.3.insert-to-db.bat";

	public static $OP_7_String_1	= "edit_memos.12.delete-image-files.bat";
	public static $OP_8_String_1	= "edit_memos.4.delete-photos.bat";
	public static $OP_9_String_1	= "edit_memos.13.validate-admin-value.bat";

	public static $OP_9_1_String_1	= "9-1) upload db file.txt";
	public static $OP_9_2_String_1	= "9-2) upload db file";
	public static $OP_10_String_1	= "edit_memos.14.add-data-to-remote.bat";

	public static $OP_10_1_String_1	= "10-1) edit_memos.14.add-data-to-remote.history.txt";
	public static $OP_11_String_1	= "edit_memos.15.validate-update.bat";
	public static $OP_11_0_String_1	= "11-0) update date.txt";

	public static $OP_11_1_String_1	= "11-1) open update page.bat";
	public static $OP_12_String_1	= "edit_memos.5.copy-image-files.bat";
	public static $OP_13_String_1	= "13) image_move-uploaded-files.bat";

	public static $OP_14_String_1	= "14) upload image files";
	public static $OP_15_String_1	= "15) close-apps.bat";
	
	// strings 2
	public static $OP_0_1_String_2	= "start apps";
	// 				[0_1_String_2	= "start apps";
	public static $OP_1_String_2	= "change_file_names";
	public static $OP_1_2_String_2	= "Delete_in-db-existing-files";
	public static $OP_1_3_String_2	= "*Delete temporary-purpose files*";
	
	public static $OP_2_0_String_2	= "start editing";
	public static $OP_4_String_2	= "open csv file";
	public static $OP_5_String_2	= "insert to db";
		
	public static $OP_7_String_2	= "delete image files";
	public static $OP_8_String_2	= "delete db entries";
	public static $OP_9_String_2	= "validate admin value";
	
	public static $OP_9_1_String_2	= "***";
	public static $OP_9_2_String_2	= "upload db file";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	public static $OP_10_String_2	= "data ==> to remote";
	
	public static $OP_10_1_String_2	= "data ==> to file";
	public static $OP_11_String_2	= "validate updates";
	public static $OP_11_0_String_2	= "update data ==> to file";
	
	public static $OP_11_1_String_2	= "open update page";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	public static $OP_12_String_2		= "copy image files";    #
	public static $OP_13_String_2		= "move uploaded images";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	
	public static $OP_14_String_2	= "upload image files";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	public static $OP_15_String_2	= "close apps";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
			
// 	"0-1) start xampp, filezilla, open folder, open files.bat", "start apps"
// 	// 				["0-1) start xampp, filezilla, open folder, open files.bat", "start apps"
// 	"1) change_file_names.bat", "change_file_names"
// 	"1-2) Delete_in-db-existing-files.bat", "Delete_in-db-existing-files"
// 	"", "*Delete temporary-purpose files*"
	
// 	"2-0) edit_memos.9-0.bat", "start editing"
// 	"4) edit_memos.8.open-csv-file.bat - ショートカット", "open csv file"
// 	"edit_memos.3.insert-to-db.bat", "insert to db"
		
// 	"edit_memos.12.delete-image-files.bat", "delete image files"
// 	"edit_memos.4.delete-photos.bat", "delete db entries"
// 	"edit_memos.13.validate-admin-value.bat", "validate admin value"
	
// 	"9-1) upload db file.txt", "***"
// 	"9-2) upload db file", "upload db file"    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 	"edit_memos.14.add-data-to-remote.bat", "data ==> to remote"
	
// 	"10-1) edit_memos.14.add-data-to-remote.history.txt", "data ==> to file"
// 	"edit_memos.15.validate-update.bat", "validate updates"
// 	"11-0) update date.txt", "update data ==> to file"
	
// 	"11-1) open update page.bat", "open update page"    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 	"edit_memos.5.copy-image-files.bat", "copy image files"    #
// 	"13) image_move-uploaded-files.bat", "move uploaded images"    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	
// 	"14) upload image files", "upload image files"    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
// 	"15) close-apps.bat", "close apps"    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	
	/**************************************************************
	 IP controller
	 	at : 2020/01/26 17:53:36
	 **************************************************************/
	public static $label_IP_Proc_ID__1	= "proc-1";    # C:\WORKS_2\WS\WS_Cake_IFM11\commands
	
}//class CONS

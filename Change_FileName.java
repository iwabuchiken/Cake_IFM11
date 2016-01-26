/*
 * javac C:/WORKS/WS/WS_Android/IFM11/src/ifm11/utils/MyTest.java
 * 
 */

// 

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Arrays;
import java.util.Calendar;
import java.util.Locale;
import java.util.regex.Pattern;
import java.util.regex.Matcher;
import java.io.File;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Locale;
import java.nio.file.Files;
import java.io.FileFilter;
import java.io.IOException;

//ref http://stackoverflow.com/questions/8809098/how-do-i-set-the-default-locale-for-my-jvm answered Jan 10 '12 at 19:17
import java.util.Locale;

import java.util.Arrays;

public class Change_FileName {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		D_20_v_2_0_Change_IPhone_FileNames();
		
//		D_19_v_1_0__Change_SharpFile();
//		D_19_v_1_0__Change_SharpFile__V2();
//		D_19_v_1_0__Validate_Same_FileName();
		
//		D_19_v_1_0__Manage_Locale();
		
		
	}//public static void main(String[] args)

	public static void 
	D_20_v_2_0_Change_IPhone_FileNames() {
	
		p1
		
	}
	
	public static void 
	D_19_v_1_0__Manage_Locale() {
		
		Locale l = Locale.getDefault();
		
		String dflt_LocalName = l.getDisplayName();
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] dflt => %s", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), dflt_LocalName);

		System.out.println(msg);
		
		
	}//D_19_v_1_0__Manage_Locale
	
	public static void 
	D_19_v_1_0__Change_SharpFile() {
		// TODO Auto-generated method stub
		
		///////////////////////////////////
		//
		// vars
		//
		///////////////////////////////////
		String dpath = "C:\\WORKS\\Storage\\images\\100SHARP\\tmp";
//		String dpath = "C:\WORKS\Storage\images\100SHARP\tmp";
		
		File f = new File(dpath);
		
		if (f.exists()) {
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), f.getAbsolutePath());
			
			System.out.println(msg);
			
		} else {//if (f.exists())
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file NOT exist => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), f.getAbsolutePath());
			
			System.out.println(msg);

			return;
			
		}//if (f.exists())
		
		///////////////////////////////////
		//
		// files list
		//
		///////////////////////////////////
		String[] list_FileNames = f.list();
		
		int len_List_FileNames = list_FileNames.length;
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] files => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), len_List_FileNames);
		
		System.out.println(msg);		//=> 35
		
		///////////////////////////////////
		//
		// create at
		//
		///////////////////////////////////
		String fname_1 = list_FileNames[0];
		
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] file 1 => %s", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), fname_1);
		
		System.out.println(msg);
		
		File f_1 = new File(dpath, fname_1);
		
		long lastModified = f_1.lastModified();
//		long lastModified = new File(dpath, fname_1).lastModified();
		
		File f_2 = new File(dpath, 
						conv_MillSec_to_TimeLabel(lastModified, "file name") + ".jpg");
		
//		String msg;
		msg = String.format(Locale.JAPAN, 
				"[%s : %d] last modified => %d (%s)", 
				Thread.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), 
				lastModified,
				conv_MillSec_to_TimeLabel(lastModified, "file name") + ".jpg");
//		conv_MillSec_to_TimeLabel(lastModified));
		
		System.out.println(msg);
		
		///////////////////////////////////
		//
		// rename
		//
		///////////////////////////////////
		try {
		
			Files.move(f_1.toPath(), f_2.toPath());
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

//		Files.move(f_1.toPath(), f_2.toPath());
		
		
		
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] done", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber());
		
		System.out.println(msg);
		
	}//public static void D_19_v_1_0__Change_SharpFi
	
	public static void 
	D_19_v_1_0__Change_SharpFile__V2() {
		// TODO Auto-generated method stub
		
		///////////////////////////////////
		//
		// vars
		//
		///////////////////////////////////
		String dpath = "C:\\WORKS\\Storage\\images\\100SHARP\\tmp";
		
		File dir = new File(dpath);
		
		if (dir.exists()) {
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] dir exists => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), dir.getAbsolutePath());
			
			System.out.println(msg);
			
		} else {//if (dir.exists())
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] dir NOT exist => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), dir.getAbsolutePath());
			
			System.out.println(msg);
			
			return;
			
		}//if (dir.exists())
		
		///////////////////////////////////
		//
		// files list
		//
		///////////////////////////////////
		File[] list_Files = dir.listFiles(new FileFilter(){
//			File[] list_Files = dpath.listFiles(new FileFilter(){
			
			@Override
			public boolean accept(File f) {
				
				return f.exists() && f.getName().startsWith("DSC");
//				return f.exists() && f.getPath().startsWith("DSC");
				
			}
			
		});
		
		// validate
		if (list_Files.length < 1) {

			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] no entries", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber());

			System.out.println(msg);
			
			return;

		}//if (list_Files.length < 1)
		
		///////////////////////////////////
		//
		// create at
		//
		///////////////////////////////////
		String fname_1 = list_Files[0].getName();
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] file 1 => %s", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), fname_1);
		
		System.out.println(msg);

		///////////////////////////////////
		//
		// rename
		//
		///////////////////////////////////
		File f_tmp = null;
		
		String fname = null;
		
		int count = 0;
		
		for (File elem : list_Files) {
			
//			fname = elem.getName();
			
			f_tmp = new File(dpath, 
					conv_MillSec_to_TimeLabel(elem.lastModified(), "file name") + ".jpg");
			
			try {
				
				Files.move(elem.toPath(), f_tmp.toPath());
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

//			Files.move(elem.toPath(), f_tmp.toPath());
//			Files.move(elem, f_tmp);
			
		}//for (File elem : list_Files)
		
		///////////////////////////////////
		//
		// report
		//
		///////////////////////////////////
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] done", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber());

		System.out.println(msg);
		
		
	}//D_19_v_1_0__Change_SharpFile__V2
	
	public static void 
	D_19_v_1_0__Validate_Same_FileName() {
		// TODO Auto-generated method stub
		
		///////////////////////////////////
		//
		// vars
		//
		///////////////////////////////////
		String dpath = "C:\\WORKS\\Storage\\images\\100SHARP\\tmp";
		
		File dir = new File(dpath);
		
		if (dir.exists()) {
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] dir exists => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), dir.getAbsolutePath());
			
			System.out.println(msg);
			
		} else {//if (dir.exists())
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] dir NOT exist => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), dir.getAbsolutePath());
			
			System.out.println(msg);
			
			return;
			
		}//if (dir.exists())
		
		///////////////////////////////////
		//
		// files list
		//
		///////////////////////////////////
		String[] list_FileNames = dir.list();
		
		// validate
		if (list_FileNames.length < 1) {
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] no entries", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber());
			
			System.out.println(msg);
			
			return;
			
		}//if (list_Files.length < 1)

		Arrays.sort(list_FileNames);

		boolean b;
		
		int res_i;
		
		for (String elem : list_FileNames) {

			res_i = get_NumOf_Elements_InArray(list_FileNames, elem);

			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file = %s (in list = %d)", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), elem, res_i);

			System.out.println(msg);
			
//			//ref http://stackoverflow.com/questions/17510664/checking-whether-an-element-exist-in-an-array
//			b = Arrays.asList(list_FileNames).contains(elem);
			
		}//for (File elem : list_Files)


		///////////////////////////////////
		//
		// report
		//
		///////////////////////////////////
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] done", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber());
		
		System.out.println(msg);
		
		
	}//D_19_v_1_0__Validate_Same_FileName
	
	
	/*******************************
	 * format type<br>
	 * 		"time label"	yyyy/MM/dd kk:mm:ss.SSS
	 * 		"file name"		yyyy-MM-dd_hh-mm-ss_SSS
	 *******************************/
	public static String
	conv_MillSec_to_TimeLabel(long millSec, String formatType) {
		//REF http://stackoverflow.com/questions/7953725/how-to-convert-milliseconds-to-date-format-in-android answered Oct 31 '11 at 12:59
		String dateFormat = null;
		
		if (formatType.equals("time label")) {
			
			dateFormat = "yyyy/MM/dd kk:mm:ss.SSS";
			
		} else if (formatType.equals("file name")) {
				
			dateFormat = "yyyy-MM-dd_kk-mm-ss_SSS";
				
		} else {//if (formatType.equals("time label"))
			
			dateFormat = "yyyy/MM/dd kk:mm:ss.SSS";
			
		}//if (formatType.equals("time label"))
		
		
//		String dateFormat = "yyyy/MM/dd kk:mm:ss.SSS";
//		String dateFormat = "yyyy/MM/dd hh:mm:ss.SSS";
//		String dateFormat = CONS.Admin.format_Date;
//		String dateFormat = "yyyy/MM/dd hh:mm:ss.SSS";
		
		DateFormat formatter = new SimpleDateFormat(dateFormat, Locale.JAPAN);
//		DateFormat formatter = new SimpleDateFormat(dateFormat);

		// Create a calendar object that will convert the date and time value in milliseconds to date. 
		Calendar calendar = Calendar.getInstance();
		
		calendar.setTimeInMillis(millSec);
		
		return formatter.format(calendar.getTime());
		
	}//conv_MillSec_to_TimeLabel(long millSec)

	public static int
	get_NumOf_Elements_InArray
	(String[] targetArray, String targetString) {
		
		int count = 0;
		
		for (String elem : targetArray) {

			if (elem.equals(targetString)) {

				count += 1;

			}//if (elem.equals(targetString))
			
		}//for (File elem : list_Files)

		return count;
		
	}//get_NumOf_Elements_InArray
	
}

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
import java.util.List;
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

public class MyTest_iPhone {

	public static void main(String[] args) {
		// TODO Auto-generated method stub

		D_20_v_1_0_s_2__Get_FileName__V3();
//		D_20_v_1_0_s_2__Get_FileName__V2();
//		D_20_v_1_0_s_2__Get_FileName();
//		D_20_v_1_0__Get_FileName();
//		D_19_v_1_0__Change_IPhoneFile();
		
		
	}//public static void main(String[] args)

//	public static String 
	public static void 
	D_20_v_1_0_s_2__Get_FileName__V3() {
		
		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\WORKS\Storage\images\iphone\tmp";
		
		String fname = "2016-01-11_16-17-05_000.jpg";

		get_FileName_No_Duplicates(dpath, fname);
		
//		File f = new File(dpath, fname);
//
//		// get the list of all files in the directory
//		String[] aryOf_FileNames = new File(dpath).list();
//		
//		if (f.exists()) {
//
//			String msg;
//			
//			//ref http://stackoverflow.com/questions/47045/sprintf-equivalent-in-java answered Sep 5 '08 at 23:06
//			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s (total = %d files)", 
//					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), 
//					f.getName(),
//					aryOf_FileNames.length);
//
//			System.out.println(msg);
//			
//
//		}//if (f.exists())
//
//		///////////////////////////////////
//		//
//		// change file name
//		//
//		///////////////////////////////////
//		//ref http://stackoverflow.com/questions/1128723/how-can-i-test-if-an-array-contains-a-certain-value answered Jul 15 '09 at 0:04
//		List<String> listOf_FileNames = Arrays.asList(aryOf_FileNames);
//		
//		boolean res_b;
//		
//		res_b = listOf_FileNames.contains(fname);
//
//		String regex = "(\\d\\d\\d)\\.jpg";
//		Pattern pattern = Pattern.compile(regex);
//		Matcher matcher = pattern.matcher(fname);
//
//		int serial_num;
//
//		while(res_b == true) {
//			
//			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] file %s => in the dir --> %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname, res_b);
//			
//			System.out.println(msg);
//			
//			if (matcher.find() == true) {
//
//				// update serial number
//				serial_num = Integer.parseInt(matcher.group(1));
//				
//				serial_num += 1;
//
//				msg = String.format(Locale.JAPAN, "[%s : %d] serial num (after) => %d", 
//						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//						.currentThread().getStackTrace()[1].getLineNumber(), serial_num);
//				
//				System.out.println(msg);
//				
//				fname = fname.replaceAll(regex, String.format("%03d.jpg", serial_num));
//
////				String msg;
//				msg = String.format(Locale.JAPAN, "[%s : %d] fname replaced => '%s'", Thread
//						.currentThread().getStackTrace()[1].getFileName(),
//						Thread.currentThread().getStackTrace()[1]
//								.getLineNumber(), fname);
//
//				System.out.println(msg);
//				
//			} else {//if (matcher.find() == true)
//				
////				String msg;
//				msg = String.format(Locale.JAPAN, "[%s : %d] no match", Thread
//						.currentThread().getStackTrace()[1].getFileName(),
//						Thread.currentThread().getStackTrace()[1]
//								.getLineNumber());
//
//				System.out.println(msg);
//				
//				
//				return null;
//				
//			}//if (matcher.find() == true)
//			
//			// update
//			res_b = listOf_FileNames.contains(fname);
//			
//			matcher = pattern.matcher(fname);
//			
//		}//while(res_b == true)
//
//		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] fname is now => '%s'", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), fname);
//
//		System.out.println(msg);
//		
//		///////////////////////////////////
//		//
//		// return
//		//
//		///////////////////////////////////
//		return fname;
		
	}//D_20_v_1_0_s_2__Get_FileName__3
	
	public static String 
//	public static void 
	get_FileName_No_Duplicates(String dpath, String fname) {
		
//		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\WORKS\Storage\images\iphone\tmp";
		
//		String fname = "2016-01-11_16-17-05_000.jpg";
		
		File f = new File(dpath, fname);
		
		// get the list of all files in the directory
		String[] aryOf_FileNames = new File(dpath).list();
		
		if (f.exists()) {
			
			String msg;
			
			//ref http://stackoverflow.com/questions/47045/sprintf-equivalent-in-java answered Sep 5 '08 at 23:06
			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s (total = %d files)", 
					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					f.getName(),
					aryOf_FileNames.length);
			
			System.out.println(msg);
			
			
		}//if (f.exists())
		
		///////////////////////////////////
		//
		// change file name
		//
		///////////////////////////////////
		//ref http://stackoverflow.com/questions/1128723/how-can-i-test-if-an-array-contains-a-certain-value answered Jul 15 '09 at 0:04
		List<String> listOf_FileNames = Arrays.asList(aryOf_FileNames);
		
		boolean res_b;
		
		res_b = listOf_FileNames.contains(fname);
		
		String regex = "(\\d\\d\\d)\\.jpg";
		Pattern pattern = Pattern.compile(regex);
		Matcher matcher = pattern.matcher(fname);
		
		int serial_num;
		
		while(res_b == true) {
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file %s => in the dir --> %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fname, res_b);
			
			System.out.println(msg);
			
			if (matcher.find() == true) {
				
				// update serial number
				serial_num = Integer.parseInt(matcher.group(1));
				
				serial_num += 1;
				
				msg = String.format(Locale.JAPAN, "[%s : %d] serial num (after) => %d", 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber(), serial_num);
				
				System.out.println(msg);
				
				fname = fname.replaceAll(regex, String.format("%03d.jpg", serial_num));
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] fname replaced => '%s'", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), fname);
				
				System.out.println(msg);
				
			} else {//if (matcher.find() == true)
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] no match", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber());
				
				System.out.println(msg);
				
				
				return null;
				
			}//if (matcher.find() == true)
			
			// update
			res_b = listOf_FileNames.contains(fname);
			
			matcher = pattern.matcher(fname);
			
		}//while(res_b == true)
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] fname is now => '%s'", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), fname);
		
		System.out.println(msg);
		
		///////////////////////////////////
		//
		// return
		//
		///////////////////////////////////
		return fname;
		
	}//get_FileName_No_Duplicates
	
	
	public static String 
//	public static void 
	D_20_v_1_0_s_2__Get_FileName__V2() {
		
		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\WORKS\Storage\images\iphone\tmp";
		
		String fname = "2016-01-11_16-17-05_000.jpg";
		
		File f = new File(dpath, fname);
		
		// get the list of all files in the directory
		String[] aryOf_FileNames = new File(dpath).list();
		
		if (f.exists()) {
			
			String msg;
			
			//ref http://stackoverflow.com/questions/47045/sprintf-equivalent-in-java answered Sep 5 '08 at 23:06
			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s (total = %d files)", 
					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					f.getName(),
					aryOf_FileNames.length);
			
			System.out.println(msg);
			
			
		}//if (f.exists())
		
		///////////////////////////////////
		//
		// change file name
		//
		///////////////////////////////////
		//ref http://stackoverflow.com/questions/1128723/how-can-i-test-if-an-array-contains-a-certain-value answered Jul 15 '09 at 0:04
		List<String> listOf_FileNames = Arrays.asList(aryOf_FileNames);
		
		boolean res_b;
		
		res_b = listOf_FileNames.contains(fname);
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] file %s => in the dir --> %s", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), fname, res_b);
		
		System.out.println(msg);
		
		// setup
		//ref http://stackoverflow.com/questions/4662215/how-to-extract-a-substring-using-regex answered Jan 11 '11 at 20:27
		String mydata = fname;
//		String mydata = "some string with 'the data i want' inside";
		
		String regex = "(\\d\\d\\d)\\.jpg";
		Pattern pattern = Pattern.compile(regex);
//		Pattern pattern = Pattern.compile("\\d\\d\\d\\.jpg");
//		Pattern pattern = Pattern.compile("'(.*?)'");
		Matcher matcher = pattern.matcher(mydata);
		
		int serial_num;
		
		while(matcher.find() == true) {
			
			msg = String.format(Locale.JAPAN, 
					"[%s : %d] group(0) = %s / count = %d / regex = '%s'", 
					Thread.currentThread().getStackTrace()[1].getFileName(), 
					Thread.currentThread().getStackTrace()[1].getLineNumber(), 
					matcher.group(0), matcher.groupCount(), regex);
			
			System.out.println(msg);
			
//			String msg;
			msg = String.format(Locale.JAPAN, 
					"[%s : %d] group(1) => '%s' (%%d = %d)", 
					Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					matcher.group(1), Integer.parseInt(matcher.group(1)));
			
			System.out.println(msg);
			
			// update serial number
			serial_num = Integer.parseInt(matcher.group(1));
			
			serial_num += 1;
			
			msg = String.format(Locale.JAPAN, "[%s : %d] serial num (after) => %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), serial_num);
			
			System.out.println(msg);
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] String.format(\"%%03d.jpg\", serial_num) => '%s'", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), String.format("%03d.jpg", serial_num));
			
			System.out.println(msg);
			
//			fname = fname.replace(regex, "aaa");
			fname = fname.replaceAll(regex, String.format("%03d.jpg", serial_num));
//			fname = fname.replace(regex, String.format("%03d.jpg", serial_num));
			
			msg = String.format(Locale.JAPAN, 
					"[%s : %d] fname is now (after) => '%s'", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), tmp_s);
					.currentThread().getStackTrace()[1].getLineNumber(), fname);
			
			System.out.println(msg);
			
//			//test
//			break;
			
		}//while(matcher.find() == true)
		
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] after while loop, fname => '%s'", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), fname);
		
		System.out.println(msg);
		
		
		//test
		//ref http://www.tutorialspoint.com/java/java_string_replace.htm
//		String Str = new String("Welcome to Tutorialspoint.com 000.jpg");
////		String Str = new String("Welcome to Tutorialspoint.com");
//		
//		System.out.print("Return Value :" );
//		System.out.println(Str.replace('o', 'T'));
//		
//		System.out.print("Return Value :" );
//		System.out.println(Str.replace('l', 'D'));
//		
//		System.out.print("Return Value :" );
//		System.out.println(Str.replace(".com", ".bom"));
//		
//		System.out.print("Return Value :" );
//		System.out.println(Str.replaceAll("\\d\\d\\d", "010"));
//		System.out.println(Str.replace("\\d\\d\\d", "010"));
		
		///////////////////////////////////
		//
		// return
		//
		///////////////////////////////////
		return fname;
		
//		if (matcher.find())
//		{
////		    System.out.println(matcher.group(1));
//		    System.out.println(matcher.group(0));
////		    String msg;
//			msg = String.format(Locale.JAPAN, 
//					"[%s : %d] group(0) = %s / count = %d / regex = '%s'", 
//					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), 
//					matcher.group(0), matcher.groupCount(), regex);
//
//			System.out.println(msg);
//			
//		} else {
//			
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] no match => fname = %s, regex = %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname, regex);
//
//			System.out.println(msg);
//			
//			return fname;
//			
//		}
		
//		// while
//		while(res_b == true) {
//			
//			// change file serial number
//			int serial_num = 
//		}
		
		
//		///////////////////////////////////
//		//
//		// change: millsec part
//		//
//		///////////////////////////////////
//		String[] tokens = fname.split("\\.");
//		
//		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] tokens => %d", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), tokens.length);
//
//		System.out.println(msg);
//		
//		// validate
//		if (tokens.length < 2) {
//
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] tokens => 1: %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname);
//
//			System.out.println(msg);
//			
//			return;
//
//		}//if (tokens.length < 2)
//		
//		///////////////////////////////////
//		//
//		// split "_"
//		//
//		///////////////////////////////////
//		String[] tokens2 = tokens[0].split("_");
////		String tokens2 = tokens[0].split("_");
//		
////		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] tokens2 => %d", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), tokens2.length);
//
//		System.out.println(msg);
//		
//		// validate
//		if (tokens2.length < 3) {
//
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] tokens2 => < 3: %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname);
//
//			System.out.println(msg);
//			
//			return;
//
//		}//if (tokens2.length < 3)
//		
//		///////////////////////////////////
//		//
//		// millsec
//		//
//		///////////////////////////////////
//		String millsec_s = tokens2[2];
//		
////		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] millsec_s = %s (%d)", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), 
//				millsec_s,
//				Integer.valueOf(millsec_s));
//
//		System.out.println(msg);
//		
		
	}//D_20_v_1_0_s_2__Get_FileName__V2
	
	public static String 
//	public static void 
	D_20_v_1_0_s_2__Get_FileName() {
		
		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\WORKS\Storage\images\iphone\tmp";
		
//		String fname = "2016-01-11_16-17-05_00.jpg";
		String fname = "2016-01-11_16-17-05_000.jpg";
//		String fname = "2016-01-11_19-28-37_001.jpg";
//		String fname = "2016-01-11_19-28-37_000.jpg";
		
		File f = new File(dpath, fname);
		
		// get the list of all files in the directory
		String[] aryOf_FileNames = new File(dpath).list();
		
		if (f.exists()) {
			
			String msg;
			
			//ref http://stackoverflow.com/questions/47045/sprintf-equivalent-in-java answered Sep 5 '08 at 23:06
			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s (total = %d files)", 
					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					f.getName(),
					aryOf_FileNames.length);
			
			System.out.println(msg);
			
			
		}//if (f.exists())
		
		///////////////////////////////////
		//
		// change file name
		//
		///////////////////////////////////
		//ref http://stackoverflow.com/questions/1128723/how-can-i-test-if-an-array-contains-a-certain-value answered Jul 15 '09 at 0:04
		List<String> listOf_FileNames = Arrays.asList(aryOf_FileNames);
		
		boolean res_b;
		
		res_b = listOf_FileNames.contains(fname);
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] file %s => in the dir --> %s", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), fname, res_b);
		
		System.out.println(msg);
		
		// setup
//		//test
//		fname = "2016-01-11_16-17-05_00.jpg";
		
		//ref http://stackoverflow.com/questions/4662215/how-to-extract-a-substring-using-regex answered Jan 11 '11 at 20:27
		String mydata = fname;
//		String mydata = "some string with 'the data i want' inside";
		
		String regex = "(\\d\\d\\d)\\.jpg";
		Pattern pattern = Pattern.compile(regex);
//		Pattern pattern = Pattern.compile("\\d\\d\\d\\.jpg");
//		Pattern pattern = Pattern.compile("'(.*?)'");
		Matcher matcher = pattern.matcher(mydata);
		
		int serial_num;
		
		while(matcher.find() == true) {
			
			msg = String.format(Locale.JAPAN, 
					"[%s : %d] group(0) = %s / count = %d / regex = '%s'", 
					Thread.currentThread().getStackTrace()[1].getFileName(), 
					Thread.currentThread().getStackTrace()[1].getLineNumber(), 
					matcher.group(0), matcher.groupCount(), regex);
			
			System.out.println(msg);
			
			// update serial number
			serial_num = Integer.parseInt(matcher.group(1));
			
//			String msg;
			msg = String.format(Locale.JAPAN, 
					"[%s : %d] group(1) => '%s' (%%d = %d)", 
					Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					matcher.group(1), Integer.parseInt(matcher.group(1)));
			
			System.out.println(msg);
			
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] serial num (before) => %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), serial_num);
			
			System.out.println(msg);
			
			serial_num += 1;
			
			msg = String.format(Locale.JAPAN, "[%s : %d] serial num (after) => %d", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), serial_num);
			
			System.out.println(msg);
			
			regex = "\\d\\d\\d\\.jpg";
			
			//test
			pattern = Pattern.compile(regex);
//			Pattern pattern = Pattern.compile("\\d\\d\\d\\.jpg");
//			Pattern pattern = Pattern.compile("'(.*?)'");
			matcher = pattern.matcher(fname);
			
			if (matcher.find() == true) {
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] found: group(0) => '%s'", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), matcher.group(0));
				
				System.out.println(msg);
				
				
			} else {//if (matcher.find() == true)
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] not found: regex = '%s', fname = '%s'", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), regex, fname);
				
				System.out.println(msg);
				
				
			}//if (matcher.find() == true)
			
//			matcher = pattern.matcher(fname);
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] String.format(\"%%03d.jpg\", serial_num) => '%s'", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), String.format("%03d.jpg", serial_num));
			
			System.out.println(msg);
			
			String tmp_s;
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] fname is now => '%s'", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fname);
			
			System.out.println(msg);
			
			//test
//			String msg;
			msg = String.format(Locale.JAPAN, 
					"[%s : %d] replace result => '%s' (regex = '%s')", 
					Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					fname.replace(regex, String.format("%03d.jpg", serial_num)),
					regex);
			
			System.out.println(msg);
			
			
//			tmp_s = fname.replace(regex, String.format("%03d.jpg", serial_num));
			fname = fname.replace(regex, String.format("%03d.jpg", serial_num));
//			fname = fname.replace(regex, String.format("%03d.jpg", serial_num));
//					tmp_s = f_tmp.getName().replace("000.jpg", String.format("%03d.jpg", numOf_SameFileNames));
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] fname is now (after) => '%s'", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), tmp_s);
					.currentThread().getStackTrace()[1].getLineNumber(), fname);
			
			System.out.println(msg);
			
			//test
			break;
			
		}//while(matcher.find() == true)
		
		///////////////////////////////////
		//
		// return
		//
		///////////////////////////////////
		return fname;
		
//		if (matcher.find())
//		{
////		    System.out.println(matcher.group(1));
//		    System.out.println(matcher.group(0));
////		    String msg;
//			msg = String.format(Locale.JAPAN, 
//					"[%s : %d] group(0) = %s / count = %d / regex = '%s'", 
//					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), 
//					matcher.group(0), matcher.groupCount(), regex);
//
//			System.out.println(msg);
//			
//		} else {
//			
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] no match => fname = %s, regex = %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname, regex);
//
//			System.out.println(msg);
//			
//			return fname;
//			
//		}
		
//		// while
//		while(res_b == true) {
//			
//			// change file serial number
//			int serial_num = 
//		}
		
		
//		///////////////////////////////////
//		//
//		// change: millsec part
//		//
//		///////////////////////////////////
//		String[] tokens = fname.split("\\.");
//		
//		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] tokens => %d", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), tokens.length);
//
//		System.out.println(msg);
//		
//		// validate
//		if (tokens.length < 2) {
//
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] tokens => 1: %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname);
//
//			System.out.println(msg);
//			
//			return;
//
//		}//if (tokens.length < 2)
//		
//		///////////////////////////////////
//		//
//		// split "_"
//		//
//		///////////////////////////////////
//		String[] tokens2 = tokens[0].split("_");
////		String tokens2 = tokens[0].split("_");
//		
////		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] tokens2 => %d", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), tokens2.length);
//
//		System.out.println(msg);
//		
//		// validate
//		if (tokens2.length < 3) {
//
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] tokens2 => < 3: %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname);
//
//			System.out.println(msg);
//			
//			return;
//
//		}//if (tokens2.length < 3)
//		
//		///////////////////////////////////
//		//
//		// millsec
//		//
//		///////////////////////////////////
//		String millsec_s = tokens2[2];
//		
////		String msg;
//		msg = String.format(Locale.JAPAN, "[%s : %d] millsec_s = %s (%d)", Thread
//				.currentThread().getStackTrace()[1].getFileName(), Thread
//				.currentThread().getStackTrace()[1].getLineNumber(), 
//				millsec_s,
//				Integer.valueOf(millsec_s));
//
//		System.out.println(msg);
//		
		
	}//D_20_v_1_0_s_2__Get_FileName
	
	public static void 
	D_20_v_1_0__Get_FileName() {
		
		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\WORKS\Storage\images\iphone\tmp";
		
		String fname = "2016-01-11_16-17-05_000.jpg";
//		String fname = "2016-01-11_19-28-37_001.jpg";
//		String fname = "2016-01-11_19-28-37_000.jpg";
		
		File f = new File(dpath, fname);
		
		
		
		if (f.exists()) {
			
			String msg;
			
			//ref http://stackoverflow.com/questions/47045/sprintf-equivalent-in-java answered Sep 5 '08 at 23:06
			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), f.getName());
			
			System.out.println(msg);
			
			
		}//if (f.exists())
		
		///////////////////////////////////
		//
		// change: millsec part
		//
		///////////////////////////////////
		String[] tokens = fname.split("\\.");
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] tokens => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), tokens.length);
		
		System.out.println(msg);
		
		// validate
		if (tokens.length < 2) {
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] tokens => 1: %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fname);
			
			System.out.println(msg);
			
			return;
			
		}//if (tokens.length < 2)
		
		///////////////////////////////////
		//
		// split "_"
		//
		///////////////////////////////////
		String[] tokens2 = tokens[0].split("_");
//		String tokens2 = tokens[0].split("_");
		
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] tokens2 => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), tokens2.length);
		
		System.out.println(msg);
		
		// validate
		if (tokens2.length < 3) {
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] tokens2 => < 3: %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fname);
			
			System.out.println(msg);
			
			return;
			
		}//if (tokens2.length < 3)
		
		///////////////////////////////////
		//
		// millsec
		//
		///////////////////////////////////
		String millsec_s = tokens2[2];
		
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] millsec_s = %s (%d)", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), 
				millsec_s,
				Integer.valueOf(millsec_s));
		
		System.out.println(msg);
		
		
	}//D_20_v_1_0__Get_FileName
	
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
	D_19_v_1_0__Change_IPhoneFile() {
		// TODO Auto-generated method stub
		
		///////////////////////////////////
		//
		// vars
		//
		///////////////////////////////////
		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\\WORKS\\Storage\\images\\100SHARP\\tmp";
		
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
				
				return f.exists() && f.getName().startsWith("IMG");
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
		long lastModified = list_Files[0].lastModified();
		
		String time_label = conv_MillSec_to_TimeLabel(lastModified, "file name") + ".jpg";
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] file 1 => %s (%s)", 
				Thread.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), 
				fname_1,
				time_label);
		
		System.out.println(msg);

		///////////////////////////////////
		//
		// rename
		//
		///////////////////////////////////
		File f_tmp = null;
		
		String fname = null;
		
		int count = 0;
		
		int numOf_SameFileNames;
		
		String tmp_s;
		
		for (File elem : list_Files) {
			
//			fname = elem.getName();
			
			f_tmp = new File(dpath, 
					conv_MillSec_to_TimeLabel(elem.lastModified(), "file name") + ".jpg");
			
			
			numOf_SameFileNames = get_NumOf_SameFileNames(dpath, f_tmp.getName());
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file = %s (count = %d)", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					f_tmp, numOf_SameFileNames);

			System.out.println(msg);

			// same file name => change modified time
			if (numOf_SameFileNames > 0) {

				msg = String.format(Locale.JAPAN, "[%s : %d] re-creating file...", Thread
						.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber());
				
				System.out.println(msg);

				// re-create file
				tmp_s = f_tmp.getName().replace("000.jpg", String.format("%03d.jpg", numOf_SameFileNames));
//				tmp_s = f_tmp.getName().replace("000.jpg", String.format("%03d.jpg", count));
				
//				tmp_s = f_tmp.getName().replace("000.jpg", "00" + String.format("%03d", count));

				msg = String.format(Locale.JAPAN, "[%s : %d] tmp_s = %s", Thread
						.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber(),
						tmp_s);
				
				System.out.println(msg);

				// re-create file
				f_tmp = new File(dpath, tmp_s);
//						conv_MillSec_to_TimeLabel(
//								elem.lastModified() + (count), "file name") + ".jpg");
//				elem.lastModified() + (count * 1000), "file name") + ".jpg");

			}//if (numOf_SameFileNames > 0)

			msg = String.format(Locale.JAPAN, "[%s : %d] file is now = %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), 
					f_tmp.getName());

			System.out.println(msg);

			try {
				
				// change file name
				Files.move(elem.toPath(), f_tmp.toPath());
				
				// count
				count += 1;
				
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
		msg = String.format(Locale.JAPAN, "[%s : %d] done (total %d / done %d)", 
				Thread.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(),
				list_Files.length,
				count
				
				);

		System.out.println(msg);
		
		
	}//D_19_v_1_0__Change_IPhoneFile
	
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
	get_NumOf_SameFileNames(String dpath, String f_tmp) {
		
		// file names
		File dir = new File(dpath);
		
		String[] listOf_FileNames = dir.list();
		
		int count = 0;
		
		for (String elem : listOf_FileNames) {
			
			// judge
			if (f_tmp.equals(elem)) {

				count += 1;

			}//if (f_tmp.equals(elem))
			
		}//for (String elem : listOf_FileNames)
		
		// return
		return count;
		
	}//get_NumOf_SameFileNames(dpath, f_tmp)
	
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

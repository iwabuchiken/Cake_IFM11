/*
 * javac C:/WORKS/WS/WS_Android/IFM11/src/ifm11/utils/MyTest.java
 * javac C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\Delete_UnusedPhotos.java
 * 
 * <Usage> 

pushd C:\WORKS\WS\Eclipse_Luna\Cake_IFM11
java -cp ".;lib/data/java/*"  Delete_UnusedPhotos

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
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.BufferedWriter;
import java.io.FileWriter;

//ref http://stackoverflow.com/questions/8809098/how-do-i-set-the-default-locale-for-my-jvm answered Jan 10 '12 at 19:17
import java.util.Locale;
import java.util.Arrays;

import java.util.ArrayList;
import java.util.List;

//ref http://www.tutorialspoint.com/sqlite/sqlite_java.htm
import java.sql.*;

import java.awt.datatransfer.*;
import java.awt.Toolkit;


/*
pushd C:\WORKS\WS\Eclipse_Luna\Cake_IFM11

javac Delete_UnusedPhotos.java

java -cp ".;lib/data/java/*"  Delete_UnusedPhotos



 */

public class Delete_UnusedPhotos {

	///////////////////////////////////
	//
	// clipboard
	//
	///////////////////////////////////
	//ref http://stackoverflow.com/questions/6710350/copying-text-to-the-clipboard-using-java answered Jul 15 '11 at 21:23
	static StringSelection stringSelection = null;
//	static StringSelection stringSelection = new StringSelection(text_Clipboard);

	static Clipboard clpbrd = Toolkit.getDefaultToolkit().getSystemClipboard();

	static String text_Clipboard = "";
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub

		Delete_UnusedPhotos.D_21_v_1_0_1();
		
	}//public static void main(String[] args)

	public static void D_21_v_1_0_1() {
		
		/*
		 * setup => JDBC
		 */
		//////////////////////////////////////////////////////////////////////
		//
		// files in the db
		//
		//////////////////////////////////////////////////////////////////////
		///////////////////////////////////
		//
		// count
		//
		///////////////////////////////////
		int numOf_UnusedPhotos = get_NumOf_UnusedPhotos();
		
		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] numOf_UnusedPhotos => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), numOf_UnusedPhotos);

		System.out.println(msg);

		// build: clipboard text
		text_Clipboard += msg + "\n";

		if (numOf_UnusedPhotos < 1) {

			msg = String.format(Locale.JAPAN, "[%s : %d] numOf_UnusedPhotos less than 1 => exiting...", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), numOf_UnusedPhotos);
			
			System.out.println(msg);

			// build: clipboard text
			text_Clipboard += msg + "\n";

			///////////////////////////////////
			//
			// clipboard
			//
			///////////////////////////////////
			//ref http://stackoverflow.com/questions/6710350/copying-text-to-the-clipboard-using-java answered Jul 15 '11 at 21:23
			stringSelection = new StringSelection(text_Clipboard);

//			Clipboard clpbrd = Toolkit.getDefaultToolkit().getSystemClipboard();
			
			clpbrd.setContents(stringSelection, null);

//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] clipboard => copied", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber());

			System.out.println(msg);

			// return
			return;

		}//if (numOf_UnusedPhotos < 1)
		
		
		
		///////////////////////////////////
		//
		// build: list of file names
		//
		///////////////////////////////////
		List<String> listOf_FileNames__Unused = find_Photos_All__Unused();
		
		msg = String.format(Locale.JAPAN, "[%s : %d] listOf_FileNames__Unused => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), 
				listOf_FileNames__Unused.size());

		System.out.println(msg);

		// build: clipboard text
		text_Clipboard += msg + "\n";

//		for (int i = 0; i < 10; i++) {
//			
//			String fname = listOf_FileNames__Unused.get(i);
//			
////			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] fname => %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), fname);
//
//			System.out.println(msg);
//			
//			
//		}//for (int i = 0; i < 10; i++)

		///////////////////////////////////
		//
		// delete files
		//
		///////////////////////////////////
		int numOf_Deleted_Files = delete_Unused_Photos(listOf_FileNames__Unused);
		
//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] numOf_Deleted_Files => %d", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber(), numOf_Deleted_Files);

		System.out.println(msg);
		
		// build: clipboard text
		text_Clipboard += msg + "\n";

		///////////////////////////////////
		//
		// clipboard
		//
		///////////////////////////////////
		//ref http://stackoverflow.com/questions/6710350/copying-text-to-the-clipboard-using-java answered Jul 15 '11 at 21:23
		stringSelection = new StringSelection(text_Clipboard);

//		Clipboard clpbrd = Toolkit.getDefaultToolkit().getSystemClipboard();
		
		clpbrd.setContents(stringSelection, null);

//		String msg;
		msg = String.format(Locale.JAPAN, "[%s : %d] clipboard => copied", Thread
				.currentThread().getStackTrace()[1].getFileName(), Thread
				.currentThread().getStackTrace()[1].getLineNumber());

		System.out.println(msg);
		
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
		
		
	}//D_21_v_1_0_1()
	

	public static int
	delete_Unused_Photos(List<String> listOf_FileNames__Unused) {

		String msg;
		
		String dpath_iphone = "C:\\Users\\kbuchi\\Desktop\\data\\images\\iphone";
		
		int lenOf_listOf_FileNames__Unused = listOf_FileNames__Unused.size();
		
		String fname = null;
		File f = null;
		
		int count = 0;
		
		for (int i = 0; i < lenOf_listOf_FileNames__Unused; i++) {
			
			fname = listOf_FileNames__Unused.get(i);
			
			f = new File(dpath_iphone, fname);
			
			// judge
			if (f.exists() == true) {

//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), f.getAbsolutePath());

				System.out.println(msg);

				// delete
				boolean res = f.delete();
				
				// count 
				if (res == true) {
					
					count += 1;

					msg = String.format(Locale.JAPAN, "[%s : %d] file deleted => %s", Thread
							.currentThread().getStackTrace()[1].getFileName(),
							Thread.currentThread().getStackTrace()[1]
									.getLineNumber(), f.getAbsolutePath());

					System.out.println(msg);

				} else {//if (res == true)
					
					msg = String.format(Locale.JAPAN, "[%s : %d] file NOT deleted => %s", Thread
							.currentThread().getStackTrace()[1].getFileName(),
							Thread.currentThread().getStackTrace()[1]
									.getLineNumber(), f.getAbsolutePath());

					System.out.println(msg);

					
				}//if (res == true)
				
			}//if (f.exists() == true)
			
		}//for (int i = 0; i < lenOf_listOf_FileNames__Unused; i++)
		
		// return
		return count;
		
	}//delete_Unused_Photos()
	
	public static ArrayList<String>
	find_Photos_All__Unused() {

		String msg;
		
		//
		String q = "SELECT * FROM ifm11 "
				+ "WHERE memos == '-*' "
				+ "ORDER BY file_name DESC;";

		String db_Directive = "jdbc:sqlite:"
				+ "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data"
				+ "\\ifm11_backup_20160110_080900.bk";
		
		//ref http://www.tutorialspoint.com/sqlite/sqlite_java.htm
		Connection c = null;
		
		Statement stmt = null;
		
		ArrayList<String> listOf_FileNames = new ArrayList<String>();
		
		try {
			
			Class.forName("org.sqlite.JDBC");
			//ref java.sql.DriverManager
			
			c = DriverManager.getConnection(db_Directive);
			
			c.setAutoCommit(false);
			
			//ref http://stackoverflow.com/questions/7886462/how-to-get-row-count-using-resultset-in-java answered Jun 26 '12 at 5:34
			stmt = c.createStatement( 
					ResultSet.TYPE_FORWARD_ONLY, 
//					ResultSet.TYPE_SCROLL_INSENSITIVE, 
					ResultSet.CONCUR_READ_ONLY );
			
			ResultSet rs = stmt.executeQuery( q );
			
			while (rs.next()) {
				
	            String fname = rs.getString("file_name");
//	            int supplierID = rs.getInt("SUP_ID");
//	            float price = rs.getFloat("PRICE");
//	            int sales = rs.getInt("SALES");
//	            int total = rs.getInt("TOTAL");
//	            System.out.println(coffeeName + "\t" + supplierID +
//	                               "\t" + price + "\t" + sales +
//	                               "\t" + total);
	            
	            listOf_FileNames.add(fname);
	            
	        }
			
			// closing ops
			rs.close();
			stmt.close();
			c.close();
			
		} catch ( Exception e ) {
			
//			String msg;
			String tmp_s = e.getClass().getName() + ": " + e.getMessage();
			
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] Exception => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), tmp_s);
			
			System.out.println(msg);

		}

		// return
		return listOf_FileNames;

	}//find_Photos_All__Unused()
	
	public static int
	get_NumOf_UnusedPhotos() {

		String q2 = "SELECT count(*) FROM ifm11 "
				+ "WHERE memos == '-*' "
				+ "ORDER BY file_name DESC;";
		
		String db_Directive = "jdbc:sqlite:"
				+ "C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11\\app\\Lib\\data"
				+ "\\ifm11_backup_20160110_080900.bk";
		
		//ref http://www.tutorialspoint.com/sqlite/sqlite_java.htm
		Connection c = null;
		
		Statement stmt = null;
		
		try {
			
			Class.forName("org.sqlite.JDBC");
			//ref java.sql.DriverManager
			
			c = DriverManager.getConnection(db_Directive);
			
			c.setAutoCommit(false);
			
			//ref http://stackoverflow.com/questions/7886462/how-to-get-row-count-using-resultset-in-java answered Jun 26 '12 at 5:34
			stmt = c.createStatement( 
					ResultSet.TYPE_FORWARD_ONLY, 
//					ResultSet.TYPE_SCROLL_INSENSITIVE, 
					ResultSet.CONCUR_READ_ONLY );
			
//			ResultSet rs = stmt.executeQuery( query );
//			ResultSet rs = stmt.executeQuery( q );
			ResultSet rs = stmt.executeQuery( q2 );
			
			
			int tmp_i = rs.getInt("count(*)");
			
//			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] rs.getInt(\"count(*)\") => %d", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), tmp_i);
//
//			System.out.println(msg);
			
			rs.close();
			stmt.close();
			c.close();
			
			// return
			return tmp_i;
			
		} catch ( Exception e ) {
			
			String msg;
			String tmp_s = e.getClass().getName() + ": " + e.getMessage();
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] Exception => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), tmp_s);
			
			System.out.println(msg);
			
			return -1;
			
		}

	}//get_NumOf_UnusedPhotos()
	
	
	/*******************************
	 * increment by 1<br>
	 * "2016-01-11_16-17-02_000.jpg" => "2016-01-11_16-17-02_001.jpg"
	 *******************************/
	public static String
	update_TimeLabeled_FileName(String fname) {
		
		String regex = "(\\d\\d\\d)\\.jpg";
		Pattern pattern = Pattern.compile(regex);
		Matcher matcher = pattern.matcher(fname);
		
		int serial_num;
		
		if (matcher.find() == true) {
			
			// update serial number
			serial_num = Integer.parseInt(matcher.group(1));
		
			serial_num += 1;
			
			fname = fname.replaceAll(regex, String.format("%03d.jpg", serial_num));
			
		} 
			
		return fname;
		
	}//update_TimeLabeled_FileName
	
	public static int
	is_InDB_FileName(String db_Directive, String query) {
		
		///////////////////////////////////
		//
		// db
		//
		///////////////////////////////////
		//ref http://www.tutorialspoint.com/sqlite/sqlite_java.htm
		Connection c = null;
		
		Statement stmt = null;
		
		try {
			
			Class.forName("org.sqlite.JDBC");
			//ref java.sql.DriverManager
			
			c = DriverManager.getConnection(db_Directive);
			
			c.setAutoCommit(false);
			
			//ref http://stackoverflow.com/questions/7886462/how-to-get-row-count-using-resultset-in-java answered Jun 26 '12 at 5:34
			stmt = c.createStatement( 
					ResultSet.TYPE_FORWARD_ONLY, 
//					ResultSet.TYPE_SCROLL_INSENSITIVE, 
					ResultSet.CONCUR_READ_ONLY );
			
			ResultSet rs = stmt.executeQuery( query );
			
			///////////////////////////////////
			//
			// get count
			//
			///////////////////////////////////
			int val = get_NumOf_Entries_InDB(stmt, query);
			
			rs.close();
			stmt.close();
			c.close();
			
			return val;
			
		} catch ( Exception e ) {
			
			String msg;
			String tmp_s = e.getClass().getName() + ": " + e.getMessage();
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] Exception => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), tmp_s);
			
			System.out.println(msg);
			
			return -1;
			
		}
		
	}//is_InDB_FileName
	

	/*******************************
	 * @return
	 * null	=> file doesn't exist
	 *******************************/
	public static String 
//	public static void 
	get_FileName_No_Duplicates
	(String dpath, String fname) {
		
//		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\WORKS\Storage\images\iphone\tmp";
		
//		String fname = "2016-01-11_16-17-05_000.jpg";
		
		File f = new File(dpath, fname);
		
		// get the list of all files in the directory
		String[] aryOf_FileNames = new File(dpath).list();
		
		if (f.exists()) {
			
//			String msg;
//			
//			//ref http://stackoverflow.com/questions/47045/sprintf-equivalent-in-java answered Sep 5 '08 at 23:06
//			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s (total = %d files)", 
//					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), 
//					f.getName(),
//					aryOf_FileNames.length);
//			
////			System.out.println(msg);
//
//			write_Log(msg, 
//					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber());

			
		} else {//if (f.exists())
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file => not exist: %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), f.getName());

//			System.out.println(msg);

			msg = String.format(Locale.JAPAN, "file => not exist: %s", f.getName());

			write_Log(msg, 
					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber());
			
			return null;
			
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
			
//			System.out.println(msg);
			
			if (matcher.find() == true) {
				
				// update serial number
				serial_num = Integer.parseInt(matcher.group(1));
				
				serial_num += 1;
				
				msg = String.format(Locale.JAPAN, "[%s : %d] serial num (after) => %d", 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber(), serial_num);
				
//				System.out.println(msg);

				msg = String.format(Locale.JAPAN, 
						"serial num (after) => %d",serial_num);

				write_Log(msg, 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber());

				fname = fname.replaceAll(regex, String.format("%03d.jpg", serial_num));
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] fname replaced => '%s'", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), fname);
				
//				System.out.println(msg);

				msg = String.format(Locale.JAPAN, "fname replaced => '%s'", fname);

				write_Log(msg, 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber());

			} else {//if (matcher.find() == true)
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] no match", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber());
				
//				System.out.println(msg);

				msg = String.format(Locale.JAPAN, "no match");

				write_Log(msg, 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber());
				
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
		
//		System.out.println(msg);
		
		///////////////////////////////////
		//
		// return
		//
		///////////////////////////////////
		return fname;
		
	}//get_FileName_No_Duplicates
	
	/*******************************
	 * @return
	 * file doesn't exist	=> return the same file name<br> 
	 * file exists	=> "2016-01-12_13-34-03_001.jpg" --> "2016-01-12_13-34-03_002.jpg"<br> 
	 *******************************/
	public static String 
//	public static void 
	get_FileName_No_Duplicates__V2
	(String dpath, String fname) {
		
//		String dpath = "C:\\WORKS\\Storage\\images\\iphone\\tmp";
//		String dpath = "C:\WORKS\Storage\images\iphone\tmp";
		
//		String fname = "2016-01-11_16-17-05_000.jpg";
		
		File f = new File(dpath, fname);
		
		// get the list of all files in the directory
		String[] aryOf_FileNames = new File(dpath).list();
		
		if (f.exists()) {
			
//			String msg;
//			
//			//ref http://stackoverflow.com/questions/47045/sprintf-equivalent-in-java answered Sep 5 '08 at 23:06
//			msg = String.format(Locale.JAPAN, "[%s : %d] file exists => %s (total = %d files)", 
//					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber(), 
//					f.getName(),
//					aryOf_FileNames.length);
//			
////			System.out.println(msg);
//
//			write_Log(msg, 
//					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber());
			
			
		} else {//if (f.exists())
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file => not exist: %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), f.getName());
			
//			System.out.println(msg);

			msg = String.format(Locale.JAPAN, "file => not exist: %s", f.getName());

			write_Log(msg, 
					Thread.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber());

			
			return fname;
//			return null;
			
		}//if (f.exists())
		
		///////////////////////////////////
		//
		// change file name
		//
		///////////////////////////////////
		// same name in the db?
		int serial_num = 0;
		
//		int numOf_SameFileName = 
//		
		//ref http://stackoverflow.com/questions/1128723/how-can-i-test-if-an-array-contains-a-certain-value answered Jul 15 '09 at 0:04
		List<String> listOf_FileNames = Arrays.asList(aryOf_FileNames);
		
		boolean res_b;
		
		res_b = listOf_FileNames.contains(fname);
		
		String regex = "(\\d\\d\\d)\\.jpg";
		Pattern pattern = Pattern.compile(regex);
		Matcher matcher = pattern.matcher(fname);
		
//		int serial_num;
		
		while(res_b == true) {
			
			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] file %s => in the dir --> %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), fname, res_b);
			
//			System.out.println(msg);
			
			if (matcher.find() == true) {
				
				// update serial number
				serial_num = Integer.parseInt(matcher.group(1));
				
				serial_num += 1;
				
				msg = String.format(Locale.JAPAN, "[%s : %d] serial num (after) => %d", 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber(), serial_num);
				
//				System.out.println(msg);
				
				msg = String.format(Locale.JAPAN, 
						"serial num (after) => %d",serial_num);
				
				write_Log(msg, 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber());
				
				fname = fname.replaceAll(regex, String.format("%03d.jpg", serial_num));
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] fname replaced => '%s'", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), fname);
				
//				System.out.println(msg);
				
				msg = String.format(Locale.JAPAN, "fname replaced => '%s'", fname);
				
				write_Log(msg, 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber());
				
			} else {//if (matcher.find() == true)
				
//				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] no match", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber());
				
//				System.out.println(msg);
				
				msg = String.format(Locale.JAPAN, "no match");
				
				write_Log(msg, 
						Thread.currentThread().getStackTrace()[1].getFileName(), Thread
						.currentThread().getStackTrace()[1].getLineNumber());
				
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
		
//		System.out.println(msg);
		
		///////////////////////////////////
		//
		// return
		//
		///////////////////////////////////
		return fname;
		
	}//get_FileName_No_Duplicates
	
	
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
	get_NumOf_SameFileNames_InDB
	(String dpath, String f_tmp) {

		
		return -1;
		
//		// file names
//		File dir = new File(dpath);
//		
//		String[] listOf_FileNames = dir.list();
//		
//		int count = 0;
//		
//		for (String elem : listOf_FileNames) {
//			
//			// judge
//			if (f_tmp.equals(elem)) {
//				
//				count += 1;
//				
//			}//if (f_tmp.equals(elem))
//			
//		}//for (String elem : listOf_FileNames)
//		
//		// return
//		return count;
		
	}//get_NumOf_SameFileNames_InDB
	
	
	public static int
	get_NumOf_SameFileNames__V2(String dpath, String f_tmp) {
		
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
		
	}//get_NumOf_SameFileNames__V2(dpath, f_tmp)
	
	
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

	public static void 
	write_Log
	(String message, String fileName, int lineNumber) {
		
		////////////////////////////////

		// file

		////////////////////////////////
		String fname = "log.D-20.txt";
		
		File fpath_Log = new File("C:\\WORKS_2\\WS\\Eclipse_Luna\\Cake_IFM11", fname);
		
		////////////////////////////////

		// file exists?

		////////////////////////////////
		if (!fpath_Log.exists()) {
			
			try {
				
				fpath_Log.createNewFile();
				
				String msg;
				msg = String.format(Locale.JAPAN, "[%s : %d] log file => created: %s", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), fpath_Log.getAbsolutePath());

				System.out.println(msg);
				
			} catch (IOException e) {
				
				e.printStackTrace();
				
				String msg = "Can't create a log file";
//				Methods_dlg.dlg_ShowMessage_Duration(actv, msg, R.color.gold2);
				msg = String.format(Locale.JAPAN, "[%s : %d] log file => created: %s", Thread
						.currentThread().getStackTrace()[1].getFileName(),
						Thread.currentThread().getStackTrace()[1]
								.getLineNumber(), fpath_Log.getAbsolutePath());

				System.out.println(msg);
				
				return;
				
			}
			
		} else {
			
//			String msg;
//			
//			msg = String.format(Locale.JAPAN, "[%s : %d] log file => created: %s", Thread
//					.currentThread().getStackTrace()[1].getFileName(),
//					Thread.currentThread().getStackTrace()[1]
//							.getLineNumber(), fpath_Log.getAbsolutePath());
//
//			System.out.println(msg);

		}

		////////////////////////////////

		// write

		////////////////////////////////
		try {

			String text = String.format(Locale.JAPAN,
					"[%s] [%s : %d] %s\n", 
					conv_MillSec_to_TimeLabel(
							getMillSeconds_now(), "time label"),
					fileName, lineNumber,
					message);

			//ref [append] http://alvinalexander.com/java/edu/qanda/pjqa00009.shtml
			BufferedWriter bw = new BufferedWriter(new FileWriter(fpath_Log, true));
			
			//ref http://www.mkyong.com/java/how-to-write-to-file-in-java-bufferedwriter-example/
			bw.write(text);
			
			bw.close();
			
//			//REF append http://stackoverflow.com/questions/8544771/how-to-write-data-with-fileoutputstream-without-losing-old-data answered Dec 17 '11 at 12:37
//			FileOutputStream fos = new FileOutputStream(fpath_Log, true);
////			FileOutputStream fos = new FileOutputStream(fpath_Log);
//			
//			String text = String.format(Locale.JAPAN,
//							"[%s] [%s : %d] %s\n", 
//							conv_MillSec_to_TimeLabel(
//									getMillSeconds_now(), "time label"),
//							fileName, lineNumber,
//							message
////							Methods.conv_MillSec_to_TimeLabel(
////									STD.getMillSeconds_now()),
////									fileName, lineNumber,
////									message
//						);
//			
//			//REF getBytes() http://www.adakoda.com/android/000240.html
//			fos.write(text);
////			fos.write(text.getBytes());
////			fos.write(message.getBytes());
//			
////			fos.write("\n".getBytes());
//			
//			fos.close();
			
//			// Log
//			String msg;
//			msg = String.format(Locale.JAPAN, "[%s : %d] log => written", Thread
//					.currentThread().getStackTrace()[1].getFileName(), Thread
//					.currentThread().getStackTrace()[1].getLineNumber());
//
//			System.out.println(msg);
			
			
//			Log.d("Methods.java" + "["
//					+ Thread.currentThread().getStackTrace()[1].getLineNumber()
//					+ "]", msg_Log);
//			FileChannel oChannel = new FileOutputStream(fpath_Log).getChannel();
//			
//			oChannel.wri
			
		} catch (FileNotFoundException e) {
			
			e.printStackTrace();
			
		} catch (IOException e) {
			
			e.printStackTrace();
		}
		
	}//write_Log

	public static long getMillSeconds_now() {
		
		Calendar cal = Calendar.getInstance();
		
		return cal.getTime().getTime();
		
	}//private long getMillSeconds_now(int year, int month, int date)

	/*******************************
	 * @return
	 * -1	=> query exception
	 *******************************/
	public static int
	get_NumOf_Entries_InDB(Statement s, String query) {
	
		ResultSet rs = null;
		
		try {
			
			rs = s.executeQuery( query );
			
			return rs.getInt("count(*)");
			
		} catch ( Exception e ) {
			
			String msg;
			String tmp_s = e.getClass().getName() + ": " + e.getMessage();
//			String msg;
			msg = String.format(Locale.JAPAN, "[%s : %d] Exception => %s", Thread
					.currentThread().getStackTrace()[1].getFileName(), Thread
					.currentThread().getStackTrace()[1].getLineNumber(), tmp_s);

			System.out.println(msg);
			
//			System.err.println( e.getClass().getName() + ": " + e.getMessage() );
//			System.exit(0);
			
			return -1;
			
		}
		
//		return rs.getInt("count(*)");
//		int val = rs.getInt("count(*)");
		
	}//get_NumOf_Entries_InDB
	
}



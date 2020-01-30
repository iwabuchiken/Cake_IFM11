<?php

/*
C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11\
	=> app diretory
/cake_apps/Cake_IFM11

 * 
 * 
 */


class IPController extends AppController {

	
// 	public $scaffold;

	//ref http://stackoverflow.com/questions/4252577/cakephp-session-cant-write answered Nov 23 '10 at 3:56
	public $helpers = array('Html', 'Form');

	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
// 	public $components = array('Paginator', 'Session');
	public $components = array('Paginator');

	public function index() {

		/******************
		 * step : 1
		 * 		prep
		 ****************/
		
		/******************
		 * step : 1.2
		 * 		prep : url params
		 ****************/
		/******************
		 * step : 1.1 : 1
		 * 		get : param
		 ****************/
		
	}//public function index()

	/******************
	 * ip_proc_actions__Proc_1__Copy_Simple
	 *
	 * 	at : 2020/01/29 15:52:46
	 caller : function ip_proc_actions(_param) (js file)
	  
	 ****************/
	public function get_Params_For__Image_Copy($ix, $iy) {
		//_20200129_155312:head
		//_20200129_155316:caller
		//_20200129_155320:wl

		//ref https://www.php.net/manual/en/function.rand.php
		//_20200129_155122:tmp
		/********************
		* step : 1
		* 	get : basic data
		********************/
		$rand_X_Src = rand(0, $ix);
		$rand_Y_Src = rand(0, $iy);
		
		$rand_X_Dst = rand(0, $ix);
		$rand_Y_Dst = rand(0, $iy);
		
		$rand_W = rand($ix / 4 * 1 , $ix / 4 * 3);
		$rand_H = rand($iy / 4 * 1 , $iy / 4 * 3);
// 		$rand_W = rand($ix / 1 , $ix / 3);
// 		$rand_H = rand($iy / 1 , $iy / 3);
		
		debug("\$ix = $ix / \$iy = $iy");
		
		debug("\$rand_X_Src = $rand_X_Src / \$rand_Y_Src = $rand_Y_Src");
		debug("\$rand_X_Dst = $rand_X_Dst / \$rand_Y_Dst = $rand_Y_Dst");
		debug("\$rand_W = $rand_W / \$rand_H = $rand_H");
		
		debug("\$rand_X_Src + \$rand_W = " . ($rand_X_Src + $rand_W));
		debug("\$rand_Y_Src + \$rand_H = " . ($rand_Y_Src + $rand_H));
		
		debug("\$rand_X_Dst + \$rand_W = " . ($rand_X_Dst + $rand_W));
		debug("\$rand_Y_Dst + \$rand_H = " . ($rand_Y_Dst + $rand_H));
		
		/********************
		* step : 1
		* 		width
		********************/
		/********************
		* step : 1.1
		* 		src
		********************/
		// width of the copy area
		$cond_1 = ($rand_X_Src + $rand_W) > $ix;
		
		$W_new = ($cond_1) ? ($ix - $rand_X_Src) : $rand_W;
		
// 		// min value
// 		$W_new = ($W_new < 50) ? 50 : $W_new;
		
		debug("\$W_new (src) = " . $W_new);
		
		/********************
		* step : 1.2
		* 		dst
		********************/
		$cond_1 = ($rand_X_Dst + $W_new) > $ix;
// 		$cond_1 = ($rand_X_Dst + $rand_W) > $ix;
		
		$W_new = ($cond_1) ? ($ix - $rand_X_Dst) : $W_new;
		
// 		// min value
// 		$W_new = ($W_new < 50) ? 50 : $W_new;
		
		debug("\$W_new (dst) = " . $W_new);
		
		
		/********************
		 * step : 2
		 * 		height
		 ********************/
		/********************
		 * step : 2.1
		 * 		src
		 ********************/
		// height of the copy area
		$cond_2 = ($rand_Y_Src + $rand_H) > $iy;
		
		$H_new = ($cond_2) ? ($iy - $rand_Y_Src) : $rand_H;
		
// 		// min value
// 		$H_new = ($H_new < 50) ? 50 : $H_new;
		
		debug("\$H_new (src) = " . $H_new);

		/********************
		 * step : 2.2
		 * 		dst
		 ********************/
		$cond_2 = ($rand_Y_Dst + $H_new) > $iy;
		// 		$cond_1 = ($rand_X_Dst + $rand_W) > $ix;
		
		$H_new = ($cond_2) ? ($iy - $rand_Y_Dst) : $H_new;
		
		// 		// min value
		// 		$W_new = ($W_new < 50) ? 50 : $W_new;
		
		debug("\$H_new (dst) = " . $H_new);
		
		/********************
		 * step : 3
		 * 		return
		 ********************/
		//_20200129_160752:next
		/********************
		* step : 3 : 1
		* 		val
		********************/
		$valOf_Return = array(
				
				$rand_X_Src, $rand_Y_Src
				, $rand_X_Dst, $rand_Y_Dst
				, $W_new, $H_new
		);
// 		$valOf_Return = array("ip_proc_actions__Proc_1 ==> comp");
		
		/********************
		* step : 3 : 2
		* 		return
		********************/
		return $valOf_Return;
		
	}//public function get_Params_For__Image_Copy($ix, $iy) {

	/******************
	 * ip_proc_actions__Proc_1__Copy_Partial
	 *
	 * 	at : 2020/01/28 14:09:31
	 caller : function ip_proc_actions(_param) (js file)
	  
	 ****************/
	public function ip_proc_actions__Proc_1__Copy_Partial_Multiple
	($fpath_Image_File, $_num_Partial = 4) {
		//_20200130_142154:head
		//_20200130_142156:caller
		//_20200130_142200:wl
	
		/********************
			* step : 0
			* 		prep : vars
			********************/
		$fpath_Out_Image_File = "$fpath_Image_File.("
		. Utils::get_CurrentTime2(CONS::$timeLabelTypes['serial'])
		. ").png";
	
		/********************
			* step : 1 : 1
			* 		image ==> create : source
			********************/
		$im_inp = ImageCreateFromPNG($fpath_Image_File);
		// 		$im_inp = ImageCreateFromJPEG($fpath_Image_File);
	
		$ix = ImageSX($im_inp);
		$iy = ImageSY($im_inp);
	
		/********************
			* step : 1 : 2
			* 		image ==> create : dst
		********************/
		//ref http://tsuttayo.jpn.org/php/gd/
		$im_out = ImageCreateTrueColor($ix, $iy);
	
		/********************
			* step : 2 : 1
			* 		image ==> copy (whole)
		********************/
		// copy : whole
		$res = ImageCopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
		// 		$res = imagecopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
	
		debug("imagecopy (whole) ==> "
				. ($res ? "comp : $fpath_Out_Image_File" : "failed : $fpath_Out_Image_File"));
	
		/********************
			* step : 2 : 2
			* 		image ==> copy (partial)
		********************/
		$num_Partial = $_num_Partial;
// 		$num_Partial = 4;
		
		for ($i = 0; $i < $num_Partial; $i++) {
		
			/********************
				* step : 2 : 2.1
				* 		prep : vars
			********************/
			//_20200129_155316:caller
			$valOf_Ret__received = $this->get_Params_For__Image_Copy($ix, $iy);
			// 		$rand_X_Src, $rand_Y_Src
			// 		, $rand_X_Dst, $rand_Y_Dst
			// 		, $W_new, $H_new
		
			$rand_X_Src	= $valOf_Ret__received[0];
			$rand_Y_Src	= $valOf_Ret__received[1];
			$rand_X_Dst	= $valOf_Ret__received[2];
			$rand_Y_Dst	= $valOf_Ret__received[3];
			$W_new		= $valOf_Ret__received[4];
			$H_new		= $valOf_Ret__received[5];
		
			debug("get_Params_For__Image_Copy ==> returned");
			debug("\$W_new = $W_new / \$H_new = $H_new");
			debug("\$rand_X_Dst = $rand_X_Dst / \$rand_Y_Dst = $rand_Y_Dst");
		
		
			/********************
				* step : 2 : 2.2
				* 		image ==> copy (partial)
			********************/
			//_20200128_142027:next
			// vars
			$d_start_x = $ix / 2;
			$d_start_y = $iy / 2;
		
			$copy_w = $ix / 4;
			$copy_h = $iy / 3;
		
			// copy : partial
			$res = ImageCopy($im_out, $im_inp, $rand_X_Dst, $rand_Y_Dst, $rand_X_Src, $rand_Y_Src, $W_new, $H_new);
			// 		$res = ImageCopy($im_out, $im_inp, $d_start_x, $d_start_y, 0, 0, $copy_w, $copy_h);
			// 		$res = ImageCopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
		
			debug("imagecopy (partial) ==> "
					. ($res ? "comp : $fpath_Out_Image_File" : "failed : $fpath_Out_Image_File"));			
		}//for ($i = 0; $i < $num_Partial; $i++)
		
		/********************
			* step : 3
			* 		image ==> out
		********************/
		// out
		$res = ImagePNG($im_out, $fpath_Out_Image_File);
	
		debug("ImagePNG ==> "
				. ($res ? "saved : $fpath_Out_Image_File" : "save png ==> failed : $fpath_Out_Image_File"));
	
		// destroy
		ImageDestroy($im_inp);
		ImageDestroy($im_out);
	
	}//public function ip_proc_actions__Proc_1__Copy_Partial_Multiple($fpath_Image_File)
	
	/******************
	 * ip_proc_actions__Proc_1__Copy_Partial
	 *
	 * 	at : 2020/01/28 14:09:31
	 caller : function ip_proc_actions(_param) (js file)
	  
	 ****************/
	public function ip_proc_actions__Proc_1__Copy_Partial($fpath_Image_File) {
		//_20200128_141640:head
		//_20200128_141644:caller
		//_20200128_141647:wl

		/********************
		* step : 0
		* 		prep : vars
		********************/
		$fpath_Out_Image_File = "$fpath_Image_File.("
		. Utils::get_CurrentTime2(CONS::$timeLabelTypes['serial'])
		. ").png";
		
		/********************
		* step : 1 : 1
		* 		image ==> create : source
		********************/
		$im_inp = ImageCreateFromPNG($fpath_Image_File);
		// 		$im_inp = ImageCreateFromJPEG($fpath_Image_File);
	
		$ix = ImageSX($im_inp);
		$iy = ImageSY($im_inp);
	
		/********************
		* step : 1 : 2
		* 		image ==> create : dst
		********************/
		//ref http://tsuttayo.jpn.org/php/gd/
		$im_out = ImageCreateTrueColor($ix, $iy);
	
		/********************
		* step : 2 : 1
		* 		image ==> copy (whole)
		********************/
		// copy : whole
		$res = ImageCopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
		// 		$res = imagecopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
	
		debug("imagecopy (whole) ==> "
				. ($res ? "comp : $fpath_Out_Image_File" : "failed : $fpath_Out_Image_File"));
	
		/********************
		* step : 2 : 2
		* 		image ==> copy (partial)
		********************/
		/********************
		* step : 2 : 2.1
		* 		prep : vars
		********************/
		//_20200129_155316:caller
		$valOf_Ret__received = $this->get_Params_For__Image_Copy($ix, $iy);
		// 		$rand_X_Src, $rand_Y_Src
		// 		, $rand_X_Dst, $rand_Y_Dst
		// 		, $W_new, $H_new
		
		$rand_X_Src	= $valOf_Ret__received[0];
		$rand_Y_Src	= $valOf_Ret__received[1];
		$rand_X_Dst	= $valOf_Ret__received[2];
		$rand_Y_Dst	= $valOf_Ret__received[3];
		$W_new		= $valOf_Ret__received[4];
		$H_new		= $valOf_Ret__received[5];
		
		debug("get_Params_For__Image_Copy ==> returned");
		debug("\$W_new = $W_new / \$H_new = $H_new");
		debug("\$rand_X_Dst = $rand_X_Dst / \$rand_Y_Dst = $rand_Y_Dst");
		
		
		/********************
		* step : 2 : 2.2
		* 		image ==> copy (partial)
		********************/
		//_20200128_142027:next
		// vars
		$d_start_x = $ix / 2;
		$d_start_y = $iy / 2;
		
		$copy_w = $ix / 4;
		$copy_h = $iy / 3;
		
		// copy : partial
		$res = ImageCopy($im_out, $im_inp, $rand_X_Dst, $rand_Y_Dst, $rand_X_Src, $rand_Y_Src, $W_new, $H_new);
// 		$res = ImageCopy($im_out, $im_inp, $d_start_x, $d_start_y, 0, 0, $copy_w, $copy_h);
// 		$res = ImageCopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
	
		debug("imagecopy (partial) ==> "
				. ($res ? "comp : $fpath_Out_Image_File" : "failed : $fpath_Out_Image_File"));
	
		/********************
		* step : 3
		* 		image ==> out
		********************/
		// out
		$res = ImagePNG($im_out, $fpath_Out_Image_File);
	
		debug("ImagePNG ==> "
				. ($res ? "saved : $fpath_Out_Image_File" : "save png ==> failed : $fpath_Out_Image_File"));
	
		// destroy
		ImageDestroy($im_inp);
		ImageDestroy($im_out);
	
	}//public function ip_proc_actions__Proc_1__Copy_Partial($fpath_Image_File) {
	
	
	/******************
	 * ip_proc_actions__Proc_1__Copy_Simple	
	 * 
	 * 	at : 2020/01/28 14:09:31
	 	caller : function ip_proc_actions(_param) (js file)
	 	
	 ****************/
	public function ip_proc_actions__Proc_1__Copy_Simple($fpath_Image_File) {
		//_20200128_140511:head
		//_20200128_140514:caller
		//_20200128_140518:wl

		$im_inp = ImageCreateFromPNG($fpath_Image_File);
		// 		$im_inp = ImageCreateFromJPEG($fpath_Image_File);
		
		$ix = ImageSX($im_inp);
		$iy = ImageSY($im_inp);
		
		//ref http://tsuttayo.jpn.org/php/gd/
		$im_out = ImageCreateTrueColor($ix, $iy);
		
		$fpath_Out_Image_File = "$fpath_Image_File.("
		. Utils::get_CurrentTime2(CONS::$timeLabelTypes['serial'])
		. ").png";
		
		// copy
		$res = ImageCopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
		// 		$res = imagecopy($im_out, $im_inp, 0, 0, 0, 0, $ix, $iy);
		
		debug("imagecopy ==> "
				. ($res ? "comp : $fpath_Out_Image_File" : "failed : $fpath_Out_Image_File"));
		
		// out
		$res = ImagePNG($im_out, $fpath_Out_Image_File);
		
		debug("ImagePNG ==> "
				. ($res ? "saved : $fpath_Out_Image_File" : "save png ==> failed : $fpath_Out_Image_File"));
		
		// destroy
		ImageDestroy($im_inp);
		
	}//public function ip_proc_actions__Proc_1__Copy_Simple($im_inp) {
	
	/******************
	 * ip_proc_actions
	 * 
	 * 	at : 2020/01/25 17:21:18
	 	caller : function ip_proc_actions(_param) (js file)
	 	
	 ****************/
	public function ip_proc_actions__Proc_1() {
		//_20200127_174455:head
		//_20200127_174500:caller
		//_20200127_174504:wl
		/********************
		* step : 0
		* 		prep : vars
		********************/
// 		//test
// 		phpinfo();
		
		$dpath_Image_File = "C:/WORKS_2/WS/WS_Others.Art/JVEMV6/46_art/6_visual-arts/5_free-painting/images";
		$fname_Image_File = "test_20200130_144805.png";
// 		$fname_Image_File = "test_20200130_143634.png";
// 		$fname_Image_File = "test_20200127_175307.png";
		
		$fpath_Image_File = join("/", array($dpath_Image_File, $fname_Image_File));
		
		//_20200127_181527:next
		$im_inp = ImageCreateFromPNG($fpath_Image_File);
// 		$im_inp = ImageCreateFromJPEG($fpath_Image_File);
		
		$ix = ImageSX($im_inp);
		$iy = ImageSY($im_inp);
		
		debug("\$ix : $ix / \$iy : $iy");
		
		//debug
// 		debug(get_class($im_inp));
		
		ImageDestroy($im_inp);
		
		/********************
		* step : 2 : 1
		* 		ip_proc_actions__Proc_1__Copy_Simple
		********************/
		//_20200128_140514:caller
// 		$this->ip_proc_actions__Proc_1__Copy_Simple($fpath_Image_File);
// 		ip_proc_actions__Proc_1__Copy_Simple($im_inp);
		
		/********************
		* step : 2 : 2
		* 		ip_proc_actions__Proc_1__Copy_Partial
		********************/
		//_20200130_142156:caller
// 		$num_Partial = 80;
// 		$num_Partial = 50;
		$num_Partial = 20;
// 		$num_Partial = 8;
		
		//ref https://webkaru.net/php/functions-default-values/
		$this->ip_proc_actions__Proc_1__Copy_Partial_Multiple($fpath_Image_File, $num_Partial);
		
		//_20200128_141644:caller
// 		$this->ip_proc_actions__Proc_1__Copy_Partial($fpath_Image_File);
// 		ip_proc_actions__Proc_1__Copy_Simple($im_inp);
		
		
		/********************
		* step : X
		* 		return
		********************/
		/********************
		* step : X : 1
		* 		val
		********************/
		$valOf_Return = array("<br>ip_proc_actions__Proc_1 ==> comp");
// 		$valOf_Return = array("ip_proc_actions__Proc_1 ==> comp");
		
		/********************
		* step : X : 2
		* 		return
		********************/
		return $valOf_Return;
		
	}//public function ip_proc_actions__Proc_1() {
	
	/******************
	 * ip_proc_actions
	 * 
	 * 	at : 2020/01/25 17:21:18
	 	caller : function ip_proc_actions(_param) (js file)
	 	
	 ****************/
	public function ip_proc_actions() {
		//_20200125_172001:head
		//_20200125_172004:caller
		//_20200125_172007:wl
		/********************
		* step : 0
		* 		prep : vars
		********************/
		$msg_from_controller = "";
		
		/********************
		* step : 1 : params
		********************/
		//_20200125_173157:next
		@$action = $this->request->query['action'];

		//debug
		if ($action == null) {
		
// 			debug();
			
			// set : message
			$msg_from_controller = "param : action ==> null ; nop";
			
			$this->set("msg_from_controller" , $msg_from_controller);
			
		} else if ($action == "") {
		
// 			debug("param : action ==> blank");

			// set : message
			$msg_from_controller = "param : action ==> blank ; nop";
			
			$this->set("msg_from_controller" , $msg_from_controller);
							
		} else {
		
			debug("param:action => '" . $action . "'");
			
			/********************
			 * step : 2
			 * 		dispatch
			 ********************/
			if ($action == CONS::$label_IP_Proc_ID__1) {
			
				// set : message
				$msg_from_controller = "param is ==> " . CONS::$label_IP_Proc_ID__1
						. " / starting...";
				
				//_20200126_181129:next
				//_20200127_174500:caller
				//$valOf_Return = array("ip_proc_actions__Proc_1 ==> comp");
				$valOf_Return__received = $this->ip_proc_actions__Proc_1();
				
				$msg_from_controller .= $valOf_Return__received[0];
				
// 				debug($msg_from_controller);
				$this->set("msg_from_controller" , $msg_from_controller);
				
			} else {
			
				// set : message
				$msg_from_controller = "param is ==> unknown : '$action'";
				
				$this->set("msg_from_controller" , $msg_from_controller);
				
				
			}//if ($action == CONS::$label_IP_Proc_ID__1)
			
		}//if ($action == null)
		
		
		
		/********************
		* step : X : display
		********************/
		// layout
		$this->layout = "plain";
		
		/********************
		* step : X
		* 		set ==> view vars
		********************/
		// time label
		$tlabel = Utils::get_CurrentTime();
		$this->set("tlabel" , $tlabel);
		
		// param : action
		
		
		/********************
		* step : X : debug
		********************/
		
	}//public function ip_proc_actions() {
	
}//class FxTesterController extends AppController {


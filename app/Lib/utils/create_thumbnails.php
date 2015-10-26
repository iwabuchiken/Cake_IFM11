<?php

	function show_message($message, $filename, $linenumber, $funcname) {
		
		echo "<br/>";
		
// 		echo "[$filename : $funcname : $linenumber] $message";
		echo "[".basename($filename)." : $funcname : $linenumber] $message";
		
		echo "<br/>";
		
	}

	function get_time_label_NOW() {
		
		date_default_timezone_set('Asia/Tokyo');
		
		return date('Ymd_His', time());
	}

	/*
	 * @return
	 * 		true	=> Dir exists
	 * 				=> Dir doesn't exist, and a new dir created
	 * 		false	=> Dir doesn't exist, and a new dir not created
	 * 
	 */
	function prepare_directory($dirname) {
		
		if (file_exists($dirname)) {
			
			show_message(
				"Dir exists: $dirname",
				__FILE__, __LINE__, __FUNCTION__);


			return true;

		} else {//if (file_exists($dirname))

			show_message(
				"Dir doesn't exist: $dirname",
				__FILE__, __LINE__, __FUNCTION__);

			
			$res = mkdir($dirname);
			
			if ($res == true) {

				show_message(
					"Dir created: $dirname",
					__FILE__, __LINE__, __FUNCTION__);

				
				return true;
				

			} else {//if ($res == true)

				show_message(
					"Dir not created: $dirname",
					__FILE__, __LINE__, __FUNCTION__);

				
				return false;
				
			}//if ($res == true)
				
		}//if (file_exists($dirname))
		
	}

	function resize_image($filename) {
		
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		
		show_message("\$ext=$ext", __FILE__, __LINE__, __FUNCTION__);
		
// 		echo "<br/>";
		
// 		echo "\$ext=$ext";
// 		echo "<br/>";

		// Allocatet according to the extension name
		if (strtolower($ext) == "png") {
			
			_resize_image__PNG($filename);
			
		} else if (strtolower($ext) == "jpg"
					|| strtolower($ext) == "jpeg") {//if ($ext)
			
			_resize_image__JPG($filename);
		
		} else if (strtolower($ext) == "bmp") {//if ($ext)
			
			_resize_image__BMP($filename);
		
		}//if ($ext)
		
	}//function resize_image($filename)

	function _resize_image__JPG($filename) {
		
		$newdirname = "../image_thumbnails";
		$newdirname = "../image_thumbnails";
		
		$basename = basename($filename);
		
		$im = imagecreatefromjpeg($filename);
		
		show_message(
			"Basename=".basename($filename),
			__FILE__, __LINE__, __FUNCTION__);

		
		$basename_array = explode(".", $basename);

		show_message(
			"Dirname=".dirname($filename),
			__FILE__, __LINE__, __FUNCTION__);

		
		$newfilename = $basename;
		
		$newfilepath = join("/",
				array($newdirname,
						$newfilename
				));

		show_message(
			"Dirname=".dirname($filename),
			__FILE__, __LINE__, __FUNCTION__);

		
		prepare_directory(dirname($newfilepath));
		
		// Thumbnail
		$orig_X = imagesx($im);
		$orig_Y = imagesy($im);
		
		$new_X = $orig_X / 2;
		$new_Y = $orig_Y / 2;
		
		$images_fin = ImageCreateTrueColor($new_X, $new_Y);
		
		ImageCopyResampled(
		$images_fin, $im,
		0, 0, 0, 0,
		// 					$orig_X+1, $orig_Y+1, $new_X, $new_Y);
		$new_X, $new_Y, $orig_X+1, $orig_Y+1);

		show_message(
			"New image => Skeleton created",
			__FILE__, __LINE__, __FUNCTION__);

		
		// Save new file
				//	=> If the new file already exists ===> Not create
				$res = file_exists($newfilepath);
		
				if ($res == true) {

					show_message(
						"New file already exists: $newfilepath",
						__FILE__, __LINE__, __FUNCTION__);

						
				} else {//if ($res != true)

					show_message(
						"New file doesn't exist: $newfilepath",
						__FILE__, __LINE__, __FUNCTION__);


					
					ImageJPEG($images_fin,$newfilepath);

					show_message(
						"New image file => Saved",
						__FILE__, __LINE__, __FUNCTION__);
							
		}//if ($res != true)
		
		// Destroy images
		ImageDestroy($im);
		ImageDestroy($images_fin);

		show_message(
			"Images => Destroyed",
			__FILE__, __LINE__, __FUNCTION__);

		
	}//function _resize_image__JPG($filename) {

	function _resize_image__PNG($filename) {
		// Setup: Dir & file names
		$newdirname = "../image_thumbnails";
		
		$basename = basename($filename);
		
		$newfilepath = join("/",
				array($newdirname, $basename
		));
		
		// Get the original image
		$image = imagecreatefrompng( $filename );
		
		// Get the size of the original image
		$width_old = imagesx($image);
		$height_old = imagesy($image);
		
		// Get a size for the new image
		$width_new = imagesx($image) / 2;
		$height_new = imagesy($image) / 2;
		
		// New image
		$image_new = imagecreatetruecolor($width_new, $height_new);
		
		// Setup: Alpha
		imagealphablending( $image_new, false );
		imagesavealpha( $image_new, true );
		
		// Copy to the new image
		imagecopyresampled(
					$image_new, $image,
					0, 0, 0, 0,
					$width_new, $height_new, $width_old, $height_old);
		
		// Save the new image
		imagepng($image_new, $newfilepath);
		
		
// 		show_message("images.x=".imagesx($image), __FILE__, __LINE__, __FUNCTION__);

		// Destroy image
		ImageDestroy($image);
		
	}//function _resize_image__PNG($filename) {
	
	function _resize_image__BMP($filename) {
		
		/*
		 * Setup: File path
		 */
		show_message("BMP!", __FILE__, __LINE__, __FUNCTION__);

		// Dir name for thumbnails
		$newdirname = "../image_thumbnails";
		
		$basename = basename($filename);

		$basename_array = explode(".", $basename);
		
		show_message(
		"Dirname=".dirname($filename),
		__FILE__, __LINE__, __FUNCTION__);
		
		
		$newfilename = $basename;
		
		$newfilepath = join("/",
				array($newdirname,
						$newfilename
				));
		
		show_message(
			"Dirname=".dirname($filename),
			__FILE__, __LINE__, __FUNCTION__);
		
		
		$res = prepare_directory(dirname($newfilepath));
		
		if ($res == true) {
			
			show_message(
				"Dir prepared: ".dirname($newfilepath),
				__FILE__, __LINE__, __FUNCTION__);

			
		} else {//if ($res == true)

			show_message(
				"Dir not prepared: ".dirname($newfilepath),
				__FILE__, __LINE__, __FUNCTION__);
			
		}//if ($res == true)

		echo "File path => #{$filename}";
		
		/*
		 * Get: Image
		 */
		
// 		$img = imagecreatefrombmp($filename);	// => Not working
		$img = ImageCreateFromBMP2($filename);	// => Works
		
		/*
		 * Resize
		 */
		// Thumbnail
		$orig_X = imagesx($img);
		$orig_Y = imagesy($img);
		
		$new_X = $orig_X / 2;
		$new_Y = $orig_Y / 2;
		
		$images_fin = ImageCreateTrueColor($new_X, $new_Y);
		
		ImageCopyResampled(
				$images_fin, $img,
				0, 0, 0, 0,
				// 					$orig_X+1, $orig_Y+1, $new_X, $new_Y);
				$new_X, $new_Y, $orig_X+1, $orig_Y+1);
		
		echo "Image copied";
		echo "<br/>";
		
		/*
		 * Save image
		 */
		echo "New file path=$newfilepath";
		echo "<br/>";
		
// 		$result = ImageJPEG($images_fin,$newfilepath);
		$result = imagepng($images_fin,$newfilepath);
		
		if ($result == true) {
			
			echo "Image => Saved : $newfilepath";

			
		} else {//if ($result == true)
			
			echo "Image => Not saved : $newfilepath";
		
		}//if ($result == true)
		
		echo "<br/>";
		
// 		$img = imagecreatefromwbmp($filename);
		
		
		
	}//function _resize_image__BMP($filename) {

	//http://us2.php.net/manual/en/function.imagecreatefromwbmp.php#86214
	function imagecreatefrombmp($p_sFile)
	{
		//    Load the image into a string
		$file    =    fopen($p_sFile,"rb");
		$read    =    fread($file,10);
		while(!feof($file)&&($read<>""))
			$read    .=    fread($file,1024);
	
		$temp    =    unpack("H*",$read);
		$hex    =    $temp[1];
		$header    =    substr($hex,0,108);
	
		
// 		#debug
// 		show_message(
// 				"\$hex.length=".strlen($hex)."<br/>",
// 				__FILE__, __LINE__, __FUNCTION__);
		
		//    Process the header
		//    Structure: http://www.fastgraph.com/help/bmp_header_format.html
		if (substr($header,0,4)=="424d")
		{
			//    Cut it in parts of 2 bytes
			$header_parts    =    str_split($header,2);
	
			//    Get the width        4 bytes
			$width            =    hexdec($header_parts[19].$header_parts[18]);
	
			//    Get the height        4 bytes
			$height            =    hexdec($header_parts[23].$header_parts[22]);
	
			//    Unset the header params
			unset($header_parts);
		}
	
		//    Define starting X and Y
		$x                =    0;
		$y                =    1;
	
		//    Create newimage
		$image            =    imagecreatetruecolor($width,$height);
	
		//    Grab the body from the image
		$body            =    substr($hex,108);
	
		//    Calculate if padding at the end-line is needed
		//    Divided by two to keep overview.
		//    1 byte = 2 HEX-chars
		$body_size        =    (strlen($body)/2);
		$header_size    =    ($width*$height);
	
		//    Use end-line padding? Only when needed
		$usePadding        =    ($body_size>($header_size*3)+4);
	
		//    Using a for-loop with index-calculation instaid of str_split to avoid large memory consumption
		//    Calculate the next DWORD-position in the body
		for ($i=0;$i<$body_size;$i+=3)
		{
			//    Calculate line-ending and padding
			if ($x>=$width)
			{
				//    If padding needed, ignore image-padding
				//    Shift i to the ending of the current 32-bit-block
				if ($usePadding)
					$i    +=    $width%4;
	
				//    Reset horizontal position
				$x    =    0;
	
				//    Raise the height-position (bottom-up)
				$y++;
	
				//    Reached the image-height? Break the for-loop
				if ($y>$height)
					break;
			}
	
			//    Calculation of the RGB-pixel (defined as BGR in image-data)
			//    Define $i_pos as absolute position in the body
			$i_pos    =    $i*2;
			$r        =    hexdec($body[$i_pos+4].$body[$i_pos+5]);
			$g        =    hexdec($body[$i_pos+2].$body[$i_pos+3]);
			$b        =    hexdec($body[$i_pos].$body[$i_pos+1]);
	
			//    Calculate and draw the pixel
			$color    =    imagecolorallocate($image,$r,$g,$b);
			imagesetpixel($image,$x,$height-$y,$color);
	
			//    Raise the horizontal position
			$x++;
		}
	
		//    Unset the body / free the memory
		unset($body);
	
		//    Return image-object
		return $image;
	}//function imagecreatefrombmp($p_sFile)

	//http://au1.php.net/manual/ja/function.imagecreate.php#53879
	function ImageCreateFromBMP2($filename)
	{
		//Ouverture du fichier en mode binaire
		if (! $f1 = fopen($filename,"rb")) return FALSE;
	
		//1 : Chargement des ent�tes FICHIER
		$FILE = unpack("vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread($f1,14));
		if ($FILE['file_type'] != 19778) return FALSE;
	
		//2 : Chargement des ent�tes BMP
		$BMP = unpack('Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel'.
				'/Vcompression/Vsize_bitmap/Vhoriz_resolution'.
				'/Vvert_resolution/Vcolors_used/Vcolors_important', fread($f1,40));
		$BMP['colors'] = pow(2,$BMP['bits_per_pixel']);
		if ($BMP['size_bitmap'] == 0) $BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];
		$BMP['bytes_per_pixel'] = $BMP['bits_per_pixel']/8;
		$BMP['bytes_per_pixel2'] = ceil($BMP['bytes_per_pixel']);
		$BMP['decal'] = ($BMP['width']*$BMP['bytes_per_pixel']/4);
		$BMP['decal'] -= floor($BMP['width']*$BMP['bytes_per_pixel']/4);
		$BMP['decal'] = 4-(4*$BMP['decal']);
		if ($BMP['decal'] == 4) $BMP['decal'] = 0;
	
		//3 : Chargement des couleurs de la palette
		$PALETTE = array();
		if ($BMP['colors'] < 16777216)
		{
			$PALETTE = unpack('V'.$BMP['colors'], fread($f1,$BMP['colors']*4));
		}
	
		//4 : Cr�ation de l'image
		$IMG = fread($f1,$BMP['size_bitmap']);
		$VIDE = chr(0);
	
		$res = imagecreatetruecolor($BMP['width'],$BMP['height']);
		$P = 0;
		$Y = $BMP['height']-1;
		while ($Y >= 0)
		{
			$X=0;
			while ($X < $BMP['width'])
			{
				if ($BMP['bits_per_pixel'] == 24)
					$COLOR = unpack("V",substr($IMG,$P,3).$VIDE);
				elseif ($BMP['bits_per_pixel'] == 16)
				{
					$COLOR = unpack("n",substr($IMG,$P,2));
					$COLOR[1] = $PALETTE[$COLOR[1]+1];
				}
				elseif ($BMP['bits_per_pixel'] == 8)
				{
					$COLOR = unpack("n",$VIDE.substr($IMG,$P,1));
					$COLOR[1] = $PALETTE[$COLOR[1]+1];
				}
				elseif ($BMP['bits_per_pixel'] == 4)
				{
					$COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
					if (($P*2)%2 == 0) $COLOR[1] = ($COLOR[1] >> 4) ; else $COLOR[1] = ($COLOR[1] & 0x0F);
					$COLOR[1] = $PALETTE[$COLOR[1]+1];
				}
				elseif ($BMP['bits_per_pixel'] == 1)
				{
					$COLOR = unpack("n",$VIDE.substr($IMG,floor($P),1));
					if     (($P*8)%8 == 0) $COLOR[1] =  $COLOR[1]        >>7;
					elseif (($P*8)%8 == 1) $COLOR[1] = ($COLOR[1] & 0x40)>>6;
					elseif (($P*8)%8 == 2) $COLOR[1] = ($COLOR[1] & 0x20)>>5;
					elseif (($P*8)%8 == 3) $COLOR[1] = ($COLOR[1] & 0x10)>>4;
					elseif (($P*8)%8 == 4) $COLOR[1] = ($COLOR[1] & 0x8)>>3;
					elseif (($P*8)%8 == 5) $COLOR[1] = ($COLOR[1] & 0x4)>>2;
					elseif (($P*8)%8 == 6) $COLOR[1] = ($COLOR[1] & 0x2)>>1;
					elseif (($P*8)%8 == 7) $COLOR[1] = ($COLOR[1] & 0x1);
					$COLOR[1] = $PALETTE[$COLOR[1]+1];
				}
				else
					return FALSE;
				imagesetpixel($res,$X,$Y,$COLOR[1]);
				$X++;
				$P += $BMP['bytes_per_pixel'];
			}
			$Y--;
			$P+=$BMP['decal'];
		}
	
		//Fermeture du fichier
		fclose($f1);
	
		return $res;
	}//function ImageCreateFromBMP($filename)
	
	/*
	 * Get file name from GET
	 */
	function do_job() {
		echo "hi.";
		
		// Get GET parameter
		$filename = $_GET['file_name'];
		
		if ($filename == "") {
		
			echo "No file name";
			echo "<br/>";
		
			die("Thank you.");
		}
		
		// Build: File path
		$imagedir_name = "../image";
		
		$file_path = join("/", array($imagedir_name, $filename));
		
		if (!file_exists($file_path)) {
		
			echo "File doesn't exist";
			echo "<br/>";
		
			die("Thank you.");
		}
		
		$size = getimagesize($file_path);
		
		echo "\$size=".count($size);
		
		// Get image
		echo "<br/>";
		echo "<br/>";
		
		resize_image($file_path);
		
		echo "Resize => Done";
		
	}
	
	function do_job_2() {
		/*
		 * Prepare directory
		 * 
		 */
		$orig_dir_name = "images";
		
		prepare_directory($orig_dir_name);
		
		// Get file list
// 		$glob_string = "image/*.*";
// 		$glob_string = "../image/*.*";
// 		$glob_string = "../$orig_dir_name/*.*";

		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		$glob_string = "./$orig_dir_name/*.*";
		
		$file_list = glob($glob_string);
		
		if ($file_list == false) {
			
			show_message(
				"Can't get file list: $glob_string",
				__FILE__, __LINE__, __FUNCTION__);

			
			die("Thank you.");
			
		} else {

			show_message(
				"Length=".count($file_list)."($glob_string)",
				__FILE__, __LINE__, __FUNCTION__);
			
			
		}

		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		// Resize
		foreach ($file_list as $file_name) {
			
			$res = resize_image($file_name);
			
			if ($res == true) {
				
				show_message(
					"Resize => Done: $file_name",
					__FILE__, __LINE__, __FUNCTION__);
				
				
			} else {//if ($res == true)
			
				show_message(
					"Resize => Failed: $file_name",
					__FILE__, __LINE__, __FUNCTION__);
				
			}//if ($res == true)
				
			echo "<br/>";
			
		}
		
		echo "<br/>";
		
		show_message(
			"Resize => Complete",
			__FILE__, __LINE__, __FUNCTION__);
		
	}//function do_job_2() {
	
	function do_job_3() {
		
		/*
		 * Prepare directory
		 * 
		 */
		// Set: Dir names
// 		$src_dir_name = "./images";
// 		$dst_dir_name = "./image_thumbnails";
// 		$src_dir_name = "../images";
// 		$dst_dir_name = "../image_thumbnails";
// 		$src_dir_name = "../../images";
// 		$dst_dir_name = "../../image_thumbnails";
		$src_dir_name = "images";
		$dst_dir_name = "image_thumbnails";
		
		// Prepare directories
		prepare_directory($src_dir_name);
		prepare_directory($dst_dir_name);

		// Set: String for globbing
		//REF http://stackoverflow.com/questions/720751/how-to-read-a-list-of-files-from-a-folder-using-php answered Apr 6 '09 at 9:20
		$glob_string_src = "$src_dir_name/*.*";
		$glob_string_dst = "$dst_dir_name/*.*";
// 		$glob_string_src = "../../$src_dir_name/*.*";
// 		$glob_string_dst = "../../$dst_dir_name/*.*";
// 		$glob_string_src = "./$src_dir_name/*.*";
// 		$glob_string_dst = "./$dst_dir_name/*.*";
		
		// Get file lists
		$file_list_src = glob($glob_string_src);
		$file_list_dst = glob($glob_string_dst);
		
		// Validate: Any files in the source dir?
		if ($file_list_src == false) {
			
			show_message(
					"Can't get file list: $glob_string_src",
					__FILE__, __LINE__, __FUNCTION__);
			
// 			echo "Can't get file list: $glob_string_src";
// 			echo "<br/>";
			
			die("Thank you.");

			
		} else if ($file_list_dst == false) {
			
// 			echo "Can't get file list: $glob_string_dst";
// 			echo "<br/>";
				
// 			die("Thank you.");
			
		} else {
			
// // 			echo "Length=".count($file_list_src)."($glob_string_src)";
// 			echo "Length=".count($file_list_diff)."($glob_string_src)";
// 			echo "<br/>";
			
			
		}

		// Create: Basename list of the source dir
		$file_names_src = array();
		
		foreach ($file_list_src as $f_src) {

			array_push($file_names_src, basename($f_src));
						
		}
		
		// Create: Basename list of the destination dir
		$file_names_dst = array();
		
		foreach ($file_list_dst as $f_dst) {

			array_push($file_names_dst, basename($f_dst));
						
		}
		
		// Created: Diff name list
		$file_names_diff = array_diff($file_names_src, $file_names_dst);
// 		$file_list_diff = array_diff($file_list_src, $file_list_dst);

		show_message(
			"Diff",
			__FILE__, __LINE__, __FUNCTION__);

		show_message(
			"print_r(\$file_names_diff)=",
			__FILE__, __LINE__, __FUNCTION__);
		
		print_r($file_names_diff);
		
// 		print_r($file_list_dst);

		foreach ($file_names_diff as $file_name) {
			
			$res = resize_image(join("/", array($src_dir_name, $file_name)));
// 			$res = resize_image($file_name);
// 			aa
// 			if ($res == true) {

// 				show_message(
// 					"Dir doesn't exist: $dirname",
// 					__FILE__, __LINE__, __FUNCTION__);

				
// 			} else {//if ($res == true)

// 				show_message(
// 					"Dir doesn't exist: $dirname",
// 					__FILE__, __LINE__, __FUNCTION__);

				
// 			}//if ($res == true)
				
			echo "<br/>";
			
		}//foreach ($file_names_diff as $file_name) {
		
		echo "<br/>";

// 		show_message(
// 			"Dir doesn't exist: $dirname",
// 			__FILE__, __LINE__, __FUNCTION__);
		
	}//function do_job_3()

// 	$pid = pcntl_fork();
	
	//Fatal error: Class 'Thread' not found in C:\WORKS\WS\Cake\IFM10\D5\create_thumbnails.php on line 250
// 	class ThreadExample extends Thread {
		
// 	}
	
	
// 	do_job();
// 	do_job_2();
	do_job_3();
	
?>
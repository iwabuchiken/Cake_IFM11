<?php

	$url = $video['Video']['url'];

	$subject = $video['Video']['url'];
// 	$subject = "123?v=aaaaAAAAAbbb&xyz";
	
	//REF http://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id answered Aug 3 '10 at 1:27
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
// 	echo $my_array_of_vars['v'];
	
// 	echo "<br>";
	
?>


<script type="text/javascript">

    var params = { allowScriptAccess: "always" };
    var atts = { id: "ytplayer" };
//     var atts = { id: "myytplayer" };
    swfobject.embedSWF(
    	    "http://www.youtube.com/v/"
    	    + "<?php echo $my_array_of_vars['v']; ?>"
//     	    + "imc4xQDp_Fs"
    	    + "?enablejsapi=1&playerapiid=ytplayer&version=3",
                       "ytplayer", "760", "581", "8", null, null, params, atts);
//                        "ytapiplayer", "760", "581", "8", null, null, params, atts);
//                        "ytplayer", "760", "581", "8", null, null, params);
//                        "ytapiplayer", "425", "356", "8", null, null, params, atts);


  </script>
  

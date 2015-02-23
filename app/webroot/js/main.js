function rotate_image2(deg) {
	
	// alert("rotate");
	var angle = 0, img = document.getElementById('container');
	
	angle = (angle+deg)%360;
	//angle = (angle+90)%360;
	
	img.className = "rotate"+angle;
	
//	$("#container").css('height', 300px);	//=> no response
//	$("#container").css('height', '300px');	//=> n/c
	
}


/*
 * @param
 * 		1	=> zoom out
 * 		2	=> zoom in
 */
//function zoom(inout) {
function zoom(inout, val) {
	
//	alert("zoom");
	
	/*
	 * get: zoom value
	 * 
	 */
//	var tmp = body.style.zoom;
	var tmp = val;

//	alert("tmp => " + tmp);
	
	/***************************
		validate
	 ***************************/
	if (tmp == "") {
		
		alert("zoom => not set");
		
		return;
		
	} else if (tmp == null) {
		
		alert("zoom => null");
		
		return;
		
	} else {
		
		alert("current zoom => " + tmp);
		
	}
	
	/*
	 * get: number
	 */
	//REF 
	var num = tmp.substring(0, tmp.length - 1);
//	var num = tmp.substr(0, id.length - 1);
	
//	alert("num => " + num);
	
	
	switch(inout) {
	
	case 1:
		
//		var tmp = body.style.zoom;
		
//		alert("zooming out...");
		
		break;
		
	case 2:
		
		break;
	
	}
	
}//zoom(inout)

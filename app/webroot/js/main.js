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

function update_Image_Data() {
	
//	alert("update");
	
	/***********************
		change color
	 ***********************/
	//alert($('label[for="category"]').text());
	
//	$label = $('label[for="category"]');
//	
//	$label.css("background", "yellow");
	
	var hostname = window.location.hostname;
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_IFM11/images/update_image_data";
		
	} else {
	
		url = "/Eclipse_Luna/Cake_IFM11/images/update_image_data";
//		url = "/Cake_IFM11/images/update_image_data";
	
	}

//	alert("url => " + url);
//	
//	return;
	
	/***************************
		get: values
	 ***************************/
	var memos = $("input#image_data_memos").val();
	var image_id = $("td#image_data_id").text();
//	var image_id = $("td#image_data_id").val();
	
//	alert("memos => " + memos + " | " + "id => " + image_id);
	
//	alert("starting ajax...");
	
	$.ajax({
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
//	    data: {id: id},
	    data: {memos: memos, image_id: image_id},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
		alert(data);
		
	//	alert(conv_Float_to_TimeLabel(data.point));
	//	addPosition_ToList(data.point);
		
	//	_delete_position_Ajax__Done(data, status, xhr);
//		_add_KW__Genre_Changed__Done(data, status, xhr);
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});

	
}//update_Image_Data

function update_Image_Data__FromList(id) {

	/***************************
		prep: url
	 ***************************/
	var hostname = window.location.hostname;
	
//	//debug
//	alert("hostname => " + hostname);
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_IFM11/images/update_image_data";
		
	} else {
	
		//ref http://stackoverflow.com/questions/9514179/how-to-find-the-operating-system-version-using-javascript answered Mar 1 '12 at 10:11 
		if ((window.navigator.platform).startsWith("Mac")) {
			
//			alert("os => Mac");
			url = "/Cake_IFM11/images/update_image_data";
//			http://localhost:8888/Cake_IFM11/images/image_manager
		} else {

//			alert("os => NOT Mac");
			url = "/Eclipse_Luna/Cake_IFM11/images/update_image_data";
			
		}
		
//		url = "/Eclipse_Luna/Cake_IFM11/images/update_image_data";
//		url = "/Cake_IFM11/images/update_image_data";
	
	}

//	//debug
//	alert("url => " + url);
////	
////	return;
//	
	/***************************
		prep: vars
	 ***************************/
//	var memo = $("input#image_data_Memo_" + id).val();	//=> w
	var memo = $("textarea#image_data_Memo_" + id).val();
//	var memo = $("textarea#image_data_Memo_" + id).text();
	
	var image_id = id;

	
//	alert("id (" + id + ") => " + memo);
//
//	alert(console.log(navigator));	//=> undefined
//	alert(window.navigator.platform);	//=> MacIntel
//	
//	return;
	
	/***************************
		ajax
	 ***************************/
	$.ajax({
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
//	    data: {id: id},
	    data: {memos: memo, image_id: image_id},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		
		alert(data);
		
	//	alert(conv_Float_to_TimeLabel(data.point));
	//	addPosition_ToList(data.point);
		
	//	_delete_position_Ajax__Done(data, status, xhr);
//		_add_KW__Genre_Changed__Done(data, status, xhr);
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});

	
}//update_Image_Data

//function update_Image_Data__FromList(id) {
//	
//	/***************************
//		prep: url
//	 ***************************/
//	var hostname = window.location.hostname;
//	
//	//debug
//	alert("hostname => " + hostname);
//	
//	var url;
//	
//	if (hostname == "benfranklin.chips.jp") {
//		
//		url = "/cake_apps/Cake_IFM11/images/update_image_data";
//		
//	} else {
//		
//		if ((window.navigator.platform).startsWith("Mac")) {
//			
////			alert("os => Mac");
//			url = "/Cake_IFM11/images/update_image_data";
//			http://localhost:8888/Cake_IFM11/images/image_manager
//		} else {
//			
////			alert("os => NOT Mac");
//			url = "/Eclipse_Luna/Cake_IFM11/images/update_image_data";
//			
//		}
//		
////		url = "/Eclipse_Luna/Cake_IFM11/images/update_image_data";
////		url = "/Cake_IFM11/images/update_image_data";
//		
//	}
//	
////	//debug
////	alert("url => " + url);
////	
////	return;
//	
//	/***************************
//		prep: vars
//	 ***************************/
////	var memo = $("input#image_data_Memo_" + id).val();	//=> w
//	var memo = $("textarea#image_data_Memo_" + id).val();
////	var memo = $("textarea#image_data_Memo_" + id).text();
//	
//	var image_id = id;
//	
//	
////	alert("id " + id + " => " + memo);
////
////	alert(console.log(navigator));	//=> undefined
////	alert(window.navigator.platform);	//=> MacIntel
////	
////	return;
//	
//	/***************************
//		ajax
//	 ***************************/
//	$.ajax({
//		
//		url: url,
//		type: "GET",
//		//REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
////	    data: {id: id},
//		data: {memos: memo, image_id: image_id},
//		
//		timeout: 10000
//		
//	}).done(function(data, status, xhr) {
//		
//		alert(data);
//		
//		//	alert(conv_Float_to_TimeLabel(data.point));
//		//	addPosition_ToList(data.point);
//		
//		//	_delete_position_Ajax__Done(data, status, xhr);
////		_add_KW__Genre_Changed__Done(data, status, xhr);
//		
//	}).fail(function(xhr, status, error) {
//		
//		alert(xhr.status);
//		
//	});
//	
//	
//}//update_Image_Data
//
function 
update_AudioFiles_Data__FromList(id) {
	
	/***************************
		prep: url
	 ***************************/
	var hostname = window.location.hostname;
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_IFM11/audio_files/update_audio_file_data";
//		url = "/cake_apps/Cake_IFM11/images/update_image_data";
		
	} else {
		
		url = "/Eclipse_Luna/Cake_IFM11/audio_files/update_audio_file_data";
//		url = "/Cake_IFM11/images/update_image_data";
		
	}
	
	/***************************
		prep: vars
	 ***************************/
//	var memo = $("input#image_data_Memo_" + id).val();	//=> w
	var memo = $("textarea#audio_file_Text_" + id).val();
//	var memo = $("textarea#image_data_Memo_" + id).val();
	
	alert("memo => " + memo);
	
	var audio_file_id = id;
	
//	alert("id " + id + " => " + memo);
	
	/***************************
		ajax
	 ***************************/
	$.ajax({
		
		url: url,
		type: "GET",
		//REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
//	    data: {id: id},
		data: {text: memo, audio_file_id: audio_file_id},
//		data: {memos: memo, audio_file_id: audio_file_id},
		
		timeout: 10000
		
	}).done(function(data, status, xhr) {
		
		alert(data);
		
		//	alert(conv_Float_to_TimeLabel(data.point));
		//	addPosition_ToList(data.point);
		
		//	_delete_position_Ajax__Done(data, status, xhr);
//		_add_KW__Genre_Changed__Done(data, status, xhr);
		
	}).fail(function(xhr, status, error) {
		
		alert(xhr.status);
		
	});
	
	
}//update_AudioFiles_Data__FromList


function modify_Pagination_Tags() {
	
	//ref http://stackoverflow.com/questions/406192/get-current-url-in-javascript answered Jan 2 '09 at 6:57
	var url      = window.location.href; 
	
//	alert(url);
//	alert("modify_Pagination_Tags");

	//ref http://stackoverflow.com/questions/1748541/jquery-find-link-by-rel answered Nov 17 '09 at 12:31
	var a = $("a[rel='first']");
	
//	if (a == null) {
//		
//		alert("a => null");
//		
//	} else {
//		
//		alert("a => not null");
//		
//	}
	if (a.attr('href') == null) {
		
//		alert("a.attr('href') => null");
		
	} else {
		
//		alert("a.attr('href') => not null");

		// set href
		var href = a.attr('href');
		
		//ref http://stackoverflow.com/questions/10586930/remove-string-from-string-jquery answered May 14 '12 at 16:04
		var href_new = href.replace("switch_direction=on", "");
//		var href_new = href.replace("switchi_direction=on", "");
		
		alert("a.href => " + href + " || " + "new href => " + href_new);

		// set href
//		a.attr('href') = href_new;
		a.attr('href', href_new);
		
		// validate
		var a_2 = $("a[rel='first']");
		
		var href_a_2 = a_2.attr('href');
		
//		alert("a_2.href => " + href_a_2);
		
	}
	
//	alert(a.prop("tagName"));
	alert(a.attr('href'));
//	alert(a.attr('class'));
//	alert(a);
	
}//function modify_Pagination_Tags()

function onload_Ops() {

	alert("onload");
	
	modify_Pagination_Tags();
	
}//function onload_Ops()



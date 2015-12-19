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
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_IFM11/images/update_image_data";
		
	} else {
	
		url = "/Eclipse_Luna/Cake_IFM11/images/update_image_data";
//		url = "/Cake_IFM11/images/update_image_data";
	
	}

	/***************************
		prep: vars
	 ***************************/
//	var memo = $("input#image_data_Memo_" + id).val();	//=> w
	var memo = $("textarea#image_data_Memo_" + id).val();
//	var memo = $("textarea#image_data_Memo_" + id).text();
	
	var image_id = id;

//	alert("id " + id + " => " + memo);

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


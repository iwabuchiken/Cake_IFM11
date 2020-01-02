//alert("libfx.js");

function show_aleret() {
	
	alert("loaded");
	
}//function show_aleret() {

//ref https://stackoverflow.com/questions/191157/window-onload-vs-body-onload
//window.onload = show_aleret();

console.log("started");

/***************************
	process_log_file
	at : 2020/01/02 16:55:23
	caller
		http://localhost/Eclipse_Luna/Cake_IFM11/fx_admin
 ***************************/
function process_log_file() {
	
	/***************************
		step : 1
			prep
	 ***************************/
	
	/***************************
		step : X : 0
			ajax ==> prep
	 ***************************/
	/***************************
		step : X : 0.1
			prep : url
	 ***************************/
	var hostname = window.location.hostname;
	
	var url;
	
	if (hostname == "benfranklin.chips.jp") {
		
		url = "/cake_apps/Cake_IFM11/fx_admin/process_log_file";
		
	} else {//if (hostname == "benfranklin.chips.jp") {
	
		url = "/Eclipse_Luna/Cake_IFM11/fx_admin/process_log_file";

	}//if (hostname == "benfranklin.chips.jp") {
	
	$.ajax({
		/***************************
			step : X : 1
				ajax ==> start
		 ***************************/
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
//	    data: {id: id},
//	    data: {memos: memos, image_id: image_id},
	    
	    timeout: 10000
	    
	}).done(function(data, status, xhr) {
		/***************************
			step : X : 2
				ajax ==> done
		 ***************************/
		console.log("ajax ==> returned OK");
		
		/***************************
			step : X : 2 : 1
				prep
		 ***************************/
		var div_area_result = $('#area_result');
		
		/***************************
			step : X : 2 : 2
				set html
		 ***************************/
		div_area_result.html(data);
		
		
//		alert(data);
		
	//	alert(conv_Float_to_TimeLabel(data.point));
	//	addPosition_ToList(data.point);
		
	//	_delete_position_Ajax__Done(data, status, xhr);
//		_add_KW__Genre_Changed__Done(data, status, xhr);
		
	}).fail(function(xhr, status, error) {
		/***************************
			step : X : 3
				ajax ==> error
		 ***************************/
		
		alert(xhr.status);
		
	});	
	
	
}//function process_log_file() {



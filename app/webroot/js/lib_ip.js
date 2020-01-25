
/******************************************************
	constants
 ******************************************************/

var cname_White = "#ffffff";
//var cname_White = "white";
var cname_Red = "red";
var cname_Yellow = "#ffff00";
//var cname_Yellow = "yellow";
var cname_LightBlue = "LightBlue";
var cname_Plum = "Plum";
var cname_Moccasin = "Moccasin";

var className_BT_Numbering_List = "bt_Numbering_List";

var TIME_FADE_IN = 300;
var TIME_FADE_OUT = 300;

var cname_Div_Index_Area_Result = "#A4F7B6";
//var cname_Yellow = "yellow";


//alert("lib_ip.js");

function show_aleret() {
	
	alert("loaded");
	
}//function show_aleret() {

function get_Timelabel_Now_2() {
	
	//ref https://stackoverflow.com/questions/10211145/getting-current-date-and-time-in-javascript
	//ref https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date
	
	var cd = new Date();
//	var currentdate = new Date();
	
//	var month = cd.getMonth() + 1;
	var month = (cd.getMonth() + 1).toString();
	
	if (month.toString().length < 2) {
		
		month = "0" + month;
		
	}
	
	var year = cd.getFullYear().toString();
	
	// day
	var day = cd.getDate().toString();

	if (day.length < 2) day = "0" + day;
		
	// hours
	var hours = cd.getHours().toString();
	if (hours.length < 2) hours = "0" + hours;
	
	// minutes
	var minutes = cd.getMinutes().toString();
	if (minutes.length < 2) minutes = "0" + minutes;
	
	// seconds
	var seconds = cd.getSeconds().toString();
	if (seconds.length < 2) seconds = "0" + seconds;
	
//	alert("month => " + month);
	
//	var datetime = cd.getFullYear() + (cd.getMonth() + 1) + cd.getDay()
//	var datetime = "" + cd.getFullYear() + (month) + cd.getDay()
//	var datetime = "" + cd.getFullYear().toString() + (month).toString() + cd.getDay().toString()
	var datetime = year + month + day
	 			+ "_"
	 			+ hours + minutes + seconds;
//	+ hours + minutes + cd.getSeconds();
//	+ hours + cd.getMinutes() + cd.getSeconds();
//	+ cd.getHours() + cd.getMinutes() + cd.getSeconds();
		
//	var datetime = "Last Sync: " + currentdate.getDate() + "/"+currentdate.getMonth() + 1 
////	var datetime = "Last Sync: " + currentdate.getDay() + "/"+currentdate.getMonth() 
//	+ "/" + currentdate.getFullYear() + " @ " 
//	+ currentdate.getHours() + ":" 
//	+ currentdate.getMinutes() + ":" + currentdate.getSeconds();
	
	return datetime;
	
}//function get_Timelabel_Now_2() {


//ref https://stackoverflow.com/questions/191157/window-onload-vs-body-onload
//window.onload = show_aleret();

console.log("started : lib_ifm.js" + "(" + get_Timelabel_Now_2() + ")");
//console.log("started : lib_ifm.js");

/*
 * https://stackoverflow.com/questions/5999209/how-to-get-the-background-color-code-of-an-element
 * answered May 14 '11 at 2:37
 */
function hexc(colorval) {
	
	console.log("colorval => '" + colorval + "'");
	
//    var parts = colorval.match(/^rgba\((\d+),\s*(\d+),\s*(\d+),\s*(\d+)\)$/);
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    
    delete(parts[0]);
    
//    for (var i = 0; i <= 2; ++i) {
    for (var i = 1; i <= 3; ++i) {
//    for (var i = 1; i <= 2; ++i) {
        parts[i] = parseInt(parts[i]).toString(16);
        
        if (parts[i].length == 1) parts[i] = '0' + parts[i];
        
    }
    color = '#' + parts.join('');
    
    return color;
}//function hexc(colorval) {

//_20200124_180147:next
function ip_proc_actions(_param) {
	
//	alert("_param => '" + _param + "'");

	/***************************
		step : 1
			prep
	 ***************************/
	console.log("ip_proc_1 ==> starting...!!");

	/***************************
		step : 1 : 1
			result area
	 ***************************/
	var html_Div_Area_Result = $('div#div_IP_Index_Area_Result');

	// change : bg col
	html_Div_Area_Result.css("background", cname_Yellow);
	
	/***************************
		validate : update date
	 ***************************/

	/***************************
	 * step : 2
			param
	 ***************************/
	var _data;
	
	_data = {action : _param};
	
//	
//	//ref multiple conditions https://stackoverflow.com/questions/8710442/how-to-specify-multiple-conditions-in-an-if-statement-in-javascript answered Jan 3 '12 at 9:58
//	if ((_param == "11-0") || 
//			(_param == "10-1")) {
//	//	if (_param == "11-0") {
//	
//		_data = {action : _param, update : _update};
//	
//	} else {
//	
//		_data = {action : _param};
//	
//	}//if (_param == "11-0")
//	
//	//debug
//	console.log("_param => '" + _param + "'" + " " + "('" + $.trim(td.text()) + "')");
	
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
		
		url = "/cake_apps/Cake_IFM11/ip/ip_proc_actions";
//		url = "/cake_apps/Cake_IFM11/fx_admin/process_log_file";
		
	} else {//if (hostname == "benfranklin.chips.jp") {
	
		url = "/Eclipse_Luna/Cake_IFM11/ip/ip_proc_actions";
	
	}//if (hostname == "benfranklin.chips.jp") {
	
	$.ajax({
		/***************************
			step : X : 1
				ajax ==> start
		 ***************************/
		
	    url: url,
	    type: "GET",
	    //REF http://stackoverflow.com/questions/1916309/pass-multiple-parameters-to-jquery-ajax-call answered Dec 16 '09 at 17:37
	//    data: {id: id},
	//    data: {memos: memos, image_id: image_id},
	    data: _data,
	    
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
	//	var div_area_result = $('#area_result');
		
		/***************************
			step : X : 2 : 2
				set html
		 ***************************/
		/***************************
			step : X : 2 : 2.1
				set html
		 ***************************/
		html_Div_Area_Result.html(data);
	
		/***************************
			step : X : 2 : 2.2
				notice : bg ==> back to orig
		 ***************************/
		html_Div_Area_Result.css("background", cname_Div_Index_Area_Result);
		
		/***************************
			step : X : 2 : 2.3
				notice : animation
		 ***************************/
		//ref C:\WORKS_2\WS\WS_Others.prog\prog\D-7\2_2\VIRTUAL\Admin_Projects\mm\static\mm\js\main.js
		// animation
		html_Div_Area_Result
			.fadeIn(200).fadeOut(200)
			.fadeIn(200).fadeOut(200)
			
			.fadeIn(200).fadeOut(200)
			.fadeIn(200).fadeOut(200)
			
			.fadeIn(200).fadeOut(200)
			.fadeIn(200).fadeOut(200)
			
			.fadeIn(200);
		
	}).fail(function(xhr, status, error) {
		/***************************
			step : X : 3
				ajax ==> error
		 ***************************/
		//ref https://developer.mozilla.org/ja/docs/Web/API/XMLHttpRequest
		var msg = "xhr.status => '"
			+ xhr.status 
			+ "'" + " / " + "error => '" + error + "'"
			+ "'" + " / " + "xhr.statusText => '" + xhr.statusText + "'";
		
//		alert( msg
//				);
//		alert("xhr.status => '" + xhr.status + "'" + " / " + "error => '" + error + "'");
		
		/***************************
			step : X : 3 : 1
				result area : bg col
		 ***************************/
		html_Div_Area_Result.css("background", cname_Red);
		
		/***************************
			step : X : 3 : 2
				result area : html
		 ***************************/
		html_Div_Area_Result.html(msg);
		
	});	

}//function ip_proc_actions(_param) {
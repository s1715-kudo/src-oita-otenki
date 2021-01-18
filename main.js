var icontypelist={};
icontypelist["weathernews"]=1024;
icontypelist["original"]=1;

var preplace=Cookies.get('place');
if (preplace===undefined||preplace==null)preplace="ume"

var inputflag=false

var widthsmall=false;
var widthsmall2=false;

var urlPlaceKey=setKeyinit('place',preplace);

$.ajax({
	url: "https://raw.githubusercontent.com/s1715-kudo/weather/gh-pages/amedas/"+urlPlaceKey+".json",
	type: 'GET',
	statusCode: {
		404: function() {
			alert('対応していない場所です！');
			window.location.href = (location.href.replace("place="+encodeURIComponent(urlPlaceKey),"place="+preplace))
		}
	}
});

Cookies.set('place',urlPlaceKey,{expires:7});

var get_cookie_login=Cookies.get("user_cookie");
if(get_cookie_login==null || get_cookie_login===undefined)get_cookie_login="null";

var urlOitaMapStringKey=setKeyinit('oitamapstring',0);
var urlForecastIconKey=setKeyinit('forecast_icon',1);
var urlForecastStringKey=setKeyinit('forecast_string',0);
var urlMapZoomKey=setKeyinit('map_zoom',13);
var urlIosScroll=setKeyinit('ios_scroll',0);
var urlLoading=setKeyinit('loading',0);
var polygon_color="#000000"
var urlCommentAutoSave=setKeyinit('comment_auto_save',1);
if(urlCommentAutoSave!=1){
	Cookies.remove("polygon");
	Cookies.remove("comment_text");
	Cookies.remove("polygon_color");
}

var urlForecastKey=setKeyinit('forecast',0);
if(urlForecastKey==icontypelist["weathernews"]){
	urlForecastIconKey=icontypelist["weathernews"];
	urlForecastStringKey=0;
}
else if(urlForecastKey==icontypelist["original"]){
	urlForecastIconKey=icontypelist["original"];
	urlForecastStringKey=0;
}

var urlAutoUpdateKey=setKeyinit('auto_update',0);
var reloadtimer;
if(urlAutoUpdateKey!=0){
	window.addEventListener('load',function(){
		reloadtimer=setInterval('dataReload()',urlAutoUpdateKey*1000*60);
	});
}

var amedas_url="https://raw.githubusercontent.com/s1715-kudo/weather/gh-pages/amedas/"+urlPlaceKey+".json"
var forecast_url="https://raw.githubusercontent.com/s1715-kudo/weather/gh-pages/forecast/"+urlPlaceKey+".json"

var locate={lat:33.2375507,lng:131.6192692};
$.ajaxSetup({async: false});
$.getJSON(amedas_url, function(data){
	locate={lat:data["場所"]["geocoding"][0],lng:data["場所"]["geocoding"][1]}
});
$.ajaxSetup({async: true});
locate={lat:setKeyinit("map_lat",locate["lat"]),lng:setKeyinit("map_lng",locate["lng"])}

function changeAreaMapText(str){
	if(urlOitaMapStringKey!=0){
		document.getElementById('oitamaptext').innerHTML=str;
	}
}

function dataReload(){
	viewInitMap();
	amedas(widthsmall,widthsmall2);
	forecast(widthsmall,widthsmall2)
}

$(document).ready(function(e) {
	$('img[usemap]').rwdImageMaps();
});

$(function() {
	size();
	$(window).on("resize", function() {size();});
	function size() {
		width = $(window).width();
		if(width<=300)widthsmall2=true
		if(width<=900)widthsmall=true;
		amedas(widthsmall,widthsmall2)
		forecast(widthsmall,widthsmall2)
		floginbox(width);
	}
	
	$("#select_color").on("change", function(){
		polygon_color=$(this).val()
		myPolygon.setOptions({ fillColor:polygon_color,strokeColor:polygon_color});
		if(urlCommentAutoSave==1)Cookies.set("polygon_color",polygon_color,{expires:7});
	});
	const ua = navigator.userAgent
	if(urlIosScroll==1){
		if(ua.indexOf("iPhone") >= 0 || ua.indexOf("iPad") >= 0 || navigator.userAgent.indexOf("iPod") >= 0){
			var jMenu = $('.header');
			jMenu.css('position', 'absolute');
			var menuTop = jMenu.position().top;
			$(window).scroll(function() {
				jMenu.css('top', $(this).scrollTop() + menuTop + "px");
			});
		}
	}
});

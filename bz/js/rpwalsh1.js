// localStorage.clear();
function getCoords(){
if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(
		function(position){
			var myLat = localStorage.setItem("myLat", position.coords.latitude);
			var myLon = localStorage.setItem("myLon", position.coords.longitude);
			start1(position.coords.latitude, position.coords.longitude);},
		function(error){
			start1(37.2577, -93.2894);},
		function latOptions(){
			enableHighAccuracy: true;});
	}else{
		start1(37.2577, -93.2894);
	};
};

function start1(lat, lon){
		if (localStorage.getItem("jsonLastTime") == null || localStorage.getItem("jsonLastTime") < 1) {
				var nowTime = (+new Date())/86400000;
				localStorage.setItem("jsonLastTime", nowTime);
		}else{
				var nowTime = (+new Date())/86400000;};

		var lastCalled = (localStorage.getItem("jsonLastTime"));
		var lastLocalDL = (nowTime - lastCalled)*1000;  		

		if ((lastLocalDL < 500) && (!!localStorage.getItem("jsondata") != 0)){
				var lastLat = lat;
				var lastLon = lon;
				localStorage.setItem('lastkLat', lat);
				localStorage.setItem('lastkLon', lon);
// code goes here::
// dialog(use current location or last access location?
// (geocode myLat/myLon to address)?
// current/last buttons
// lastKnown onClick:
			var couponDataset = localStorage.getItem("jsondata");
			var o = $.parseJSON(couponDataset);
			dataMaker(o);
//			var orderBy = "radius"
		}else{
			getFeed(lat, lon, nowTime);};
};

function getFeed(lat, lon, nowTime){
	$.ajax({
			type: "GET",
			 url: "http://api.8coupons.com/v1/getdeals?key=be4a6ab04831bbda688c31667a9b194aa840e415efc91e123dff1019a0a1edb48f06cba84e8cc1b568f590070cdbdc44&lat="+lat+"&lon="+lon+"&mileradius=20&orderby=radius",
	 contentType: "application/javascript; charset=utf-8",
	    dataType: "jsonp",
	     success: function(o) {
					localStorage.setItem("jsondata", JSON.stringify(o));
					localStorage.setItem("jsonLastTime", nowTime);
							//return false;
				  }
		});

	var couponDataset = localStorage.getItem("jsondata");
	var o = $.parseJSON(couponDataset);
	dataMaker(o);
};

// // // //
//
// Please see developers note at the end of this file for more info about our new object (o). 
//
// // // //

function dataMaker(o){
// * dev note on line 297
		$.each(o, function(i, item) {

/* Create Element		*/			var itemdiv						=	document.createElement("div");
/* <div class="item">	*/				itemdiv.className			= 	"item";
										itemdiv.style.textAlign 	= 	"center";
										itemdiv.id 					=	 i;

					
/* Create Item BG		*/			var nodeBG 						= 	document.createElement("img");
/* img src=				*/	        	nodeBG.src					=	"imgBackgroundTile.png";					
							        	nodeBG.className 			= 	"content";
								        nodeBG.id					=	('bg' + i);
								        nodeBG.style.zIndex			=	0;
										nodeBG.style.position		=	"relative";
										nodeBG.style.top			=	0;	

/* Create Image			*/			var node						=	document.createElement("img");
/* get src image        */				node.src					=	item.showLogo;
/* create link          */				node.url 					=	item.storeURL; // ("../flowdeal.html");
/* set DOM ref ID       */				node.id 					=	item.ID;
/* create caption       */				node.title 					=	(item.name+"   |   "+item.dealTitle);
/* style the item		*/				node.style.zIndex 			=	1;
/* position the item	*/				node.style.position 		=	"inherit";
										node.style.top				=	'3%';
										node.style.marginLeft		=	'10%';
										node.style.marginRight		=	'10%';
										node.style.width			=	'80%';
										node.className 				=	"content";

/* Create description	*/			var divCap 						= 	document.createElement("div");
										divCap.className 			= 	"globalCaption";
										divCap.style.textAlign 		= 	"center";
										divCap.id 					=	('cap'+i);
										divCap.style.zIndex 		= 	3;
										divCap.textContent			=	item.name;
										divCap.style.position		=	"absolute";
										divCap.style.top			=	'15%';
										divCap.style.overflow		=	'hidden';

									var cap 						= 	document.createElement('div');
							            cap.className 				= 	"caption";
							            cap.textContent 			= 	item.dealTitle;
									    cap.style.top				=	'35%';
										
									var getitBtn						=	document.createElement('button');
										getitBtn.onClick				=	'parent.location="'+item.URL+'"';
										getitBtn.text					=	'Get It!';
										getitBtn.style.zIndex			=	'500';
																				

/* put it together!		*/
/* if ITEM exists:		*/		if (node.src){
/* Container Div (i)	*/			document.getElementById("ContentFlow").appendChild(itemdiv);
/* Background Image		*/			document.getElementById(i).appendChild(nodeBG);
/* put in logo & link	*/			document.getElementById(i).appendChild(node);
/* style the item		*/			document.getElementById(i).appendChild(divCap);
/* style the item		*/			document.getElementById(i).appendChild(cap);
/* style the item		*/			document.getElementById(i).appendChild(getitBtn);
/* close 'if'			*/		};
/* close EACH           */	})

// now that the DOM structure is created, we can call the actual contentFlow.js script.
// Only load this file here. If it is called anywhere else it breaks the app!
// If you use an Addon copy    script1.setAttribute('load', 'ADDON_NAME');   to the addons line
			var script1			=	document.createElement("script");
				script1.src 	=	"js/contentflow.js";
				script1.type 	=	"text/javascript";
/* addons */

			document.head.appendChild(script1);
		};

function dialogFile(){
	var couponDataset = localStorage.getItem("jsondata");
	var o = $.parseJSON(couponDataset);
$.each(o, function(i, item) {
if (i != localStorage.getItem("crtimg")){
	i++
}else{
	
//		var postdated				=	document.getElementById('creditBG');
//	  	postdated.style.backgroundImage = item.showImage;
//		  postdated.style.opacity = 0.2;
//		  $(postdated).append('<img src="'+item.showImage+'" style="opacity:.2;z-Index:1;top:0;position:fixed;" width="100%" height="100%"></img>');
		  
  		 postdated					=	document.getElementById('postDate');
		 $(postdated).html('<a></a>')

		  $(postdated).append('<b>Posted: </b>'+item.postDate);

  		 postdated					=	document.getElementById('expirationDate');		 $(postdated).html('<a></a>')


		  $(postdated).append('<b>Expires: </b>'+item.expirationDate);
		  
		 postdated					=	document.getElementById('name');		 $(postdated).html('<a></a>')


		  $(postdated).append('<h1>'+item.name+'</h1>');
		  
		 postdated					=	document.getElementById('dealTitle');		 $(postdated).html('<a></a>')


		  $(postdated).append('<h2>'+item.dealTitle+'</h2>');
		  
		 postdated					=	document.getElementById('disclaimer');		 $(postdated).html('<a></a>')


		  $(postdated).append(item.disclaimer+'<p>');

		 postdated					=	document.getElementById('getButton');		 $(postdated).html('<a></a>')


	if(+homepage>0){
		 postdated					=	document.getElementById('homepage');		 $(postdated).html('<a></a>')


		  $(postdated).append('<h2><a href="'+item.homepage+'">'+item.name+'<br /></h2>');
	}
	else{	
		 postdated					=	document.getElementById('homepage');		 $(postdated).html('<a></a>')


		  $(postdated).append('<h2><a href="'+item.URL+'">'+item.name+'<br /></h2>');
	};
		  $(postdated).append(item.address+' ');
		  $(postdated).append(item.city+', ');
		  $(postdated).append(item.state+' ');
		  $(postdated).append(item.ZIP+'<br />');
		  $(postdated).append('<h3><a href="tel:'+item.phone+'">Call Now! '+item.phone+'</a></h3>');
		  

		 postdated					=	document.getElementById('credit');		 $(postdated).html('<a></a>')


		  $(postdated).append('<img src="'+item.showLogo+'"></img><br />');		
		  $(postdated).append('from '+item.dealSource);
//		  postdated.style.opacity = 1.0;


		$('#getter').live('tap',function(event){location.href=item.URL;});
		$('#streamBtn').live('tap',function(event){location.href='index2.html';});
		$('#mapBtn').live('tap',function(event){location.href='index3.html';});
		$('#shareBtn').live('tap',function(event){location.href='#';});
};
});
};
function mapper(){
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(
        function(position){
            var myLat = localStorage.setItem("myLat", position.coords.latitude);
            var myLon = localStorage.setItem("myLon", position.coords.longitude);
            var myLoc = (position.coords.latitude, position.coords.longitude);},
        function(error){
            var myLoc = (37.2577, -93.2894);},
        function latOptions(){
            enableHighAccuracy: true;});
    }else{
        var myLoc = (37.2577, -93.2894);
    };

        if ($(localStorage.getItem("myLat")).length){    
// This will not exist if app pages are executed out of sequence...
                var myLat = localStorage.getItem("myLat");
                var myLon = localStorage.getItem("myLon");
                var myLoc = new google.maps.LatLng(myLat, myLon);
        }else{
// temporarily center on SGF for testing errors. This will use zipbox geolocator in release.
                var myLoc = new google.maps.LatLng(37.2577, -93.2894);
        };
        
//$(map).ready(function(event) {

    var couponDataset = localStorage.getItem("jsondata");
    var p = $.parseJSON(couponDataset);                        
    var content;    /* infoWindow content!! */
    var position;    /* infoWindow coords !! */
    var pos;
	var contentString    ;

            var name;        var distance;        var address;        var state;
            var city;        var ZIP;            var phone;            var homepage;
            var URL;        var dealSource;        var dealTitle;        var disclaimer;
            var expDate;    var postDate;        var showImage;        var showLogo;

$('#map_canvas').gmap({'center': myLoc, 'zoom':11}).bind('init', function(evt, map) {

        $.each(p, function(i, item){

                    name        =        item.name;
                 address        =        item.address;
                homepage        =        item.homepage;
                   phone        =        item.phone;
                   state        =        item.state;
                    city        =        item.city;
                     ZIP        =        item.ZIP;
                     URL        =        item.URL;
              dealSource        =        item.dealSource;
               dealTitle        =        item.dealTitle;
              disclaimer        =        item.disclaimer;
                 expDate        =        item.expirationDate;
                postDate        =        item.postDate;
               showImage        =        item.showImage;
                showLogo        =        item.showLogo;
                     lat        =        item.lat;
                     lon        =        item.lon;

		

contentString     =     '<a href="'+URL+'">'+name+'</a><br />'+
                            address+'<br />'+city+', '+state+' '+ZIP+' <p>'+
                            '<textarea style="height:40%; width:90%;">'+dealTitle+'</textarea><p><a href="tel:'+phone+'">call: '+phone+'</a><br />'+
                            '<div style="top:96%;right:0px;position:absolute">Deal Source:<br /><img style="background-color:#FFF;" src="'+showLogo+'" /></div>';
			
		
        $('#map_canvas').gmap('addMarker',{
            'position': new google.maps.LatLng(lat, lon),
            'animation':google.maps.Animation.DROP,
            'title':name,
            'icon':new google.maps.MarkerImage('./marker.png')}, 
			
			function(map, marker){
                $('#map_canvas').gmap('addInfoWindow', {'content': contentString }, function(iw) {
                        $(marker).click(function(e) {
                        
						$(marker).live('tap',function(event){
							var iwInfo;
							 iwInfo		=	document.getElementById('mapInfoWin');
							 	$(iwInfo).html(contentString);
						});
						
                        });                                                                                                                                                                                                                               
                });

	
        });
});});};

// // // // // // // // // // //
//							  //
// :::Developers Notes:::     //
//							  //
// // // // // // // // // // //
// any function calling (o) receives a json object containing the following:
///* ********************************************************************************************************* */
///*use   var	identifier				=		object.source									Json contents  */
///* ********************************************************************************************************* */	
///*   */	var affiliate 				= 		item.affiliate;                    			//	yes
///* x */	var name 					= 		item.name;                					//	Gkay
///* x */	var address 				= 		item.address;              					//	440 E 79th St.
///*   */	var address2 				= 		item.address2                 				//	
///*   */	var storeID 				= 		item.storeID;              					//	2103229
///*   */	var chainID 				= 		item.chainID;             					//	ul
///*   */	var totalDealsInThisStore 	= 		item.totalDealsInThisStore;         		//	1
///* x */	var homepage 				= 		item.homepage;                				//	http://gkayskincare.com/gkay/index.htm
///* x */	var phone 					= 		item.phone;                   				//	212.639.9305
///* x */	var state 					= 		item.state;                    				//	NY
///* x */	var city 					= 		item.city;                    				//	New York
///* x */	var ZIP 					= 		item.ZIP;                    				//	10021
///* x */	var URL 					= 		item.URL;                    				//	http://www.8coupons.com/boxy/showdeal/deal/4913891
///* x */	var storeURL 				= 		item.storeURL;	                    		//	http://www.8coupons.com/discounts/gkay-new-york-10021
///* x */	var dealSource 				= 		item.dealSource; 		                   	//	www.groupon.com
///*   */	var user 					= 		item.user;                 					//	Deals of the Day
///*   */	var userID 					= 		item.userID;                    			//	18381
///* x */	var ID 						= 		item.ID;                    				//	4913891
///* x */	var dealTitle 				= 		item.dealTitle;                    			//	$125 for a Light Chemical Peel at Gkay
///* x */	var disclaimer 				= 		item.disclaimer;                   			//	Faces are important, conveying daily moods, playing...",
///* x */	var expirationDate 			= 		item.expirationDate;             			//	2011-02-02
///* x */	var postDate 				= 		item.postDate;                    			//	2011-02-01 01:17:27
///* x */	var showImage 				=		item.showImage;                    			//	http://www.groupon.com/images/site_images/0524/7317/GKAY.jpg
///* x */	var showLogo 				= 		item.showLogo;                    			//	http://www.8coupons.com/partners/logo/small/groupon.png
///*   */	var up 						= 		item.up;                   					//	1
///*   */	var down 					= 		item.down;                    				//	0
///*   */	var DealTypeID 				= 		item.DealTypeID;                    		//	ul
///*   */	var categoryID 				= 		item.categoryID;                    		//	ul
///* x */	var lat 					= 		item.lat;                    				//	40.772
///* x */	var lon 					= 		item.lon;                    				//	-73.9517
///*   */	var distance 				= 		item.distance;                  			//	1.2636628839336
///* *********************************************************************************************************** */
// // // // // // // // // // //
//
// dataMaker creates an html structure within the ContentFlow div. (values are generic)
// some styling is done here, other styling is in the css file...
// ContentFlow will not look or work right if this structure is changed:
//
// <div class="item" style="text-align:center;" id="item_00>
// 		<img src="imgBackgroundTile.png" class="content" id="bg_00" style="z-index:0;position:relative;top:0;" />
// 		<a href="http://www.storeURL.com">
//			<img src="http;//provider.com/logo.jpg" id="654434" title="Store Name" style="zIndex:1;position:inherit;top:3%;marginLeft:10%;marginRight:10%;width:80%;" class="content" />
//		</a>
//		<div class="globalCaption" style="align:center;position:absolute;top:15%;overflow:hidden;zIndex:3;" id="gCap_00" />
//			Store Name
//		</div>
//		<div class="caption" id="cap_00" style="top:35%;">
//			Coupon Description
//		</div>
//	</div>
//
// // // // // // // // // // //
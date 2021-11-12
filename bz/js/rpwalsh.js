/**
 * @author Ryan Walsh
 * finalized 12-5-2011
 *
 * the file contains data interfaces for geolocation,
 * contentFlow, and Google Maps. Also retrieves
 * a jsonp style xml document and returns it as
 * a string.
 *
 **/

//localStorage.clear();				/* necessary for debugging */
function locationChange(zip) {
    localStorage.setItem('jsonLastTime', -1);
    $(document.getElementById('slidebar')).html('');
    getCoords(zip);
};

function getCoords(zip) {
    if (zip > 0) { getCoordsbyZip(zip); } else { getCoordsbyGPS(); }

};

function getCoordsbyZip(zip) {
    var myLat;
    var myLon;
    if (zip > 0) {
        localStorage.setItem('zip', zip);
        var geocoder = new google.maps.Geocoder();
        var address = zip;
        geocoder.geocode({ 'address': address }, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                myLat = results[0].geometry.location.lat();
                myLon = results[0].geometry.location.lng();
                localStorage.setItem("lastLat", myLat);
                localStorage.setItem("lastLon", myLon);
                localStorage.setItem("myLat", myLat);
                localStorage.setItem("myLon", myLon);
            };
            start1(myLat, myLon);

        });
    };
};

function getCoordsbyGPS() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                localStorage.setItem("lastLat", position.coords.latitude);
                localStorage.setItem("lastLon", position.coords.longitude);
                localStorage.setItem("myLat", position.coords.latitude);
                localStorage.setItem("myLon", position.coords.longitude);
                start1(position.coords.latitude, position.coords.longitude);
            },
            function(error) {
                window.location.href = "#page6";
            },
            function latOptions() {
                enableHighAccuracy: true;
            });
    } else {
        window.location.href = "#page6";
    };
};


function start1(lat, lon) {


    var nowTime;
    var lastCalled;
    var lastLocalDL;
    var couponDataset;
    var o;
    if (localStorage.getItem("jsonLastTime") == 0) {
        nowTime = (+new Date()) / 86400000;
        localStorage.setItem("jsonLastTime", nowTime);
    } else { nowTime = (+new Date()) / 86400000; };
    lastCalled = (localStorage.getItem("jsonLastTime"));
    lastLocalDL = (nowTime - lastCalled) * 1000;

    if ((lastLocalDL < 500) && (!!localStorage.getItem("jsondata") != 0)) {
        couponDataset = localStorage.getItem("jsondata");
        o = $.parseJSON(couponDataset);
        dataMaker(o);
    } else { getFeed(lat, lon, nowTime); };
};

function getFeed(lat, lon, nowTime) {
    var jsonURL = "http://api.8coupons.com/v1/getdeals?key=be4a6ab04831bbda688c31667a9b194aa840e415efc91e123dff1019a0a1edb48f06cba84e8cc1b568f590070cdbdc44&lat=" + lat + "&lon=" + lon + "&mileradius=200&orderby=radius&limit=499"
    $.ajax({
        type: "GET",
        url: jsonURL,
        contentType: "application/javascript; charset=utf-8",
        dataType: "jsonp",
        success: function(o) {
            localStorage.setItem("jsondata", JSON.stringify(o));
            localStorage.setItem("jsonLastTime", nowTime);
            navigator.notification.alert(
                $(o).length + ' New Coupons are Available!!', // message
                'Look through your stream to find the best deals in your area!', // title
                'OK' // buttonName
            );
            navigator.notification.beep(2);
            navigator.notification.vibrate(1500);
            dataMaker(o);
        }
    });

};


function dataMaker(o) {

    var itemcontentDiv = new Array();
    var itemdiv;
    var nodeBG;
    var node;
    var divCap;
    var cap;
    var script1;
    var cat = localStorage.getItem('mycategory');
    $(document.getElementById('slidebar')).html('');
    $.each(o, function(i, item) {
        //		
        itemcontentDiv[i] = '<div class="discounted-item cell ' + item.categoryID + '" name="' + item.categoryID + '" onClick=click' + i + '>' +
            '<script>function click' + i + '(){localStorage.setItem("crtimg",' + i + ');dialogFile();location.href="#page4";}function clicka' + i + '(){localStorage.setItem("crtimg",' + i + ');var iwl = ' + item.lat + '; var iwn = ' + item.lon + ';mapper(iwl, iwn);location.href="#page3";}</script>' +
            '<div id="item' + i + '" style="text-align:center;width:100%;"><img src="' + item.showLogo + '" title="' + item.name + ' - ' + item.dealTitle + '" width:150px;" /><br />' +
            item.name + '<br /><textarea style="height:125px;top:30%;position:absolute;">' + item.dealTitle + '</textarea><div style="bottom:0px;position:absolute;"><button onClick="click' + i + '()">get this</button><button onClick="clicka' + i + '()">map this</button></div></div></div>';
        if (cat > 0) {
            if (cat == item.categoryID) {
                $(document.getElementById('slidebar')).append(itemcontentDiv[i]);
            }
        }
        if (cat == 0) {
            $(document.getElementById('slidebar')).append(itemcontentDiv[i]);
        }
    });

    script1 = document.createElement("script");
    script1.src = "js/touchslider.js";
    script1.type = "text/javascript";
    document.head.appendChild(script1);
};

function dialogFile() {
    var couponDataset = localStorage.getItem("jsondata");
    var o = $.parseJSON(couponDataset);
    var postd;
    var crt = localStorage.getItem('crtimg');
    var moveout;
    $.each(o, function(i, item) {
        if (i != crt) { i++ } else {
            postd = document.getElementById('postD');
            $(postd).html('<a></a>');
            $(postd).append('<b>Posted: </b>' + item.postDate);
            postd = document.getElementById('expiD');
            $(postd).html('<a></a>');
            $(postd).append('<b>Expires: </b>' + item.expirationDate);
            postd = document.getElementById('name0');
            $(postd).html('<a></a>');
            $(postd).append('<h1>' + item.name + '</h1>');
            postd = document.getElementById('dealT');
            $(postd).html('<a></a>');
            $(postd).append('<h2>' + item.dealTitle + '</h2>');
            postd = document.getElementById('discl');
            $(postd).html('<a></a>');
            $(postd).append(item.dealinfo + '<br />' + item.disclaimer + '<p>');
            postd = document.getElementById('credi');
            $(postd).html('<a></a>');
            $(postd).append('<img src="' + item.showLogo + '"></img><br />');
            if (+item.homepage > 0) {
                postd = document.getElementById('homep');
                $(postd).html('<a></a>');
                $(postd).append('<h2><a href="' + item.homepage + '">' + item.name + '<br /></h2>');
            } else {
                postd = document.getElementById('homep');
                $(postd).html('<a></a>');
                $(postd).append('<h2><a href="' + item.URL + '">' + item.name + '<br /></h2>');
            };
            $(postd).append(item.address + ' ');
            $(postd).append(item.city + ', ');
            $(postd).append(item.state + ' ');
            $(postd).append(item.ZIP + '<br />');
            $(postd).append('<h3><a href="tel:' + item.phone + '">Call Now! ' + item.phone + '</a></h3>');
            $(postd).append('from ' + item.dealSource);
            moveout = item.URL;

        };
    });

    var tttt = document.getElementById('gettering');
    tttt.href = moveout;
};

function mapper(iwl, iwn) {
    var myLoc;
    var myCent;
    var myZoom;
    var myLat = localStorage.getItem("myLat");
    var myLon = localStorage.getItem("myLon");
    myLoc = new google.maps.LatLng(myLat, myLon);


    var couponDataset = localStorage.getItem("jsondata");
    var p = $.parseJSON(couponDataset);
    var contentString = new Array();

    var name;
    var dist;
    var addr;
    var state;
    var city;
    var ZIP;
    var phone;
    var homep;
    var URL;
    var deal;
    var title;
    var disc;
    var expi;
    var post;
    var image;
    var logo;
    var lat;
    var lon;
    if (iwl > 0) { myZoom = 16; var lati = iwl; var longi = iwn;
        myCent = new google.maps.LatLng(lati, longi); } else { myCent = myLoc;
        myZoom = 12; };

    $('#map_canvas').gmap({ 'center': myCent, 'zoom': myZoom }).bind('init', function(evt, map) {
        $('#map_canvas').gmap('addMarker', { 'position': myLoc, 'title': 'You Are Here' });

        $.each(p, function(i, item) {

            if (item.name != null) { name = item.name; } else { name = " "; };
            if (item.address != null) { addr = item.address; } else { addr = " "; };
            if (item.homepage != null) { homep = item.homepage; } else { homep = "#"; };
            if (item.phone != null) { phone = item.phone; } else { phone = " "; };
            if (item.state != null) { state = item.state; } else { state = " "; };
            if (item.city != null) { city = item.city; } else { city = " "; };
            if (item.ZIP != null) { ZIP = item.ZIP; } else { ZIP = " "; };
            if (item.URL != null) { URL = item.URL; } else { URL = "#"; };
            if (item.dealSource != null) { deal = item.dealSource; } else { deal = " "; };
            if (item.dealTitle != null) { title = item.dealTitle; } else { title = " "; };
            if (item.disclaimer != null) { disc = item.disclaimer; } else { disc = " "; };
            if (item.expirationDate != null) { expi = item.expirationDate; } else { expi = " "; };
            if (item.postDate != null) { post = item.postDate; } else { post = " "; };
            if (item.showImage != null) { image = item.showImage; } else { image = " "; };
            if (item.showLogo != null) { logo = item.showLogo; } else { logo = " "; };
            if (item.lat != null) { lat = item.lat; } else { lat = " "; };
            if (item.lon != null) { lon = item.lon; } else { lon = " "; };

            contentString[contentString.length] = '<div style="width:80%; color:#f00;">' + name + '<br />' + title + '<br />' +
                '<br /><a href="tel:' + phone + '">call: ' + phone +
                '<div style="bottom:0px;opacity:.20;right:0px;position:absolute">' +
                '<img style="background-color:#fff;" src="' + logo + '" /></div></div>';
            $('#map_canvas').gmap('addMarker', {
                    'position': new google.maps.LatLng(lat, lon),
                    'animation': google.maps.Animation.DROP,
                    'title': name,
                    'icon': new google.maps.MarkerImage('./marker.png')
                },
                function(map, marker) {
                    $('#map_canvas').gmap('addInfoWindow', { 'content': contentString[i] },
                        function(iw) {
                            $(marker).click(function() {
                                $('#map_canvas').gmap('openInfoWindow', { 'content': contentString[i] }, this);
                            });
                            $(marker).live('tap', function(event) {
                                $('#map_canvas').gmap('openInfoWindow', { 'content': contentString[i] }, this);
                            });
                        });
                });
        });
    });

};
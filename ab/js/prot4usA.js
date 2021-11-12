//init 

var value;
var pickShow;
var bg21;

var v, v1;

var cast = [];


var tagOpt, touchOpt, mouseOpt;
var charrr = "https://cors-anywhere.herokuapp.com/http://www.wikia.com/api/v1/WAM/WAMIndex?vertical_id=1&wiki_lang=en&sort_direction=DESC&limit=100&fetch_admins=false&fetch_wiki_images=true&wiki_image_width=1600&wiki_image_height=1200";


var container = document.getElementById('container');
//var maincanvas    = document.getElementById('canvasContainer');
var canvas = document.getElementById('bigCanvas');
//context = canvas.getContext('2d');
var showtags = document.getElementById('showtags');
var tags = document.getElementById('tags');
var shimBtm = document.getElementById('shimBtm');
var mainButton = document.getElementById('mainButton');
var showButton = document.getElementById('showButton');

var chariCard = document.getElementById('chariCard');
var shim = document.getElementById('shim');
var searches = document.getElementById('searches');
var boxHider = document.getElementById('boxHider');
var suggest;
var search = [];
var search2 = [];


var query = '';
var char2Tag = [];

var paragraph = [];

var paragraph2 = [];
var valthumb;

//init window
$(searchButton2).hide();
$(resetButton).hide();

$(chariCard).hide();
$(mainButton).hide();
//$('#hideButton').hide();
$(shimBtm).hide();
$(searches).hide();
$('#showButton').hide();
//$(searchButton).hide();
$(shim).hide();
//$(topButton).hide();
$(boxHider).hide();
//////////////
//buttons

function shifty() {
    $(searches).hide();
    $(hideButton).hide();
    $(mainButton).hide();
    //$(adBox).fadeIn();
    $(searchButton2).show();
    $(resetButton).show();
    $(chariCard).hide();
    $(topButton).show();

}

$(mainButton).click(function () {
});
$(showButton).click(function () {
    $(showButton).hide();
    $(hideButton).show();
    $(searchButton).hide();
    $(shim).hide();
    $(resetButton).hide();
    $(searches).hide();
    $(boxHider).hide();
});
$(searchButton2).click(function () {
    $('#searchButton2').fadeOut();
    $(searchButton).fadeIn();
    $(shim).fadeIn();
    $(shim).focus();
});


$(searchButton).click(function () {
    if (shim.value === '') {
        $('#searchButton2').fadeIn();
        $(searchButton).fadeOut();
        $(shim).fadeOut();
    } else {
        $(showButton).hide();
        $(hideButton).hide();
        $(searches).html('');

        query = shim.value;
        //console.log(shim.value);
        clickSearch(query);
    }
});


// make responsive

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

window.addEventListener('resize', resizeCanvas, false);
//end resize canvas

//trap keyboard -> enter to search
$("#shim").keyup(function (event) {
    if (event.keyCode == 13) {
        $("#searchButton").click();
    }
});
//end trap keyboard

//Fire cascade when ready, Lieutennt!
$(document).ready(function () {
    // $('#bigCanvas').hide();
    $('#bigcanvasContainer').hide();

    $('.loading').fadeOut(500);

    $('#curtain1').fadeOut(4500);
    $('#curtain2').fadeOut(3500);


    //$(window).hashchange();
    getSearch();
});
// and we're off to the races on a beautiful Sunday! --r

//clicakables
function Dclicker2() {
    $('#hideButton').click();
}

function Dclicker() {
    $('#shimBtm').hide();
}

function clicker() {

   // var thistrian = document.getElementById('curtain1');
    $('.card').toggle();
    $('#curtain1').toggle();
    $('#bigcanvasContainer').toggle();
   // $('.footer').toggle();
    //  $('#bigCanvas').show();
}

function Aclicker() {
    location.reload();
}

function Bclicker() {
    location.reload();
}

//escape key -> buttonHide
$(document).keyup(function (e) {
    // if (e.keyCode === 13) $('#showButton').click();     // enter current-> search...
    //if (e.keyCode === 27) {$('.hideButton').click();  } // esc
    if (e.keyCode === 81) {
        $('#hideButton').click();
    }  // esc

});

//cloud options


if ("ontouchstart" in document.documentElement) {
    touchOpt = {
        dragControl: true,
        shape: 'sphere',
        textFont: 'Open Sans',
        imagePadding: 2,
        textColour: '#ccc',
        outlineColour: '#0f0',
        clickToFront: 500,
        reverse: true,
        depth: 1,
        maxSpeed: 0.03,
        initial: [0.02, -0.02],
        zoom: .5,
        imageRadius: 5,
        imagePosition: "bottom",
        imageMode: "both",
        outlineMethod: 'colour',
        bgOutlineThickness: 2,
        bgColour: '#111',
        bgRadius: 5,
        outlineRadius: 5,
        fadeIn: 2000,
        decel: .90,
        pinchZoom: true,
        imageVAlign: "top",
        centreImage: bg21
    };
    tagOpt = touchOpt;
} else {
    mouseOpt = {
        dragControl: false,
        shape: 'sphere',
        textFont: 'Open Sans',
        imagePadding: 2,
        textColour: '#ccc',
        outlineColour: '#0f0',
        clickToFront: 500,
        reverse: true,
        depth: 1,
        maxSpeed: 0.03,
        initial: [0.02, -0.02],
        zoom: 1,
        imageRadius: 5,
        imagePosition: "bottom",
        imageMode: "both",
        outlineMethod: 'colour',
        bgOutlineThickness: 2,
        bgColour: '#111',
        bgRadius: 5,
        outlineRadius: 5,
        fadeIn: 2000,
        decel: .99,
        pinchZoom: true,
        imageVAlign: "top",
        centreImage: bg21
    };
    tagOpt = mouseOpt;
    console.log(location.hash);
}

//end cloud options

//----------------------------------------------------
//
function getSearch() {
    $(shimBtm).hide();
    $(showButton).hide();
    $('#hideButton').hide();
    $(searchButton).hide();
    $(shim).show();
    $(resetButton).show();
    $(searches).hide();
    $(topButton).hide();
    // $('#adBox').fadeIn();

    var searchtags = '<ul><li><a rel="1" href="#disney" onClick="getTopChars()"><img rel="1" width="170px" height="150px" src="./img/disney.jpg" />Disney</a></li><li><a rel="1" href="#teentitans" onClick="getTopChars()"><img rel="1" width="170px" height="150px" src="./img/teentitans.png" />Teen Titans</a></li><li> <a href="#gameofthrones" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/gameofthrones.jpg" /> Game Of Thrones </a></li><li> <a rel="1" href="#marvelcinematicuniverse" onClick="getTopChars()"> <img rel="1" width="170px" height="150px" src="./img/marvel.png" /> Marvel Cinematic Universe</a></li><li> <a href="#harrypotter" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/harrypotter.jpg" /> Harry Potter </a></li> <li><a href="#walkingdead" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/walkingdead.png" /> The Walking Dead </a></li><li> <a href="#stargate" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/stargate.png" /> Stargate Universe </a></li><li> <a href="#lucasfilm" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lucasfilm.jpg" />#LucasFilm </a></li><li><a href="#arkhamcity" onClick="getTopChars()"><img width="170px" height="150px" src="./img/arkhamcity.jpg" />Arkham City</a></li><li>  <a href="#lotr" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lotr.jpg" /> Lord of the Rings </a></li> <li> <a href="#arrowverse" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/arrowverse.jpg" /> The Arrowverse </a></li><li> <a href="#simpsons" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/simpsons.jpg" /> Simpsons Universe </a></li><li> <a href="#pokemon" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/pokemon.jpg" /> Pokemon </a></li><li><a href="#muppets" onClick="getTopChars()"><img width="170px" height="150px" src="./img/muppets.jpg" />Muppets</a></li><li> <a href="#hungergames" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/hungergames.jpg" /> Hunger Games </a></li><li> <a href="#breakingbad" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/breakingbad.jpg" /> Breaking Bad </a></li><li> <a href="#memorybeta" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/memorybeta.jpg" /> Memory Beta </a></li><li> <a href="#nintendo" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/nintendo.png" /> Nintendo ® </a></li><li> <a href="#reddwarf" onClick="getTopChars()"> <img width="175px" height="175px" src="./img/reddwarf.jpg" /> Red Dwarf </a></li><li> <a href="#madmen" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/madmen.jpg" /> Mad Men </a></li><li> <a href="#buffyverse" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/buffyverse.png" /> The Buffyverse </a></li><li> <a href="#gravityfalls" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/gravityfalls.jpg" /> Gravity Falls </a></li><li> <a href="#rickandmorty" onClick="getTopChars()"> <img width="175px" height="175px" src="./img/rickandmorty.jpg" /> Rick &amp; Morty </a></li><li> <a href="#elderscrolls" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/elderscrolls.png" /> Elder Scrolls </a></li><li> <a href="#yugioh" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/yugioh.png" /> Yu-Gi-Oh! </a></li><li> <a href="#finalfantasy" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/finalfantasy.png" /> Final Fantasy </a></li><li> <a href="#overwatch" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/overwatch.png" /> Overwatch </a></li><li> <a href="#mlb" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/majorleaguebaseball.png" /> Major League Baseball </a></li><li> <a href="#aircraft" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/aircraft.jpg" /> aircraft </a></li><li> <a href="#jets" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/jets.png" /> Fighter Jets </a></li><li> <a href="#dccomicsextendeduniverse" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/dcextendeduniverse.png" /> DC Extended Universe </a></li><li> <a href="#mafia" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/mafia.jpg" /> Gangster Life </a></li><li> <a href="#bttf" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/bttf.jpg" /> Back to the Future </a></li><li> <a href="#aquarium" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/aquarium.jpg" /> Aquarium </a></li><li> <a href="#invaderzim" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/invaderzim.jpg" /> Invader Zim </a></li><li> <a href="#trigun" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/trigun.png" /> Trigun </a></li><li> <a href="#cowboybebop" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/cowboybebop.png" /> Cowboy Bebop </a></li><li> <a href="#deathnote" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/deathnote.jpg" /> Death Note </a></li><li> <a href="#es.tardis" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/tardis.png" /> El Doctor (español) </a></li><li> <a href="#space" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/space.png" /> Astronomy </a></li><li> <a href="#fearthewalkingdead" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/fearthewalkingdead.png" /> Fear the Walking Dead </a></li><li> <a href="#firefly" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/firefly.png" /> Firefly </a></li><li> <a href="#vikings" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/vikings.png" /> Vikings </a></li><li> <a href="#americanfootball" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/football.jpg" /> Football </a></li><li> <a href="#movies" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/movies.jpg" /> Hollywood </a></li> <li> <a href="#guns" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/guns.png" /> Guns </a></li></ul>';
    $(showtags).html(searchtags);
    tagRender(tagOpt);
}

//
//----------------------------------------------------
//----------------------------------------------------
//

function clickSearch2(query) {
    var shrooms = [];
    var loadingImage = './img/loading.gif';
    $('#searches').html('<p align="center"><img src="' + loadingImage + '" height="200" /><br />loading... please wait...</p>');


    var suggest = "https://cors-anywhere.herokuapp.com/http://www.wikia.com/api/v1/Search/CrossWiki?expand=1&query=" + query + "&lang=en&limit=50&batch=1";

    $.getJSON(suggest, function (data) {
        $.each(data.items, function (key, val) {
            selector = val.id;
            namery = val.title;
            domainery = val.domain;

            var jsongetter = "https://cors-anywhere.herokuapp.com/http://www.wikia.com/api/v1/Wikis/Details?ids=" + selector;
            $.getJSON(jsongetter, function (lore) {
                $.each(lore.items, function (keyQ, valQ) {
                    var sub_domain = valQ.url.split('.')[0].split('//')[1];
                    //console.log(sub_domain);
                    pickShow = sub_domain.toString();
                    //console.log(pickShow);

                    var url4 = valQ.wordmark;
                    var url5 = url4.replace('%21', '!');


                    shrooms.push("<li><a href=#" + pickShow + " onClick='getTopChars(" + selector + ")'><img src='" + url5 + "' />" + valQ.title + "</a></li>");
                });
                $(showtags).html(shrooms);
                $('#searches').fadeOut();
                tcReload(tagOpt);


            });
        })
    });


}

function clickSearch(query) {

    $('#searches').show();
    var loadingImage = './img/loading.gif';
    $('#searches').html('Searching for:' + query + '</br><img src="' + loadingImage + '" />');


    char = "https://cors-anywhere.herokuapp.com/http://" + pickShow + ".wikia.com/api/v1/Articles/MostLinked?expand=1";
    $.getJSON(char, function (data1) {
        $.each(data1.items, function (key, val) {
            if (val.thumbnail != null) {
                imagery = val.thumbnail;
            }
        });
    });

    if (pickShow.length < 2) {
        clickSearch2(query);
        return false;
    } else {
        var suggest = 'https://cors-anywhere.herokuapp.com/http://' + pickShow + '.wikia.com/api/v1/SearchSuggestions/List?query=' + query;
    }
//console.log(suggest);
    $.getJSON(suggest, function (data) {
        $.each(data.items, function (key, val) {
            var namery = val.title.toString();
            search.push('<br /><a href="#' + pickShow + '" onClick="searcher2(' + key + ')">' + val.title + '</a>'); //console.log(namery);
            search2[key] = 'https://cors-anywhere.herokuapp.com/http://' + pickShow + '.wikia.com/api/v1/Search/List?query=' + namery + '&limit=250&minArticleQuality=50&batch=1&namespaces=0';

        });
        //console.log(search);

    })
        .success(function () {
            $(searches).fadeIn();
            $(searches).html("<div id='searchCheck'>Did You Mean:<br />" + search);

        })
        .error(function () {
            $(searches).fadeIn();
            $(searches).html('<div id="searchCheck">No Results For:<br /><br />' + shim.value + '<br /><br /><a href="#' + pickShow + '" onCLick="hider()"">Click Here To Return to #' + pickShow + '</a><hr /><input type="hidden" name="IL_IN_TAG" value="1"/>');
        })


}

function hider() {
    $(searches).fadeOut();
    $(shim).show();
    $(shimBtm).fadeOut();
    $(searchButton).fadeOut();

    $(searchButton2).fadeIn();


}

function searcher2(key) {
    var search22 = [];
    $(searches).html('');
    $.getJSON(search2[key], function (data) {
        //console.log(search2[key]);
        $.each(data.items, function (key2, val) {
            search22.push('<a href="#' + pickShow + '" onClick=getSave("' + val.id + '")>' + val.title + '</a><br />');//console.log(search22);
        });
        $(searches).html(search22);
    });
}


//
//----------------------------------------------------

//----------------------------------------------------
//

function getTopChars(value) {
    if (!pickShow) {
        return false
    }
    //tagOpt.centreImage = bg21;
    $(searchButton2).show();
    $(shim).show();
    $(resetButton).show();
    $(searches).hide();
    $(mainButton).hide();
    $(shimBtm).hide();
    $(topButton).hide();
    $('#adBox').fadeIn();

    var linkTag = [];
    char = "https://cors-anywhere.herokuapp.com/http://" + pickShow + ".wikia.com/api/v1/Articles/MostLinked?expand=1";
    $.getJSON(char, function (data1) {
        linkTag.push('<ul>');
        //console.log(char);
        $.each(data1.items, function (key, val) {
            //console.log(key, val)
            if (val.thumbnail != null) {
                linkTag.push('<li ><a href="#' + pickShow + '" onclick="getSave(' + val.id + ',' + key + ')"><img id="' + val.id + '" width="125px" height="100px" src="' + val.thumbnail + '" />' + val.title + '</a></li>');

            }
        });
        if (pickShow == "marvelcinematicuniverse") {
            linkTag.push('<li><a href="http://eece8zod4au4lkfnt9vhen8rdl.hop.clickbank.net/" target="_blank">Custom Mk IV Armor<img id="inhouseAdvert"  width="175px" height="140px" src="./img/prod/mkiv.jpg" /></a></li></ul>');
        } else if (pickShow == "elderscrolls") {
            linkTag.push('<li><a href="http://2c3f29fr78iab5g52eisw6tibq.hop.clickbank.net/" target="_blank">ESO Walkthrough Guide<img id="inhouseAdvert"  width="175px" height="140px" src="./img/prod/elderscrolls1.jpg" /></a></li></ul>')
        } else if (pickShow == "beatles") {
            linkTag.push('<li> <a href="http://3f3d68eov8t5k6o33e043rrful.hop.clickbank.net/" target="_blank">Play Guitar like Ringo Starr!<img id="inhouseAdvert"  width="175px" height="140px" src="./img/prod/beatles1.jpg" /></a></li></ul>')
        } else if (pickShow == "hungergames") {
            linkTag.push('<li> <a href="http://213427kf1ag5e5l6zbpeztft4f.hop.clickbank.net/" target="_blank">Download Now!<img id="inhouseAdvert"  width="175px" height="140px" src="./img/prod/hungergames1.jpg" /></a></li></ul>')
        } else if (pickShow == "disney") {
            linkTag.push('<li><a target="_blank" href="http://rover.ebay.com/rover/1/711-53200-19255-0/1?icep_ff3=9&pub=5575201363&toolid=10001&campid=5337922296&customid=&icep_uq=Disney+Infinity&icep_sellerId=&icep_ex_kw=&icep_sortBy=12&icep_catId=139973&icep_minPrice=&icep_maxPrice=&ipn=psmain&icep_vectorid=229466&kwid=902099&mtid=824&kw=lg">Disney Infinity ON-SALE (via: E*Bay)<img id="inhouseAdvert"  width="175px" height="140px" src="./img/prod/disney1.png" /></a><img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?ff3=9&pub=5575201363&toolid=10001&campid=5337922296&customid=&uq=Disney+Infinity&mpt=[CACHEBUSTER]"></li></ul>')


        }
        linkTag.push('<li><a href="#" rel="1"><img id="inhouseAdvert"  width="175px" height="140px" src="./img/ryan61.png" /></a></li></ul>');
        $(showtags).html(linkTag);
        tagRender(tagOpt);
    });

} //it works!! it effing works!!!!
//
//----------------------------------------------------

//----------------------------------------------------
//

function getCard(value, key) {
    $(showButton).hide();
    $('#hideButton').show();
    $(searchButton).hide();
    $(searchButton2).hide();
    $(shim).hide();
    $(resetButton).hide();
    $(searches).hide();
    $(boxHider).hide();
    //$(shimBtm).hide();
    $(topButton).hide();

    $('#adBox').fadeOut();

    var char = "https://cors-anywhere.herokuapp.com/http://" + pickShow + ".wikia.com/api/v1/Articles/AsSimpleJson?id=" + value + "&expanded=1";

    paragraph = [];
    paragraph2 = [];

    $(chariCard).html('');

    paragraph.push('<a href="' + valthumb + '" class="fresco" data-fresco-group="shared_options"><img width="25%" src="' + valthumb + '" style="margin-right: 2%;"/></a>');
    $.getJSON(char, function (data1) {
        $.each(data1.sections, function (key, val) {
            paragraph.push('<div align="left" style="margin:5px;padding:1px 0 1px 1px;background-color:#040;border-color:#f00;border:4px;border-radius:15px;"><p><h2>' + val.title + '</h2></p></div>');
            $.each(val.images, function (key1, val1) {

                var url = val1.src;
                var newString = "/1800?";
                var newString2 = "/scale-to-width-down/1800?";
                url = url.replace(/latest.+?cb/g, "latest" + newString2 + "cb");
                url = url.replace(/scale-to-width-down.+?cb/g, "scale-to-width-down" + newString + "cb");
                paragraph.push('<div class="captioned"> <a href="' + url + '" class="fresco" data-fresco-caption="' + val1.caption + '" data-fresco-group="shared_options">' + val1.caption + '<img align="right" src="' + url + '" /></a></div>');
            });

            $.each(val.content, function (key2, val2) {
                if (val2.text != null) {
                    paragraph.push('<div style="padding-left:10px;align:left;">' + val2.text + '<br /><br /></div>');
                } else if (val2.elements != null) {
                    $.each(val2.elements, function (key35, val35) {
                        if (!val35) {
                            return;
                        }
                        var val36 = val35.text.toString();
                        // console.log(val35);
                        paragraph.push('<p style="font-size:36px;">' + val35.text + '</p>');
                        console.log(val35.text);
                    });
                }
            });
        });
        paragraph.push('<hr /><br><p style="font-size:32px";>Is this datacard lacking? All information may be edited by the public at <a style="color:blue" href="http://wikia.com" target="_blank">wikia</a>. Wiki info is shared under CC-SA. </p>');
        // console.log(paragraph);
        $(chariCard).html(paragraph);
    });

    $(chariCard).css("background-color", "rgba(0, 0, 0, .9)");

    $('#hideButton').show();
    $(mainButton).show();

    $(chariCard).show();


} //it works!! it effing works!!!!
//
//----------------------------------------------------

//----------------------------------------------------
//


function getSave(value, key) {
    $("#topButton").html(' #' + pickShow + ' ');
    $(topButton).fadeIn();
    $(searches).fadeOut();
    $(searchButton2).fadeIn();
    $(searchButton).fadeOut();
    $(shim).show();
    $(resetButton).fadeIn();
    $(searches).fadeOut();
    // $('#adBox').fade();

    imagery = $('#' + value).attr('src');
    //console.log(imagery)

    paragraph = [];

    $(shimBtm).html(paragraph);

    var charDERP = 'https://cors-anywhere.herokuapp.com/http://' + pickShow + '.wikia.com/api/v1/Articles/Details?ids=' + value + '&abstract=175&width=640&height=480';
    $.getJSON(charDERP, function (data11) {

    }).success(function (data11) {
        $.each(data11.items, function (keyS, valS) {
            if (!valS.thumbnail) {
                valthumb = imagery;
            } else {
                valthumb = valS.thumbnail;
            }
            if (!valthumb) {
                valthumb = './img/' + pickShow + '.png';
            }
            if (!valS.abstract) {
                $(shimBtm).fadeOut();
                return false
            } else {
                paragraph = '<img id="saveDetail" src="' + valthumb + '" /><p id="shortText" align="center"><i>' + valS.title + '</i><br />' + valS.abstract + '</p><button height="100px" id="showButton" onClick="getCard(' + valS.id + ',' + keyS + ')" value="x">Info</button><button height="100px" id="relButton" onClick="getRel(' + valS.id + ', 2)" value="x">Related</button><button id="boxHider" value="j" onClick="Dclicker()">X</button></p>';
            }
//console.log(valS.title);

            mainButton.value = valS.title;
            $(shimBtm).html(paragraph);
            //console.log(paragraph);
            $(shimBtm).fadeIn();

        });
    })
        .error(function () {
            $(searches).fadeIn();
            $(searches).html("<div id='searchCheck'>There was an error. sry :(<br /><br /><a href='#" + pickShow + "' onCLick='hider()'>Click Here To Return to #" + pickShow + "</a>");
        })
}

function getSave2() {
    $("#topButton").html(' #' + pickShow + ' ');
    $(topButton).fadeIn();
    $(searches).fadeOut();
    $(searchButton2).fadeIn();
    $(searchButton).fadeOut();
    $(shim).show();
    $(resetButton).fadeIn();
    $(searches).fadeOut();
    // $('#adBox').fade();

    imagery = $();
    //console.log(imagery)

    paragraph = [];

    $(shimBtm).html(paragraph);

    valthumb = './img/ryan61.jpg';
    paragraph = '<img id="saveDetail" src="' + valthumb + '" /><p id="shortText" align="center"><i>We are for sale!</i><br />We are the brothers Jack & Ryan Walsh. Last month we decided to write a piece of software that could digest any supermassive data source and provide the resulting thinthread to users. We are using wikia as our demo data source, but :A|B: can take any information in any format or schema and display relationships, interaction analysis and investigations info as demonstrated here! Though she was designed as a mighty tool for "Find, Fix, & Finish" missions, we decided early on that :A|B: will *never* track or trace human universes. She cannot, shall not, and will not. ever. period.';
    mainButton.value = valS.title;
    $(shimBtm).html(paragraph);
    //console.log(paragraph);
    $(shimBtm).fadeIn();
}

function tagRender(o) {
    var s = (new Date).getTime() / 360;

    function rst() {
        TagCanvas.Start('bigCanvas', 'showtags', tagOpt);
    }

    function ttf() {
        TagCanvas.TagToFront('bigCanvas', {index: Math.floor(Math.random() * 10), time: 800});
    }

    function rt() {
        TagCanvas.RotateTag('bigCanvas', {index: Math.floor(Math.random() * 10), lat: -30, lng: 90, time: 800});
    }

    s.src = './js/jquery.tagcanvas.min.js';
    s.onload = rst;

    TagCanvas.Start('bigCanvas', 'showtags', tagOpt);
}

function tcPause() {
    TagCanvas.Pause('bigCanvas');
}

function tcResume() {
    TagCanvas.Resume('bigCanvas');
}

function tcReload() {
    TagCanvas.Reload('bigCanvas', 'showtags');
}

function tcUpdate() {
    TagCanvas.Update('bigCanvas');
}

function tcFront() {
    TagCanvas.TagToFront('bigCanvas', {index: Math.floor(Math.random() * 20), active: 1});
}

function tcRotate() {
    TagCanvas.RotateTag('bigCanvas', {
        index: Math.floor(Math.random() * 20), lat: -60, lng: -60, time: 800, active: 1
    });
}

function tcSpeed() {
    var a = Math.random() * Math.PI * 2, b = 0.1 + Math.random() * 0.9;
    TagCanvas.SetSpeed('bigCanvas', [b * Math.sin(a), b * Math.cos(a)]);
}


resizeCanvas();

//
//----------------------------------------------------

function getRel(value, a) {
    $(topButton).fadeIn();


    var char = "https://cors-anywhere.herokuapp.com/http://" + pickShow + ".wikia.com/api/v1/RelatedPages/List?ids=" + value + "&limit=250";
    char2Tag = [];

    $.getJSON(char, function (data1) {

    })
        .fail(function (jqXHR) {
            if (jqXHR.status == 404) {
                $('#relButton').text('error');
                $('#relButton').fadeOut(500);
            }
        })
        .success(function (data1) {

            char2Tag.push('<ul>');
            //console.log(data1.items);
            $.each(data1.items, function (key, val) {
                //console.log(key, val) ;
                $.each(val, function (key1, val1) {
                    //console.log(key1, val1.imgUrl)
                    char2Tag.push('<li ><a rel="0" href="#' + pickShow + '" onclick="getSave(' + val1.id + ',' + key1 + ')"><img id="' + val1.id + '" height="150px" width="200px" src="' + val1.imgUrl + '" />' + val1.title + '</a></li>');
                });
            });

//   \/\/\/<-------------------manually insert ads into showPicker here! ----------------->\/\/\/
            char2Tag.push('<li><a rel="1" href="#' + pickShow + ' onClick="getSave2()">We Need Money!<img width="175px" height="140px" src="img/ryan61.png" /></a></li></ul>');
            var tester5 = char2Tag.toString();

            if (a > 1) {
                $(showtags).html(tester5);
                tagRender(tagOpt);
            }


        });
}

(function ($) {
    var last_hash = location.hash,
        timeout_id;

    // Special event definition.
    $.event.special.hashchange = {
        setup: function () {
            if ('onhashchange' in window) {
                return false;
            }
            start();
        },
        teardown: function () {
            if ('onhashchange' in window) {
                return false;
            }
            stop();
        },
        add: function (handleObj) {
            var old_handler = handleObj.handler;
            handleObj.handler = function (event) {
                event.fragment = location.hash.replace(/^#/, '');
                old_handler.apply(this, arguments);
            };
        }
    };

    function start() {
        stop();
        var hash = location.hash;
        if (hash !== last_hash) {
            $(window).trigger('hashchange');
            last_hash = hash;
        }
        timeout_id = setTimeout(start, 100);
    }

    function stop() {
        clearTimeout(timeout_id);
    }
})(jQuery);

$(function () {
    $(window).bind('hashchange', function (event) {
        pickShow = event.fragment;
        console.log(location.hash);
        document.title = '[A|B]-(' + (location.hash.replace(/^#/, '') || 'blank') + ')';
        bg21 = './img/logo.png';
        getTopChars();
//console.log(pickShow); ;
    });
    $(window).trigger('hashchange');

});
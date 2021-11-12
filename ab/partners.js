//////////////////////////////////////////////////
//     init external sources 
////////////////////////////////////////////////
//var bg2 = "got1";

//var apiPopular = "./xml/ry.xml";
//var castList = "./xml/rel.json";
var bg22 =[];
var imgNone = [];
var value;
var pickShow = null;
//var bg21;
var bg21 = "./img/logo.png";

(function($){
  var last_hash = location.hash,
    timeout_id;

  // Special event definition.
  $.event.special.hashchange = {
    setup: function() {
      if ( 'onhashchange' in window ) { return false; }
      start();
    },
    teardown: function() {
      if ( 'onhashchange' in window ) { return false; }
      stop();
    },
    add: function( handleObj ) {
      var old_handler = handleObj.handler;
      handleObj.handler = function(event) {
        event.fragment = location.hash.replace( /^#/, '' );
        old_handler.apply( this, arguments );
      };
    }
  };

  function start() {
    stop();
    var hash = location.hash;
    if ( hash !== last_hash ) {
      $(window).trigger( 'hashchange' );
      last_hash = hash;
    }
    timeout_id = setTimeout( start, 100 );
  };
  function stop() {
    clearTimeout( timeout_id );
};})(jQuery);

$(function(){
    // Bind an event to window.onhashchange.
    $(window).bind( 'hashchange', function(event){
       pickShow = event.fragment; console.log(location.hash);
    document.title = '[A|B]-> (' + ( location.hash.replace( /^#/, '' ) || 'blank' ) + ')'; 
 if(bg21 == "./img/.png"){bg21 = "./img/logo.png"}else{bg21='./img/'+pickShow+'.png';};
  console.log(bg21);
 getTopChars();
    // do things here

console.log(pickShow); mouseOpt = {centreImage: bg21 };

});
    
    // Since the event is only triggered when the hash changes, we need to trigger
    // the event now, to handle the hash the page may have loaded with.
    $(window).trigger( 'hashchange' );
    
});


//////////////////////////////////////////////////
//     init globals 
////////////////////////////////////////////////
var v, v1;
var datapoints = [];
var cast = [];
var indisum = [];
var myStr=  '';
var getSummary = '';
var newphotolist = [];
var tagOpt, touchOpt, mouseOpt;
var cardget = '';

var key32;

var charrr = "https://crossorigin.me/http://www.wikia.com/api/v1/WAM/WAMIndex?vertical_id=1&wiki_lang=en&sort_direction=DESC&limit=20&fetch_admins=false&fetch_wiki_images=true&wiki_image_width=1600&wiki_image_height=1200";
//////////////////////////////////////////////////
//     init DOM 
////////////////////////////////////////////////
               //     var c=document.getElementById("canvas");
               //     var ctx=c.getContext("2d");

var pBj;

var imgTop        = document.getElementById('imgTop');
var shimTop       = document.getElementById('shimTop');
var showButton    = document.getElementById('showButton');
var hideButton    = document.getElementById('hideButton');
var adBox         = document.getElementById('adBox');
var container     = document.getElementById('container');
var maincanvas    = document.getElementById('canvasContainer');
var cardcanvas    = document.getElementById('cardCanvas');

var maincloud     = document.getElementById('bigCanvas');
var context       = maincloud.getContext('2d');
var canvas = document.getElementById('bigCanvas');
        context = canvas.getContext('2d');
var showtags      = document.getElementById('showtags');
var tags          = document.getElementById('tags');
var shimBtm       = document.getElementById('shimBtm');
var logoBtm       = document.getElementById('logoBtm');
var mainButton       = document.getElementById('mainButton');

var chariCard      = document.getElementById('chariCard');
var cardImg       = document.getElementById('cardImg');
var cardName      = document.getElementById('cardName');
var cardDetails   = document.getElementById('cardDetails');
var cardSpecial   = document.getElementById('cardSpecial');
var cardLinks     = document.getElementById('cardLinks');
var cardAds       = document.getElementById('cardAds');
var cardImg       = document.getElementById('cardImg');
var shim       = document.getElementById('shim');
var searches      = document.getElementById('searches');
var relButton      = document.getElementById('relButton');
var boxHider      = document.getElementById('boxHider');
var lastSearch = [];
var suggest; var query2; 
var search = []; 
var search2 = [];

var query = '';
var linkTag = [];
var charTag = []; 
var imgTag = []; 
var char2Tag = []; 

var cardBGImg     = [];
var cardName      = [];
var shimTopW = window.innerWidth - 150;

                  var paragraph = [];

                  var paragraph2 = [];




//////////////////////////////////////////////////
//     init page 
////////////////////////////////////////////////
function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;

                cardcanvas.width = window.innerWidth - 200;
                cardcanvas.height = window.innerHeight - 200;


                $(shimTop).css({
                "height": "150px",
                "width": shimTopW
                });


                var contcont = document.getElementById('contcont');
                $(contcont).css({
                "height": window.innerHeight,
                "width": window.innerWidth
                            });

                var containr = document.getElementById('shimTop');
                var winnerwi = window.innerWidth - 150;
                              $(containr).css({
                              "height": "150px",
                              "width": winnerwi
                          });
                             
              }; //end resize canvas

//////////////
//window.addEventListener
        window.addEventListener('resize', resizeCanvas, false);
  
        $(chariCard).hide();


        $(mainButton).show();
        $(hideButton).hide();
        $(imgTop).show();
        $(shimTop).show();

$(mainButton).click(function() {

});

        
//////////////
//buttons
$(showButton).click(function(){
        $(showButton).hide();
        $(hideButton).show();
          $(searchButton).hide();
          $(shim).hide();
                $(resetButton).hide();
                $(searches).hide();
                $(boxHider).hide();


      })

$(searchButton2).click(function(){
                
        $('#searchButton2').fadeOut();
        $(searchButton).fadeIn();

        $(shim).fadeIn();
        $(shim).focus();
      });

$(searchButton).click(function(){
        if (shim.value === ''){       
                            $('#searchButton2').fadeIn();
                            $(searchButton).fadeOut();

                            $(shim).fadeOut();
                          } 
                          else{
                                  
                          $(showButton).hide();
                              $(hideButton).hide();
                              $(searches).html('');

              query = shim.value;

              console.log(shim.value);
              clickSearch(query);  }

      });    console.log(pickShow +" ----- " + query);


$(hideButton).click(function(){
        
        $(shimTop).hide();
             $(searches).hide();
//$(shimBtm).hide();
        $(hideButton).hide();
        $(mainButton).hide();
                $(adBox).hide();
          $(searchButton2).show();
          $(resetButton).show();


                $(chariCard).hide();

      })
$(document).ready(function() {


$("#shim").keyup(function(event){
    if(event.keyCode == 13){
        $("#searchButton").click();
    }
});


  $(window).hashchange();
getSearch();

});
function clicker(){location.hash=""; location.reload();}
function Aclicker(){location.reload();}
function Bclicker(){$(shimBtm).hide();}
   // if (pickShow != null){ bg21 = "./img/"+pickShow+".png";}  


if ("ontouchstart" in document.documentElement){
touchOpt = {dragControl: true, shape: 'sphere', textFont: 'Quicksand', imagePadding: 2,textColour: '#fff', outlineColour: '#0f0',  clickToFront:   100, reverse: true, weight: true,  depth: 1,  maxSpeed: 0.03,  initial: [0.03,-0.01], zoom: 1.3, weightSize: 2,  weightSizeMax: 500,  imageRadius: 5, imagePosition: "bottom",  imageMode: "both",  outlineMethod: 'colour', bgOutlineThickness: 2, bgColour: '#111',  bgRadius: 5,  outlineRadius: 5,  fadeIn: 2000,decel: 1.00,  pinchZoom: true, imageVAlign: "top", animTiming:linear, centreImage: bg21};
tagOpt = touchOpt; 
}else{
mouseOpt = {dragControl: false, shape: 'sphere', textFont: 'Quicksand', imagePadding: 2,textColour: '#fff', outlineColour: '#0f0', reverse: true, clickToFront:   500, weight: false,  depth: 1,  maxSpeed: 0.01,  initial: [0.03,-0.03], zoom: 1.3, weightSize: 2,  weightSizeMax: 500,  imageRadius: 15, imagePosition: "bottom",  imageMode: "both",  outlineMethod: 'colour', bgOutlineThickness: 2, bgColour: '#111',  bgRadius: 5,  outlineRadius: 5,  fadeIn: 2000,  decel: 1.00,  pinchZoom: true, imageVAlign: "top", centreImage: bg21 };
tagOpt = mouseOpt;
}

function getSearch(){ $(mainButton).hide();
$(shimBtm).hide();
   $(showButton).hide();
        $(hideButton).hide();
          $(searchButton).hide();
          $(shim).hide();
                                $(resetButton).show();

                $(searches).hide();
                $(topButton).show();


var searchtags = '<ul><li><a href="#disney" onClick="getTopChars()"><img width="170px" height="150px" src="./img/disney.png" />Disney</a></li><li> <a href="#gameofthrones" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/gameofthrones.png" /> Game Of Thrones </a></li><li> <a href="#lego" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lego.png" /> Lego </a></li><li> <a href="#marvel" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/marvel.png" /> Marvel </a></li><li> <a href="#harrypotter" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/harrypotter.png" /> Harry Potter </a></li> <li> <a href="#reddwarf" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/reddwarf.png" /> Red Dwarf </a></li><li> <a href="#walkingdead" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/walkingdead.png" /> The Walking Dead </a></li><li> <a href="#stargate" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/stargate.png" /> Stargate Universe </a></li><li> <a href="#starwars" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/starwars.png" /> Star Wars </a></li><li><a href="#arkhamcity" onClick="getTopChars()"><img width="170px" height="150px" src="./img/arkhamcity.png" />Arkham City</a></li><li> <a href="#cats" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/cats.png" /> cats </a></li><li> <a href="#lego" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lego.png" /> Lego </a></li><li> <a href="#villains" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/villains.png" /> Villains </a></li><li> <a href="#lotr" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lotr.png" /> Lord of the Rings </a></li> <li> <a href="#arrowverse" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/arrowverse.png" /> The Arrowverse </a></li><li> <a href="#tyrant" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/tyrant.png" /> Tyrant </a></li><li> <a href="#simpsons" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/simpsons.png" /> Simpsons Universe </a></li><li> <a href="#pokemon" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/pokemon.png" /> Pokemon </a></li><li><a href="#muppets" onClick="getTopChars()"><img width="170px" height="150px" src="./img/muppets.png" />Muppets</a></li><li> <a href="#hungergames" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/hungergames.png" /> Hunger Games </a></li><li> <a href="#teentitans" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/teentitans.png" /> Teen Titans </a></li><li> <a href="#tardis" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/tardis.png" /> Dr. Whoniverse </a></li><li> <a href="#breakingbad" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/breakingbad.png" /> Breaking Bad </a></li> <li> <a href="#pokemongo" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/pokemongo.png" /> Pokemon GO! </a></li></ul>'

$(showtags).html(searchtags); 
 tagRender(tagOpt);
}

function clickSearch2(query){$(mainButton).hide();
          var shrooms = [];
                    var loadingImage = './img/loading.gif';
                    $('#searches').html('<p align="center"><img src="'+loadingImage+'" />loading... please wait...</p>');


 var suggest = "https://crossorigin.me/http://www.wikia.com/api/v1/Search/CrossWiki?expand=1&query="+query+"&lang=en&limit=25&batch=1";

 $.getJSON( suggest, function(data) {
      $.each(data.items, function(key, val) {
          var selector = val.id;
          var namery = val.title;
          var domainery = val.domain;

          var jsongetter = "https://crossorigin.me/http://www.wikia.com/api/v1/Wikis/Details?ids="+selector;
          $.getJSON( jsongetter, function(lore) {
          console.log(lore.items);    
          $.each(lore.items, function(keyQ, valQ) {
            //console.log(sub_domain);
            var sub_domain = valQ.url.split('.')[0].split('//')[1];
                        console.log(sub_domain);
if (pickShow == null){
 pickShow = sub_domain.toString();
            console.log(pickShow);
}

var url4 = valQ.wordmark;
var url5=url4.replace('%21', '!');


  shrooms.push("<li><a href=#"+pickShow+" onClick='getTopChars()'><img src='"+url5+"' />"+valQ.title+"</a></li>");
});
                $(showtags).html(shrooms);
                $('#searches').hide(); 
                 tcReload(tagOpt);


          });
        })
    });


}

function clickSearch(query){

                    var loadingImage = './img/loading.gif';
                    $('#searches').html('<p align="center"><img src="'+loadingImage+'" />loading... please wait...</p>');



  console.log(pickShow.length);
  if(pickShow.length < 2){var suggest = "https://crossorigin.me/http://www.wikia.com/api/v1/Search/CrossWiki?expand=1&query="+query+"&lang=en&limit=25&batch=1"}else{
  var suggest = 'https://crossorigin.me/http://'+pickShow+'.wikia.com/api/v1/SearchSuggestions/List?query='+query;}
console.log(suggest);
  $.getJSON( suggest, function(data) {
                    $.each(data.items, function(key, val) {
            var namery = val.title.toString();
            search.push('<br /><a href="#'+pickShow+'" onClick="searcher2('+key+')">'+val.title+'</a>'); console.log(namery);
            search2[key] = 'https://crossorigin.me/http://'+pickShow+'.wikia.com/api/v1/Search/List?query='+namery+'&limit=99&minArticleQuality=50&batch=1&namespaces=0';

          });        
  console.log(search);
  
})
.success(function() {

  $(searches).show();  
  $(searches).html("Did You Mean:<br />"+search); 

})
.error(function() {    $(searches).show();  
 $(searches).html("No Results For:<br /><br />"+shim.value+"<br /><br /><a href='#"+pickShow+"' onCLick='hider()'>Click Here To Return to #"+pickShow+"</a>"); 
 })

                
};

function hider(){
  $(searches).hide();
  $(shim).hide();
  $(shimBtm).hide();
            $(searchButton).hide();
          
            $(searchButton2).show();


}

function searcher2(key){
var search22 = [];
$(searches).html('');
        $.getJSON( search2[key], function(data) {
          console.log(search2[key]);
          $.each(data.items, function(key2, val) {
            search22.push('<a href="#'+pickShow+'" onClick=getSave("'+val.id+'")>'+val.title+'</a><br />');console.log(search22);
          });
        $(searches).html(search22);
});
    }
//////////////////////////////////////////////////
//     init functions 
////////////////////////////////////////////////

function getTopChars(value){
          $(searchButton2).show();
          $(shim).hide();
                $(resetButton).show();
                $(searches).hide();
               // var historySearch = $(searches).html();
          tagOpt.centreImage = bg21;
console.log(pickShow);
          $(mainButton).hide();
          $(shimBtm).hide();
$(topButton).hide();
          var linkTag = [];    //charTag.push('<ul>')


    char = "https://crossorigin.me/http://"+pickShow+".wikia.com/api/v1/Articles/MostLinked?expand=1";
  $.getJSON( char, function(data1) {
    linkTag.push('<ul>');
    console.log(char);    
      $.each(data1.items, function(key, val) {
        console.log(key, val) 
      //  $.each(val2, function(key1, val1) {
                  console.log(key, val.thumbnail)
                 if(val.thumbnail != null){
                  linkTag.push('<li ><a href="#'+pickShow+'" onclick="getSave('+val.id+','+key+')"><img id="'+val.id+'" width="125px" height="100px" src="'+val.thumbnail+'" />'+val.title+'</a></li>');};
         //  charTag.push('<li><a href="#"><img width="175px" height="140px" src="./img/ryan61.jpg" /></a></li></ul>');
console.log(linkTag);
          //getCast(value);
      });$(showtags).html(linkTag);
 tagRender(tagOpt);
});           

}; //it works!! it effing works!!!!

function getCard(value, key){
        $(showButton).hide();
        $(hideButton).show();
          $(searchButton).hide();
                    $(searchButton2).hide();

          $(shim).hide();
                $(resetButton).hide();
                $(searches).hide();
                $(boxHider).hide();
           $(shimBtm).hide();


    var char = "https://crossorigin.me/http://"+pickShow+".wikia.com/api/v1/Articles/AsSimpleJson?id="+value+"&expanded=1";
  //var char = "./xml/soc.json";

 charTag = [];    //charTag.push('<ul>')
 paragraph = [];
 paragraph2 = [];
var loadingImage = 'loading.gif';

  $(chariCard).html('');
//var char1 = $.parseJSON(char); 
  $.getJSON( char, function(data1) {
    console.log(char);    

      $.each(data1.sections, function(key, val) {
paragraph.push('<div><p><h1>'+val.title+'</h1></p></div>')

        $.each(val.images, function(key1, val1) {
if (val1.caption !== null){

var url = val1.src;
var newString = "/1800?";
var newString2 = "/scale-to-width-down/1800?";
url=url.replace(/latest.+?cb/g,"latest"+newString2+"cb");

url=url.replace(/scale-to-width-down.+?cb/g,"scale-to-width-down"+newString+"cb");


            paragraph.push('<div class="captioned"> <a href="'+url+'" class="fresco" data-fresco-caption="'+val1.caption+'" data-fresco-group="shared_options">'+val1.caption+'<img src="'+url+'" /></a></div>');
         };
        
        }); //console.log(paragraph);

       $.each(val.content, function(key2, val2) {
          if (val2.text != null){
                paragraph.push('<div>'+val2.text+'<hr /></div>');
            }
          if(val2.elements != null){
            $.each(val2.elements, function(key35, val35) {
              var val36 = val35.text.split(/[^a-z\s]/gi)
              console.log(val36);
              paragraph.push("<li><p class='classyLink'>"+val35.text+"</p></li>");
            }); 
          }
        }); 
    });
  paragraph.push('<hr /><br><p style="font-size:32px";>Is this datacard lacking? All information may be edited by the public at <a style="color:blue" href="http://wikia.com" target="_blank">wikia</a>. Wiki info is shared under CC-SA. </p>')
  console.log(paragraph);
  $(chariCard).html(paragraph);
 // $(chariCard).show();


 }); 
    
        $(chariCard).css("background-color", "rgba(0, 0, 0, .9)");

        $(hideButton).show();
             $(mainButton).show();

$(chariCard).show();


}; //it works!! it effing works!!!!

function getRel(value, a){
$(topButton).show();
var char = "https://crossorigin.me/http://"+pickShow+".wikia.com/api/v1/RelatedPages/List?ids="+value+"&limit=40";
char2Tag=[];

  $.getJSON( char, function(data1) {
    char2Tag.push('<ul>');
    console.log(data1.items);    
      $.each(data1.items, function(key, val) {
        console.log(key, val) ;
            $.each(val, function(key1, val1) {
                  console.log(key1, val1.imgUrl)
                  char2Tag.push('<li ><a href="#'+pickShow+'" onclick="getSave('+val1.id+','+key1+')"><img height="150px" width="200px" src="'+val1.imgUrl+'" />'+val1.title+'</a></li>');

                  imgNone[value] = val1.imgUrl

            });       
      });       

//   \/\/\/<-------------------manually insert ads into showPicker here! ----------------->\/\/\/
           char2Tag.push('<li><a href="#'+pickShow+'"><img width="175px" height="140px" src="./img/ryan61.jpg" /></a></li></ul>');
      var tester5 = char2Tag.toString();
      
  if (a>1){    $(showtags).html(tester5);tagRender(tagOpt);
}
          //getCast(value);
      });


}; //it works!! it effing works!!!!


function getSave(value, key){


  //tcReload(tagOpt);
//if (pickShow !== null){
  $(searches).hide();
          $(searchButton2).show();

          $(searchButton).hide();
          $(shim).hide();
                $(resetButton).show();
                $(searches).hide();
                
 //var imagery = $('#'+value).attr('src')
 paragraph = [];
 var valthumb;
 var valabs;
           $(shimBtm).html(paragraph);

var charDERP = 'https://crossorigin.me/http://'+pickShow+'.wikia.com/api/v1/Articles/Details?ids='+value+'&abstract=250&width=640&height=480';
  $.getJSON( charDERP, function(data11) {
    console.log(charDERP);    
      
})
.success(function(data11) {       
$.each(data11.items, function(keyS, valS) { 
        valabs = valS.abstract;
        console.log(imagery);
        console.log(valabs);


            valthumb = imagery;  console.log(valthumb);

           paragraph = '<img id="saveDetail" src="'+valthumb+'" /><p id="shortText" align="center"><i>'+valS.title+'</i><br />'+valS.abstract+'</p><button height="100px" id="showButton" onClick="getCard('+valS.id+','+keyS+')" value="x">Info</button><button height="100px" id="relButton" onClick="getRel('+valS.id+', 2)" value="x">Related</button><button id="boxHider" value="j" onClick="Bclicker()">X</button></p>';  


  mainButton.value = valS.title;
           $(shimBtm).html(paragraph);
           console.log(paragraph);
                      $(shimBtm).show();
            }
           
         
                   if (!valS.abstract){$(shimBtm).hide();console.alert('error');(return false}



            }
      }
});
} 
.error(function() {    $(searches).show();  
 $(searches).html("<div id='searchCheck'>No Results For:<br /><br />"+shim.value+"<br /><br /><a href='#"+pickShow+"' onCLick='hider()'>Click Here To Return to #"+pickShow+"</a>"); 
 })         

 };

//console.log(value, imgTag)
        //   $(shimBtm).html(paragraph[key]);
//getRel(value);//}
//}

function tagRender(o){
  var s = (new Date).getTime() / 360;
      function rst() { TagCanvas.Start('bigCanvas','showtags',tagOpt); }
      function ttf() { TagCanvas.TagToFront('bigCanvas', { index: Math.floor(Math.random() * 10), time: 800 }); }
      function rt() { TagCanvas.RotateTag('bigCanvas', { index: Math.floor(Math.random() * 10), lat: -30, lng: 90, time: 800 }); }
      s.src = './js/jquery.tagcanvas.min.js';
      s.onload = rst;
      
      TagCanvas.Start('bigCanvas','showtags', tagOpt);
  }
      
 function tcPause() { TagCanvas.Pause('bigCanvas'); }
 function tcResume() { TagCanvas.Resume('bigCanvas'); }
 function tcReload() { TagCanvas.Reload('bigCanvas', 'showtags'); }
 function tcUpdate() { TagCanvas.Update('bigCanvas'); }
 function tcFront() { TagCanvas.TagToFront('bigCanvas', {index: Math.floor(Math.random() * 20), active: 1}); }
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

//////////////////////////////////////////////////
//     init global function calls 
////////////////////////////////////////////////

//_____________________________________
//----- ^&^ ^&^ ^&^ ^&^ ^&^ ^&^ ------/|
//----------------\\----/\----//-----/ |
// magic happens!  \\--//\\--//-----/  |
//------------------\\//--\\//-----/   |
//___________________\/____\/_____/    |
//-------------------------------------'





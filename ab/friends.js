//////////////////////////////////////////////////
//     init external sources 
////////////////////////////////////////////////
//var bg2 = "got1";

//var apiPopular = "./xml/ry.xml";
//var castList = "./xml/rel.json";
var bg21 = "./img/logo.png";
var background = [];
var value;
 var pickShow = 'gameofthrones';


$(function(){
// Bind the event.
$(window).hashchange( function(){
// Alerts every time the hash changes!
console.log(location.hash); var pickShowA = location.hash;
    document.title = '[A|B]-> (' + ( location.hash.replace( /^#/, '' ) || 'blank' ) + ')';
var pBj = pickShowA.substring(1); var punjabi = pBj.split('.', 1)[0]; pickShow = punjabi;
console.log(punjabi);
if(pBj != ''){
  bg21 = "./img/"+punjabi+".png";
 mouseOpt = {dragControl: false, shape: 'sphere', textFont: 'Quicksand', imagePadding: 2,textColour: '#00a0a0', outlineColour: '#fff',  clickToFront:   300, reverse: true, weight: true,  depth: 1,  maxSpeed: 0.02,  initial: [0.02,-0.01], zoom: 1.3, weightSize: 2,  weightSizeMax: 500,  imageRadius: 15, imagePosition: "bottom",  imageMode: "both",  outlineMethod: 'colour', bgOutlineThickness: 2, bgColour: '#111',  bgRadius: 5,  outlineRadius: 5,  fadeIn: 2000,  decel: 1.00,  pinchZoom: true, imageVAlign: "top", minBrightness: 0.3, centreImage: bg21 };}else{pBj = 'gameofthrones'};

tagOpt = mouseOpt;
console.log(bg21);
})
  $(window).hashchange(); console.log(pickShow); tagRender(tagOpt);


// Trigger the event (useful on page load).
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
                  var bg22 = [];
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
                              $(shimTop).css({
                              "height": "100px",
                              "width": window.innerWidth
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

      })
$(searchButton).click(function(){
        
        $(showButton).show();
        $(hideButton).hide();
        $(searches).show();

    query = shim.value;
    console.log(shim.value);
    searcher(query);
      });

$(hideButton).click(function(){
        $(imgTop).slideUp();
        $(shimTop).hide();
             $(searches).hide();

        $(hideButton).hide();
        $(mainButton).hide();
                $(adBox).hide();


                $(chariCard).hide();

      })
$(document).ready(function() {
          $(searches).hide();
                    $(shimBtm).hide();

  $(window).hashchange();
getSearch();
//preFetcher();
//getTopChars(value);
});
function clicker(){location.hash=""; location.reload();}

if ("ontouchstart" in document.documentElement){
touchOpt = {dragControl: true, shape: 'sphere', textFont: 'Quicksand', imagePadding: 2,textColour: '#00a0a0', outlineColour: '#fff',  clickToFront:   300, reverse: true, weight: true,  depth: 1,  maxSpeed: 0.03,  initial: [0.03,-0.01], zoom: 1, weightSize: 2,  weightSizeMax: 500,  imageRadius: 5, imagePosition: "bottom",  imageMode: "both",  outlineMethod: 'colour', bgOutlineThickness: 2, bgColour: '#111',  bgRadius: 5,  outlineRadius: 5,  fadeIn: 2000,decel: 1.00,  pinchZoom: true, imageVAlign: "top", animTiming:linear, centreImage: bg21};
tagOpt = touchOpt; 
}else{
mouseOpt = {dragControl: true, shape: 'sphere', textFont: 'Quicksand', imagePadding: 2,textColour: '#00a0a0', outlineColour: '#fff',  clickToFront:   300, reverse: true, weight: true,  depth: 1,  maxSpeed: 0.03,  initial: [0.03,-0.01], zoom: 1, weightSize: 2,  weightSizeMax: 500,  imageRadius: 15, imagePosition: "bottom",  imageMode: "both",  outlineMethod: 'colour', bgOutlineThickness: 2, bgColour: '#111',  bgRadius: 5,  outlineRadius: 5,  fadeIn: 2000,  decel: 1.00,  pinchZoom: true, imageVAlign: "top", centreImage: bg21 };
tagOpt = mouseOpt;
}

function getSearch(){ $(mainButton).hide();
var searchtags = '<ul><li><a href="#disney" onClick="getTopChars()"><img width="170px" height="150px" src="./img/disney.png" />Disney</a></li><li> <a href="#gameofthrones" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/gameofthrones.png" /> Game Of Thrones </a></li><li> <a href="#lego" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lego.png" /> Lego </a></li><li> <a href="#marvel" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/marvel.png" /> Marvel </a></li><li> <a href="#harrypotter" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/harrypotter.png" /> Harry Potter </a></li> <li> <a href="#reddwarf" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/reddwarf.png" /> Red Dwarf </a></li><li> <a href="#walkingdead" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/walkingdead.png" /> The Walking Dead </a></li><li> <a href="#stargate" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/stargate.png" /> Stargate Universe </a></li><li> <a href="#starwars" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/starwars.png" /> Star Wars </a></li><li><a href="#arkhamcity" onClick="getTopChars()"><img width="170px" height="150px" src="./img/arkhamcity.png" />Arkham City</a></li><li> <a href="#cats" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/cats.png" /> cats </a></li><li> <a href="#lego" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lego.png" /> Lego </a></li><li> <a href="#villains" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/villains.png" /> Villains </a></li><li> <a href="#lotr" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lotr.png" /> Lord of the Rings </a></li> <li> <a href="#arrowverse" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/arrowverse.png" /> The Arrowverse </a></li><li> <a href="#tyrant" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/tyrant.png" /> Tyrant </a></li><li> <a href="#simpsons" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/simpsons.png" /> Simpsons Universe </a></li><li> <a href="#pokemon" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/pokemon.png" /> Pokemon </a></li><li><a href="#muppets" onClick="getTopChars()"><img width="170px" height="150px" src="./img/muppets.png" />Muppets</a></li><li> <a href="#hungergames" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/hungergames.png" /> Hunger Games </a></li><li> <a href="#teentitans" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/teentitans.png" /> Teen Titans </a></li><li> <a href="#tardis" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/tardis.png" /> Dr. Whoniverse </a></li><li> <a href="#breakingbad" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/breakingbad.png" /> Breaking Bad </a></li> <li> <a href="#movies" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/movies.png" /> Movies </a></li><li> <a href="#walkingdead" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/walkingdead.png" /> The Walking Dead </a></li><li> <a href="#stargate" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/stargate.png" /> Stargate Universe </a></li><li> <a href="#starwars" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/starwars.png" /> Star Wars </a></li><li><a href="#disney" onClick="getTopChars()"><img width="170px" height="150px" src="./img/disney.png" />Disney</a></li><li> <a href="#gameofthrones" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/gameofthrones.png" /> Game Of Thrones </a></li><li> <a href="#lego" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/lego.png" /> Lego </a></li><li> <a href="#marvel" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/marvel.png" /> Marvel </a></li><li> <a href="#harrypotter" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/harrypotter.png" /> Harry Potter </a></li> <li> <a href="#reddwarf" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/reddwarf.png" /> Red Dwarf </a></li><li> <a href="#walkingdead" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/walkingdead.png" /> The Walking Dead </a></li><li> <a href="#stargate" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/stargate.png" /> Stargate Universe </a></li><li> <a href="#starwars" onClick="getTopChars()"> <img width="170px" height="150px" src="./img/starwars.png" /> Star Wars </a></li></ul>'
$(showtags).html(searchtags); 
 tagRender(tagOpt);
}
function searcher(query){
  var suggest = 'https://crossorigin.me/http://'+pickShow+'.wikia.com/api/v1/SearchSuggestions/List?query='+query;
console.log(suggest);
  $.getJSON( suggest, function(data) {
                  search.push('<ul>');
      $.each(data.items, function(key, val) {
        var namery = val.title.toString();
             search.push('<li><a href="#'+pickShow+'" onClick="searcher2('+key+')">'+val.title+'</a></li>'); console.log(namery);
             search2[key] = 'https://crossorigin.me/http://'+pickShow+'.wikia.com/api/v1/Search/List?query='+namery+'&limit=99&minArticleQuality=50&batch=1&namespaces=0%2C14';

        });       search.push('</ul>'); 
  console.log(search);

  $(searches).html(search);
$(searches).show();
});      };

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
function preFetcher(){
  var prefetchery = [];
 
  $.getJSON( charrr, function(data1r) {
    linkTag.push('<ul>');
      $.each(data1r.wam_index, function(key, val) {
                  console.log('--------->>' +val.wiki_image)
                 if(val.wiki_image != null){
                  
                  bg22[key] = val.wiki_image;
                  //value[key]=val.wiki_id;
                  prefetchery.push('<li><a id='+val.wiki_id+' href="#'+val.url+'" onClick="getTopChars('+val.wiki_id+')"><img width="200px" height="220px" src="'+val.wiki_image+'" />'+val.title+'</a></li>');};

      });            
    linkTag.push('/<ul>');

      $(showtags).html(prefetchery);    

 tagRender(tagOpt);

}); 
}


function getTopChars(value){
                $(searches).hide();
                var historySearch = $(searches).html();


console.log(pickShow);
        //   $("body").css("background-image","url("+bg22[key32]+")");  
        //   bg21 = bg22[key32];
        //   $(shimBtm).slideDown();
    $(mainButton).hide();
    $(shimBtm).hide();

    var linkTag = [];    //charTag.push('<ul>')

if (!pickShow){
    char = 'walkingdead';}else{
    char = "https://crossorigin.me/http://"+pickShow+".wikia.com/api/v1/Articles/MostLinked?expand=1";
  $.getJSON( char, function(data1) {
    linkTag.push('<ul>');
    console.log(char);    
      $.each(data1.items, function(key, val) {
        console.log(key, val) 
      //  $.each(val2, function(key1, val1) {
                  console.log(key, val.thumbnail)
                 if(val.thumbnail != null){
                  linkTag.push('<li ><a href="#'+pickShow+'" onclick="getSave('+val.id+','+key+')"><img width="125px" height="100px" src="'+val.thumbnail+'" />'+val.title+'</a></li>');};
         //  charTag.push('<li><a href="#"><img width="175px" height="140px" src="./img/ryan61.jpg" /></a></li></ul>');

          //getCast(value);
      });$(showtags).html(linkTag);
 tagRender(tagOpt);
});           }

}; //it works!! it effing works!!!!

function getCard(value, key){

         //  $(shimBtm).hide();
if (pickShow !== null){


    var char = "https://crossorigin.me/http://"+pickShow+".wikia.com/api/v1/Articles/AsSimpleJson?id="+value;
  //var char = "./xml/soc.json";

 charTag = [];    //charTag.push('<ul>')
 paragraph = [];
 paragraph2 = [];
var loadingImage = 'loading.gif';

  $(chariCard).html('');

  $.getJSON( char, function(data1) {
    console.log(char);    
      $.each(data1.sections, function(key, val) {
paragraph.push('<div><p><h1>'+val.title+'</h1></p></div>')
        $.each(val.images, function(key1, val1) {
           if (val1.src != null){ 

var url = val1.src;
url=url.replace('latest/scale-to-width-down/180?', 'latest/scale-to-width-down/1800?');
url=url.replace('latest/scale-to-width-down/120?', 'latest/scale-to-width-down/1800?');
url=url.replace('latest/scale-to-width-down/200?', 'latest/scale-to-width-down/1800?');
url=url.replace('latest/scale-to-width-down/250?', 'latest/scale-to-width-down/1800?');
url=url.replace('latest/scale-to-width-down/150?', 'latest/scale-to-width-down/1800?');
url=url.replace('latest/scale-to-width-down/276?', 'latest/scale-to-width-down/1800?');
url=url.replace('latest/scale-to-width-down/210?', 'latest/scale-to-width-down/1800?');
url=url.replace('latest/scale-to-width-down/220?', 'latest/scale-to-width-down/1800?');





console.log(url);
            paragraph.push('<div class="captioned"> <a href="'+url+'" class="fresco" data-fresco-caption='+val1.caption+'><img src="'+url+'" alt=""/></a></div>');
         };
        }); //console.log(paragraph);

       $.each(val.content, function(key2, val2) {
          if (val2.text != null){
            paragraph.push('<div>'+val2.text+'<hr /></div>');
            }
;console.log(paragraph);
      }); 
});
paragraph.push('<hr /><br><p>... No Further Data ... </p>')
           $(chariCard).html(paragraph);
$(chariCard).show();


 }); 
    
        $(chariCard).css("background-color", "rgba(0, 0, 0, .9)");

        $(hideButton).show();
             $(mainButton).show();

$(chariCard).show();
}

}; //it works!! it effing works!!!!

function getRel(value){
  if (pickShow !== null){

$(chariCard).hide();
$(chariCard).html = ('');
$(mainButton).hide();

var char = "https://crossorigin.me/http://"+pickShow+".wikia.com/api/v1/RelatedPages/List?ids="+value+"&limit=99";

char2Tag=[];
imgTag=[];

  $.getJSON( char, function(data1) {
    char2Tag.push('<ul>');
    console.log(data1.items);    
      $.each(data1.items, function(key, val) {
        console.log(key, val) ;
       $.each(val, function(key1, val1) {
                  console.log(key1, val1.imgUrl)
                  char2Tag.push('<li ><a href="#'+pickShow+'" onclick="getSave('+val1.id+','+key1+')"><img height="150px" width="200px" src="'+val1.imgUrl+'" />'+val1.title+'</a></li>');
                  imgTag.push('<a href="#'+pickShow+'" onclick="getCard('+val1.id+','+key1+')">'+val1.text+'<button width="220px" height="100px" id="showButton" value="x">Show Info</button></a>');
//               console.log("----->"+ cardBGImg, val.id, charTag);
            });
       
});       

//   \/\/\/<-------------------manually insert ads into showPicker here! ----------------->\/\/\/
           char2Tag.push('<li><a href="#'+pickShow+'"><img width="175px" height="140px" src="./img/ryan61.jpg" /></a></li></ul>');
           char2Tag.push('</ul>');
var tester5 = char2Tag.toString();
      console.log(tester5); 
           $(showtags).html(tester5);
          //getCast(value);
      });
tcReload(tagOpt);

}
}; //it works!! it effing works!!!!


function getSave(value, key){
  //tcReload(tagOpt);
//if (pickShow !== null){

 paragraph = [];
           $(shimBtm).html(paragraph);

var charDERP = 'https://crossorigin.me/http://'+pickShow+'.wikia.com/api/v1/Articles/Details?ids='+value+'&abstract=100&width=640&height=480';
  $.getJSON( charDERP, function(data11) {
    console.log(charDERP);    
      $.each(data11.items, function(keyS, valS) { 
           if (valS.thumbnail != null){ paragraph = '<a href="#'+pickShow+'" onclick="getCard('+valS.id+','+keyS+')">'+valS.title+'<img width="300" height="240" src="'+valS.thumbnail+'" /><p>'+valS.abstract+'</p><button width="220px" height="100px" id="showButton" value="x">Show Info</button></a>';  
console.log(valS.title);

            console.log(valS.abstract)
  mainButton.value = valS.title;
           $(shimBtm).html(paragraph);
           console.log(paragraph);
}
});
 });

console.log(value, imgTag)
        //   $(shimBtm).html(paragraph[key]);
           $(shimBtm).show();
getRel(value);//}
}

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





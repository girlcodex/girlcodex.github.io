var maincanvas = document.getElementById('canvasContainer');
var canvas = document.getElementById('bigCanvas');
context = canvas.getContext('2d');
var showtags = document.getElementById('show2');
var tags = document.getElementById('tags');
var images2 = [];

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
};
window.addEventListener('resize', resizeCanvas, false);
//end resize canvas

//Fire cascade when ready, Lieutennt!
$(document).ready(function() {
    getSearch();
});

function DblHelix(n, rx, ry, rz) {
    var a = Math.PI / n,
        i, j, p = [],
        z = rz * 2 / n;
    for (i = 0; i < n; ++i) {
        j = a * i;
        if (i % 2)
            j += Math.PI;
        p.push([rx * Math.cos(j),
            rz - z * i,
            ry * Math.sin(j)
        ]);
    }
    return p;
};
// and we're off to the races on a beautiful Sunday! --r
var tagOpt;
if ("ontouchstart" in document.documentElement) {
    touchOpt = { dragControl: true, shape: 'DblHelix', lock: 'y', outlineColour: '#0f0', clickToFront: 500, reverse: true, depth: 1, maxSpeed: 0.03, initial: [0.02, -0.02], zoom: 1, imageRadius: 5, imageMode: "image", outlineMethod: 'colour', bgOutlineThickness: 2, bgColour: '#111', bgRadius: 5, outlineRadius: 5, fadeIn: 2000, decel: .90, pinchZoom: true, imageVAlign: "top", shuffleTags: true };
    tagOpt = touchOpt;
} else {
    mouseOpt = { dragControl: false, shape: "hcylinder", lock: 'x', outlineColour: '#0F0', clickToFront: 500, reverse: true, depth: 2.0, maxSpeed: 0.03, initial: [0.02, 0.02], zoom: 0.95, imageRadius: 200, imageMode: "image", outlineMethod: 'outline', outlineOffset: 10, pulsateTime: 0.5, pulsateTo: 0.1, outlineDash: 150, outlineThickness: 25, outlineRadius: 200, fadeIn: 3000, decel: .5, pinchZoom: true, imageVAlign: "top", shuffleTags: true }
    tagOpt = mouseOpt;
    console.log(location.hash);
}

//end cloud options

//----------------------------------------------------
//

function getSearch() {

    var folder = "images/";
    $.ajax({
        url: folder,
        success: function(data) {

            $(data).find("a").attr("href", function(i, val) {
                if (val.match(/\.(jpe?g|png|gif)$/)) {
                    //images2.push("<li><img src='"+folder+val+"'></li>");
                    images2.push('<li><a href="' + folder + val + '" class="fresco" data-fresco-group="shared_options" class="fresco" data-fresco-group="shared_options"> <img heightsrc="' + folder + val + '" /> </a></li>');

                }
            });
            var images3 = images2.toString();
            console.log(images3);
            $(showtags).html(images2);
        }

    });
    tagRender(tagOpt);

};
//
//----------------------------------------------------
//----------------------------------------------------
//


function tagRender(o) {
    var s = (new Date).getTime() / 360;

    function rst() { TagCanvas.Start('bigCanvas', 'showtags', tagOpt); }

    function ttf() { TagCanvas.TagToFront('bigCanvas', { index: Math.floor(Math.random() * 10), time: 800 }); }

    function rt() { TagCanvas.RotateTag('bigCanvas', { index: Math.floor(Math.random() * 10), lat: -30, lng: 90, time: 800 }); }
    s.src = './js/jquery.tagcanvas.min.js';
    s.onload = rst;

    TagCanvas.Start('bigCanvas', 'showtags', tagOpt);
}

function tcPause() { TagCanvas.Pause('bigCanvas'); }

function tcResume() { TagCanvas.Resume('bigCanvas'); }

function tcReload() { TagCanvas.Reload('bigCanvas', 'showtags'); }

function tcUpdate() { TagCanvas.Update('bigCanvas'); }

function tcFront() { TagCanvas.TagToFront('bigCanvas', { index: Math.floor(Math.random() * 20), active: 1 }); }

function tcRotate() {
    TagCanvas.RotateTag('bigCanvas', {
        index: Math.floor(Math.random() * 20),
        lat: -60,
        lng: -60,
        time: 800,
        active: 1
    });
}

function tcSpeed() {
    var a = Math.random() * Math.PI * 2,
        b = 0.1 + Math.random() * 0.9;
    TagCanvas.SetSpeed('bigCanvas', [b * Math.sin(a), b * Math.cos(a)]);
}




resizeCanvas();
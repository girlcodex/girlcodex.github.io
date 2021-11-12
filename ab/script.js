if ( ! Detector.webgl ) {
                Detector.addGetWebGLMessage();
                document.getElementById( 'container' ).innerHTML = "";
            }
  var canvas = document.getElementById('bigCanvas');
        context = canvas.getContext('2d');
        //  $(canvas).html('');

        // resize the canvas to fill browser window dynamically
        window.addEventListener('resize', resizeCanvas, false);

        function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;

                /**
                 * Your drawings need to be inside this function otherwise they will be reset when
                 * you resize the browser window and the canvas goes will be cleared.
                 */
                drawStuff();
        }
        resizeCanvas();

        function drawStuff() {
                // do your drawing stuff here
        }




      
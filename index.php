<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>API Shutter Stock - Hello, world!</title>


  </head>
  <body>
    <hr>
    <div class="container-fluid">
      <a href="javascript:void(0)" onclick="download_image()">download image</a>
      <br>
    <img src="iis/iisstart.png" id="google" />
    <img src="iis/iisstart.png" id="smile" />
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="//stuk.github.io/jszip/dist/jszip.js"></script>
    <script type="text/javascript" src="//stuk.github.io/jszip-utils/dist/jszip-utils.js"></script>
    <script type="text/javascript" src="//stuk.github.io/jszip/vendor/FileSaver.js"></script>

    <script type="text/javascript">
    // window.onload = function(){

        function getBase64Image(img) {
            var canvas = document.createElement("canvas");
            canvas.width = img.width;
            canvas.height = img.height;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0);
            var dataURL = canvas.toDataURL("image/png");
            return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        }

        function download_image() {
          var img1 = getBase64Image(document.getElementById("google"));
          var img2 = getBase64Image(document.getElementById("smile"));
          
          var zip = new JSZip();
          
          // zip.file("Hello.html", "Hello World\n");
          // zip.folder("images");
          
          var img = zip.folder("images");
          img.file("google.png", img1, {base64: true});
          img.file("smile.png", img2, {base64: true});
          zip.generateAsync({type:"blob"}).then(function(content) {
              saveAs(content, "edm8.zip");
          });
        }


    // }
    </script>
  </body>
</html>
<!doctype html>
<html>
<head>
  <title>Zipcode Finder</title>

  <meta charset="utf-8" />
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
</head>

<body>
  <div class="container">
  	<div class="row">
  	  <div class="col-md-6 col-md-offset-3 center whiteBackground">
    		<h1 class="center black">Zipcode Finder</h1>

    		<p class="lead center black">Enter an address to find the zipcode.</p>

    		<form>
    		  <div class="form-group">
    		    <input type="text" class="form-control" name="address" id="address" placeholder="Eg. 321 Niam St. Nwotyna, AA" />
          </div>
    		  <button id="findMyZip" class="btn btn-success btn-lg">Find the ZIP!</button>
    		</form>

    		<div id="success" class="alert alert-success">Success</div>
    		<div id="fail" class="alert alert-danger">Could not find the zip for that address. Try again.</div>
    		<div id="noCity" class="alert alert-danger">You aren't connected to the internet. Maybe your neighbor turned off the modem.</div>
  	  </div>
  	</div>
  </div>
  <script src="jquery-1.11.2.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script>

    $("#findMyZip").click(function(event) {
      
      var result = 0;
      $(".alert").hide();

      event.preventDefault();

      $.ajax({
        type: "GET".
        url: "https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#address').val())+"&sensor=false&key=AIzaSyBuY7mIUm2VjHoYvckJi97g7iZ3Cdfu4QM",
        dataType: "xml",
        success: processXML
        error: error
      });

      function processXML(xml){
        $(xml).find("address_component").each(function(){
          if($(this).find("type").text() == "postal_code"){
            $("#success").html("The zipcode is"+$(this).find("long_name").text()).fadeIn();

            result = 1;
          }

        });

        if (result==0){
          $("fail").fadeIn();
        }
      };

      function error(){
        $("noCity").fadeIn();
      };

    });

  </script>
</body>
</html>
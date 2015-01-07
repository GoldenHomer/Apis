<!doctype html>
<html>
<head>
  <title>PHP Weather Scraper</title>

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
  	  <div class="col-md-6 col-md-offset-3 center">
    		<h1 class="center black">Weather Predictor</h1>

    		<p class="lead center black">Enter a city below to get a weather forecast.</p>

    		<form>
    		  <div class="form-group">
    		    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. Lub-bick, Walla Walla, Lizard Lick..." />
          </div>
    		  <button id="findMyWeather" class="btn btn-success btn-lg">Get My Weather</button>
    		</form>

    		<div id="success" class="alert alert-success">Success</div>
    		<div id="fail" class="alert alert-danger">Could not find weather data for that city. Try again.</div>
    		<div id="noCity" class="alert alert-danger">Enter a city!</div>
  	  </div>
  	</div>
  </div>
  <script src="jquery-1.11.2.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script>

    $("#findMyWeather").click(function(event) {
      event.preventDefault(); // This prevents form from submitting

      $(".alert").hide();

      if ($("#city").val()!="") {
        $.get("scraper.php?city="+$("#city").val(), function(data) {

          if (data=="") {
            $("#fail").fadeIn();
          } 

          else {
            $("#success").html(data).fadeIn();
          }
        });
      } 
      else {
        $("#noCity").fadeIn();
      }
    });

  </script>
</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<style type="text/css">
			html {height: 100%}
			body {
				height: 100%;
				margin: 0;
				padding: 0
			}
			#map-canvas {height: 100%}
		</style>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuY7mIUm2VjHoYvckJi97g7iZ3Cdfu4QM&sensor=false">
		</script>
		<script>
			function initialize() {
				var mapOptions = {
					center: new google.maps.LatLng(0, 0), 
					zoom: 3
				};
				var map = new google.maps.Map(document.getElementById("mapcanvas"), mapOptions);
			} 
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>

	<body>
	 	<div id="map-canvas"/>
	</body>
</html>
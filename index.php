<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HTML2 Canvas</title>
</head>
<body id="main">
  <h1>Hi ebriwan</h1>

  <button onclick="doCapture()">capture</button>
  
<script src="html2canvas.min.js"></script>
<script>
  function doCapture() {
	window.scrollTo(0, 0);

	html2canvas(document.getElementById("main")).then(function (canvas) {

		// Create an AJAX object
		var ajax = new XMLHttpRequest();

		// Setting method, server file name, and asynchronous
		ajax.open("POST", "save-capture.php", true);

		// Setting headers for POST method
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		// Sending image data to server
		ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

		// Receiving response from server
		// This function will be called multiple times
		ajax.onreadystatechange = function () {

			// Check when the requested is completed
			if (this.readyState == 4 && this.status == 200) {

				// Displaying response from server
				console.log(this.responseText);
			}
		};
	});
}
</script>
</body>
</html>
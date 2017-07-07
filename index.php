<?php 

include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Myshop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style>
		.mySlides {display:none;}
	</style>

</head>
<body >


	<h2  style="font-family: 'Spectral', serif; " style="text-align: center;" class="w3-center">BEST Always Buys From The BEST</h2>

	<div style="margin-left: 30%" class="w3-content w3-section" style="width:500px">
		<img class="mySlides" src="images/Cname.PNG" style="height: 25vw">
		<img class="mySlides" src="images/nokia.jpg" style="height: 25vw">
		<img class="mySlides" src="images/oneplus.jpg" style="height: 25vw">
		<img class="mySlides" src="images/oneplus1.jpg" style="height: 25vw">
		<img class="mySlides" src="images/samsung1.jpg" style="height: 25vw">
		
	</div>

	<script>
		var myIndex = 0;
		carousel();

		function carousel() {
			var i;
			var x = document.getElementsByClassName("mySlides");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}    
				x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>



<p style="margin-bottom: 5vw;"></p>

<?php include 'productDisplay.php';
include 'footer.php';
?> 
</body>
</html>
<?php 
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>show product</title>

	<link rel="stylesheet" type="text/css" href="css/productDisplay.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/customerPanel.css">
</head>
<body style="background: #ecebeb;">
	
	<div  class="container" >

		<?php 

		$sql="select * from product;";
		$res=$conn->query($sql);

		?>
		<?php
		while($row=$res->fetch_object())
			/*$row=$res->fetch_object();*/

		{?>



		<div class="col-md-4" style="margin-top: 1vw;">
			<div class="browseWrapper">
				<div class="col-md-6">


					<!-- 	echo "<img style='float: left; width: 7vw;' src='uploadimages/".$row->img."'>";

						
				-->
				<img style="float: left; height: 10vw;" src=<?php echo '"uploadimages/'.$row->img.
				'"'; ?>
				>

			</div>
			<div class=" col-md-6" >
				<p >Model: <?php echo $row->name; ?> </p>
				<p>Price: <?php echo $row->price; ?> tk</p>
				<p>Description: <?php echo $row->description; ?></p>
				<p>Brand: <?php echo $row->brand_Name; ?></p>
			</div> 
			<?php echo "<a class='btn btn-primary'  href='addtocart.php?id=".$row->product_id."'>Add to cart </a>";  ?>



		</div>
	</div>
	<?php
}

?>
</div>


</div>
</div>




</body>
</html>








































<!-- 
<div class="col-md-4">
			<div class="browseWrapper">
				<div class="col-md-7">
					<img style="float: left; width: 7vw;" src="images/walton.jpg">
				</div>
				<div class=" col-md-5" >
					<p style="margin-top: 50%;">hellow</p>
					<p>price=5000tk</p>
					<p>description= A good phone</p>
					<br>
					<p></p>
				</div> 

				<button>Buy</button>

			</div>
		</div>
		<div class="col-md-4">
			<div class="browseWrapper">
				<div class="col-md-7">
					<img style="float: left; width: 7vw;" src="images/walton.jpg">
				</div>
				<div class=" col-md-5" >
					<p style="margin-top: 50%;">hellow</p>
					<p>price=5000tk</p>
					<p>description= A good phone</p>
					<br>
					<p></p>
				</div> 

				<button>Buy</button>

			</div> -->
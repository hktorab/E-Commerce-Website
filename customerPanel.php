<?php 

if (!session_id()) {
	# code...
	session_start();
}

if (empty($_SESSION['user'])) {
	header('Location: signIn.php');
}
include 'db.php';


//echo "".$userId;
?>
<!DOCTYPE html>
<html>
<head>
	<link href="bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="bootstrap/style.css" rel="stylesheet" type="text/css" media="all" />
	
</head>
<body>

	
	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<li><a  style="color: white" href="PreviousPurseRecord.php" > My Previous purchases
						</a></li>		
					</ul>
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<p style="color: white;margin-right: .3vw">Cart</p>
						<a href="checkout.php"> <img src="images/bag.png" alt=""> </a>

						<a style="color: white;margin-left: 3vw" href="logout.php">Logout</a>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<?php 
	include 'profile.php';
	?>
	
	<?php
	include 'productDisplay.php';
	include 'footer.php';
	?>
</body>

</html>

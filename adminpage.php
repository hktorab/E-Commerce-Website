<!-- if account_type=101
-->

<?php 

include 'db.php';
if (!session_id()) {
	# code...
	session_start();
}
if (!(($_SESSION['user'])==1)) {
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link href="bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="bootstrap/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/adminpage.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body style="background: #79bbff">
	
	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<li>
							Welcome to Myshop
						</li>			
					</ul>
				</div>
				<!-- <div class="header-right">
					<div class="cart box_1">
						<a style="color: white" href="logout.php">Logout</a>

						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div> -->
			</div>
		</div>
	</div>



	<?php 

	include 'profile.php';
	?>
	<div class="container" >
		<div class="row">
			<div class="col-md-4">
				<a style="width: 100%; text-align: center;" href="AddDelivaryMan.php" class="myButton">Add Delivary Man</a>
			</div>
			<div  class="col-md-4">
			<a   style="width: 100%; text-align: center;" href="productRequest.php" class="myButton">product request</a>
			</div>
			<div  class="col-md-4">
				<a style="width: 100%;text-align: center;" href="addproduct.php" class="myButton"> Add Product </a>
			</div>
		</div>
		<div class="row">
			<div >
				<div  class="col-md-4">
					<a style="width: 100%; text-align: center; margin-top: .5vw;" href="sellList.php" class="myButton"> Show sell list </a>
				</div>

				<div  class="col-md-4">
					<a style="width: 100%; text-align: center; margin-top: .5vw;" href="productDisplay.php" class="myButton"> Current Product </a>
				</div>

			</div>
		</div>
	</div>
</body>
<?php include 'footer.php'; ?>
</html>

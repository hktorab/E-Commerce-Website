<?php 
if (!session_id()) {
	session_start();
} 
include 'db.php';
if (empty($_SESSION['user'])) {
//	header('Location: index.php');
}
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
						<?php 

						if (empty(($_SESSION['user']))) {
							echo "
							<li><a href='signIn.php'><span class='glyphicon glyphicon-user'> </span>Login</a></li>
							<li><a href='enrol.php'><span class='glyphicon glyphicon-lock'> </span>Create an Account</a></li>			
							";
						}else{
							$userId=$_SESSION['user'];
							$res=$conn->query("select * from user where userId=$userId;");
							$row=$res->fetch_object();

							echo "
							
							<li><a href='customerPanel.php'><span class='glyphicon glyphicon-user'> </span>". $row->Fname." ".$row->Lname."</a></li>
							<li>
							<div class='header-right'>
							<div class='cart box_1'>
							<a style='color: white' href='logout.php'>Logout</a>
							<div class='clearfix'> </div>
							</div>
							</div>
							
							</li>
							";
						} 
						?>
					</ul>
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a href="checkout.php"> <img src="images/bag.png" alt=""></a>	
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>

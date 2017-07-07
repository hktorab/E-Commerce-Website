<?php 
if (!session_id()) {
  # code...
	session_start();
}

include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title> my Record</title>
</head>
<body>
	<link href="bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="bootstrap/style.css" rel="stylesheet" type="text/css" media="all" />
	<style type="text/css">
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}

	</style>
</head>
<body>



	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<?php 

						
						$userId=$_SESSION['user'];
						$res=$conn->query("select * from user where userId=$userId;");
						$row=$res->fetch_object();

						echo "
						<li><a href='deliveryManPage.php'><span class='glyphicon glyphicon-user'> </span>". $row->Fname." ".$row->Lname."</a></li>

						";
						echo "
						<li><a href='previousDelivery.php'><span class='glyphicon glyphicon-user'> </span> My Previous Record </a></li>

						";

						?>
					</ul>
				</div>
				
				<div class="header-right">
					<div class="cart box_1">
						<a href="logout.php">Logout</a>

						<div class="clearfix"> </div>
					</div>
				</div>
				
			</div>
		</div>
	</div>


	<h1 style="text-align: center;">PRODUCT DELIVERED</h1>
	<table>
		<tr>
			
			<th>Client User ID</th>
			<th>Client Contact Number</th>
			<th>Item</th>
			<th>Price</th>
			<th>Place</th>
			<th>Delivery Status</th>
			<th>Delivered By</th>
			<th>Delivery Date</th>
			
		</tr>


		<?php 
		$sql="select * from buy";
		$res=$conn->query($sql);
		while ($row=$res->fetch_object()) {
			if (($row->deliveredBy)===$_SESSION['user']) {



//finding client address
				$resClient=$conn->query("select * from user where userId=".$row->userId.";");
				$rowClient=$resClient->fetch_object();


//finding deliveryman Address


				$resDeliveryman=$conn->query("select * from user where userID=".$_SESSION['user'].";");
				$rowDeliveryman=$resDeliveryman->fetch_object();

				$resDelLoc=$conn->query("select * from deliveryman where userID=".$_SESSION['user'].";");
				$rowDeliverymanLocation=$resDelLoc->fetch_object();



				$arr=str_split($row->products);

				$arr_length=count($arr);
				for ($i=0; $i < $arr_length; $i++) { 
					$sql="select * from product where product_id=".$arr[$i];
					$resShow=$conn->query($sql);
					$rowShow=$resShow->fetch_object();

					?>


					<tr>
						<td><?php echo $rowClient->username; ?></td>
						<td><?php echo $rowClient->Phone;?></td>
						<td><?php echo $rowShow->name; ?></td>
						<td><?php echo $rowShow->price; ?></td>
						<td><?php echo $rowDeliverymanLocation->location; ?></td>
						<td>Delivered</td>
						<td><?php echo $rowDeliveryman->Fname." ".$rowDeliveryman->Lname; ?></td>
						<td><?php echo $row->deliverDate; ?></td>

					</tr>
					<?php 
				}
			}
			?>


			<?php 

		}

		?>
	</table>
</body>
</html>
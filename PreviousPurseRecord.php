	<?php 
	if (!session_id()) {
		# code...
		session_start();
	}
	include 'db.php';
	include 'header.php';
	include 'profile.php';

	$total_price=0;
	$delivery="";
	$deliveryDate="";
	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Previous Order</title>
		<link rel="stylesheet" type="text/css" href="css/customerPanel.css">
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
		<div class="container">
			<table>
				<tr>
					<th>Product Name</th>
					<th>Price</th>
					<th>Deliver</th>
					<th>Delivery Date</th>
					<th>Delivered By</th>

				</tr>
				<?php 

				$sql="select * from buy where userId=".$_SESSION['user'].";";
				$res=$conn->query($sql);
			# code...
				while ($row=$res->fetch_object()) {

					//var_dump($row);



					if (empty($row->isDelivered)) {
						$Isdelivery="not Delivered Yet";

					}else{
						$Isdelivery="Delivered";

					}
					if (empty($row->deliverDate)) {
						$deliveryDate="-";

					}else{
						$deliveryDate=$row->deliverDate;

					}
					if (empty($row->deliveredBy)) {
						$deliveredBy="";

					}else{
						$deliveryPersonName=$conn->query("select * from user where userId=".$row->deliveredBy.";");
						$delName=$deliveryPersonName->fetch_object();

						$deliveredBy=$delName->Fname." ".$delName->Lname ;

					}

					
					$arr=str_split($row->products);

					$arr_length=count($arr);

					for ($i=0; $i < $arr_length; $i++) { 
						$sql="select name,price from product where product_id=".$arr[$i];
						$res=$conn->query($sql);
						$row=$res->fetch_object();
						
						?>
						<tr>
							<td><?php echo $row->name; ?></td>
							<td><?php echo $row->price; ?></td>
							<td><?php echo $Isdelivery; ?></td>
							<td><?php echo $deliveryDate; ?></td>
							<td><?php echo $deliveredBy; ?></td>

						</tr>
						<?php 

					}
				} 

				?>

				<tr>
				</tr>					
			</table>

			
		</div>
	</div>

	<?php 
	include 'footer.php'; ?> 
</body>
</html>
<?php 
if (!session_id()) {
	# code...
	session_start();
}
if (empty($_SESSION['user'])) {
	header('Location: signIn.php');
}

include 'db.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
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
<body >

	<?php 
	include 'header.php';
	$total_price=0;

	?>
	<div class="container">
		<h1 style="text-align: center;">Your Order List</h1>

		<table>
			<tr>
				<th>Product Name</th>
				<th>BRAND</th>
				<th>Price</th>

			</tr>
			<?php 

			if (empty($_SESSION['cart'])) {
				echo "<p style='text-align: center';><b>you haven't order anything <br> or you have completed your order<b></p>";

			}else{
				$cart=$_SESSION['cart'];
				$arr=str_split($cart);

				$arr_length=count($arr);

				?>


				<?php for ($i=0; $i < $arr_length; $i++) { 
					$sql="select name,brand_Name,price from product where product_id=".$arr[$i];
					$res=$conn->query($sql);
					$row=$res->fetch_object();
					$total_price=$total_price+$row->price;
					?>
					<tr>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->brand_Name; ?></td>
						<td><?php echo $row->price; ?></td>
					</tr>
					<?php 	}
				} ?>

				<tr>

					<td colspan="2"><b>Total</b></td>
					<td ><b><?php echo $total_price." "; ?>tk</b></td>
				</tr>					
			</table>

			<a class="btn btn-primary"  href="order.php">Order</a>  
		</div>
		<?php 
		include 'footer.php';
		?>

	</body>
	</html>
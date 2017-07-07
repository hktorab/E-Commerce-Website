<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>	

	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<style type="text/css">
		
		.formCss{width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-style: normal;
			font-variant-ligatures: normal;
			font-variant-caps: normal;
			font-variant-numeric: normal;
			font-weight: 400;
			font-stretch: normal;
			font-size: 12px;
			line-height: 16px;
			font-family: Roboto, Helvetica, Arial, sans-serif;
			
		}
	</style>
</head>

<body style=" background:  #4CAF50">


	
	<div class="container">  
		<form id="contact" action="addproduct.php" method="post" enctype="multipart/form-data">
			<h2  style="text-align: center;"><b>Add Product</b></h2>



			<input  name="productName" placeholder="Product Name" type="text" tabindex="1" required autofocus>


			<input style="padding: 10px;" type="file" name="image" required autofocus>

			<input name="price" placeholder="Price" type="text" tabindex="1" required>


			<TEXTAREA name="description" placeholder="description" type="textArea" tabindex="1" required></TEXTAREA>
			
			<input name="brandName" placeholder="Brand Name" type="text" tabindex="1" required>
			



			<button name="submit" type="submit" >Submit</button>
			<p class="copyright"></p>
			<p></p>


		</form>

		<button ><a style="color:red" href="adminpage.php">BACK TO THE ADMIN PAGE</a> </button>

	</div>


</body>
</html> 
<?php 

if (isset($_POST['submit'])) {

	$var=new AddProduct();
	$var->productAdd($conn);

}

?>






<?php 

class AddProduct{

	


	public function productAdd($conn)
	{
		$sql="insert into product(product_id,name,description,price,img,comments,brand_Name) values('',?,?,?,?,'',?);";

		if(($stmt=$conn->prepare($sql))) {
			$stmt->bind_param("sssss",$productName,$productDescription,$productPrice,$image,$productBrandName);

			# code...
		}else
		{
			var_dump($conn->error);
		}


		$target="uploadimages/".basename($_FILES['image']['name']);

		$productName=$_POST['productName'];
		$productPrice=$_POST['price'];
		$productDescription=$_POST['description'];
		$image=$_FILES['image']['name'];
		$productBrandName=$_POST['brandName'];


		$image_tmp=$_FILES['image']['tmp_name'];

		$stmt->execute();

		if(move_uploaded_file($image_tmp, $target))
		{

			echo "<p style='color:red ; text-align:center' >Product Added</p>";

		}
		else{

			echo "<p style='color:red ; text-align:center' >Product not Added</p>";

		}
		

		$stmt->close();

	}
}


?>
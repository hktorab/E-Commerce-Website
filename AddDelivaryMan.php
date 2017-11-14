<?php 
include 'db.php';

?>

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
<body style="    background-color: #d6d1d1;">
	<?php include 'header.php'; ?>
	<div class="container">  
		<form id="contact" action="AddDelivaryMan.php" method="post" enctype="multipart/form-data">
			<h2  style="text-align: center;"><b>Info of delivary Man</b></h2>

			


			<div class="col-md-6" style="padding: 0px">
				<input name="Fname" placeholder="First Name" type="text" tabindex="1" required autofocus>
			</div>

			<div class="col-md-6" style="padding: 0px">
				<input name="Lname" placeholder="Last Name" type="text" tabindex="1" required autofocus>
			</div> 

			<input name="username" placeholder="username " type="tel" tabindex="1" required>


			<input class="formCss"  name="password" placeholder="password " type="password" required> 

			<input class="formCss"  name="retryPass" placeholder="retry-pass" type="password"  required> 



			<input name="phone" placeholder="Phone Number " type="tel" tabindex="1" required>

			<input name="email" placeholder="email" type="email" tabindex="1" required>


			
			<select class="formCss" name="location">
				<option value="uttara">Uttara</option>
				<option value="mohakhali">Mohakhali</option>
			</select>

			<input name="status" placeholder="active/retired" type="text" tabindex="1" required>

			<textarea  name="address" placeholder="Address" type="text" tabindex="1" required></textarea>
			<input style="padding: 10px" type="file" name="image">



			<input name="accounttype" placeholder="" type="hidden" value="202" tabindex="1" required autofocus>



			<button name="submit" type="submit" >Submit</button>
			<p class="copyright"></p>



		</form>

		<a class="btn btn-primary"  href="adminpage.php">Back </a>
	</div>



</body>
</html>






<?php 

if (isset($_POST['submit'])) {

	


	$usrNameUnique=true;
	$user=$_POST['username'];

	$sql="select username from user;";

	$res=$conn->query($sql);

	while ($row=$res->fetch_assoc()) {
		if ($user===$row['username']) {
			$usrNameUnique=false;
			break;					
		}					
	}
	if (!($usrNameUnique)) {
		echo "<p style='color:red;text-align:center'> This username is already taken </p>";

	}else{




		$password=$_POST['password'];
		$retryPass=$_POST['retryPass'];

		if ($password===$retryPass) 
			{		$data=new Deliveryman();
				$data->initialize($conn,$password);
			}else{ 


				echo "<p style='color:red;text-align:center'> Password Didn't Match </p>";

			}
		}
	}

















	class Deliveryman
	{

		function initialize($conn,$password)
		{
			$sql="insert into user( userID,Fname, Lname,username,password,Phone,Email,Address,Account_type,Image) values('',?,?,?,?,?,?,?,202,?);";

			if (($stmt=$conn->prepare($sql))
		) {
				$stmt->bind_param("ssssssss",$Fname,$Lname,$username,$password,$phone,$email,$address,$image);

			# code...
		}else
		{
			var_dump($conn->error);
		}

		$target="uploadimages/".basename($_FILES['image']['name']);


		$image=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];

		$Fname=$_POST['Fname'];
		$Lname=$_POST['Lname'];

		$username=$_POST['username'];

		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];





		$stmt->execute();


		if(move_uploaded_file($image_tmp, $target))
		{

			echo "<p style='color:red ; text-align:center' >user Added</p>";

		}
		else{

			echo "<p style='color:red ; text-align:center' >user not Added</p>";

		}


		$stmt->close();
		$deliver = new DeliverymanEntry();
		$deliver->add($conn);
		

	}
}





class DeliverymanEntry 
{
	public function add($conn)
	{
		$username=$_POST['username'];
		$resDel=$conn->query("select userID from user where username='".$username."';");


		$dataDel=$resDel->fetch_object();

		$sql_query="insert into deliveryman( delivaryman_id,status,location,userID) values('',?,?,?);";

		if (($stmtt=$conn->prepare($sql_query))
	) {

			$stmtt->bind_param("sss",$status,$location,$userID);


	}else
	{
		var_dump($conn->error);
	}



	$status=$_POST['status'];
	$location=$_POST['location'];

	$userID=$dataDel->userID ;
	if ($stmtt->execute()) {

		echo "<p style='color:red ; text-align:center' >delivaryman  Added</p>";
	}else{
		echo $stmtt->error;
	}

	$stmtt->close();
}



}



?>


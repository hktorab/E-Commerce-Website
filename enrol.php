<?php
if (!session_id()) {
  # code...
	session_start();
}

include 'db.php';
/*echo "string"*/;


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

<body style=" background:  #4CAF50">


	
	<div class="container" >  
		<form id="contact" action="enrol.php" method="post" enctype="multipart/form-data">
			<h2  style="text-align: center;"><b>Join US</b></h2>

			<h4><i>We know that you are  best and <b>BEST</b> always stays with <b>BEST</b></i> <br> 
			</h4>


			<div class="col-md-6" style="padding: 0px">
				<input name="Fname" placeholder="First Name" type="text" tabindex="1" required autofocus>
			</div>

			<div class="col-md-6" style="padding: 0px">
				<input name="Lname" placeholder="Last Name" type="text" tabindex="1" required autofocus>
			</div> 

			<input name="username" placeholder="username " type="tel" tabindex="1" required>


			

			

			<input class="formCss"  name="password" placeholder="password " type="password" required> 

			<input class="formCss"  name="retryPass" placeholder="retry-pass" type="password"  required> 



			<input name="phone" placeholder="Your Phone Number " type="tel" tabindex="1" required>

			<input name="email" placeholder="email" type="email" tabindex="1" required>


			
			<select class="formCss" name="address">
				<option value="uttara">Uttara</option>
				<option value="mohakhali">Mohakhali</option>
			</select>


			<input style="padding: 10px;" type="file" name="image" required autofocus>


			<input name="accounttype" placeholder="" type="hidden" value="303" tabindex="1" required autofocus>





			<button name="submit" type="submit" >Submit</button>
			<p class="copyright"></p>
		</form>

		<a class="btn btn-primary"  style="margin-left: 35%;margin-top: 3vw;" href="index.php">Back</a>

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
			{		$data=new enrol();
				$data->initialize($conn,$password);
			}else{ 


				echo "<p style='color:red;text-align:center'> Password Didn't Match </p>";

			}
		}
	}
	?>




	<?php 





	class enrol 
	{

		function initialize($conn,$password)
		{
			try{
				$sql="insert into user( userID,Fname, Lname,username,password,Phone,Email,Address,Account_type,Image) values('',?,?,?,?,?,?,?,303,?);";

				if (($stmt=$conn->prepare($sql))
					)
				{
					$stmt->bind_param("ssssssss",$Fname,$Lname,$username,$password,$phone,$email,$address,$image);

			# code...
				}else
				{
					var_dump($conn->error);
				}

				$target="uploadimages/".basename($_FILES['image']['name']);



				$Fname=$_POST['Fname'];
				$Lname=$_POST['Lname'];

				$username=$_POST['username'];

				$phone=$_POST['phone'];
				$email=$_POST['email'];
				$address=$_POST['address'];


				$image=$_FILES['image']['name'];
				$image_tmp=$_FILES['image']['tmp_name'];
				$stmt->execute();

				if(move_uploaded_file($image_tmp, $target))
				{
					$_SESSION['msg']="Registration Complete";
					$stmt->close();


					header('Location: signIn.php');

				}
				else{

					echo "<p style='color:red ; text-align:center' >registration  not complete</p>";

				}

				$stmt->close();
			}
			catch(Exception $e)
			{
				$e->getStackTrace();
				$stmt->close();
			}
		}
	}


	?>
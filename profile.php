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
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/customerPanel.css">
	<link href="bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />
</head>
<body>

	<div class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >


				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<?php 

							$userId=$_SESSION['user'];
							$res=$conn->query("select * from user where userId=$userId;");
							$row=$res->fetch_object();

							echo "".$row->Fname." ".$row->Lname;
							?>

						</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-lg-3 " align="center">

								<img alt="User Pic" src=<?php 
								echo '"uploadimages/'.$row->Image.'"';
								?> class="img-circle img-responsive"> </div>


								<div class=" col-md-9 col-lg-9 "> 
									<table class="table table-user-information">
										<tbody>
											<tr>
												<td>Name:</td>
												<td><?php
													echo "".$row->Fname." ".$row->Lname;
													?> 
												</td>
											</tr>
											<tr>
												<td>Username</td>
												<td> <?php
													echo "".$row->username;
													?> </td>
												</tr>
												<tr>
													<td>Phone</td>
													<td><?php echo "".$row->Phone;
														?> </td>
													</tr>

													<tr>
														<tr>
															<td>Email</td>
															<td><?php echo "".$row->Email;
																?> </td>
															</tr>
															<tr>
																<td>Home Address</td>
																<td><?php echo "".$row->Address;
																	?> </td>
																</tr>
																<tr>
																	<td>Account Type</td>
																	<td>
																		<?php 
																		if(($row->Account_type)==303)
																		{
																			echo "Customer";
																		}
																		elseif (($row->Account_type)==202) {
																			echo "Delivery Man";
																		}
																		elseif (($row->Account_type)==101) {
																			echo "Admin";
																		}
																		else{}

																			?>
																	</td>
																</tr>


															</tr>

														</tbody>
													</table>

													
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>
						</div>

					</body>
					</html>
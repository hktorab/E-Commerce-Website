<?php 
if (!session_id()) {
	# code...
	session_start();
}
include 'db.php';

$sql="insert into buy(id,userID,products,isDelivered,deliverDate) values ('',?,?,'','');";


if(($stmt=$conn->prepare($sql))) {
	$stmt->bind_param("ss",$userID,$products);


}else
{
	var_dump($conn->error);
}



$userID=$_SESSION['user'];
$products=$_SESSION['cart'];

$stmt->execute();
$_SESSION['cart']="";
$stmt->close();
header('Location: checkout.php');

?>
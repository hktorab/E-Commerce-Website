<?php 
if (!session_id()) {
	# code...
	session_start();
}

include 'db.php';

$cartArray = array();


if (empty($_SESSION['cart'])) {
	$_SESSION['cart']=$_GET['id'];
	header('Location: customerPanel.php');
}
else{
	$_SESSION['cart']=$_SESSION['cart'].$_GET['id'];
	header('Location: customerPanel.php');

}

/*
$var_cart=0;
$id=$_GET['id'];
echo $id;*/

/*
for ($i=1; $i <$cartArrayLength ; $i++) { 
	echo "string";
	if ((empty($cartArray[$i]))) {
		$cartArray[$i]=$_GET['id'];
		header('Location: customerPanel.php');
	}
}*/


/**
* 
*/

?>
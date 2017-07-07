<?php 
/*if (!session_id()) {
	# code...
	session_start();
}*/

$host="localhost";
$username="root";
$password="";
$db_name="myshop";
// Create connection
$conn = new mysqli($host, $username, $password,$db_name);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else{


}
?>

<?php 
/*	$sql="select Fname from user;";
	$stmt=$conn->prepare($sql);
	$stmt->excute();
	$stmt->bind_result($Fname);

	while ($stmt->fetch_object()) {
		echo "$Fname<br/>";
	}
*/

	//echo "succeed";

	//how to show picture

	/*$sql="select img from testimg where id=?;";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("i",$id);
	$id=1;
	$stmt->execute();
	$stmt->bind_result($img);
	$stmt->fetch();
	header("content-type: png");
	echo "<img src="data:image/png;base64, ' .base64_encode($img).'"/>";*/
	//$stmt->close();




//how to save picture with blob;

	/*$sql="insert into testimg(id,img) values('',?);";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("b",$img);
	$img=file_get_contents("bb.png");
	$stmt->send_long_data(0,$img);
	$stmt->execute();

	$stmt->close();*/






/*$sql="insert into brand( brand_id, brand_name) values('',?);";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$brandName);
$brandName="NOKIA";
$stmt->execute();
$stmt->close();
*/














/*
$result=$conn->query("select * from user;");
while ($data=$result->fetch_object()) {
echo "<pre>";
echo "".$data->userID;
echo "</pre>";
}
*/
//echo "connected";
?> 
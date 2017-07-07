    <?php
    if (!session_id()) {
      # code...
      session_start();
    }
    include 'db.php';
    ?>

    <!DOCTYPE html>
    <html lang="en"> 
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Login Form</title>
      <link rel="stylesheet" href="css/signIn.css">

      <link rel="stylesheet" type="text/css" href="css/registration.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">

    </head>
    <body style="background-color: #695e5e;">

    <a class="btn btn-primary" href="index.php">Back</a>
     <p style="margin-bottom: 15vw;"></p>


     <div  class="login">
      <h1 >Login </h1>
      <form method="post" action="signIn.php">
        <p><input type="text" name="username" value="" placeholder="Username "></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>



        <?php 

        if (isset($_POST['submit'])) {
          $username=$_POST['username'];

          $password=$_POST['password'];

          if (empty($username )|| empty($password)) {
            echo "<p style='color:red;'>Username or Password can not be empty</p>";

          }else{
           $k= new signUpChekings ();
           $authentication= $k->userPassCheck($conn,$username,$password);
         }


       }


       ?>



       <p class="button"> <input  type="submit" name="submit" ></p> 
     </form>
   </div>

 </body>
 </html>


 <?php 

 class signUpChekings
 {



  public function userPassCheck($conn,$user,$pass)
  {

    /*
    $result=$conn->query("select * from user;");
    while ($data=$result->fetch_object()) {
    echo "<pre>";
    echo "".$data->userID;
    echo "</pre>";

    */


    $sql="select userID from user where  username ='$user' and password='$pass';";

    /*$sql="select * from user where username='torab' and password='1';";*/
    //$sql="select * from user;";

    $res=$conn->query($sql);


    if (($data=$res->fetch_object())) {
     $_SESSION['user']= $data->userID ;


     $sql="select account_type from user where  userID=".$data->userID.";";
     $res=$conn->query($sql);
     $data=$res->fetch_object();


     if (($data->account_type)==="101") {

      header('Location: adminpage.php');

    }elseif (($data->account_type)==="202") {
     header('Location: deliveryManPage.php');

        //delivary man
   }
   elseif ((($data->account_type)==="303")) {

      //customer

    header('Location: customerPanel.php');

  }
  else{
    echo "internal error";
  }
    //  $query="select Account_type from user ";

}else{
  echo "<p style='color:red;'><b> Wrong User Name and Password </b></p>";
}
}

}
?>

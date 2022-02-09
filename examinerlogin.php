<?php require_once('connection.php'); ?>
<?php 

    if(isset($_POST['submit'])){

        $e_email="";
        $e_pwd="";

  $e_email = mysqli_real_escape_string($connection,$_POST['email']);
    $e_pwd = mysqli_real_escape_string($connection,$_POST['password']);

        $e_pwd_hashed = sha1($e_pwd);

   $qr1 = "SELECT * FROM examiner WHERE ex_email='{$e_email}' AND examiner_pwd = '{$e_pwd_hashed}' LIMIT 1";

    $sr = mysqli_query($connection , $qr1);
    if($sr){
        if(mysqli_num_rows($sr)==1){

                $exmName = mysqli_fetch_assoc($sr);
                $_SESSION['ex_fname']= $exmName['examiner_firstname'];
                $_SESSION['ex_lname']= $exmName['examiner_lastname'];
                $_SESSION['ex_id']= $exmName['examiner_id'];


            header("location:examiner/dashboad.php");
               $fo=($_SESSION['ex_fname']);
                                              $GG= NOW();

                    $uptime = "UPDATE examiner SET examiner_log=.'$GG' WHERE examiner_id=.'$fo' "; 

if ($connection->query($uptime) === TRUE) {

                   
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $connection->error;
}
        }
        else
        {
            echo'<div class="alert alert-warning" role="alert">
  Warning. Login Failed.<a href="examinerlogin.php" class="alert-link"> Try again</a>. 
    </div>';

        }
    } 
}   

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Examiner Login</title>

	 <!--css file-->

    <link rel="stylesheet" type="text/css" href="css/animation.css">

</head>

<!--body-->
<body style="background-color:#;ff3f">
	<!--header-->
 <h1 class="mb-3">Online Examination System</h1>
 <h2 class="mb-4" style="color: #696969 ;">Examiner Login</h2>

 <!--breadcrumb-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:hsla(9, 100%, 64%, 0.2);">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"> <a href="examiner.php">Examiner</a></li>
    <li class="breadcrumb-item active"aria-current="page">Examiner Login</li>
  </ol>
</nav>
<!--box shadow-->
<div class="shadow-lg p-3 mb-5 bg-white rounded" id="b-box" style="height:350px;">
	<!--form-->
   <form action="examinerlogin.php" method="post">
    <div>
      <img src="assets/Online EXAM SYSTEM.png" class="rounded mx-auto d-block" alt="..." id="back-img">
        <div class="mb-3">
          <label for="inputexamineremail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
       </div>
      <div class="mb-3">
    <label for="examinerid" class="form-label">Password</label>
   <input type="password" class="form-control" id="exampleInputPassword1" placehoder="Password" name="password" required>
 </div>
    <button type="submit" class="btn btn-success btn-lg btn-block" id="exlogbt" name="submit">Login</button> 
</div>   
    <div>       
     </div>
      </form>
      	<!--footer php inclueded-->
          <div class= "coloum" style="top: 20px; margin-top: 104px;  border-radius: 15px;" >
           <?php include 'footer.php';?>
   </div>
 </body>

<!--internal css-->
<style type="text/css">
	body {

    padding: 25px 50px 75px;
    height: 580px;

}
button {
    margin-top: 20px;
}
h1,h2 {
    text-align: center;
    text-decoration: solid;
    text-justify: auto;
    font-weight: bold;
}
 #back-img {
   
    margin-top: 10px;
    top: 40cm;
    width: 100px;
    height: 100px;
    
}
#b-box{
    background-color: aqua;
}
.form-label{

    text-align: left;
}
label{
    display: block;
    font-weight: bold;
    color: #696969;
}

	</style>
</html>
<?php $connection -> close(); ?>
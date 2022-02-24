
<?php require_once('connection.php'); ?>
<?php 

    if(isset($_POST['submit'])){

        $ST_email="";
        $ST_pwd="";

  $ST_email = mysqli_real_escape_string($connection,$_POST['inSTDemail']);
    $ST_pwd = mysqli_real_escape_string($connection,$_POST['inSTDpwd']);

        $ST_pwd_hashed = sha1($ST_pwd);

   $qr12 = "SELECT * FROM student WHERE stu_email='{$ST_email}' AND stu_pwd = '{$ST_pwd_hashed}' LIMIT 1";

    $srT = mysqli_query($connection , $qr12);
    if($srT){
        if(mysqli_num_rows($srT)==1){
          header("location:examiner/studentDashboard.php");
          $stdsName = mysqli_fetch_assoc($srT);
          $_SESSION['STD_name']= $stdsName['stu_name'];
          $_SESSION['STD_id']= $stdsName['stu_id'];

            
       }
        else
        {
            echo'<div class="alert alert-warning" role="alert">
  Warning. Login Failed.<a href="studentlogin.php" class="alert-link"> Try again</a>. 
    </div>';

        }
    } 
}   

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student login</title>

	<!-- cdn boostrap link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!--css file of this page-->

    <link rel="stylesheet" type="text/css" href="css/animation.css">

 </head>
 <body style="background-color:#;ff3f">
 <h1 class="mb-3">Online Examination System</h1>
 <h2 class="mb-4" style="color: #696969 ;">Student Login</h2>

 <!--breadcrumb-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:hsla(9, 100%, 64%, 0.2);">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Student Login</li>
  </ol>
</nav>
<!--shadowbox-->
<div class="shadow-lg p-3 mb-5 bg-white rounded" id="b-box" style="height:350px;">
   <form action="" method="post">
    <div>
      <img src="assets/Online EXAM SYSTEM.png" class="rounded mx-auto d-block" alt="..." id="back-img">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="inSTDemail" required>
       </div>
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
   <input type="password" class="form-control" id="exampleInputPassword1" name="inSTDpwd">
 </div>
    <button type="submit" class="btn btn-success btn-lg btn-block" id="stlogbt" name="submit">Login</button> 
</div>   
    <div>       
     </div>
      </form>
      <!--php includes-->
          <div class= "coloum" style="top: 20px; margin-top: 104px;  border-radius: 15px;" >
           <?php include 'footer.php';?>
   </div>
 </body>


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
<?php $connection -> close();?>
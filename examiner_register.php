<?php require_once('connection.php'); ?>
<?php 

	if(isset($_POST['submit'])){

		$errormsg = array();

$fname = mysqli_real_escape_string($connection,$_POST['infname']);
	$lname = mysqli_real_escape_string($connection,$_POST['inlname']);
	$email = mysqli_real_escape_string($connection,$_POST['inemail']);
	$pwd = mysqli_real_escape_string($connection,$_POST['inpwd']);
	$cpwd =mysqli_real_escape_string($connection,$_POST['incpwd']);

//password hashing
	$hashed_pwd = sha1($pwd);
	$hashed_c_pwd = sha1($cpwd);

if($pwd!=$cpwd){

			$errormsg[]="Password comfirmation failed.";
		}

if(isset($errormsg) && !empty($errormsg)) {

	 	//password confirmation checking
	 	echo'<div class="alert alert-warning" role="alert">
  <strong>Warning.</strong> Password confirmation fail.<a href="examiner_register.php" class="alert-link"> Try again</a>. 
    </div>';

	 } 


		if(empty($errormsg)){

			$query = "INSERT INTO examiner(examiner_firstname, examiner_lastname , ex_email , examiner_pwd, examiner_c_pwd) VALUES ('{$fname}','{$lname}','{$email}','{$hashed_pwd}','{$hashed_c_pwd}')";



	if(mysqli_query($connection,$query)){

			//email sending 
$to       = $email;									
$subject  = 'Verification mail Exam Management System';
$message  = 'Your Registration successfully done.';
$headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
   //if mail send
    echo ".";
else
    echo "Email sending failed";

		  

	 	echo '<div class="alert alert-success" role="alert">
 Registration successfully done.You will received a confirmation email.Click here. <a href="examinerlogin.php" class="alert-link">Login page</a>. 
</div>';


} else {
	//email checking 

	$errormsg[]="email exisited.";

		echo'<div class="alert alert-warning" role="alert">
  <strong>Warning  </strong>.Email is already registered. <a href="examiner_register.php" class="alert-link">Try again</a>
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
	<title>Examiner Register</title>

	<!-- cdn boostrap link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- css files-->'
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
</head>
<!-- body -->
<body>
<!-- h1	 -->
<h1 class="mb-3" style="text-align: center;text-decoration: solid;text-justify: auto;
    font-weight: bold;">Online Examination System</h1>
<h2 class="mb-3" style="text-align:center; color:#696969;">Examiner Register here</h2>

 <!--breadcrumb-->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color:hsla(9, 100%, 64%, 0.2);">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"> <a href="examiner.php">Examiner</a></li>
    <li class="breadcrumb-item active"aria-current="page">Examiner Register</li>
  </ol>
</nav>

<!--box shadow-->
<div class="p-5 text-center bg-light shadow-lg p-3 mb-5 bg-white rounded" id="b-box"style="height:auto;">
 
 	  <!--form -->
 <form method="POST" action="examiner_register.php">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFName">First Name*</label>
      <input type="First name" class="form-control" id="inputFName" placeholder="First Name "name="infname" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputLName">Last Name</label>
      <input type="Last Name" class="form-control" id="inputLName" placeholder="Last Name" name="inlname" required>
    </div>
  </div>

  <div class="form-group">
    <label for="inputExEmail">Email Address</label>
   <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address" aria-describedby="emailHelp" name="inemail" required>
  </div>

  <div class="form-row">
  	<div class="form-group col-md-6">
     <label for="inputpwd">Enter Password</label>
      <input type="password" class="form-control" id="examinerPassword1" placeholder="Enter Password" name="inpwd" required>
  </div>
    <div class="form-group col-md-6">
      <label for="inputCPwd">Confirm Password</label>
       <input type="password" class="form-control" id="examinerCPassword1" placeholder="Confirm Password" name="incpwd" required>
    </div>
    </div>

  <button type="submit" class="btn btn-success" name="submit">Register</button>
</form>
<!-- include php -->
 <div class="coloumd" style="top: 20px; margin-top: 94px; width: auto;">  
   <?php include 'footer.php';?>
    </div>
</body>
</html>
<?php $connection -> close(); ?>
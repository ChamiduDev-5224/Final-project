<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Examiner login</title>

	  <!-- cdn boostrap link-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  
    <!-- css file-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">

 </head>

 <!--body-->
 <body style="height: 550px;">

    <!--header declaration-->
 <h1 class="mb-3" style="text-align: center;text-decoration: solid;text-justify: auto;
    font-weight: bold;">Online Examination System</h1>
<h2 class="mb-3" style="text-align:center; color:#696969;">Welcome Examiner</h2>

<!--breadcrumb-->
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb" style="background-color:hsla(9, 100%, 64%, 0.2);">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Examiner</li>
  </ol>
</nav>
<!--box shadow-->
<div class="p-5 text-center bg-light font-center white rounded" id="b-box"style="height:400px">

  <!--form declaration-->
    <form action="examinerlogin.php" method="post">
    <div>
    <img src="assets/Online EXAM SYSTEM.png" class="rounded mx-auto d-block" alt="..." id="back-img">
    <button type="button" onclick="document.location='examiner_register.php'" class="btn btn-primary btn-md btn-block" id="exbutton" action="examiner_register.php" method="post">Register</button> 
   <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
</div>  

 <!--footer declaration-->
    <div class="coloum" style="top: 20px; margin-top: 200px; width: auto;">  
   <?php include 'footer.php';?>
    </div>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>

    <!-- cdn boostrap link-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <!-- css file-->

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animation.css">
</head>

 <body>

  <h1 class="mb-3" style="font-weight: bolder;">Online Examination System</h1>
  <h2 class="mb-3"style="font-weight: bolder; text-align: center;">ආයුබෝවන් </h2>
   <h3 class="mb-3"style="font-weight: bolder; text-align: center;">Welcome </h3>
   <h4 class="mb-3"style="font-weight: bolder; text-align: center;">வரவேற்பு </h4>

   <div class="shadow-lg p-5 text-center bg-dark font-center " id="b-box" style="height:400px;  border-style:groove;"  >
    <form action="index.php" method="post">  
     <!--logo--> 
     <div>
       <img src="assets/Online EXAM SYSTEM.png" class="rounded mx-auto d-block" alt="..." id="back-img">
       
          <button onclick="document.location='examiner.php'" type="button" class="btn btn-primary btn-md btn-block" id="exbutton" action="examiner.php" method="post">Examiner</button>

          <button onclick="document.location='studentlogin.php'" type="button" class="btn btn-success btn-lg btn-block" action=" studentlogin.php" method="post">Student</button> 

       
    <div>
  </div> 
   <!--include footer-->
  <div class="coloum" style="top: 20px; margin-top: 251px; width: auto; border-radius: 15px;">
          <?php include 'footer.php'?>
 
 </div>
</form>
  
   

</body>
</html>

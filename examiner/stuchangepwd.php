<?php require_once 'C:\wamp64\www\Final-project\connection.php'; ?>
<?php require_once 'C:\wamp64\www\Final-project\examiner\selection.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change student password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/animation.css" rel="stylesheet">
    <!-- cdn  css-->
    <link href=" https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
   

</head>

<body id="page-top">

  <?php include 'stuSideNav.php';?>
   
  <!--box shadow-->
<div class="p-5 text-center bg-light shadow-lg p-3 mb-5 bg-white rounded" id="b-box"style="height:auto;">
  

<div class="form-group">
<span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php if (isset($_SESSION['STD_name']))  
                                         {   

                                    echo ($_SESSION['STD_name']);

                                } else 
                                echo 'not working';?></span>
  <form action="" method="post">
  	<div class="form-group col-md-12">
     <label for="inputpwd">Enter Current Password</label>
      <input type="password" class="form-control" id="examinerPassword1" placeholder="Enter Current Password" name="cp" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCPwd">Enter New Password</label>
       <input type="password" class="form-control" id="examinerCPassword1" placeholder="Enter New Password" name="np" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCPwd">Confirm New Password</label>
       <input type="password" class="form-control" id="examinerCPassword1" placeholder="Confirm New Password" name="cnp" required>
    </div>
    </div>

  <button type="submit" class="btn btn-success" name="submit">Update</button>
</form>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<!-- datatable -->
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>



</html>

<?php require_once 'C:\wamp64\www\finalpj\connection.php'; ?>

<?php 
  if(isset($_POST['BtnSAVE'])){
  
  $stdname = mysqli_real_escape_string($connection,$_POST['inputstname']);
  $stdemail = mysqli_real_escape_string($connection,$_POST['inputEmail3']);
  $stdgender = mysqli_real_escape_string($connection,$_POST['gridRadios']);

  $genPwd = "AgQ5602OBSDKFqwruoylcnvwyOQWEUINCXZX";

  $sufflePWD = substr(str_shuffle($genPwd), 0,4);
  $hashed_sufflePWD = sha1($sufflePWD);

$GLOBALS['stdemail'];

  // session for foriegn key

   if (isset($_SESSION['ex_id']))  
                                         {

                                     $forignID=($_SESSION['ex_id']);

// email and forign key duplication checking

              $dup = mysqli_query($connection,"SELECT * FROM student WHERE stu_email= '$stdemail' AND stu_examiner_id='$forignID' ");
if (mysqli_num_rows($dup)>0) {
  // if it is duplication print here
$_SESSION['status'] = $stdemail.". Already Existing data.";
} else {                     

// if it isn't duplicate insert data 

$q3 = "INSERT INTO student (stu_name ,gender,stu_pwd,stu_email,stu_examiner_id) VALUES ('{$stdname}','{$stdgender}','{$hashed_sufflePWD}','{$stdemail}','{$forignID}')";

if(mysqli_query($connection,$q3)){

        //email sending    
$to       = $stdemail;                 
$subject  = $stdname.' Your registerd in Online examination system.'; 
$message  = 'Your Registration successfully done.
             your Registered E-mail.  '. $stdemail  .'  Your password is. ' .$sufflePWD;
$headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
   //if mail send
   echo'';
else
    echo "Email sending failed";

   $_SESSION['success'] = $stdemail.". Registered successfully.";
}
else {
  $_SESSION['status'] = "Registered isn't successfully.";
}}
 } else 
 echo 'not working';
}
 ?>
 <!-- deleting process -->
 <?php 

  if (isset($_POST['deletebtn'])){


    $id = $_POST['delete_id'];

    $q5= "DELETE FROM student WHERE stu_id=".$id;

    $q5_run = mysqli_query($connection , $q5);
    if ($q5_run) {

      $_SESSION['success'] = " Data Deleted. ";
    } else {
      $_SESSION['status'] = "Data isn't Deleted. ";

    }

  }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Students</title>

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

  <?php include 'sidenav.php';?>

   <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Students Details</h6>
                        </div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable" style="margin-left: 50px; margin-bottom: 5px;">
  Add Students 
</button>
     

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="#modldt">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="managestudents.php" method="POST" >
           <div class="form-group row">

            <input type="hidden" name="d_id">
    <label for="inputstname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputstname" placeholder="Name" name="inputstname">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="inputEmail3">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Female" checked>
          <label class="form-check-label" for="gridRadios1">
            Female
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Male">
          <label class="form-check-label" for="gridRadios2">
            Male
          </label>
        </div>
      </div>
    </div>
  </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"name="BtnSAVE" data-target="#modldt" id="fffa">Save</button>
      </div>
    </div>
  </div>
  </form>

</div>

        <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4" style="padding:1px;">
                     
        
                        <div class="card-body">
                           <?php 
                           if(isset($_SESSION['success'])&& $_SESSION['success'] !=''){

       
      echo ' <div class="alert alert-info" role="alert"><strong> Success! </strong> '.$_SESSION['success'] 
.'<a href="managestudents.php" class="alert-link"> Click Here.</a>
</div>';
unset($_SESSION['success']);

                           } if (isset($_SESSION['status'])&& ($_SESSION['status']) !='') {
                              echo ' <div class="alert alert-warning" role="alert"><strong>Hey Warning! </strong> '.$_SESSION['status'] 
.'<a href="managestudents.php" class="alert-link"> Click Here.</a>
</div>';
unset($_SESSION['status']);

                           }?>
                            <div class="table-responsive">
                              <?php
                               if (isset($_SESSION['ex_id']))  
                                         {

                                     $forignID=($_SESSION['ex_id']);

                                     $q4 = "SELECT stu_id , stu_name , gender , stu_email FROM student WHERE stu_examiner_id=" . $forignID ;

                                     $q4_run = mysqli_query($connection , $q4); 
                                    
                                }else {
                                  echo 'errorrr';
                                }
                                  ?>
                                <table class="table table-bordered" id="dataTable11" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th><center>Delete</center></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th><center>Delete</center></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                      <?php 
                                      if (mysqli_num_rows($q4_run)>0) {
                                         while ($row =mysqli_fetch_assoc($q4_run)) {
                                          ?>
                                           
                                       
                                        <tr>
                                            <td> <?php echo $row['stu_id'] ?></td>
                                            <td><?php echo $row['stu_name'] ?></td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td><?php echo $row['stu_email'] ?></td>
                                           <td> <form action="managestudents.php" method="POST"><center><input type="hidden" name="delete_id" value="<?php echo $row['stu_id']; ?>"><button type="submit" class="btn btn-danger" data-dismiss="modal" name="deletebtn">Delete</center></button></form></td>  
                                            </tr>

                                            <?php 
                                             }
                                       } else{

                                        echo $q4;
                                       }
                                             ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

 
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

<script type="text/javascript">
  $(document).ready(function(){


    $('#dataTable11').DataTable({

      "pagingType": "simple_numbers",
      "lengthMenu":[[5,15,50,-1],[5,15,50, " All"]],
      responsive:true,
      language: {
        search: "_INPUT_",
        searchPlaceholder:"Search Here",
      }
    });
  });

  
</script>
</body>
</html>
<?php $connection -> close(); ?>
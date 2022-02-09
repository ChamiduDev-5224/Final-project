<?php require_once 'C:\wamp64\www\finalpj\connection.php'; ?>

<?php 
  if(isset($_POST['Btclass'])){
  

  $classSub = mysqli_real_escape_string($connection,$_POST['inputsub']);
   $className = mysqli_real_escape_string($connection,$_POST['inputclass']);

 if (isset($_SESSION['ex_id']))  
                                         {

                                  $forignIDD=($_SESSION['ex_id']);

$q8 = "INSERT INTO class (class_sub, class_name , class_ex_id) VALUES ('{$classSub}','{$className}','{$forignIDD}')";

if(mysqli_query($connection,$q8)){

   $_SESSION['success'] = ". Registered successfully.";
}
else {
  $_SESSION['status'] = $q8 ."Registered isn't successfully.";
}
 }
}

 ?>

 <!-- deleting class sd -->

 <?php 

  if (isset($_POST['deletebtn'])){

    $classid = $_POST['classdlt'];

    $q9= "DELETE FROM class WHERE class_id=".$classid;

    $q9_run = mysqli_query($connection , $q9);
    if ($q9_run) {

      $_SESSION['success'] = " Data Deleted. ";
    } else {
      $_SESSION['status'] = "Data isn't Deleted. ";

    }
}
  

  ?>

  <?php

   if (isset($_POST['viewbtn'])){

    $view_data = "SELECT * FROM WHERE ff";

   } ?> 
 

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
                            <h6 class="m-0 font-weight-bold text-primary">Classess Details</h6>
                        </div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable" style="margin-left: 50px; margin-bottom: 5px;">
  Add Classess
</button>
     

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="#modldt">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="classManage.php" method="POST" >
           <div class="form-group row">

            <input type="hidden" name="d_id">
    <label for="inputsub" class="col-sm-2 col-form-label">Add Subject</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputsub" placeholder="Add Subject" name="inputsub" required>
    </div>
  </div>
      <div class="form-group row">
    <label for="inputclass" class="col-sm-2 col-form-label">Add Class</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputclass" placeholder="Add Class" name="inputclass" required>
    </div>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"name="Btclass" data-target="#modldt" id="fffa">Save</button>
      </div>
    </div>
  </div>
  </form>

</div>

        <!-- DataTales Example -->
                    
                    <div class="card shadow mb-4">
                     
        
                        <div class="card-body">
                           <?php 
                           if(isset($_SESSION['success'])&& $_SESSION['success'] !=''){

       
      echo ' <div class="alert alert-info" role="alert"><strong> Success! </strong> '.$_SESSION['success'] 
.'<a href="classManage.php" class="alert-link"> Click Here.</a>
</div>';
unset($_SESSION['success']);

                           } if (isset($_SESSION['status'])&& ($_SESSION['status']) !='') {
                              echo ' <div class="alert alert-warning" role="alert"><strong>Hey Warning! </strong> '.$_SESSION['status'] 
.'<a href="classManage.php" class="alert-link"> Click Here.</a>
</div>';
unset($_SESSION['status']);

                           }?>
                            <div class="table-responsive">
                              <?php
                               if (isset($_SESSION['ex_id']))  
                                         {

                                    $forignIDD=($_SESSION['ex_id']);

                                     $q7 = "SELECT class_id ,class_sub, class_name FROM class WHERE class_ex_id=" . $forignIDD ;

                                     $q7_run = mysqli_query($connection , $q7); 

                                  
                                }else {
                                  echo 'errorrr';
                                }
                                  ?>
                                <table class="table table-bordered" id="dataTable11" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Class ID</th>
                                            <th>Subject Title</th>
                                            <th>Class Name</th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Class ID</th>
                                            <th>Subject Title</th>
                                            <th>Class Name</th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                      <?php 
                                      if (mysqli_num_rows($q7_run)>0) {
                                         while ($row1 =mysqli_fetch_assoc($q7_run)) {
                                          ?>
                                           
                                       
                                        <tr>
                                            <td> <?php echo $row1['class_id'] ?></td>
                                            <td> <?php echo $row1['class_sub'] ?></td>
                                            <td><?php echo $row1['class_name'] ?></td>
                                            
                                         <td> <form action="classManage.php" method="POST"><center>
                                          <input type="hidden" name="classview" value="<?php echo $row1['class_id']; ?>"><button type="button" class="btn btn-primary" data-dismiss="modal" name="viewbtn" data-toggle="modal" data-target="#viewModalID">view</button>
                                   
                                              <input type="hidden" name="classedit" value="<?php echo $row1['class_id']; ?>"><button type="button" class="btn btn-success" data-dismiss="modal" name="editbtn" data-toggle="modal" data-target="#EditModalID">Edit</button>

                                              <input type="hidden" name="classdlt" value="<?php echo $row1['class_id']; ?>"><button type="submit" class="btn btn-danger" data-dismiss="modal" name="deletebtn">Delete</button></center></form></td>  
                                            </tr>

                                            <?php 
                                             }
                                       } else{

                                        echo $q7;
                                       }
                                             ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
           


<!-- View Modal -->
<div class="modal fade" id="viewModalID" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Students details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
  <!-- End View Modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="EditModalID" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
             <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Add Students 
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <form action="classManage.php" method="POST">
          <?php 

   if (isset($_SESSION['ex_id']))  
                                         {

                                     $forignID=($_SESSION['ex_id']);

            $dd_class = "SELECT stu_id , stu_name FROM student WHERE stu_examiner_id =" . $forignID;
                $dd_class_run = mysqli_query($connection,$dd_class);
                  
                  if(mysqli_num_rows($dd_class_run)>0){
                    foreach ($dd_class_run as $stlist ) {
                      ?>
                      <input type="checkbox" name="stdList[]" value="<?= $stlist['stu_name'];  ?> " />  <?= $stlist['stu_name'];?> </br>
                      <?php  
                    }
                    }
                    else {
                      echo'None';
                    }
                  }                     

          
   ?>
   <?php 


if (isset($_POST['save_stt'])) {

  $stLt =$_POST['stdList'];
    if (isset($_SESSION['ex_id']))  
                                   { 
                                    $forigffnIDD=($_SESSION['ex_id']);

    $get_val = "SELECT class_id FROM class WHERE class_ex_id =" .$forigffnIDD ;
  $val_rst = mysqli_query($connection,$get_val);

  $clssID = mysqli_num_rows($val_rst);

    if ($clssID > 0 ) {
      while ($rw = mysqli_fetch_assoc($val_rst)){

        $xn = $rw['class_id'];
      
    



    foreach($stLt as $stclss){


              $duup = mysqli_query($connection,"SELECT * FROM fff WHERE class_idd= '$xn' AND std_details='$stclss' ");
if (mysqli_num_rows($duup)>0) {
  // if it is duplication print here
$_SESSION['status'] = ". Already Existing data.";
} else {                     

    

   $query444 = "INSERT INTO fff (class_idd,std_details) VALUES ('$xn','$stclss')";
       if(mysqli_query($connection,$query444))
   
    
    {
        $_SESSION['success'] = "Inserted Successfully";
        
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
   } } 
    }}
    
  }}
 } ?> 


          <div class="form-group mt-3">
            <button name="save_stt" class=" btn btn-primary"> Assign Students</button>
          </div>
        </form>

          


  </div>
</div>



          <h5 style="color:black;">Delete Students</h5>
        <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown link
  </a>
</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End Edit Modal -->
 
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

      "pagingType": "full_numbers",
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
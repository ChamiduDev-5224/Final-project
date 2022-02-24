<?php require_once 'C:\wamp64\www\Final-project\connection.php'; ?>




<?php 
  if(isset($_POST['BtnSaveExam'])){
  
  $ETitle = mysqli_real_escape_string($connection,$_POST['inputExamTitle']);
  $EDateTime = mysqli_real_escape_string($connection,$_POST['event_dt']);
  $EDuration = mysqli_real_escape_string($connection,$_POST['Duration']);
  $ETotalQuestion = mysqli_real_escape_string($connection,$_POST['total_qst']);
  $EMarkRAns = mysqli_real_escape_string($connection,$_POST['RAnswer']);
  $EMarkWAns = mysqli_real_escape_string($connection,$_POST['WAnswer']);

  
 
  if (isset($_SESSION['ex_id']))  
  {

$forIDD=($_SESSION['ex_id']);
// email and forign key duplication checking

$dup_exam = mysqli_query($connection,"SELECT * FROM exam WHERE exam_title= '$ETitle' AND examiner_exam_id='$forIDD' ");
if (mysqli_num_rows($dup_exam)>0) {

  $_SESSION['exames_id']= $exmName['exam_id'];
  // if it is duplication print here
$_SESSION['status'] = $ETitle.". Already Existing exam.";
} else {             


$query_add_exam = "INSERT INTO exam (exam_title , exam_datetime , exam_duration,total_question , mark_r_ans , mark_w_ans,examiner_exam_id ) VALUES ('{$ETitle}','{$EDateTime}','{$EDuration}','{$ETotalQuestion}','{$EMarkRAns}','{$EMarkWAns}','{$forIDD}')";

if(mysqli_query($connection,$query_add_exam)){

$_SESSION['success'] = ". Exam added successfully.";
}
else {
  $query_add_exam ."Exam can't be added.";
}

} 
}
}
?>


  <!-- Deleting exams-->

<?php 

  if (isset($_POST['deletebtn_exam'])){

    $exid = $_POST['examdlt'];

    $q_delete_exam= "DELETE FROM exam WHERE exam_id=".$exid;

    $q_delete_exam_run = mysqli_query($connection , $q_delete_exam);
    if ($q_delete_exam_run) {

      $_SESSION['success'] = " Exam Deleted. ";
    } else {
      $_SESSION['status'] = "Exam isn't Deleted. ";

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

    <title>Exams</title>

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
                            <h6 class="m-0 font-weight-bold text-primary">Exam Details</h6>
                        </div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable" style="margin-left: 50px; margin-bottom: 5px;">
  Assign Exam
</button>
     

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="#modldt">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Assign Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="exam.php" method="POST" >

           <div class="form-group row">
            <input type="hidden" name="d_id">
    <label for="inputExamTitle" class="col-sm-2 col-form-label">Exam Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputExamTitle" placeholder="Title" name="inputExamTitle">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Date &
      Time</label>
    <div class="col-sm-10">             
      <input type="datetime-local" name="event_dt" class="form-control" required> 
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Duration (Min)</legend>
      <div class="col-sm-10">
      <select name="Duration" class="btn btn-light dropdown-toggle" required>
        <option value="">-Select-</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="60">60</option>
      </select>
      </div>
    </div>
  </fieldset>


  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Total Questions</legend>
      <div class="col-sm-10">
      <select name="total_qst" class="btn btn-light dropdown-toggle" required>
        <option value="">-Select-</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      </div>
    </div>
  </fieldset>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Right Answer Mark</legend>
      <div class="col-sm-10">
      <select name="RAnswer" class="btn btn-light dropdown-toggle" required>
        <option value="">-Select-</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
      </select>
      </div>
    </div>
  </fieldset>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Wrong Answer Mark</legend>
      <div class="col-sm-10">
      <select name="WAnswer" class="btn btn-light dropdown-toggle" required>
        <option value="">-Select-</option>
        <option value="-1">-1</option>
        <option value="-2">-2</option>
        <option value="-5">-5</option>
        <option value="-10">-10</option>
        <option value="-20">-20</option>
      </select>
      </div>
    </div>
  </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"name="BtnSaveExam" data-target="#modld" id="fffa">Save</button>
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
.'<a href="exam.php" class="alert-link"> Click Here.</a>
</div>';
unset($_SESSION['success']);

                           } if (isset($_SESSION['status'])&& ($_SESSION['status']) !='') {
                              echo ' <div class="alert alert-warning" role="alert"><strong>Hey Warning! </strong> '.$_SESSION['status'] 
.'<a href="exam.php" class="alert-link"> Click Here.</a>
</div>';
unset($_SESSION['status']);

                           }?>
                            <div class="table-responsive">
                              <?php
                               if (isset($_SESSION['ex_id']))  
                                         {

                                     $forIDD=($_SESSION['ex_id']);

                                     $query_select_exam = "SELECT exam_id, exam_title , exam_datetime , exam_create_on , exam_duration , total_question , mark_r_ans , mark_w_ans FROM exam WHERE examiner_exam_id =" . $forIDD ;

                                     $query_select_exam_run = mysqli_query($connection , $query_select_exam); 
                                    
                                }else {
                                  echo 'error';
                                }
                                  ?>
                                <table class="table table-bordered" id="dataTable11" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Exam Title</th>
                                            <th>Date and Time</th>
                                            <th>Duration (Min)</th>
                                            <th>Create Time</th>
                                            <th>Total Questions</th>
                                            <th>Right Answer Mark</th>
                                            <th>Wrong Answer Mark</th>
                                            <th><center>Action</center></th>
                                          

                                          </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>

                                             <th>Exam Title</th>
                                            <th>Date and Time</th>
                                            <th>Duration (Min)</th>
                                            <th>Create Time</th>
                                            <th>Total Questions</th>
                                            <th>Right Answer Mark</th>
                                            <th>Wrong Answer Mark</th>
                                            <th><center>Action</center></th>
                                            

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    
                                      <?php 
                                      if (mysqli_num_rows($query_select_exam_run)>0) {
                                         while ($row2 =mysqli_fetch_assoc($query_select_exam_run)) {
                                          ?>
                                           
                                       
                                        <tr>
                                            <td> <?php echo $row2['exam_title'] ?></td>
                                            <td><?php echo $row2['exam_datetime'] ?></td>
                                            <td><?php echo $row2['exam_duration'] ?></td>
                                            <td><?php echo $row2['exam_create_on'] ?></td>
                                            <td><?php echo $row2['total_question'] ?></td>
                                            <td><?php echo $row2['mark_r_ans'] ?></td>
                                            <td><?php echo $row2['mark_w_ans'] ?></td>

                                          
                                          
                                           <td> <form action="exam.php" method="POST"><center>
                                          <input type="hidden" name="classview" value="<?php echo $row2['exam_id']; ?>"><button type="button" style="margin-bottom: 10px;" class="btn btn-primary  btn-sm" data-dismiss="modal" name="viewbtn" data-toggle="modal" data-target="#addModalID"> Add Classes </button> </br>

                                          <a href="action.php?id=<?php echo $row2['exam_id']; ?>" type="button" class="btn btn-success btn-sm" style="margin-bottom:10px;">Add Question</a>
                                        
                                          <input type="hidden" name="examdlt" value="<?php echo $row2['exam_id']; ?>"><button type="submit" class="btn btn-danger  btn-sm" data-dismiss="modal" name="deletebtn_exam">Delete Exam </button></center></form></td>
                                          </tr>
                                          <form action="action.php" method="POST">
                                            <?php 
                                          $_SESSION['exmm_id']= $row2['exam_id'];
                                          ?>
                                            <?php 
                                             }
                                       } else{

                                        echo 'No data';
                                        
                                       }
                                             ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->



    

               <!-- add class Modal -->
    <div class="modal fade" id="addModalID" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       
    
      <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Add classes
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        <form action="exam.php" method="POST">

          <?php 

   if (isset($_SESSION['ex_id']))  
                                         {

                                     $forignID=($_SESSION['ex_id']);

            $dd_class = "SELECT * FROM class WHERE class_ex_id =" . $forignID;
                $dd_class_run = mysqli_query($connection,$dd_class); 
                
                
                  if(mysqli_num_rows($dd_class_run)>0){
                    foreach ($dd_class_run as $stlist ) {
                      ?>
                      <input type="checkbox" name="stdList[]" value="<?= $stlist['class_sub'];  ?> " />  <?= $stlist['class_sub'];?> </br>
                      <?php  
                    }
                    }
                    else {
                      echo'None';
                    }
                  }                     
   ?>
   <?php 



if (isset($_POST['save_class'])) {

  $stLt =$_POST['stdList'];
    if (isset($_SESSION['ex_id']))  
                                   { 
                                    $forigffnIDD=($_SESSION['ex_id']);

    $get_val = "SELECT exam_id FROM exam WHERE examiner_exam_id =" .$forigffnIDD ;
  $val_rst = mysqli_query($connection,$get_val);

  $clssID = mysqli_num_rows($val_rst);

    if ($clssID > 0 ) {
      while ($rw = mysqli_fetch_assoc($val_rst)){

        $xn = $rw['exam_id'];
      
    



    foreach($stLt as $stclss){


              $duup = mysqli_query($connection,"SELECT * FROM enroll_class WHERE enrollclass_exam_id= '$xn' AND class_title='$stclss' ");
if (mysqli_num_rows($duup)>0) {
  // if it is duplication print here
echo ' Already Existing data.';
} else {                     

    

   $query444 = "INSERT INTO enroll_class (enrollclass_exam_id,class_title) VALUES ('$xn','$stclss')";
       if(mysqli_query($connection,$query444))
   
    
    {
       echo 'Done';
        
    }
    else
    {
        echo 'Data Not Inserted';
   } } 
    }}
    
  }}
 } ?> 


     
</div>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="save_class">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- End add class Modal -->







<?php 
                if(isset($_POST['addANS'])){ 
                  header("location:http://localhost/Final-project/examiner/action.php");

                }
                ?>




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
<?php require_once 'C:\wamp64\www\Final-project\connection.php'; 

?>

 
   <!-- update exams-->


   <?php 
  if(isset($_POST['BtnUpdateExam'])){
  
  $upETitle = mysqli_real_escape_string($connection,$_POST['examTitle']);
  $upEDateTime = mysqli_real_escape_string($connection,$_POST['event_dtt']);
  $upEDuration = mysqli_real_escape_string($connection,$_POST['up_Duration']);
  $upETotalQuestion = mysqli_real_escape_string($connection,$_POST['tq']);
  $upEMarkRAns = mysqli_real_escape_string($connection,$_POST['ram']);
  $upEMarkWAns = mysqli_real_escape_string($connection,$_POST['wam']);

  
 
  if (isset($_SESSION['ex_id']))  
           {

$upfIDD=($_SESSION['ex_id']);

$forignIDD=($_SESSION['exmm_id']);

$up_exam = mysqli_query($connection,"UPDATE exam SET exam_title= '$upETitle' , exam_datetime= '$upEDateTime' , exam_duration='$upEDuration' , total_question='$upETotalQuestion' , mark_r_ans='$upEMarkRAns' , mark_w_ans= '$upEMarkWAns' WHERE examiner_exam_id='$upfIDD' AND exam_id='$forignIDD' ");


} 
}

?>


<!--Insert exams-->
<?php 
  if(isset($_POST['addEx']))
  {

    $QUST = mysqli_real_escape_string($connection,$_POST['question']); 
    $op1 = mysqli_real_escape_string($connection,$_POST['choice_A']); 
    $op2 = mysqli_real_escape_string($connection,$_POST['choice_B']); 
    $op3 = mysqli_real_escape_string($connection,$_POST['choice_C']); 
    $op4 = mysqli_real_escape_string($connection,$_POST['choice_D']); 
    $c_ANS = mysqli_real_escape_string($connection,$_POST['correctAnswer']); 

    if (isset($_SESSION['ex_id']))

    {
      $upfIDD=($_SESSION['ex_id']);

      $forigdnIDD=($_SESSION['exmm_id']);
                    
     


  $q866 = "INSERT INTO question (question_title, opt_one, opt_two , opt_three , opt_four , cor_answer , ans_exam_id ) VALUES ('{$QUST}','{$op1}','{$op2}' ,'{$op3}' ,'{$op4}' ,'{$c_ANS}','{$forigdnIDD}' )";

  if(mysqli_query($connection,$q866)){

    $_SESSION['success'] = ".  successfully.";

   }else {
  $_SESSION['status'] = $q8 ."Registered isn't successfully.";
} 
 }}

   
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

    

    
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div style="margin-left:20px;"> MANAGE EXAM
                            <div class="page-title-subheading">
                            <?php
                               if (isset($_SESSION['exmm_id']))  
                                         {

                                    $forignIDD=($_SESSION['exmm_id']);

                                     $q7 = "SELECT exam_id ,exam_title ,exam_datetime ,exam_duration ,total_question ,mark_r_ans , mark_w_ans ,examiner_exam_id FROM exam WHERE exam_id=" . $forignIDD ;

                                     $q7_run = mysqli_query($connection , $q7); 

                                  
                               
                                  ?>

                            <?php 
                                      if (mysqli_num_rows($q7_run)>0) {
                                       
                                         while ($row1 =mysqli_fetch_assoc($q7_run)) {
                                          ?>
                                           
                              Add Question for <strong> <?php  echo $row1['exam_title']; ?>
                                         </strong></div>
                        </div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-6">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                          </div>
                          <form action="action.php" method="POST" >
                          
                          <div class="form-group">
                                <label>Exam Title</label>
                                <input type="hidden" name="examId" value="<?php echo $row1['exam_id']; ?>">
                                <input type="" name="examTitle" class="form-control" required="" value="<?php echo $row1['exam_title']; ?>">
                              </div>  
                             
                          <div class="form-group"> 
                            <label >Date & Time</label> 
                            <input type="hidden" name="event_dtt" value="<?php echo $row1['exam_datetime']; ?>">          
                              <input type="datetime-local" name="event_dtt" class="form-control" value ="<?php $row1['exam_datetime']; ?>"> 
                            </div>


                            
                            <div class="form-group">
                                <label>Duration (Min)</label>
                                <select class="form-control" name="up_Duration" required="">
                                  <option value="<?php echo $row1['exam_duration']; ?>"><?php echo $row1['exam_duration']; ?> Minutes</option>
                                  <option value="5">5 Minutes</option>
                                  <option value="10">10 Minutes</option>
                                  <option value="15">15 Minutes</option>
                                  <option value="30">30 Minutes</option>
                                  <option value="60">60 Minutes</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Total Questions</label>
                                <select class="form-control" name="tq" required="">
                                  <option value="<?php echo $row1['total_question']; ?>"><?php echo $row1['total_question']; ?></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Right Answer Mark</label>
                                <select class="form-control" name="ram" required="">
                                  <option value="<?php echo $row1['mark_r_ans']; ?>"><?php echo $row1['mark_r_ans']; ?></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">5</option>
                                  <option value="4">10</option>
                                  <option value="5">20</option>
                                </select>
                              </div>



                              <div class="form-group">
                                <label>Wrong Answer Mark</label>
                                <select class="form-control" name="wam" required="">
                                  <option value="<?php echo $row1['mark_w_ans']; ?>"><?php echo $row1['mark_w_ans']; ?></option>
                                  <option value="-1">-1</option>
                                    <option value="-2">-2</option>
                                    <option value="-5">-5</option>
                                    <option value="-10">-10</option>
                                    <option value="-20">-20</option>
                                </select>
                              </div>

                              <div class="form-group" align="right">
                              <input type="hidden" name="exd_id" value="<?php echo $row1['exam_id']; ?>">
                                <button type="submit" name="BtnUpdateExam" class="btn btn-primary btn-lg">Update</button>
                              </div> 
                           </form>
                           

                           
                          </div>
                      </div>
                   
                      <div class="col-md-6">
                    <?php 
                   
                      
                                      
                        $selQuest = mysqli_query($connection,"SELECT * FROM question WHERE ans_exam_id= '$forignIDD' ORDER BY question_id desc ");
                   
                   ?>
                     <div class="main-card mb-3 card">
                          <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Question's 
                            <span class="badge badge-pill badge-primary ml-2">
                              <?php 
                               $forigdnIDD=($_SESSION['exmm_id']);
                              
          
                              
                               $selQuest = "SELECT * FROM question WHERE ans_exam_id= '$forigdnIDD' ORDER BY question_id desc ";
                                     
                              $selQuest_run = mysqli_query($connection , $selQuest);

                              $rws = mysqli_num_rows($selQuest_run); 

                              $exxId = mysqli_fetch_assoc($selQuest_run);
                              $_SESSION['q_id'] = $exxId['question_id'];
                            
                    

                              echo $rws ?>
                            </span>
                             <div class="btn-actions-pane-right">
                                <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddQuestion">Add Question</button>
                              </div>
                          </div>
                          <div class="card-body" >
                            <div class="scroll-area-sm" style="min-height: 400px;">
                               <div class="scrollbar-container">

                            <?php 
                               
                               if(mysqli_num_rows($selQuest_run) > 0)
                               {  ?>
                                 <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                                        <thead>
                                        <tr>
                                            <th class="text-left pl-1">Course Name</th>
                                            <th class="text-center" width="20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            
                                            if(mysqli_num_rows($selQuest_run) > 0)
                                            {
                                               $i = 1;
                                               while ($row122 =mysqli_fetch_assoc($selQuest_run))  { ?>
                                                <tr>
                                                        <td >
                                                            <b><?php echo $i++ ; ?> .) <?php echo $row122['question_title']; ?></b><br>
                                                            <?php 

                                                    if (isset($_SESSION['exmm_id'])){
                                                              // Choice A
                                                              if($row122['opt_one'] == $row122['cor_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">A - <?php echo  $row122['opt_one']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">A - <?php echo $row122['opt_one']; ?></span><br>
                                                              <?php }

                                                              // Choice B
                                                              if($row122['opt_two'] == $row122['cor_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">B - <?php echo $row122['opt_two']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">B - <?php echo $row122['opt_two']; ?></span><br>
                                                              <?php }

                                                              // Choice C
                                                              if($row122['opt_three'] == $row122['cor_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">C - <?php echo $row122['opt_three']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">C - <?php echo $row122['opt_three']; ?></span><br>
                                                              <?php }

                                                              // Choice D
                                                              if($row122['opt_four'] == $row122['cor_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">D - <?php echo $row122['opt_four']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">D - <?php echo $row122['opt_four']; ?></span><br>
                                                              <?php }}

                                                             ?>
                                                            
                                                        </td>
                                                       
                                                    </tr>
                                               <?php }
                                            }
                                            else
                                            { ?>
                                                <tr>
                                                  <td colspan="2">
                                                    <h3 class="p-3">No Course Found</h3>
                                                  </td>
                                                </tr>
                                            <?php }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                               <?php }
                               else
                               { ?>
                                  <h4 class="text-primary">No question found...</h4>
                                 <?php
                               }
                             ?>
                               </div>
                            </div>


                            <?php 
                                             }
                                       } else{

                                        echo $q7;
                                       }
                                        }else {
                                  echo 'errorrr';
                                }
                                             ?>
                          </div>
                        
                      </div>
                  </div>
              </div>  
            </div> 
            </div>
               
            </div>
      



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question for <br><?php echo $row1['exam_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestionFrm">
      <div class="modal-body">



        <div class="col-md-12">
          <div class="form-group">
            <label>Question</label>
            <input type="hidden" name="examId" value="<?php echo $row1['exam_id']; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Input question" autocomplete="off">
          </div>

          <fieldset>
            <legend>Input word for choice's</legend>
            <div class="form-group">
                <label>Choice A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input choice A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input choice B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input choice C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input choice D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Correct Answer</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Input correct answer" autocomplete="off">
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="addEx">Add Now</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>


 
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<?php $connection -> close(); ?>

<?php require_once 'C:\wamp64\www\Final-project\connection.php'; 

?>

<?php
                               if (isset($_SESSION['exmm_id']))  
                                         {

                                    $forignIDD=($_SESSION['exmm_id']);

                                     $q7 = "SELECT exam_id ,exam_title ,exam_datetime ,exam_duration ,total_question ,mark_r_ans , mark_w_ans ,examiner_exam_id FROM exam WHERE exam_id=" . $forignIDD ;

                                     $q7_run = mysqli_query($connection , $q7); 

                                  
                                         }
                                  ?>


<?php   
                   
                   
                   if (isset($_SESSION['exmm_id']))  
                   {

              $forignIDD=($_SESSION['exmm_id']);

               $q79 = "SELECT exam_id ,exam_title ,exam_datetime ,exam_duration ,total_question ,mark_r_ans , mark_w_ans ,examiner_exam_id FROM exam WHERE exam_id='$forignIDD' AND status=0 " ;

               $q79_run = mysqli_query($connection , $q79); 

            
                   }

?>
<?php   

if(isset($_POST['Take_btn'])) {


    if (isset($_SESSION['exmm_id']))  
    {

$forignIDD=($_SESSION['exmm_id']);


$update_status = mysqli_query($connection,"UPDATE exam SET status=1 ");

header ("location: http://localhost/Final-project/examiner/enroll_exam.php");
}
}

?>

<?php   
                   
                   
                   if (isset($_SESSION['exmm_id']))  
                   {

              $forignIDD=($_SESSION['exmm_id']);

               $q80 = "SELECT exam_id ,exam_title ,exam_datetime ,exam_duration ,total_question ,mark_r_ans , mark_w_ans ,examiner_exam_id FROM exam WHERE exam_id='$forignIDD' AND status=1 " ;

               $q80_run = mysqli_query($connection , $q80); 

            
                   }
?>

<?php

                               if (isset($_SESSION['exmm_id']))  
                                         {

                                    $forignIDD=($_SESSION['exmm_id']);

                                     $q74 = "SELECT * FROM question WHERE ans_exam_id=" . $forignIDD ;

                                     $q74_run = mysqli_query($connection , $q74); 

                                  
                                         }
                                  ?>




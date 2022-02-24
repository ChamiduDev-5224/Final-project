
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

                                     $q74 = "SELECT question.question_id , question.question_title , question.opt_one , question.opt_two , question.opt_three , question.opt_four , question.cor_answer , question.ans_exam_id , exam.total_question , exam.exam_id , exam.exam_title , exam.mark_r_ans , exam.mark_w_ans  FROM question LEFT JOIN exam ON  question.ans_exam_id  = exam.exam_id WHERE exam.exam_id=" . $forignIDD ;
                             

                                     $q74_run = mysqli_query($connection , $q74); 
                                   
                                  
                                         }
                                        
                                          
                                

?>
 
 

 <?php 
 
 
    if(isset($_POST['answer_submit'])){


            $val_get = mysqli_real_escape_string($connection,$_POST['tq']);

            
            if (isset($_SESSION['exmm_id']))  
            { 
                if (isset($_SESSION['exmm_id']))  
            {

                  
       $forignIDD=($_SESSION['exmm_id']);
                   
                $fordd= ($_SESSION['qd_id']);



  $q_in_ans = "INSERT INTO answer (stu_ans, an_question_id , an_stu_id  , an_exam_id ) VALUES ('{$val_get}','{$fordd}','{$std}' ,'{$forignIDD}' )";

  if(mysqli_query($connection,$q_in_ans)){
    
    echo "done";


  }
    }
}
else {}
}
 
 
 ?>
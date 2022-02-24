
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

    <title>Result Sheet</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/animation.css" rel="stylesheet">
    
 

</head>

<body id="page-top">

<?php include 'stuSideNav.php';?>
 
<!--box shadow-->
<div class="p-5 text-center bg-light shadow-lg p-3 mb-5 bg-white rounded" id="b-box"style="height:auto;">

<h1>Result Sheet</h1>
                  
<div class="card shadow mb-4" style="padding:1px;">
                     
        
                     <div class="card-body">
                         <div class="table-responsive">
                          
                             <table class="table table-bordered" id="dataTable11" width="100%" cellspacing="0">
                                 <thead>
                                     <tr>
                                                          
                                    
                                         <th><center>Question</center></th>
                                         <th><center>Given Answer</center></th>
                                         <th><center>Correct Answer</center></th>
                                        
                                         
                                     </tr>
                                 </thead>
                                 <tfoot>
                                     <tr>
                                        
                                           
                                        <th><center>Question</center></th>
                                         <th><center>Given Answer</center></th>
                                         <th><center>Correct Answer</center></th>
                                        
                                     </tr>
                                 </tfoot>
                                 <tbody>
                                 <?php
                                 if (mysqli_num_rows($q74_run)>0) {
                                       
                                       while ($row1 =mysqli_fetch_assoc($q74_run)) {
                                         
                                        $qIid = mysqli_fetch_assoc($q74_run);
                                        $_SESSION['qd_id'] = $qIid['question_id'];
                                     

                                        ?>
                                     
                                  
                                     <tr>
                                         <td> <?php echo $row1['question_title'] ;?></td>
                                     
                                         
                           
                           
                                     

        
          <td> <center>
<?php


 echo $row1['mark_r_ans'];

 
   
?> </center></td>
       
       <td> <center> <?php echo $row1['cor_answer']; ?> </center> </td>                            
            
            <?php 
                                          }
                                    } else{

                                     echo 'NOT FOUND';
                                    }
                                          ?>
                                 </tbody>
                             </table>
                            
                         </div>
                     </div>
                 </div>
                
           

            </div>  
            
             <!-- /.container-fluid -->
    
</body>
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

  
</html>
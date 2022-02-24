
<?php require_once 'C:\wamp64\www\Final-project\connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Examiner- Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/animation.css" rel="stylesheet">
    
 <?php if (isset($_SESSION['ex_fname']))  
                                         {


                                } else {
                                   

                                    header("location:http://localhost/Final-project/examiner/404%20err.php");

                                }

                                ?>

</head>

<body id="page-top">

   <?php include 'sidenav.php';?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- student card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                REGISTERED STUDENT</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                               if (isset($_SESSION['ex_id']))  
                                         {

                                     $CARDID=($_SESSION['ex_id']);

                                     $q44 = "SELECT stu_id FROM student WHERE stu_examiner_id=" . $CARDID;

                                     $q44_run = mysqli_query($connection , $q44);

                                     $rw = mysqli_num_rows($q44_run); 
                                    echo '<h1>'.$rw .' </h1>';
                                }else {
                                  
                                }?></div> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Classes Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                TOTAL CLASSES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                               if (isset($_SESSION['ex_id']))  
                                         {

                                     $CARDClass=($_SESSION['ex_id']);

                                     $q55 = "SELECT class_id FROM class WHERE class_ex_id=" . $CARDClass;

                                     $q55_run = mysqli_query($connection , $q55);

                                     $rwd = mysqli_num_rows($q55_run); 
                                    echo '<h1>'.$rwd .' </h1>';
                                }else {
                                  
                                }?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- EXams Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">EXAMS
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                                    <?php
                               if (isset($_SESSION['ex_id']))  
                                         {

                                     $CardExam=($_SESSION['ex_id']);

                                     $q56 = "SELECT exam_id FROM exam WHERE examiner_exam_id=" . $CardExam;

                                     $q56_run = mysqli_query($connection , $q56);

                                     $rwdM = mysqli_num_rows($q56_run); 
                                    echo '<h1>'.$rwdM .' </h1>';
                                }else {
                                  
                                }?>


                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                PENDING REQUESTS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
        
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
        <?php include 'footer.php';?>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
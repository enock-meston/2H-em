<?php
session_start();
include 'include/config.php';
error_reporting(0);
if (strlen($_SESSION['admin_id']) == 0) {
    header('location: idex.php');
} else {

        // restore product forev
if ($_GET['res']) {
    $idi = $_GET['res'];
    $status0 =1;
    $updateRem = mysqli_query($con,"UPDATE `producttbl` SET `status`='$status0' WHERE pid ='$idi'");
    if ($updateRem) {
        $msg ="Post Restored now";
    } else {
        $error = "Problem in Query";
    }
    
}


if ($_GET['forev']) {
    $idi = $_GET['forev'];
    $status0 =1;
    $updateRem = mysqli_query($con,"DELETE FROM `producttbl` WHERE pid ='$idi'");
    if ($updateRem) {
        $msg ="Post deleted Forever";
    } else {
        $error = "Problem in Query";
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

    <title>product List</title>

    <!-- Custom fonts for this template-->
    <link href="plugins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="plugins/css/sb-admin-2.css" rel="stylesheet">
    <link rel="shortcut icon" href="plugins/img/logo.png" type="image/x-icon">
    <link href="plugins/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 
            include 'include/sidebar.php';
       ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <?php 
                        include 'include/topbar.php'
                   ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">

                    </div>
                    <hr>
                    

                    <!-- message block -->
                    <div class="col-sm-12">
                        <!---Success Message--->
                        <?php if ($msg) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                        </div>
                        <?php } ?>

                        <!---Error Message--->
                        <?php if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <!--ends of message block -->

                    <!-- product list -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Deleted product</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>N0</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>N0</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $query = mysqli_query($con,"SELECT * FROM `producttbl` WHERE status=0");
                                            if (mysqli_num_rows($query)<=0) {
                                                ?>
                                        <h1 style="color: red;">No data Founds !</h1>
                                        <?php
                                            } else {
                                              
                                            $number=1;
                                                while ($row1 = mysqli_fetch_array($query)) {
                                                     
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $number;?></td>
                                            <td><?php echo $row1['PostTitle'];?></td>
                                            <td><?php echo $row1['prodPrice'];?></td>
                                            <td><?php echo $row1['date'];?></td>
                                            <td>
                                                <a href="trash-post.php?res=<?php echo $row1['pid'];?>" class="btn btn-success btn-sm">Restore</a>
                                                <a href="trash-post.php?forev=<?php echo $row1['pid'];?>" class="btn btn-danger btn-sm">Delete Forever</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <?php
                                       $number+=1;
                                                }

                                            }
                                       ?>
                                </table>
                            </div>
                        </div>
                        <!-- ends of tables -->

                    </div>
                    <!-- end od product list -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php 
                include 'include/footer.php';
           ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="plugins/vendor/jquery/jquery.min.js"></script>
    <script src="plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="plugins/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="plugins/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="plugins/js/demo/chart-area-demo.js"></script>
    <script src="plugins/js/demo/chart-pie-demo.js"></script>


    <!-- Page level plugins -->
    <script src="plugins/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="plugins/js/demo/datatables-demo.js"></script>
</body>

</html>

<?php 
   } 
?>
<?php
session_start();
include 'include/config.php';
error_reporting(0);
if (strlen($_SESSION['admin_id']) == 0) {
    header('location: idex.php');
} else {

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Messages</title>

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
                            <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>N0</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            $query = mysqli_query($con,"SELECT * FROM `messages`");
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
                                            <td><?php echo $row1['name'];?></td>
                                            <td><?php echo $row1['email'];?></td>
                                            <td><?php echo $row1['subject'];?></td>
                                            <td><?php echo $row1['message'];?></td>
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

    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Form</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- transaction viewing Table -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- form of adding Categories -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Title</label>
                                    <input type="text" class="form-control" name="prodTilte" placeholder="Enter Product title">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Price</label>
                                    <input type="number" class="form-control" name="prodPrice" placeholder="Enter Product Price">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"> product Details</label>
                                    <textarea class="form-control " required name="ProDetails"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Thumbnail Image
                                        <sub style="color: red;">Image Must Have Width of 850 pixel AND Heigth of 530 pixel</sub> </label>
                                    <input type="file" class="form-control" name="my_image" required accept=".png,.jpg">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Save" name="addPro">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end of table -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


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
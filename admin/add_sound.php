<?php
session_start();
include('../Controller/dbController.php');
$db_handle = new DBController();

if (isset($_POST['submit'])) {
    $code = $db_handle->checkValue($_POST['sound_name']);

    $sound = '';
    if (!empty($_FILES['sound']['name'])) {
        $file_name = $_FILES['sound']['name'];
        $file_size = $_FILES['sound']['size'];
        $file_tmp = $_FILES['sound']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        move_uploaded_file($file_tmp, "../assets/audio/" . $file_name);
        $sound = "assets/audio/" . $file_name;

    }

    $inserted_at = date("Y-m-d H:i:s");

    $insert_user = $db_handle->insertQuery("INSERT INTO `sound_list`( `code`, `sound_name`) VALUES ('$code','$sound')");

    if ($insert_user) {
        ?>
        <script>
            alert('Class Added');
            window.location.href = "add_sound.php";
        </script>
        <?php
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

    <title>Add Class - Survey Portal</title>

    <?php require_once 'include/css.php'; ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require_once 'include/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require_once 'include/topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Add Class</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Class</h6>
                        <p class="text-danger">NB: If you mismatch class name and sound name full system will
                            interrupt. </p>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Class Name</label>
                                            <input type="text" class="form-control" name="sound_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Sound</label>
                                            <div class="input-group mb-3">
                                                <label class="input-group-text">Upload</label>
                                                <input type="file" class="form-control" name="sound" accept=".wav"
                                                       required>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary mt-3">Add Class
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php require_once 'include/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/js.php'; ?>

</body>

</html>

<?php
session_start();
include('../include/dbController.php');
$db_handle = new DBController();

if (isset($_POST['submit'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $activities_name = $db_handle->checkValue($_POST['activities_name']);

    $sound = '';
    if (!empty($_FILES['sound']['name'])) {
        $file_name = $_FILES['sound']['name'];
        $file_size = $_FILES['sound']['size'];
        $file_tmp = $_FILES['sound']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        move_uploaded_file($file_tmp, "../assets/audio/" . $file_name);
        $sound = "assets/audio/" . $file_name;

    }

    if($sound!=''){
        $insert_user = $db_handle->insertQuery("UPDATE `sound_list` SET `name`='$activities_name',`sound_name`='$sound' WHERE id={$id}");
    }else{
        $insert_user = $db_handle->insertQuery("UPDATE `extra_activities` SET `name`='$activities_name' WHERE id={$id}");
    }


    if ($insert_user) {
        ?>
        <script>
            alert('Activities Updated');
            window.location.href = "activities.php";
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

    <title>Extra activities List - Survey Portal</title>

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


                <!-- DataTales Example -->
                <?php
                if (isset($_GET['activities_id'])) {

                    $data = $db_handle->runQuery("SELECT * FROM extra_activities where id={$_GET['activities_id']}");

                    ?>
                    <h1 class="h3 mb-2 text-gray-800">Edit activities Data</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Activities Name</label>
                                                <input type="text" class="form-control" name="activities_name" value="<?php echo $data[0]['name']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Sound</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Upload</label>
                                                    <input type="file" class="form-control" name="sound" accept=".wav"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <audio controls>
                                                    <source src="../<?php echo $data[0]['sound_name']; ?>"
                                                            type="audio/wav">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </div>
                                            <input type="hidden" value="<?php echo $data[0]['id']; ?>" name="id" required/>
                                            <button type="submit" name="submit" class="btn btn-primary mt-3">Update Activities
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <h1 class="h3 mb-2 text-gray-800">Extra activities Data</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Extra activities</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Extra activities Name</th>
                                        <th class="text-center">Sound</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Extra activities Name</th>
                                        <th class="text-center">Sound</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $data = $db_handle->runQuery("SELECT * FROM extra_activities order by id asc");
                                    $row_count = $db_handle->numRows("SELECT * FROM extra_activities order by id asc");
                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]["name"]; ?></td>
                                            <td class="text-center">
                                                <audio controls>
                                                    <source src="../<?php echo $data[$i]["sound_name"]; ?>"
                                                            type="audio/wav">
                                                    Your browser does not support the audio element.
                                                </audio>
                                            </td>
                                            <td class="text-center">
                                                <a href="activities.php?activities_id=<?php echo $data[$i]["id"]; ?>"
                                                   class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


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

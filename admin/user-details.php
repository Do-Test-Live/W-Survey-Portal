<?php
session_start();
include('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (isset($_POST['submit'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $contact_number = $db_handle->checkValue($_POST['contact_number']);
    $password = $db_handle->checkValue($_POST['password']);


    $insert_user = $db_handle->insertQuery("UPDATE `user` SET `name`='$name',`email`='$email',`contact_number`='$contact_number',`password`='$password' WHERE id={$id}");


    if ($insert_user) {
        ?>
        <script>
            alert('User Details Updated');
            window.location.href = "user-details.php";
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

    <title>User List - Survey Portal</title>

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
                if (isset($_GET['user_id'])) {

                    $data = $db_handle->runQuery("SELECT * FROM user where id={$_GET['user_id']}");

                    ?>
                    <h1 class="h3 mb-2 text-gray-800">Edit user Data</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name"
                                                       value="<?php echo $data[0]['name']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email"
                                                       value="<?php echo $data[0]['email']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Option 2</label>
                                                <input type="text" class="form-control" name="contact_number"
                                                       value="<?php echo $data[0]['contact_number']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Option 3</label>
                                                <input type="text" class="form-control" name="password"
                                                       value="<?php echo $data[0]['password']; ?>" required>
                                            </div>
                                            <input type="hidden" value="<?php echo $data[0]['id']; ?>" name="id"
                                                   required/>
                                            <button type="submit" name="submit" class="btn btn-primary mt-3">Update
                                                User
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
                    <h1 class="h3 mb-2 text-gray-800">User Data</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Password</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Password</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM user order by id";
                                    $data = $db_handle->runQuery($query);
                                    $row_count = $db_handle->numRows($query);
                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]["name"]; ?></td>
                                            <td><?php echo $data[$i]["email"]; ?></td>
                                            <td><?php echo $data[$i]["contact_number"]; ?></td>
                                            <td><?php echo $data[$i]["password"]; ?></td>
                                            <td class="text-center">
                                                <a href="user-details.php?user_id=<?php echo $data[$i]["id"]; ?>"
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

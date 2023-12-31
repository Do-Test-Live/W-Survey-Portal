<?php
session_start();
include('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (isset($_POST['submit'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $question = $db_handle->checkValue($_POST['question']);
    $option_1 = $db_handle->checkValue($_POST['option_1']);
    $option_2 = $db_handle->checkValue($_POST['option_2']);
    $option_3 = $db_handle->checkValue($_POST['option_3']);


    $insert_user = $db_handle->insertQuery("UPDATE `question` SET `question`='$question',`option_1`='$option_1',`option_2`='$option_2',`option_3`='$option_3' WHERE id={$id}");


    if ($insert_user) {
        ?>
        <script>
            alert('Survey Question Updated');
            window.location.href = "survey-question.php";
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

    <title>Survey Question List - Survey Portal</title>

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
                if (isset($_GET['question_id'])) {

                    $data = $db_handle->runQuery("SELECT * FROM question where id={$_GET['question_id']}");

                    ?>
                    <h1 class="h3 mb-2 text-gray-800">Edit question Data</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Question</label>
                                                <input type="text" class="form-control" name="question"
                                                       value="<?php echo $data[0]['question']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Option 1</label>
                                                <input type="text" class="form-control" name="option_1"
                                                       value="<?php echo $data[0]['option_1']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Option 2</label>
                                                <input type="text" class="form-control" name="option_2"
                                                       value="<?php echo $data[0]['option_2']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Option 3</label>
                                                <input type="text" class="form-control" name="option_3"
                                                       value="<?php echo $data[0]['option_3']; ?>" required>
                                            </div>
                                            <input type="hidden" value="<?php echo $data[0]['id']; ?>" name="id"
                                                   required/>
                                            <button type="submit" name="submit" class="btn btn-primary mt-3">Update
                                                Question
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
                    <h1 class="h3 mb-2 text-gray-800">Survey Question Data</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Survey Questions</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Question</th>
                                        <th>Option 1</th>
                                        <th>Option 2</th>
                                        <th>Option 3</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Question</th>
                                        <th>Option 1</th>
                                        <th>Option 2</th>
                                        <th>Option 3</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM question order by id";
                                    $data = $db_handle->runQuery($query);
                                    $row_count = $db_handle->numRows($query);
                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]["question"]; ?></td>
                                            <td><?php echo $data[$i]["option_1"]; ?></td>
                                            <td><?php echo $data[$i]["option_2"]; ?></td>
                                            <td><?php echo $data[$i]["option_3"]; ?></td>
                                            <td class="text-center">
                                                <a href="survey-question.php?question_id=<?php echo $data[$i]["id"]; ?>"
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

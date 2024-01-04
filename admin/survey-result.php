<?php
session_start();
include('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Survey Result List - Survey Portal</title>

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
                <h1 class="h3 mb-2 text-gray-800">Survey Result Data</h1>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Survey Results</h6>
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
                                    <th>Survey taken Date</th>
                                    <th>Survey Start</th>
                                    <th>Survey End</th>
                                    <th class="text-center">View</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Survey taken Date</th>
                                    <th>Survey Start</th>
                                    <th>Survey End</th>
                                    <th class="text-center">View</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $query = "SELECT * FROM survey_result order by id";
                                $data = $db_handle->runQuery($query);
                                $row_count = $db_handle->numRows($query);
                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $data[$i]["name"]; ?></td>
                                        <td><?php echo $data[$i]["email"]; ?></td>
                                        <td><?php echo $data[$i]["contact_number"]; ?></td>
                                        <td><?php echo $data[$i]["survey_taken_date"]; ?></td>
                                        <td><?php echo $data[$i]["survey_start"]; ?></td>
                                        <td><?php echo $data[$i]["survey_end"]; ?></td>
                                        <td class="text-center">
                                            <button onclick="showAnswer(<?php echo $data[$i]["id"]; ?>);"
                                                    class="btn btn-info" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg">View
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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


<!-- Result Modal-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="surveyInfo">Answers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center" style="width: 100%">
                        <thead>
                        <tr>
                            <td>
                                SL
                            </td>
                            <td>
                                Question
                            </td>
                            <td>
                                Answer
                            </td>
                        </tr>
                        </thead>
                        <tbody id="result">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/js.php'; ?>


<script>
    async function showAnswer(id) {
        $.ajax({
            type: "POST",
            url: "view-answers.php",
            data: {survey_id: id},
            success:async function(msg){
                $("#result").html(msg)
            },
            error: function(){
                alert("failure");
            }
        });
    }
</script>
</body>

</html>

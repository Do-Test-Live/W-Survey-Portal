<?php
session_start();
include('../Controller/dbController.php');
$db_handle = new DBController();
$delete = $db_handle->insertQuery("TRUNCATE TABLE `sound`");
date_default_timezone_set("Asia/Hong_Kong");
$inserted_at = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$insert = $db_handle->insertQuery("INSERT INTO `user`(`ip`,  `inserted_at`) VALUES ('$ip','$inserted_at')");
$data = $db_handle->runQuery("SELECT * FROM user order by id desc");
$_SESSION['user_id'] = $data[0]['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Survey Portal</title>

    <?php require_once 'include/css.php'; ?>
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
        .modal-fullscreen {
            width: 100vw;
            max-width: none;
            height: 100%;
            margin: 0
        }

        .modal-fullscreen .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0
        }

        .modal-fullscreen .modal-footer, .modal-fullscreen .modal-header {
            border-radius: 0
        }

        .modal-fullscreen .modal-body {
            overflow-y: auto
        }
    </style>
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

            <section>
                <div class="container-fluid">
                    <div class="row mt-lg-5 mt-3 ps-2">
                        <div class="col-lg-3 ps-4 text-lg-start text-center mb-3">
                            <img alt="" class="img-fluid" src="assets/images/logo.png"/>
                        </div>
                        <div class="col-lg-6 text-center mb-3">
                            <h1 class="hkta-dark hkta-title">
                                Survey Portal
                            </h1>
                            <h3 class="hkta-primary-text hkta-title-description">
                                Dismiss System
                            </h3>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <h4 class="text-lg-end text-center mt-lg-4 mt-0 hkta-title-date pe-lg-4" id="datetime">
                                2023/03/06(XXX) 07:30
                            </h4>

                            <script>
                                function displayHongKongDateTime() {
                                    // Create a new Date object
                                    let date = new Date();

                                    // Define the options for formatting the date and time
                                    let options = {
                                        timeZone: 'Asia/Hong_Kong',
                                        day: 'numeric',
                                        month: 'numeric',
                                        year: 'numeric',
                                        hour: 'numeric',
                                        minute: 'numeric',
                                        hour12: true, // Use 12-hour format
                                        weekday: 'long'
                                    };

                                    // Format the date and time according to the options
                                    let hongKongDateTime = date.toLocaleString('en-US', options);

                                    // Get the div element
                                    let div = document.getElementById('datetime');

                                    // Update the content of the div with the Hong Kong date and time
                                    div.textContent = hongKongDateTime;
                                }

                                // Call the displayHongKongDateTime function initially
                                displayHongKongDateTime();

                                // Update the date and time every second
                                setInterval(displayHongKongDateTime, 1000);
                            </script>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row text-center">
                        <?php
                        $query = "SELECT * FROM sound_list order by id asc";
                        $sound_data = $db_handle->runQuery($query);
                        $sound_row = $db_handle->numRows($query);

                        $total = (int)($sound_row / 4);
                        for ($i = 0; $i < $total; $i++) {
                            $j = $i * 4;
                            ?>
                            <div class="col-lg-6">
                                <div class="row">
                                    <?php
                                    if (isset($sound_data[$j]['code'])) {
                                        ?>
                                        <div class="col-xl-3 col-md-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-primary-btn"
                                                    id="<?php echo $sound_data[$j]['code']; ?>"
                                                    type="button"><?php echo $sound_data[$j]['code']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($sound_data[$j + 1]['code'])) {
                                        ?>
                                        <div class="col-xl-3 col-md-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-primary-btn"
                                                    id="<?php echo $sound_data[$j + 1]['code']; ?>"
                                                    type="button"><?php echo $sound_data[$j + 1]['code']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($sound_data[$j + 2]['code'])) {
                                        ?>
                                        <div class="col-xl-3 col-md-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-primary-btn"
                                                    id="<?php echo $sound_data[$j + 2]['code']; ?>"
                                                    type="button"><?php echo $sound_data[$j + 2]['code']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($sound_data[$j + 3]['code'])) {
                                        ?>
                                        <div class="col-xl-3 col-md-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-primary-btn"
                                                    id="<?php echo $sound_data[$j + 3]['code']; ?>"
                                                    type="button"><?php echo $sound_data[$j + 3]['code']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </section>

            <section>
                <div class="container-fluid">

                    <?php
                    $query = "SELECT * FROM extra_activities order by id asc";
                    $activities_data = $db_handle->runQuery($query);
                    $activities_row = $db_handle->numRows($query);

                    $total = (int)($activities_row / 7);
                    for ($i = 0; $i < $total; $i++) {
                        $j = $i * 7;
                        ?>
                        <div class="row text-center">
                            <div class="col-lg-7 ps-lg-3">
                                <div class="row">
                                    <?php
                                    if (isset($activities_data[$j]['name'])) {
                                        ?>
                                        <div class="col-xl-3 col-lg-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-dark-btn"
                                                    id="EC<?php echo $activities_data[$j]['id']; ?>" type="button"><?php echo $activities_data[$j]['name']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($activities_data[$j + 1]['name'])) {
                                        ?>
                                        <div class="col-xl-3 col-lg-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-dark-btn"
                                                    id="EC<?php echo $activities_data[$j]['id']; ?>" type="button"><?php echo $activities_data[$j + 1]['name']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($activities_data[$j + 2]['name'])) {
                                        ?>
                                        <div class="col-xl-3 col-lg-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-dark-btn"
                                                    id="EC<?php echo $activities_data[$j]['id']; ?>" type="button"><?php echo $activities_data[$j + 2]['name']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($activities_data[$j + 3]['name'])) {
                                        ?>
                                        <div class="col-xl-3 col-lg-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-dark-btn"
                                                    id="EC<?php echo $activities_data[$j]['id']; ?>" type="button"><?php echo $activities_data[$j + 3]['name']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-5 pe-lg-4">
                                <div class="row">
                                    <?php
                                    if (isset($activities_data[$j + 4]['name'])) {
                                        ?>
                                        <div class="col-xl-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-dark-btn"
                                                    id="EC<?php echo $activities_data[$j]['id']; ?>" type="button"><?php echo $activities_data[$j + 4]['name']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($activities_data[$j + 5]['name'])) {
                                        ?>
                                        <div class="col-xl-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-dark-btn"
                                                    id="EC<?php echo $activities_data[$j]['id']; ?>" type="button"><?php echo $activities_data[$j + 5]['name']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    if (isset($activities_data[$j + 6]['name'])) {
                                        ?>
                                        <div class="col-xl-4 col-6 mb-4">
                                            <button class="btn btn-primary hkta-dark-btn"
                                                    id="EC<?php echo $activities_data[$j]['id']; ?>" type="button"><?php echo $activities_data[$j + 6]['name']; ?></button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </section>

            <section>
                <div class="container-fluid mt-3 mb-3">
                    <div class="row ps-lg-2 pe-lg-2">
                        <div class="col-6 text-start ps-lg-4">
                            <h3 class="pt-4"></h3>
                        </div>
                        <div class="col-6 text-lg-right pe-lg-4">
                            <button class="btn btn-primary hkta-reset-btn" id="reset" onclick="reset();" type="button">Reset
                            </button>
                        </div>
                    </div>
                </div>
            </section>

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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="text-center d-flex justify-content-center align-items-center" id="classTitle" style="height: 95vh;font-size: calc(5rem + 1.5vw);">
                    MAS1
                </h1>
            </div>
        </div>
    </div>
</div>

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
<script>
    $(document).ready(function () {
        //to disable the entire page
        $("body").on("contextmenu", function (e) {
            return false;
        });

        $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        });

        document.addEventListener('contextmenu', event => event.preventDefault());

        document.onkeydown = function (e) {

            // disable F12 key
            if (e.keyCode == 123) {
                return false;
            }

            // disable I key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                return false;
            }

            // disable J key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                return false;
            }

            // disable U key
            if (e.ctrlKey && e.keyCode == 85) {
                return false;
            }
        }
    });

    const buttons = document.querySelectorAll(".hkta-primary-btn");
    const eca = document.querySelectorAll(".hkta-dark-btn");

    eca.forEach(button => {
        button.addEventListener("click", () => {
            let audio = new Audio('../assets/audio/' + button.id + '.wav');
            audio.play();

            if (button.id != 'reset') {
                button.disabled = true;
            }

            sound(button.id);
        });
    });

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            let audio = new Audio('../assets/audio/' + button.id + '.wav');
            audio.play();

            if (button.id != 'reset') {
                button.disabled = true;
            }

            sound(button.id);
        });
    });

    function reset() {
        buttons.forEach(button => {
            button.disabled = false;
            resetSound();
        });
    }

    async function sound(sound_name) {
        $.ajax({
            type: "POST",
            url: "insertSound.php",
            data: {sound_name: sound_name},
            success: async function (msg) {
                $('#staticBackdrop').modal('show');
                document.getElementById('classTitle').innerHTML=sound_name;

                setInterval(function () {
                    $('#staticBackdrop').modal('hide');
                }, 2000);
            },
            error: function () {

            }
        });
    }

    async function resetSound() {
        $.ajax({
            type: "POST",
            url: "insertSound.php",
            data: {reset: 1},
            success: async function (msg) {

            },
            error: function () {

            }
        });
    }

    setInterval(playSound, 1000);

    let soundCall = [];

    async function playSound() {

        $.ajax({
            type: "POST",
            url: "insertSound.php",
            data: {play_sound: 1},
            success: async function (msg) {

                if (msg != 'reset') {

                    console.log(msg);

                    let audioSplit = msg.match(/.{1,4}/g);

                    for (let i = 0; i < audioSplit.length; i++) {

                        soundCall.push(audioSplit[i]);

                        let l=0;

                        soundCall.forEach((element) => {
                            if(element==audioSplit[i]){
                                l=1;
                            }
                        });

                        if(l==0){
                            $('#staticBackdrop').modal('show');
                            document.getElementById('classTitle').innerHTML=audioSplit[i];

                            setInterval(function () {
                                $('#staticBackdrop').modal('hide');
                            }, 2000);
                        }

                        let audio = new Audio('../assets/audio/' + audioSplit[i] + '.wav');
                        audio.play();

                        document.getElementById(audioSplit[i]).disabled = true;
                    }
                } else {

                }

            },
            error: function () {

            }
        });
    }

</script>

</body>

</html>

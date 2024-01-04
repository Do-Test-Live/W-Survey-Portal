<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="Survey Portal">
    <meta name="author" content="frogbid">
    <title>Survey Portal</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&amp;display=swap"
          rel="stylesheet">

    <!-- BASE CSS -->
    <link href="layerslider/css/layerslider.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
    <link href="css/magnific-popup.min.css" rel="stylesheet">
    <link href="css/skins/square/yellow.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

<div id="loader_form">
    <div data-loader="circle-side-2"></div>
</div><!-- /Loader_form -->

<header>
    <div id="logo_home">
        <h1><a href="index.html" title="Survey">Survey Portal</a></h1>
    </div>

    <a id="menu-button-mobile" class="cmn-toggle-switch cmn-toggle-switch__htx" href="javascript:void(0);"><span>Menu mobile</span></a>
    <nav class="main_nav">
        <ul class="nav nav-tabs">
            <li><a href="#tab_1" data-bs-toggle="tab">Request a Survey</a></li>
            <li><a href="#tab_2" data-bs-toggle="tab">About</a></li>
            <li><a href="#tab_3" data-bs-toggle="tab">Contact</a></li>
            <?php if (isset($_SESSION['userid'])) {
                ?>
                <li><a href="logout">Logout</a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
</header><!-- /header -->

<div id="layerslider" class="fullsize" style="width:1200px;height:100vh;">
    <!-- First slide -->
    <div class="ls-slide" data-ls="duration: 8000; transition2d: 5;bgsize:cover;bgposition:50% 50%;kenburnszoom:in;">
        <img src="img/slides/slide_1.jpg" class="ls-bg" alt="Slide background">
        <p style="font-size:72px; color:#fff;top:46%; left:0px;line-height:1;text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.60); padding-left:50px; letter-spacing:-1px;"
           class="ls-l sliderleft"
           data-ls="offsetxin:-100;durationin:2000;delayin:800;offsetxout:-100;durationout:1000;"><strong>SURVEY
                PORTAL</strong></p>
        <p style="font-size:52px; color:#fff;top:55%; left:0px;line-height:1;text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.60); padding-left:50px; letter-spacing:-1px;"
           class="ls-l sliderleft"
           data-ls="offsetxin:-100;durationin:2000;delayin:1500;offsetxout:-100;durationout:1000;">for every type of
            companies</p>
    </div>

    <!-- Second slide -->
    <div class="ls-slide" data-ls="duration: 8000; transition2d: 5;bgsize:cover;bgposition:50% 50%;kenburnszoom:in;">
        <img src="img/slides/slide_2.jpg" class="ls-bg" alt="Slide background">
        <p style="font-size:72px; color:#fff;top:46%; left:0px;line-height:1;text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.60); padding-left:50px; letter-spacing:-1px;"
           class="ls-l sliderleft"
           data-ls="offsetxin:-100;durationin:2000;delayin:800;offsetxout:-100;durationout:1000;"><strong>SURVEY
                PORTAL</strong>
        </p>
        <p style="font-size:52px; color:#fff;top:55%; left:0px;line-height:1;text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.60); padding-left:50px; letter-spacing:-1px;"
           class="ls-l sliderleft"
           data-ls="offsetxin:-100;durationin:2000;delayin:1500;offsetxout:-100;durationout:1000;">new customers and
            contacts</p>
    </div>

    <!-- Third slide -->
    <div class="ls-slide" data-ls="duration: 8000; transition2d: 5;bgsize:cover;bgposition:50% 50%;kenburnszoom:in;">
        <img src="img/slides/slide_3.jpg" class="ls-bg" alt="Slide background">
        <p style="font-size:72px; color:#fff;top:46%; left:0px;line-height:1;text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.60); padding-left:50px; letter-spacing:-1px;"
           class="ls-l sliderleft"
           data-ls="offsetxin:-100;durationin:2000;delayin:800;offsetxout:-100;durationout:1000;"><strong>SURVEY
                PORTAL</strong></p>
        <p style="font-size:52px; color:#fff;top:55%; left:0px;line-height:1;text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.60); padding-left:50px; letter-spacing:-1px;"
           class="ls-l sliderleft"
           data-ls="offsetxin:-100;durationin:2000;delayin:1500;offsetxout:-100;durationout:1000;">ask questions to your
            customers</p>
    </div>

</div><!-- /layerslider -->


<div class="layer"></div><!-- /mask -->

<div id="main_container">

    <div id="header_in">
        <a href="#0" class="close_in "><i class="pe-7s-close-circle"></i></a>
    </div>

    <div class="wrapper_in">
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade" id="tab_1">
                    <div class="subheader" id="quote"></div>
                    <div class="row">
                        <aside class="col-xl-3 col-lg-4">
                            <h2>Request a Survey and Compare prices!</h2>
                            <p class="lead">An mei sadipscing dissentiet, eos ea partem viderer facilisi.</p>
                            <ul class="list_ok">
                                <li>Delicata persecuti ei nec, et his minim omnium, aperiam placerat ea vis.</li>
                                <li>Suavitate vituperatoribus pro ad, cum in quis propriae abhorreant.</li>
                                <li>Aperiri deterruisset ei mea, sed cu laudem intellegat, eu mutat iuvaret voluptatum
                                    mei.
                                </li>
                            </ul>
                        </aside><!-- /aside -->

                        <div class="col-xl-9 col-lg-8">
                            <?php if (isset($_SESSION['userid'])) {
                                ?>
                                <div id="wizard_container">
                                    <div id="top-wizard">
                                        <strong>Progress</strong>
                                        <div id="progressbar"></div>
                                    </div><!-- /top-wizard -->

                                    <form name="example-1" id="wrapped" action="" method="POST">
                                        <input id="time" name="time" type="hidden" value="<?php echo date('h:i:s'); ?>">
                                        <input id="website" name="website" type="text" value="">
                                        <!-- Leave for security protection, read docs for details -->
                                        <div id="middle-wizard">

                                            <?php
                                            $query = "SELECT * FROM question order by id";

                                            $data = $db_handle->runQuery($query);
                                            $row_count = $db_handle->numRows($query);
                                            for ($i = 0; $i < $row_count / 2; $i++) {
                                                ?>

                                                <div class="step">
                                                    <h3 class="main_question"><strong>Step <?php echo($i + 1); ?>
                                                            /<?php echo $row_count / 2; ?></strong></h3>
                                                    <h4>
                                                        Q<?php echo ($i * 2) + 1; ?>
                                                        : <?php echo $data[($i * 2)]['question']; ?>
                                                    </h4>
                                                    <div class="row add_bottom_30">
                                                        <div class="col-sm-6">
                                                            <div class="form-group checkbox_questions">
                                                                <label>
                                                                    <input name="question_<?php echo ($i * 2) + 1; ?>[]"
                                                                           type="checkbox"
                                                                           value="Custom interface and layout"
                                                                           class="icheck required"><?php echo $data[($i * 2)]['option_1']; ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label>
                                                                    <input name="question_<?php echo ($i * 2) + 1; ?>[]"
                                                                           type="checkbox"
                                                                           value="<?php echo $data[($i * 2)]['option_2']; ?>"
                                                                           class="icheck required"><?php echo $data[($i * 2)]['option_2']; ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label>
                                                                    <input name="question_<?php echo ($i * 2) + 1; ?>[]"
                                                                           type="checkbox"
                                                                           value="<?php echo $data[($i * 2)]['option_3']; ?>"
                                                                           class="icheck required"><?php echo $data[($i * 2)]['option_3']; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div><!-- /row-->
                                                    <h4>
                                                        Q<?php echo ($i * 2) + 2; ?>
                                                        : <?php echo $data[($i * 2) + 1]['question']; ?>
                                                    </h4>
                                                    <div class="row add_bottom_30">
                                                        <div class="col-sm-6">
                                                            <div class="form-group checkbox_questions">
                                                                <label>
                                                                    <input name="question_<?php echo ($i * 2) + 2; ?>[]"
                                                                           type="checkbox"
                                                                           value="Custom interface and layout"
                                                                           class="icheck required"><?php echo $data[($i * 2) + 1]['option_1']; ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label>
                                                                    <input name="question_<?php echo ($i * 2) + 2; ?>[]"
                                                                           type="checkbox"
                                                                           value="<?php echo $data[($i * 2) + 1]['option_2']; ?>"
                                                                           class="icheck required"><?php echo $data[($i * 2) + 1]['option_2']; ?>
                                                                </label>
                                                            </div>
                                                            <div class="form-group checkbox_questions">
                                                                <label>
                                                                    <input name="question_<?php echo ($i * 2) + 2; ?>[]"
                                                                           type="checkbox"
                                                                           value="<?php echo $data[($i * 2) + 1]['option_3']; ?>"
                                                                           class="icheck required"><?php echo $data[($i * 2) + 1]['option_3']; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div><!-- /row-->
                                                </div><!-- /step 2-->

                                            <?php } ?>

                                            <div class="submit step">

                                                <h3 class="main_question"><strong>Final step</strong>Please fill with
                                                    your
                                                    details
                                                </h3>

                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="text" name="name"
                                                                   class="required form-control"
                                                                   placeholder="First name" value="<?php echo $_SESSION['name']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" name="email"
                                                                   class="required form-control"
                                                                   placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="contact_number"
                                                                   class="required form-control"
                                                                   placeholder="Your Telephone" value="<?php echo $_SESSION['contact_number']; ?>">
                                                        </div>
                                                    </div><!-- /col-12 -->
                                                </div><!-- /row -->

                                                <div class="form-group checkbox_questions">
                                                    <input name="terms" type="checkbox" class="icheck required"
                                                           value="yes">
                                                    <label>Please accept <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#terms-txt">terms and
                                                            conditions</a> ?
                                                    </label>
                                                </div>

                                            </div><!-- /step 4-->

                                        </div><!-- /middle-wizard -->
                                        <div id="bottom-wizard">
                                            <button type="button" name="backward" class="backward">Backward</button>
                                            <button type="button" name="forward" class="forward">Forward</button>
                                            <button type="submit" name="process" class="submit">Submit</button>
                                        </div><!-- /bottom-wizard -->
                                    </form>
                                </div><!-- /Wizard container -->
                                <?php
                            } else {
                                ?>
                                <div class="card p-4">
                                    <h4 class="text-center">Login</h4>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-dark" type="submit" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            } ?>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /TAB 1:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

                <div class="tab-pane fade" id="tab_2">
                    <div class="subheader" id="about"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Welcome to Survey Portal</h2>
                            <p class="lead">An mei sadipscing dissentiet, eos ea partem viderer facilisi. Brute nostrud
                                democritum in vis, nam ei erat zril mediocrem. No postea diceret vix. Mei eu scripta
                                dolorum voluptatibus, id omnes repudiare pri.</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="about_info">
                                        <i class="pe-7s-news-paper"></i>
                                        <h4>A brief about
                                            Survey Portal<span>Suas summo id sed, erat erant oporteat cu pri.</span>
                                        </h4>
                                        <p>Cum iusto nonumes dignissim ad, movet vocent ceteros nec ut. Eu putent
                                            utroque ius, ei usu purto doctus, ludus nostrud consectetuer ex pri. Maiorum
                                            petentium similique duo id. Sea ex nostro offendit, ius sumo electram
                                            theophrastus et. Nam eu dolore aliquid laoreet, ei eos tacimates assueverit
                                            inciderint. His deserunt recteque consequat in. Vis mucius virtute consequat
                                            ad, suavitate interesset an mei, oporteat temporibus at sea.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about_info">
                                        <i class="pe-7s-light"></i>
                                        <h4>Mission<span>Suas summo id sed, erat erant oporteat cu pri.</span></h4>
                                        <p>Cum iusto nonumes dignissim ad, movet vocent ceteros nec ut. Eu putent
                                            utroque ius, ei usu purto doctus, ludus nostrud consectetuer ex pri. Maiorum
                                            petentium similique duo id. Sea ex nostro offendit, ius sumo electram
                                            theophrastus et. Nam eu dolore aliquid laoreet, ei eos tacimates assueverit
                                            inciderint. His deserunt recteque consequat in. Vis mucius virtute consequat
                                            ad, suavitate interesset an mei, oporteat temporibus at sea.</p>
                                    </div>
                                </div>
                            </div><!-- /row -->
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /TAB 2:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

                <div class="tab-pane fade" id="tab_3">

                    <div id="map_contact">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236161.13633346456!2d113.9745908285368!3d22.352958430074075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3403e2eda332980f%3A0xf08ab3badbeac97c!2sHong%20Kong!5e0!3m2!1sen!2sbd!4v1701771022877!5m2!1sen!2sbd"
                                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- /map -->

                    <div id="contact_info">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box_contact">
                                    <i class="pe-7s-map-marker"></i>
                                    <h4>Address</h4>
                                    <p>Duo magna vocibus electram ad. Sit an amet aeque legimus, paulo mnesarchum et
                                        mea, et pri quodsi singulis.</p>
                                    <p>Hong Kong</p>
                                    <a href="https://maps.app.goo.gl/78W18jkc1ZYFAGvn8"
                                       class="btn_1" target="_blank">Get directions</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_contact">
                                    <i class="pe-7s-mail-open-file"></i>
                                    <h4>Email and website</h4>
                                    <p>Duo magna vocibus electram ad. Sit an amet aeque legimus, paulo mnesarchum et
                                        mea, et pri quodsi singulis.</p>
                                    <p>
                                        <strong>Email:</strong> <a href="#0">support@survey.com</a><br>
                                        <strong>Website:</strong> <a href="#0">www.survey.ngt.hk</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box_contact">
                                    <i class="pe-7s-call"></i>
                                    <h4>Telephone</h4>
                                    <p>Duo magna vocibus electram ad. Sit an amet aeque legimus, paulo mnesarchum et
                                        mea, et pri quodsi singulis.</p>
                                    <p>
                                        <strong>Tel:</strong> <a href="#0">+00 000 0000</a><br>
                                        <strong>Fax:</strong> <a href="#0">+00 000 0000</a>
                                    </p>
                                </div>
                            </div>
                        </div><!-- / row-->
                        <hr>
                        <div id="social">
                            <ul>
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-google"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            </ul>
                        </div><!-- /social -->
                    </div>
                </div><!-- /TAB 3:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->

            </div><!-- /tab content -->
        </div><!-- /container-fluid -->
    </div><!-- /wrapper_in -->
</div><!-- /main_container -->

<div id="additional_links">
    <ul>
        <li>© Survey Portal</li>
    </ul>
</div><!-- /add links -->

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms and conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei
                    ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne
                    quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                    dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                    sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum
                    accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
                    sanctus, pro ne quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                    dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                    sensibus.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_1" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- SCRIPTS -->
<!-- Jquery-->
<script src="js/jquery-3.6.4.min.js"></script>
<!-- Layer slider -->
<script src="layerslider/js/greensock.js"></script>
<script src="layerslider/js/layerslider.transitions.js"></script>
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="js/slider_func.js"></script>
<!-- Common script -->
<script src="js/common_scripts_min.js"></script>
<!-- Theme script -->
<script src="js/functions.js"></script>
<!-- Google map -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC-JeyaCifXWDrHeMVZZq4B3ZhB6SBHVPI"></script>
<script src="js/mapmarker.jquery.js"></script>
<script src="js/mapmarker_func.jquery.js"></script>
<?php
if (isset($_POST['submit'])) {
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $query = "SELECT * FROM `user` WHERE email='$email' and password='$password'";

    $data = $db_handle->runQuery($query);
    $row = $db_handle->numRows($query);

    if ($row > 0) {
        $_SESSION['userid'] = $data[0]['id'];
        $_SESSION['name'] = $data[0]['name'];
        $_SESSION['email'] = $data[0]['email'];
        $_SESSION['contact_number'] = $data[0]['contact_number'];

        echo "<script>
                alert('Login Successful');
                window.location.href='index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data not found');
                window.location.href='index.php';
                </script>";
    }
}

if (isset($_POST['process'])) {
    $user_id=$_SESSION['userid'];
    $startTime = $db_handle->checkValue($_POST['time']);
    $endTime = date('h:i:s');
    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $phone_number = $db_handle->checkValue($_POST['contact_number']);

    $surveyTakenDate = date('Y-m-d');
    $inserted_at = date('Y-m-d h:i:s');

    $insert=$db_handle->insertQuery("INSERT INTO `survey_result`(`user_id`, `name`, `email`, `contact_number`, `survey_taken_date`, `survey_start`, `survey_end`, `inserted_at`) VALUES ('$user_id','$name','$email','$phone_number','$surveyTakenDate','$startTime','$endTime','$inserted_at')");

    $selectData=$db_handle->runQuery("SELECT `id` FROM `survey_result` order by id desc limit 1");
    $survey_id=$selectData[0]['id'];

    $query = "SELECT * FROM question order by id";

    $data = $db_handle->runQuery($query);
    $row_count = $db_handle->numRows($query);

    for ($i = 0; $i < $row_count; $i++) {
        $index = $i + 1;
        $answer = json_encode($_POST['question_' . $index]);
        $question_id=$data[$i]['id'];
        $insert=$db_handle->insertQuery("INSERT INTO `answer`(`user_id`, `survey_id`, `question_id`, `answer`) VALUES ('$user_id','$survey_id','$question_id','$answer')");
    }
  echo "<script>
                alert('Survey answer Submitted');
                window.location.href='index.php';
                </script>";
}
?>
</body>
</html>
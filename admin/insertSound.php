<?php
session_start();
require_once("../Controller/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
$user_id = $_SESSION['user_id'];
if (isset($_POST['sound_name'])) {
    $sound_id = $_POST['sound_name'];
    $insert = $db_handle->insertQuery("INSERT INTO `sound`(`sound_id`, `user_id`,`inserted_at`) VALUES ('$sound_id','$user_id','$inserted_at')");
}

if (isset($_POST['reset'])) {
    $delete = $db_handle->insertQuery("TRUNCATE TABLE `sound`");
}

if (isset($_POST['play_sound'])) {

    $row_count = $db_handle->numRows("SELECT * FROM sound");
    if ($row_count != 0) {

        $query = "SELECT * FROM sound,sound_list where sound.sound_id=sound_list.code order by sound.user_id asc";

        $data = $db_handle->runQuery($query);
        $row_count = $db_handle->numRows($query);

        for ($i = 0; $i < $row_count; $i++) {
            $code = $data[$i]['sound_id'];

            $query2 = "SELECT * FROM sound where sound_id='$code' and user_id={$user_id}";
            $row = $db_handle->numRows($query2);

            if ($row == 0) {
                $insert = $db_handle->insertQuery("INSERT INTO `sound`(`sound_id`, `user_id`,`inserted_at`) VALUES ('$code','$user_id','$inserted_at')");
                echo $code;
            }
        }
    } else {
        echo 'reset';
    }
}


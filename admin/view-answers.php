<?php
session_start();
require_once("../include/dbController.php");
$db_handle = new DBController();
if (isset($_POST["survey_id"])) {

    $query = "SELECT q.question, a.answer FROM answer as a, question as q where a.question_id=q.id and a.survey_id='{$_POST["survey_id"]}'";
    $answer = $db_handle->runQuery($query);
    $row_count = $db_handle->numRows($query);

    for ($i = 0; $i < $row_count; $i++) {
        ?>
        <tr>
            <td class="text-center"><?php echo $i + 1; ?></td>
            <td class="strong"><?php echo $answer[$i]["question"]; ?></td>
            <td><?php echo $answer[$i]["answer"]; ?></td>
        </tr>
        <?php
    }
}

<?php

    session_start();
    require_once('initialize.php');

    $message = "";
    $status = 400;
    $valid = true;

    $rID = $_SESSION['restaurantID'];
    $DoW = date('N', strtotime($_POST['DoW']));

    $rstatus = $_POST['status'];
    $opentime = $_POST['opentime'] != '' && $rstatus == 1 ? $_POST['opentime'] : NULL;
    $closetime = $_POST['closetime'] != '' && $rstatus == 1 ? $_POST['closetime'] : NULL;

    if($rstatus == 1) {
        if($opentime == NULL || $closetime == NULL) {
            $valid = false;
            $message = "Restaurant set to open: Please fill all time fields.";
        }
    }

    if($valid) {
        $sql = "UPDATE restaurant_open SET start_time=?, end_time=? WHERE restaurantID=? AND DoW=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssii", $opentime, $closetime, $rID, $DoW);
        $stmt->execute();
        $stmt->close();
        $message = "Edit Successful";
        $status = 200;
    }

    $obj = array(
        'status' => $status,
        'message' => $message
    );

    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;

    $con->close();

?>
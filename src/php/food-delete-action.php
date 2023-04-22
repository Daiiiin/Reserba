<?php

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";

    $fID = $_POST['fID'];

    $stmt = $con->prepare("DELETE FROM food WHERE foodID=? LIMIT 1");
    $stmt->bind_param("i", $fID);
    $stmt->execute();
    $stmt->close();
    $status = 200;
    $message = "Delete Successful";

    $obj = array(
        'status' => $status,
        'message' => $message
    );
    
    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;

?>
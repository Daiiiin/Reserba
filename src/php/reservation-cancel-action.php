<?php

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";


    $rID = $_POST['rID'];
    $set = 3;

    $stmt = $con->prepare("UPDATE reservation SET status=? WHERE reservationID=?");
    $stmt->bind_param("ii", $set, $rID);
    $stmt->execute();
    $stmt->close();
    $status = 200;
    $message = "Reservation cancelled";

    $obj = array(
        'status' => $status,
        'message' => $message
    );
    
    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;

?>
<?php

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";


    $rID = $_POST['rID'];
    $rating = $_POST['rating'];

    $stmt = $con->prepare("UPDATE reservation SET rating=? WHERE reservationID=?");
    $stmt->bind_param("di", $rating, $rID);
    $stmt->execute();
    $stmt->close();
    $status = 200;
    $message = "Thank you for the rating!";

    $obj = array(
        'status' => $status,
        'message' => $message
    );
    
    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;


?>
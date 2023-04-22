<?php
    
    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";
   
    $mID = $_POST['mID'];
    
    $stmt = $con->prepare("DELETE FROM food WHERE menuID = ?");
    $stmt->bind_param("i", $mID);
    $stmt->execute();
    $stmt->close();

    $stmt = $con->prepare("DELETE from menu WHERE menuID = ?");
    $stmt->bind_param("i", $mID);
    $stmt->execute();
    $stmt->close();

    $status = 200;
    $message = "Deleted Successfully";

    $obj = array(
        'status' => $status,
        'message' => $message
    );

    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;

?>
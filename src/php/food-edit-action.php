<?php

    require_once('initialize.php');

    $status = 200;
    $message = "Something went wrong";

    $fID = $_POST['fID'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];

    $stmt = $con->prepare("UPDATE food SET food_name=?, food_price=? WHERE foodID=?");
    $stmt->bind_param("sdi", $food_name, $food_price, $fID);
    $stmt->execute();
    $stmt->close();
    $status = 200;
    $status = 200;
    $message = "Edit Successful";

    $obj = array(
        'status' => $status,
        'message' => $message
    );
    
    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;

?>
<?php

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";

    $mID = $_POST['mID'];
    $menu_name = $_POST['menu_name'];

    $stmt = $con->prepare("UPDATE menu SET menu_name=? WHERE menuID=?");
    $stmt->bind_param("si", $menu_name, $mID);
    $stmt->execute();
    $stmt->close();

    $message = "Edit Successful";
    $status = 200;

    $obj = array(
        'message' => $message,
        'status' => $status
    );

    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;
?>
<?php

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";
    $valid = true;

    $uID = $_POST['uID'];
    $password = "passwordreset";
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password=? WHERE userID=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $password, $uID);
    $stmt->execute();
    $stmt->close();
    $message = "Password has been reset";
    $status = 200;
  
    $obj = array(
        'status' => $status,
        'message' => $message
    );

        $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
        echo $myJSON;

        $con->close();

?>
<?php

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";
    $valid = true;

    $uID = $_POST['uID'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $pnum = trim($_POST['pnum']);

    $stmt = $con->prepare("SELECT email FROM users WHERE email = ? AND userID != ?");
    $stmt->bind_param("si", $email, $uID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        $valid = false;
        $message = "Email already exists";
    }

    if($valid) {
        $sql = "UPDATE users SET fname=?, lname=?, email=?, phone_number=? WHERE userID=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssi", $fname, $lname, $email, $pnum, $uID);
        $stmt->execute();
        $stmt->close();
        $message = "Edit Succesful";
        $status = 200;
    }
    $obj = array(
        'status' => $status,
        'message' => $message
    );

        $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
        echo $myJSON;

        $con->close();

?>
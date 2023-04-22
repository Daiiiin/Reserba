<?php 

    require_once('initialize.php');

    $message = "Something went wrong";
    $status = 400;

    $utype = $_POST['utype'];
    $uID = $_POST['uID'];
        
    if($utype == 'radmin') {
        $stmt = $con->prepare("DELETE FROM restaurant_admin WHERE userID=? LIMIT 1");
        $stmt->bind_param("i", $uID);
        $stmt->execute();
        $stmt->close();
    } else {
        $stmt = $con->prepare("DELETE FROM reservation WHERE userID=?");
        $stmt->bind_param("i", $uID);
        $stmt->execute();
        $stmt->close();
    }
    $stmt = $con->prepare("DELETE FROM users WHERE userID=? LIMIT 1");
    $stmt->bind_param("i", $uID);
    $stmt->execute();
    $stmt->close();
    $message = "Delete successful";
    $status = 200;
    
    $obj = array (
        'status' => $status,
        'message' => $message
    );

    $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
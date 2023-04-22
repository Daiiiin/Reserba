<?php 

    require_once('initialize.php');

    $status = 200;
    $message = "Something went wrong";

    $iID = $_POST['iID'];
    
    $stmt = $con->prepare("DELETE FROM restaurant_images WHERE imageID=? LIMIT 1");
    $stmt->bind_param("i", $iID);
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

    $con->close();

?>
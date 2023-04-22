<?php 

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";

    $userID = $_POST['uID'];
    $restaurantID = $_POST['resID'];
    $pax = trim($_POST['pax']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);


    $sql = "INSERT INTO reservation(userID, restaurantID, pax, date, time) VALUES(?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("iisss", $userID, $restaurantID, $pax, $date, $time);
    $stmt->execute();
    $stmt->close();
    
    $message = "Thank you for requesting a reservation. We'll get back to you soon!";
    $status = 200;
    
    $obj = array(
        'status' => $status,
        'message' => $message
    );

    $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
<?php
    
    session_start();
    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";
    $valid = true;

    $rID = $_SESSION['restaurantID'];
    $menu_name = $_POST['menu_name'];

    $stmt = $con->prepare("SELECT menu_name FROM menu WHERE menu_name = ? AND restaurantID = ?");
    $stmt->bind_param("si", $menu_name, $rID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        $valid = false;
        $message = "Menu already exists";
    }

    if($valid) {
        $stmt = $con->prepare("INSERT INTO menu(restaurantID, menu_name) VALUES(?, ?)");
        $stmt->bind_param("is", $rID, $menu_name);
        $stmt->execute();
        $stmt->close();
        $status = 200;
        $message = "Added menu successfully";
    }
    
    $obj = array(
        'status' => $status,
        'message' => $message
    );

    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;

    $con->close();

?>
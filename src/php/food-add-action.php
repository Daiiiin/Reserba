<?php 

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";
    $valid = true;

    $mID = $_POST['mID'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];

    $stmt = $con->prepare("SELECT food_name FROM food WHERE food_name = ? AND menuID = ?");
    $stmt->bind_param("si", $food_name, $mID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        $valid = false;
        $message = "Already exists";
    }

    if($valid) {
        $stmt = $con->prepare("INSERT INTO food(menuID, food_name, food_price) VALUES(?, ?, ?)");
        $stmt->bind_param("isd", $mID, $food_name, $food_price);
        $stmt->execute();
        $stmt->close();
        $status = 200;
        $fname = strtolower($food_name);
        $message = "Successfully added $fname to menu!";
    }   

    $obj = array(
        'status' => $status,
        'message' => $message
    );
    
    $myObj = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myObj;

?>
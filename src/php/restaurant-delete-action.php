<?php 

    require_once('initialize.php');

    $message = "Something went wrong";

    $rID = $_POST['rID'];

    $stmt = $con->prepare("DELETE FROM restaurant_open WHERE restaurantID=?");
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $stmt->close();

    $stmt = $con->prepare("DELETE FROM restaurant_images WHERE restaurantID=?");
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $stmt->close();

    
    $stmt = $con->prepare("DELETE FROM restaurant_admin WHERE restaurantID=?");
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $stmt->close();

    $sql = "SELECT m.menuID FROM restaurant r
            JOIN menu m ON r.restaurantID = m.restaurantID
            WHERE r.restaurantID=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    while($row = $result->fetch_assoc()) {
        $stmt = $con->prepare("DELETE FROM food WHERE menuID=?");
        $stmt->bind_param("i", $row['menuID']);
        $stmt->execute();
        $stmt->close();
    }
    
    $stmt = $con->prepare("DELETE FROM menu WHERE restaurantID=?");
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $stmt->close();

    $stmt = $con->prepare("DELETE FROM reservation WHERE restaurantID=?");
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $stmt->close();

    $stmt = $con->prepare("DELETE FROM restaurant WHERE restaurantID=? LIMIT 1");
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $stmt->close();
    
    $message = "Delete Successful";
    $obj = array (
        'message' => $message
    );

    $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
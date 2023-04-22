<?php 

    session_start();
    require_once('initialize.php');

    $rID = $_SESSION['restaurantID'];

    $status = 400;
    $message = "Something went wrong";

    $img_nm = $_FILES['imgfile']['name'];
    $img_name = $rID . "_" . $img_nm;
    $target = $_SERVER['DOCUMENT_ROOT'] . "/reserba/src/img/" . $img_name;

    $stmt = $con->prepare("INSERT INTO restaurant_images(restaurantID, image_name) VALUES(?, ?)");
    $stmt->bind_param("is", $rID, $img_name);
    $stmt->execute();
    $stmt->close();

    if(move_uploaded_file($_FILES['imgfile']['tmp_name'], $target)) {
        $message = "New image added successfully";
        $status = 200;
    }

    $obj = array(
        'status' => $status,
        'message' => $message,
    );
    
    $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
<?php

    require_once('initialize.php');
    session_start();

    $status = 400;
    $message = "";
    $valid = true;

    $rID = $_POST['rID'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $address = trim($_POST['address']);
    $tables = $_POST['tables'];
    $paxcap = $_POST['paxcap'];
    // $file = $_FILES['myfile']['tmp_name'] != '' ? file_get_contents($_FILES['myfile']['tmp_name']) : '' ;
    
    $stmt = $con->prepare("SELECT restaurant_name FROM restaurant WHERE restaurant_name = ? AND restaurantID != ?");
    $stmt->bind_param("si", $name, $rID);
    $stmt->execute();
    $result = $stmt->get_result();
    $obj = mysqli_fetch_object($result);
    $stmt->close();
    if($result->num_rows > 0) {
        $valid = false;
        $message = "Restaurant exists";
    }

    if($valid && $rID != '') {
        if($_FILES['myfile']['tmp_name'] != '') {
            $img_split = explode(".", basename($_FILES['myfile']['name']));
            $img_name = "logo_" . $img_split[0]  . "." . $img_split[1];
            $target = $_SERVER['DOCUMENT_ROOT'] . "/reserba/src/img/" . $img_name;
            $sql = "UPDATE restaurant SET restaurant_name=?, description=?, address=?, pax_capacity=?, no_of_table=?, image=? WHERE restaurantID=?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssiisi", $name, $description, $address, $paxcap, $tables, $img_name, $rID);
            move_uploaded_file($_FILES['myfile']['tmp_name'], $target);
            $message = "Edit Successful";
            $status = 200;
        } else if($_FILES['myfile']['tmp_name'] == '') {
            $sql = "UPDATE restaurant SET restaurant_name=?, description=?, address=?, pax_capacity=?, no_of_table=? WHERE restaurantID=?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssiii", $name, $description, $address, $paxcap, $tables, $rID);     
            $message = "Edit Successful";
            $status = 200;
        }
        else {
            $message = "Something went wrong";
            $status = 400;
        }
        $stmt->execute();
        $stmt->close();
    }

    $myObj = array(
        'status' => $status,
        'message' => $message,
    );
    
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
<?php 

    session_start();
    require_once('initialize.php');

    $status = 400;
    $message = "";
    
    $rID = $_SESSION['restaurantID'];
    $description = trim($_POST['description']);
    $address = trim($_POST['address']);
    $tables = $_POST['tables'];
    $paxcap = $_POST['paxcap'];
    
    if($_FILES['myfile']['tmp_name'] != '') {
        $img_split = explode(".", basename($_FILES['myfile']['name']));
        $img_name = "logo_" . $img_split[0]  . "." . $img_split[1];
        $target = $_SERVER['DOCUMENT_ROOT'] . "/reserba/src/img/" . $img_name;
        $sql = "UPDATE restaurant SET description=?, address=?, pax_capacity=?, no_of_table=?, image=? WHERE restaurantID=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssiisi", $description, $address, $paxcap, $tables, $img_name, $rID);
        move_uploaded_file($_FILES['myfile']['tmp_name'], $target);
        $message = "Edit Successful";
        $status = 200;
    } else if($_FILES['myfile']['tmp_name'] == '') {
        $sql = "UPDATE restaurant SET description=?, address=?, pax_capacity=?, no_of_table=? WHERE restaurantID=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssiii", $description, $address, $paxcap, $tables, $rID);
        $message = "Edit Successful";
        $status = 200;     
    }
    else {
        $message = "Something went wrong";
        $status = 400;
    }
    $stmt->execute();
    $stmt->close();

    $myObj = array(
        'status' => $status,
        'message' => $message,
    );

    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
<?php 

    require_once('initialize.php');
    session_start();

    $message = "";
    $status = 400;
    $valid = true;

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $address = trim($_POST['address']);
    $tables = $_POST['tables'];
    $paxcap = $_POST['paxcap'];

    // $opentime = array(
    //     $_POST['opentime1'] != '' ? $_POST['opentime1'] : NULL,
    //     $_POST['opentime2'] != '' ? $_POST['opentime2'] : NULL,
    //     $_POST['opentime3'] != '' ? $_POST['opentime3'] : NULL,
    //     $_POST['opentime4'] != '' ? $_POST['opentime4'] : NULL,
    //     $_POST['opentime5'] != '' ? $_POST['opentime5'] : NULL,
    //     $_POST['opentime6'] != '' ? $_POST['opentime6'] : NULL,
    //     $_POST['opentime7'] != '' ? $_POST['opentime7'] : NULL
    // );

    // $closetime = array(
    //     $_POST['closetime1'] != '' ? $_POST['closetime1'] : NULL,
    //     $_POST['closetime2'] != '' ? $_POST['closetime2'] : NULL,
    //     $_POST['closetime3'] != '' ? $_POST['closetime3'] : NULL,
    //     $_POST['closetime4'] != '' ? $_POST['closetime4'] : NULL,
    //     $_POST['closetime5'] != '' ? $_POST['closetime5'] : NULL,
    //     $_POST['closetime6'] != '' ? $_POST['closetime6'] : NULL,
    //     $_POST['closetime7'] != '' ? $_POST['closetime7'] : NULL
    // );

    $img_ext = pathinfo(($_FILES['myfile']['name']), PATHINFO_EXTENSION);
    $img_name = "logo_" . $name . "." . $img_ext;
    $img_name = str_replace(' ', '', $img_name);

    $target = $_SERVER['DOCUMENT_ROOT'] . "/reserba/src/img/" . $img_name;

    $stmt = $con->prepare("SELECT restaurant_name FROM restaurant WHERE restaurant_name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        $valid = false;
        $message = "Restaurant exists";
    }

    if($valid) {
        $sql = "INSERT INTO restaurant(restaurant_name, description, address, no_of_table, pax_capacity, image) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssiis", $name, $description, $address, $tables, $paxcap, $img_name);
        $stmt->execute();
        $newID = $con->insert_id;
        $stmt->close();
        for($i = 1; $i <= 7; $i++) {
            $sql = "INSERT INTO restaurant_open(restaurantID, DoW) VALUES(?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ii", $newID, $i);
            $stmt->execute();
            $stmt->close();
        }
        
        if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target)) {
            $message = "Restaurant added successfully";
            $status = 200;
        } else {
            $message = "Something went wrong";
        }
        
    }

    $obj = array(
        'status' => $status,
        'message' => $message,
    );
    
    $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
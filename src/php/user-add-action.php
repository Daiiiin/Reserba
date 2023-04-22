<?php 

    require_once('initialize.php');

    $status = 400;
    $message = "Something went wrong";
    $valid = true;
    $newID;

    $utype = $_POST['utype'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $pnum = trim($_POST['pnum']);
    $pass = trim($_POST['pass']);
    $rest = $_POST['rest'];

    $stmt = $con->prepare("SELECT email FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        $valid = false;
        $message = "Email already exists";
    }

    if($valid) {
        $sql = "INSERT INTO users(fname, lname, email, password, phone_number, user_type) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $stmt->bind_param("sssssi", $fname, $lname, $email, $pass, $pnum, $utype);
        $stmt->execute();
        $newID = $con->insert_id;
        $stmt->close();
        if($utype == 3) {
            $stmt = $con->prepare("INSERT INTO restaurant_admin(userID, restaurantID) VALUES(?, ?)");
            $stmt->bind_param("ii", $newID, $rest);
            $stmt->execute();
            $stmt->close();
        }
        $message = "User created successfully";
        $status = 200;
    }

    $obj = array(
        'status' => $status,
        'message' => $message
    );

    $myJSON = json_encode($obj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();

?>
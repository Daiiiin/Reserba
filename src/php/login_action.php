<?php 
    session_start();
    include_once("initialize.php");
    $retVal = "";
    $isValid = true;
    $status = 400;
    $data = []; 
    // $landing_url = "";

    $email = trim($_REQUEST['email']);
    $password = trim($_REQUEST['password']);
    // $user_type = "";

    // Check fields are empty or not
    if($email == '' || $password == ''){
        $isValid = false;
        $retVal = "Please fill all fields.";
    }

    // Check if email is valid or not
    if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $retVal = "Invalid email.";
    }

    // Check if email already exists
    if($isValid){
        $sql = "SELECT *, u.userID AS uid FROM users u
                LEFT JOIN restaurant_admin ra
                    ON u.userID=ra.userID
                WHERE email=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $obj = mysqli_fetch_object($result); 
        $stmt->close();
        if($result->num_rows > 0){
            // $hash_pass = password_hash($obj->password, PASSWORD_DEFAULT);
            // $isPassword = password_verify ($password , $hash_pass);
            $isPassword = password_verify($password, $obj->password);
            if($isPassword == true){
                $status = 200;
                $retVal = "Success.";
                $data = $obj;
                $_SESSION['email'] = $obj->email;
                $_SESSION['userID'] = $obj->uid;
                $_SESSION['fname'] = $obj->fname;
                $_SESSION['lname'] = $obj->lname;
                $_SESSION['user_name'] = "$obj->fname $obj->lname";
                $_SESSION['user_type'] = $obj->user_type;
                $_SESSION['phone_number'] = $obj->phone_number;
                if($_SESSION['user_type'] == 'radmin') {
                    $_SESSION['restaurantID'] = $obj->restaurantID;
                }
                // $user_type = $obj->user_type;
                
            }else{
                $retVal = "You may have entered a wrong email or password.";
            }
        }else{
            $retVal = "Account does not exist.";
        }
    }

    // Check if user type is user or admin
    // if($user_type == "user"){
    //     $landing_url = "../public/index.php";
    // }else if($user_type == "admin"){
    //     $landing_url = "../public/admin_page.php";
    // }
    
    //  same index page for user and admin 

    $myObj = array(
        'status' => $status,
        'data' => $data,
        'message' => $retVal
        // 'user_type' => $user_type,
        // 'landing_url' => $landing_url
    );
    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;

    $con->close();
?>
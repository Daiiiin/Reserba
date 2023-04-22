<?php 
    session_start();
    session_destroy();
    
    // $myObj = array(
    //     'status' => 200,
    //     'message' => "Success"  
    // );
    // $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    // echo $myJSON;

    header("Location: /reserba/public/login.php");
?>
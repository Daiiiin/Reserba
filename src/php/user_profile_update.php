<?php 

require_once('initialize.php');

    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone_number = $_POST['phone_number'];

    $query = mysqli_query($con,"SELECT email FROM `users` WHERE email= '$email' AND userID != $userID ");


        if(mysqli_num_rows($query)>0){
            header("location: ../../public/user/user_profile.php?error=Email already exists.");
            exit();
        }

        if($password != $confirm_password){
            header("location: ../../public/user/user_profile.php?error=Confirm password not matching.");
            exit();
       }

       $password = password_hash($password, PASSWORD_DEFAULT);
       
        if($password != '') {     
            $con->query("UPDATE users SET fname='$fname', lname='$lname', `email` ='$email', `password` ='$password', `phone_number` ='$phone_number' WHERE userID=$userID;");
            header("location: ../../public/user/user_profile.php");
        }else {
            $con->query("UPDATE users SET fname=$fname, lname=$lname, `email` =$email, `phone_number`   =$phone_number WHERE userID=$userID");
            header("location: ../../public/user/user_profile.php");
        }

?>

<?php 
    include_once("initialize.php");

    if(isset($_POST['sign_up'])){
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        // $password = $_POST['password'];
        // $confirm_password = $_POST['confirm_password'];

        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        $query = mysqli_query($con,"SELECT * FROM `users` WHERE email= '$email'");

        if($password != $confirm_password){
            header("location: ../../public/register.php?error=Confirm password not matching.");
            exit();
        }else if (mysqli_num_rows($query)>0){
            header("location: ../../public/register.php?error=Email already exists.");
            exit();
        }else{
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $con->query("INSERT INTO `users`(`fname`, `lname`, `email`, `phone_number`, `password`) VALUES ('$fname','$lname','$email','$phone_number','$password')") 
            or die($con->error);
        
        header("location: ../../public/login.php");
        }
    }

?>
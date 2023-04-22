<?php 

$host = "localhost";   
$user = "root";        
$password = "";         
$dbname = "reserba";   

$con = mysqli_connect($host, $user, $password,$dbname);

if (!$con){
    die("Connection failed: " . mysqli_connect_error());

}

if(isset($_GET['approve'])){

    $id = $_GET['approve'];
    $con->query("UPDATE `reservation` SET `status`='confirmed' WHERE reservationID = '$id' ") or die($con->error);

    header("location: ../../public/radmin/manage-reservations.php");
}

if(isset($_GET['decline'])){

    $id = $_GET['decline'];
    $con->query("UPDATE `reservation` SET `status`='cancelled' WHERE reservationID = '$id' ") or die($con->error);

    header("location: ../../public/radmin/manage-reservations.php");
}

?>

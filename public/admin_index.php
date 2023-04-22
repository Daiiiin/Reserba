<?php
        session_start();  
        include('./shared/admin_header.php');

        if(!isset($_SESSION["email"])){
            header("location: login.php");
        }

        $result = $con->query("SELECT
                            SUM(CASE WHEN user_type LIKE 'user' THEN 1 ELSE 0 END) users,
                            SUM(CASE WHEN user_type LIKE 'radmin' THEN 1 ELSE 0 END) radmin
                            FROM users");
        $row = $result->fetch_assoc();

        $result1 = $con->query("SELECT COUNT(*) AS 'num restaurant' from restaurant ");
        $row1 = $result1->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserba | Admin</title>
    <style>
        .container1 {  
            display: grid;  
            grid-template-columns: 1fr 1fr 1fr;  
            grid-template-rows: 350px 50px 50px;
            padding: 1%;
        }
        .div1, .div2, .div3{
            margin: 2%;
            border-radius: 20px;
            text-align: center;
            padding: 5%;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
            background-color: white;
        }
        .div1 h1, .div2 h1, .div3 h1{
            font-size: 100px;
        }
        h1{
            font-size: 50px;
        }
    </style>
    <link rel="stylesheet" href="stylesheets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <br><br>
    <center>
        <h1>DASHBOARD</h1>
    </center>
    <br>
    <div class="container1">  
        <div class="div1">
            <br><br>
            <h2>Number of Users</h2>
            <br>
            <h1><?php echo $row['users']; ?></h1>
        </div>  
        <div class="div2">
            <br><br>
            <h3>Number of Restaurant Admins</h3>
            <br>
            <h1><?php echo $row['radmin']; ?></h1>
        </div>   
        <div class="div3">
            <br><br>
            <h2>Number of Restaurants</h2>
            <br>
            <h1><?php echo $row1['num restaurant']; ?></h1>
        </div>
    </div>
    <?php include('./shared/footer.php') ?>   
</body>
</html>
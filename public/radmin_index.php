<?php
        session_start();  
        include('./shared/radmin_header.php');

        if(!isset($_SESSION["email"])){
            header("location: login.php");
        }

        $rID = $_SESSION['restaurantID'];
        $DoW = date("N");
        $sql = "SELECT
        SUM(CASE WHEN rv.status LIKE 'pending' THEN 1 ELSE 0 END) pending,
        SUM(CASE WHEN rv.status LIKE 'confirmed' THEN 1 ELSE 0 END) confirmed,
        SUM(CASE WHEN rv.status LIKE 'cancelled' THEN 1 ELSE 0 END) cancelled,
        ROUND(AVG(rv.rating), 1) AS 'rating', COUNT(rv.rating) AS 'numrate',
        (CASE WHEN ro.DoW = $DoW AND CURTIME() BETWEEN ro.start_time AND ro.end_time THEN 'open' ELSE 'close' END) 'status',
            ro.start_time, ro.end_time
        FROM restaurant r
        LEFT JOIN reservation rv ON r.restaurantID = rv.restaurantID
        LEFT JOIN restaurant_open ro ON r.restaurantID = ro.restaurantID
        WHERE r.restaurantID = $rID AND ro.DoW = $DoW";     
        $result5 = $con->query($sql);
        $row5 = $result5->fetch_assoc();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserba | Restaurant Admin</title>
    <style>
        .container1 {  
            display: grid;  
            grid-template-columns: 1fr 1fr 1fr;  
            grid-template-rows: 150px 150px 150px;
            padding: 1%;
        }
        .div1, .div2, .div3, .div4, .div5, .div6, .div7, .div8{
            margin: 2%;
            border-radius: 20px;
            text-align: center;
            padding: 3%;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
            background-color: white;
        }
    </style>
    <link rel="stylesheet" href="stylesheets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <br>
    <center>
    <h1>DASHBOARD</h1>
    </center>
    <div class="container1" style="padding-bottom: 4em;">  
        <div class="div1">
            <h5>Pending Reservations</h5>
            <h1><?php echo $row5['pending']; ?></h1>
        </div>  
        <div class="div2">
            <h5>Confirmed Reservations</h5>
            <h1><?php echo $row5['confirmed']; ?></h1>
        </div>   
        <div class="div3">
            <h5>Cancelled reservations</h5>
            <h1><?php echo $row5['cancelled']; ?></h1>
        </div>    
        <div class="div4">
            <h5>Number of Rating</h5>
            <h1><?php echo $row5['numrate']; ?></h1>
        </div>    
        <div class="div5">
            <h5>Average Rating</h5>
            <h1><?php if($row5['rating'] == NULL){
                echo "NO DATA";
            }else{
                echo $row5['rating'];
            } ?></h1>
        </div>   
        <div class="div6">
            <h5>Status</h5>
            <h1><?php echo $row5['status']; ?></h1>
        </div>
        <div class="div7">
            <h5>Open Time</h5>
            <h1><?php echo date('h:i A', strtotime($row5['start_time'])); ?></h1>
        </div>  
        <div class="div8">
            <h5>Close Time</h5>
            <h1><?php echo date('h:i A', strtotime($row5['end_time'])); ?></h1>
        </div>     
    </div>
    <?php include('./shared/footer.php') ?>
</body>
</html>

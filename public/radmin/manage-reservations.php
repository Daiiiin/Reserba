<?php 
    session_start();
    include('../shared/radmin_header.php');

    if(!isset($_SESSION["email"])){
        header("location:../login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheets/styles.css">
</head>
<body>
    <main>
        <div class="container-fluid p-5">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><h4>Pending Reservations</h4></button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><h4>Confirmed Reservations</h4></button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><h4>Cancelled Reservations</h4></button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table class="table table-light table-bordered shadow-lg table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Pax</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT CONCAT(u.fname, ' ', u.lname) AS 'fullname', rs.* FROM reservation rs
                                    JOIN users u ON u.userID = rs.userID
                                    JOIN restaurant r ON r.restaurantID = rs.restaurantID WHERE rs.status = 'pending' AND r.restaurantID = '".$_SESSION["restaurantID"]."'";
                            $res = mysqli_query($con, $sql);
                            if(mysqli_num_rows($res)> 0){ 
                                for($i = 1; $reservation = mysqli_fetch_assoc($res); $i++) { 
                                    $rID = $reservation['reservationID']; 
                                    if($reservation['date'] . ' ' . $reservation['time'] <= date("Y-m-d H:i:s")) {
                                        mysqli_query($con, "UPDATE reservation SET status = 3 WHERE reservationID = $rID");
                                    }
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $reservation['fullname']; ?></td>
                                <td><?php echo $reservation['pax'];?> </td>
                                <td><?php echo $reservation['date'];?> </td>
                                <td><?php echo $reservation['time'];?> </td>
                                <td><?php echo $reservation['status'];?> </td>
                                <td>
                                    <a href="../../src/php/manage_reservations_action.php?approve=<?php echo $reservation['reservationID']; ?>" class="btn btn-primary">Approve</a>
                                    <a href="../../src/php/manage_reservations_action.php?decline=<?php echo $reservation['reservationID']; ?>" class="btn btn-danger">Decline</a>
                                </td>
                            </tr>
                        <?php
                                }
                            } 
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table class="table table-light table-bordered shadow-lg table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Pax</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT CONCAT(u.fname, ' ', u.lname) AS 'fullname', rs.* FROM reservation rs
                            JOIN users u ON u.userID = rs.userID
                            JOIN restaurant r ON r.restaurantID = rs.restaurantID WHERE rs.status = 'confirmed' AND r.restaurantID = '".$_SESSION["restaurantID"]."'";
                            $res = mysqli_query($con, $sql);
                            if(mysqli_num_rows($res)> 0){
                                for($i = 1; $reservation = mysqli_fetch_assoc($res); $i++) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $reservation['fullname']; ?></td>
                                <td><?php echo $reservation['pax'];?> </td>
                                <td><?php echo $reservation['date'];?> </td>
                                <td><?php echo $reservation['time'];?> </td>
                                <td><?php echo $reservation['status'];?> </td>
                                <td>
                                <?php if($reservation['date'] . ' ' . $reservation['time'] >= date("Y-m-d H:i:s")) { ?>
                                    <a href="../../src/php/manage_reservations_action.php?decline=<?php echo $reservation['reservationID']; ?>" class="btn btn-danger">Decline</a>
                                <?php } ?>
                                </td>
                            </tr>
                        <?php
                                }
                            } 
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <table class="table table-light table-bordered shadow-lg table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Pax</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT CONCAT(u.fname, ' ', u.lname) AS 'fullname', rs.reservationID, rs.* FROM reservation rs
                            JOIN users u ON u.userID = rs.userID
                            JOIN restaurant r ON r.restaurantID = rs.restaurantID WHERE rs.status = 'cancelled' AND r.restaurantID = '".$_SESSION["restaurantID"]."'"; 
                            $res = mysqli_query($con, $sql);
                                
                            if(mysqli_num_rows($res)> 0){
                                for($i = 1; $reservation = mysqli_fetch_assoc($res); $i++) { 
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $reservation['fullname']; ?></td>
                            <td><?php echo $reservation['pax'];?> </td>
                            <td><?php echo $reservation['date'];?> </td>
                            <td><?php echo $reservation['time'];?> </td>
                            <td><?php echo $reservation['status'];?> </td>
                        </tr>
                        <?php
                                }
                            } 
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </main>
    <?php 
        include('../shared/footer.php');
    ?>
</body>
</html>

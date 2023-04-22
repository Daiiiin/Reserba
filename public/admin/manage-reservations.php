<?php
    session_start();
    if($_SESSION['user_type'] != 'admin') {
        header("Location: ../index.php");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserba | Manage Restaurants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../stylesheets/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../src/js/manage-restaurant.js"></script>
    <style>
        .reservation_list{
            border: 1px solid;
        }
    </style>
</head>
<body>
    <?php include('../shared/admin_header.php'); ?>
    <main>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><h4>All Reservations</h4></button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><h4>Confirmed Reservations</h4></button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><h4>Cancelled Reservations</h4></button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <br>
                <table class="table table-light table-bordered shadow-lg table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">userID</th>
                            <th scope="col">restaurantID</th>
                            <th scope="col">Pax</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM reservation WHERE `status` = 'pending' ";
                        $res = mysqli_query($con, $sql);

                        if(mysqli_num_rows($res)> 0){
                            while($reservation = mysqli_fetch_assoc($res)) { 
                    ?>
                        <tr>
                            <th scope="row"><?php echo $reservation['reservationID']; ?></th>
                            <td><?php echo $reservation['userID'];?> </td>
                            <td><?php echo $reservation['restaurantID'];?> </td>
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
                    <br>
                    <table class="table table-light table-bordered shadow-lg table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">userID</th>
                                <th scope="col">restaurantID</th>
                                <th scope="col">Pax</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM reservation WHERE `status` = 'confirmed' ";
                            $res = mysqli_query($con, $sql);

                            if(mysqli_num_rows($res)> 0){
                                while($reservation = mysqli_fetch_assoc($res)) { 
                        ?>
                            <tr>
                                <th scope="row"><?php echo $reservation['reservationID']; ?></th>
                                <td><?php echo $reservation['userID'];?> </td>
                                <td><?php echo $reservation['restaurantID'];?> </td>
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
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <br>
                    <table class="table table-light table-bordered shadow-lg table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">userID</th>
                                <th scope="col">restaurantID</th>
                                <th scope="col">Pax</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM reservation WHERE `status` = 'cancelled' ";
                            $res = mysqli_query($con, $sql);

                            if(mysqli_num_rows($res)> 0){
                                while($reservation = mysqli_fetch_assoc($res)) { 
                        ?>
                            <tr>
                                <th scope="row"><?php echo $reservation['reservationID']; ?></th>
                                <td><?php echo $reservation['userID'];?> </td>
                                <td><?php echo $reservation['restaurantID'];?> </td>
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
    </main>
    <?php include('../shared/footer.php'); ?>
</body>

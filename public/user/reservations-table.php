<table class="table table-light table-bordered shadow-lg table-striped">
    <thead>
        <tr>
            <th scope="col">Restaurant Name</th>
            <th scope="col">Pax</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            session_start();
            require_once('../../src/php/initialize.php');
            $uID = $_SESSION['userID'];
            $sql = "SELECT rt.restaurant_name, pax, rs.* 
                    FROM reservation rs 
                    JOIN restaurant rt ON rt.restaurantID = rs.restaurantID
                    JOIN users u ON u.userID = rs.userID
                    WHERE u.userID= $uID
                    ORDER BY rs.date ASC";
            $reservation = mysqli_query($con, $sql);
            while($res = mysqli_fetch_assoc($reservation)) { 
        ?>
        <tr>
            <th scope="row"><?php echo $res['restaurant_name']; ?></th>
            <td><?php echo $res['pax'];?> </td>
            <td><?php echo $res['date'];?> </td>
            <td><?php echo $res['time'];?> </td>
            <td><?php echo $res['status'];?> </td>
            <td>
                <div style="text-align: center;">
                <?php
                if($res['date'] < date("Y-m-d") && $res['status'] == 'confirmed' && $res['rating'] == NULL) {
                    echo '<a class="fa-solid fa-star add-rate" style="color: orange; text-decoration: none;" res-id="' . $res['reservationID'] . '"data-bs-toggle="modal" data-bs-target="#add-rating-modal" href=""></a>';
                } else {
                    echo $res['rating'];
                }
                if($res['date'] . ' ' . $res['time'] > date("Y-m-d H:i:s") && $res['status'] != 'cancelled') {
                    echo '<a class="fa-solid fa-calendar-xmark cancel-res" style="color: red; text-decoration: none;" res-id="' . $res['reservationID'] . '" data-bs-toggle="modal" data-bs-target="#cancel-reservation-modal" href=""></a>';
                }
                ?>
                </div>
            </td>
        </tr>
        <?php
            } 
        ?>
        </tbody>
</table> 
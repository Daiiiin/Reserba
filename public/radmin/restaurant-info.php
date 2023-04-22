<?php 
    session_start();
    require_once('../../src/php/initialize.php');
    $rID = $_SESSION['restaurantID'];
    $sql = "SELECT COUNT(rv.rating) AS 'numrate', ROUND(AVG(rv.rating), 1) AS 'rating', r.* 
            FROM restaurant r
            JOIN reservation rv ON r.restaurantID = rv.restaurantID
            WHERE r.restaurantID = ?;";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $rID);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    while($rest = $result->fetch_assoc()) {
?>
<p class="display-4 text-center">Manage Restaurant</p>
<div class="row row-cols-1 row-cols-md-3">
    <div class="col-lg-6 col-md-6 d-flex justify-content-center border-end mb-4 mb-sm-0">
        <div>
            <img src="<?php echo IMG_PATH . $rest['image']; ?>" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" />
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
            <?php
                echo $rest['rating'];
                for($i = 0; $i < 5; $i++, $rest['rating']--) {
                    echo $rest['rating'] >= 0.5 ?  '<span class="fa fa-star checked"></span>' : '<span class="fa fa-star"></span>';
                } 
            ?>  <div class="text-muted"><?php echo $rest['numrate']; ?> people rated</div>
                <div class=" display-6 form-control-plaintext"><?php echo $rest['restaurant_name']; ?></div>
                <div class="text-truncate text-muted"><?php echo $rest['address']; ?></div>
                <div class="pt-3"><?php echo $rest['description']; ?></div>
                <div class="pt-3">Number of Tables: <?php echo $rest['no_of_table']; ?></div>
                <div class="pb-3">Pax Capacity: <?php echo $rest['pax_capacity']; ?></div>
                <?php  } ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Restaurant Schedule</h5>
                        <?php    
                            $dw = date('N');
                            $sql = "SELECT *, (CASE WHEN CURTIME() BETWEEN ro.start_time AND ro.end_time AND ro.DoW = ? THEN 'open' ELSE 'close' END) 'status'
                                    FROM restaurant_open ro
                                    WHERE restaurantID=?";
                            $stmt = $con->prepare($sql);
                            $stmt->bind_param("ii", $dw, $rID);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $stmt->close();
                            for($i=0; $sched = $result->fetch_assoc(); $i++) { 
                        ?>
                        <div class="input-group mb-1">
                            <?php $color =  $sched['status'] == 'open' ? 'bg-success' : 'bg-danger'; ?>
                            <a class="<?php echo $color; ?> sched-edit" style="width: 3em;" id="sched-edit" data-bs-toggle="modal" data-bs-target="#edit-sched-modal" status="<?php echo $sched['status']; ?>" href=""></a>
                            <span class="input-group-text" style="width: 8em"><?php echo date('l', strtotime('Monday+'. $i . ' day'));?></span>
                            <span type="time" class="form-control" name="opentime1" readonly><?php echo $sched['start_time']; ?></span>
                            <span type="time" class="form-control" name="closetime1" readonly><?php echo $sched['end_time']; ?></span>
                        </div>
                        <?php } ?>
                    </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-info-modal">
                            Edit Information
                        </button>
                </div>
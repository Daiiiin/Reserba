<?php
    session_start();
    if($_SESSION['user_type'] != 'user') {
        header("Location: ../index.php");
    }
    $rID = $_GET['id'];
    $uID = $_SESSION['userID']
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserba | Manage Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../stylesheets/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../src/js/user-reserve.js"></script>
</head>
<body>
    <?php include('../shared/user_header.php'); ?>
    <main style="margin:5em;">
        <div class="container bg-light ps-4 pe-4">
            <div class="container-fluid p-5">

                <!-- Info -->
                <div id="info-body">
                    <?php 
                        $sql = "SELECT COUNT(rv.rating) AS 'numrate', ROUND(AVG(rv.rating), 1) AS 'rating', r.*, ro.start_time, ro.end_time
                                FROM restaurant r
                                JOIN reservation rv ON r.restaurantID = rv.restaurantID
                                JOIN restaurant_open ro ON r.restaurantID = ro.restaurantID
                                WHERE r.restaurantID = ?;";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param("i", $rID);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $stmt->close();

                        while($rest = $result->fetch_assoc()) {
                    ?>
                    <p class="display-4 text-center"><?php echo $rest['restaurant_name'] ?></p>
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
                                ?>  
                                <div class="text-muted"><?php echo $rest['numrate']; ?> people rated</div>
                                <div class=" display-6 form-control-plaintext"><?php echo $rest['restaurant_name']; ?></div>
                                <div class="text-truncate text-muted"><?php echo $rest['address']; ?></div>
                                <div class="pt-3"><?php echo $rest['description']; ?></div>
                                <div class="pt-3">Number of Tables: <?php echo $rest['no_of_table']; ?></div>
                                <div class="pb-3">Pax Capacity: <?php echo $rest['pax_capacity']; ?></div>
                                
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
                                    </div>
                                    <!-- FORM -->
                                    <div>
                                        <h5 class="card-title text-center">Apply for a Reservation</h5>
                                        <form class="row g-3 py-4" id="reserve-form" method="POST">
                                            <?php echo "<input type='hidden' id='uID' name='uID' value='$uID'>" ?>
                                            <?php echo "<input type='hidden' id='resID' name='resID' value='$rID'>" ?>
                                            <div class="col-md-12">
                                                <label for="pax" class="form-label">Number of person</label>
                                                <input type="number" required class="form-control" id="pax" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" max="<?php echo $rest['pax_capacity']; ?>" min="1" name="pax">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="date" class="form-label">Reservation Date</label>
                                                <input type="date" required class="form-control" id="date" name="date" min="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <div class="col-12">
                                                <label for="time" class="form-label">Reservation Time</label>
                                                <input type="time" required class="form-control" id="time" name="time" min="<?php echo substr($rest['start_time'], 0, 5) ?>" max="<?php echo substr($rest['end_time'], 0, 5) ?>">
                                            </div>
                                            <div class="col-12">
                                                <button id="submit" name="submit" type="submit" class="btn btn-primary">Reserve Slot</button>
                                            </div>
                                        </form>
                                    </div>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  } ?>
                <!-- Menu -->
                <div id="menu-body">
                    <hr><div class="h4">Menu</div><hr>
                    <div class="container">
                        <?php 
                            $sql =  "SELECT * FROM menu WHERE restaurantID=?";
                            $stmt = $con->prepare($sql);
                            $stmt->bind_param("i", $rID);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $stmt->close();
                            while($menu = $result->fetch_assoc()) {
                                $mID = $menu['menuID']; ?>
                        <div class="row">
                            <div class="col h5 menu-edit">
                                <?php echo $menu['menu_name']; ?>
                            </div>
                        </div>
                            <?php 
                                $sql = "SELECT * FROM food WHERE menuID=?";
                                $stmt = $con->prepare($sql);
                                $stmt->bind_param("i", $mID);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $stmt->close();
                                while($food = $res->fetch_assoc()) {
                            ?>
                        <div class="row">
                            <div class="col-md-3 text-muted"><?php echo $food['food_name']; ?></div>
                            <div class="col text-muted">₱<?php echo $food['food_price']; ?></div>
                        </div>
                        <?php
                                } 
                                echo '<hr>';
                            }
                        ?>
                    </div>
                </div>
                <!-- Image -->
                <div id="imgs-body">
                    <div class="h4">Images</div><hr>
                    <div class="container">
                        <div class="row row-cols-1 row-cols-md-2">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM restaurant_images WHERE restaurantID=?");
                            $stmt->bind_param("i", $rID);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $stmt->close();
                            while($img = $result->fetch_assoc()) {
                        ?>

                            <div class="col pt-3">
                                <div class="card shadow-lg ndx" style="width: 31.4rem;">
                                    <img src="<?php echo IMG_PATH . $img['image_name'] ?>" style="height: 500px; width:500px; object-fit: cover;"/>
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="reserve-form-message-modal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-check fa-3x" style="color:white;"></i></h5>
              </div>
              <div class="body-add-message lead text-center pt-2 pb-2"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </main>
</body>
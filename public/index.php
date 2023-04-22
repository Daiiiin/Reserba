<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserba | Home </title>
    <link rel="stylesheet" href="./stylesheets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION['user_type'])) {
            header('Location: login.php');
        }
        if($_SESSION['user_type'] == 'user') { include('./shared/user_header.php'); }
        else if($_SESSION['user_type'] == 'admin') { header('Location: admin_index.php'); }
        else if($_SESSION['user_type'] == 'radmin') { header('Location: radmin_index.php'); }
    ?>
    <main>
        <div class="container-fluid p-5">
            <p class="display-1">Top Restaurants</p>
            <div class="row row-cols-1 row-cols-md-3">
                <?php 
                    $sql = "SELECT COUNT(rv.rating) AS 'numrate', ROUND(AVG(rv.rating), 1) AS 'rating', r.*
                            FROM restaurant r
                            LEFT JOIN reservation rv ON r.restaurantID = rv.restaurantID
                            GROUP BY r.restaurantID
                            ORDER BY rv.rating DESC LIMIT 3";

                    $result = mysqli_query($con, $sql);
                    while($rest = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col pt-5 ps-5">
                    <div class="card shadow-lg ndx" style="width: 25rem;">
                        <img src="<?php echo IMG_PATH . $rest['image'] ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rest['restaurant_name'] ?></h5>
                            
                            <p class="card-text text-truncate"><?php echo $rest['description']?></p>
                            <div class="text-muted"><?php echo $rest['numrate']; ?> people rated</div>
                            <a href="<?php echo './' .  $_SESSION['user_type'] . '/restaurant.php?id=' . $rest['restaurantID'] ?>" class="btn btn-primary">More Information</a>
                            <?php
                                echo $rest['rating'];
                                for($i = 0; $i < 5; $i++, $rest['rating']--) {
                                    echo $rest['rating'] >= 0.5 ?  '<span class="fa fa-star checked"></span>' : '<span class="fa fa-star"></span>';
                                }  
                            ?>
                            
                            <div class="text-muted pt-3 text-truncate"><?php echo $rest['address'] ?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <hr class="mt-5"/>
            <p class="display-1 pt-4">Restaurants</p>
            <div class="row row-cols-1 row-cols-md-3">
                <?php 
                    $sql = "SELECT COUNT(rv.rating) AS 'numrate', ROUND(AVG(rv.rating), 1) AS 'rating', r.*
                            FROM restaurant r
                            LEFT JOIN reservation rv ON r.restaurantID = rv.restaurantID
                            GROUP BY r.restaurantID
                            ORDER BY r.restaurant_name ASC";
                    $result = mysqli_query($con, $sql);
                    while($rest = mysqli_fetch_assoc($result)) {
                ?>   
                <div class="col pt-5 ps-5">
                    <div class="card shadow-lg ndx" style="width: 25rem;">
                    <img src="<?php echo IMG_PATH . $rest['image'] ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rest['restaurant_name'] ?></h5>
                            <p class="card-text text-truncate"><?php echo $rest['description']?></p>
                            <div class="text-muted"><?php echo $rest['numrate']; ?> people rated</div>
                            <a href="<?php echo './' . $_SESSION['user_type'] . '/restaurant.php?id=' . $rest['restaurantID'] ?>" class="btn btn-primary">More Information</a>
                            <?php
                                echo $rest['rating'];
                                for($i = 0; $i < 5; $i++, $rest['rating']--) {
                                    echo $rest['rating'] >= 0.5 ?  '<span class="fa fa-star checked"></span>' : '<span class="fa fa-star"></span>';
                                } 
                            ?>
                            <div class="text-muted pt-3 text-truncate"><?php echo $rest['address'] ?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <?php include('./shared/footer.php') ?>
</body>

<?php
    session_start();
    if($_SESSION['user_type'] != 'radmin') {
        header("Location: ../index.php");
    }
    $rID = $_SESSION['restaurantID'];
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
    <script src="../../src/js/manage-radmin-restaurant.js"></script>
</head>
<body>
    <?php include('../shared/radmin_header.php'); ?>
    <main style="margin:5em;">
        <div class="container bg-light ps-4 pe-4">
            <div class="container-fluid p-5">

                <div id="info-body"></div>  
                <div id="menu-body"></div>
                <div id="imgs-body"></div>
                
            </div>
        </div>
    </main>
    <?php 
        include('restaurant-info-edit.php');
        include('restaurant-sched-edit.php');
        include('restaurant-menu-add.php');
        include('restaurant-menu-edit.php');
        include('restaurant-menu-delete.php');
        include('restaurant-food-add.php');
        include('restaurant-food-edit.php');
        include('restaurant-food-delete.php');
        include('restaurant-img-add.php');
        include('restaurant-img-delete.php');
        include('../shared/footer.php'); 
    ?>
</body>
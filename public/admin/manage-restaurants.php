<?php
    session_start();
    if($_SESSION['user_type'] != 'admin') {
        header("Location: ../index.php");
    } $_SESSION['userID'] = 1;
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
</head>
<body>
    <?php include('../shared/admin_header.php'); ?>
    <main>
        <div class="container-fluid p-5">
            <div class="table-header">
                Manage Restaurants
                <button type="button" class="btn btn-success float-end add-restaurant" data-bs-toggle="modal" data-bs-target="#new-restaurant-modal">
                    <i class="fa-solid fa-plus"></i> Add New
                </button>
            </div>
            <div class="table-responsive">
                <div id="rest-table-body"></div>
            </div>
        </div>
    </main>
    <?php 
        include('restaurant-add.php'); 
        include('restaurant-edit.php');
        include('restaurant-delete.php');

        include('../shared/footer.php'); 
    ?>
</body>
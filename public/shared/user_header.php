<?php

    define('P_PUBLIC', dirname(__DIR__));
    define('P_MAIN', dirname(P_PUBLIC));

    require_once(P_MAIN . '/src/php/initialize.php');

    // session_start();
    // if(!isset($_SESSION["email"])){
    //     header("location: ../index.php");
    // }

?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../stylesheets/styles.css"> -->
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Reserba | </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/reserba/public/index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="accountDropdownMenuLink">
                              <li><a class="dropdown-item" href="/reserba/public/user/user_profile.php">My Account</a></li>
                              <li><a class="dropdown-item" href="/reserba/public/user/user_reservations.php">My Reservations</a></li>
                              <li><a class="dropdown-item" href="/reserba/src/php/logout-action.php">Log Out</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/reserba/public/about.php">About Us</a>
                        </li>
                    </ul>
                  <form class="d-flex" action="./search_page.php" method="POST">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit" name="submit-search" id="search-restaurant">Search</button>
                  </form>
                </div>
            </div>
        </nav>
    </div>
</body>

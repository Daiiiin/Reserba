<?php 
    session_start();    
    include('../shared/radmin_header.php');

     if(!isset($_SESSION["email"])){
        	header("location:../login.php");
        }

    $result = $con->query("SELECT * FROM users WHERE userID='".$_SESSION["userID"]."' ") or die($con->error);
    $row = $result->fetch_assoc();
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone_number'] = $row['phone_number'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <style>
        .error{
            background-color: rgba(255, 155, 155, 0.466);
            padding: 1px;
            text-align: center;
            height: 5%;
            color: rgb(161, 0, 0);
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="../stylesheets/profile.css">
    <link rel="stylesheet" href="../stylesheets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <br><br><br><br><br><br><br>
        <center>
        <div class="profile-admin">
            <form action="../../src/php/radmin_profile_update.php" method="POST">
                <h1>PROFILE PAGE</h1>
                <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
            <div class="form-group">
                <label>First Name</label>
                <input class="form-control" type="text" placeholder="FName here" value="<?php echo $_SESSION['fname']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input class="form-control" type="text" placeholder="LName here" value="<?php echo $_SESSION['lname']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" placeholder="Email here" value="<?php echo $_SESSION['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input class="form-control" type="text" placeholder="Phone number here" value="<?php echo $_SESSION['phone_number']; ?>" readonly>
            </div>
            <br>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Update Profile</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../../src/php/radmin_profile_update.php" method="POST">
                            <input type="hidden" name="userID" value="<?php echo $_SESSION['userID'] ?>">
                            <div class="form-group">
                                <label>New First Name</label>
                                <input class="form-control" type="text" name="fname" placeholder="FName here" value="<?php echo $_SESSION['fname'] ?>">
                            </div>
                            <div class="form-group">
                                <label>New Last Name</label>
                                <input class="form-control" type="text" name="lname" placeholder="LName here" value="<?php echo $_SESSION['lname'] ?>">
                            </div>
                            <div class="form-group">
                                <label>New Email</label>
                                <input class="form-control" type="text" name="email"  placeholder="Email here" value="<?php echo $_SESSION['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control" type="password" name="password"  placeholder="Password here">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" name="confirm_password"  placeholder="Password here">
                            </div>
                            <div class="form-group">
                                <label>New Phone Number</label>
                                <input class="form-control" type="text" name="phone_number"  placeholder="Phone number here" value="<?php echo $_SESSION['phone_number'] ?>">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="edit">Update</button>
                            <br><br>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        </center>
        <br><br><br><br><br><br><br>
    </main>
    <?php 
        include('../shared/footer.php');
    ?>
</body>
</html>

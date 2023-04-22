<?php
    session_start();
    if(isset($_SESSION["email"])){
        header("Location: login_page.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./stylesheets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../src/js/login-register.js"></script>
</head>
<body>
    <center>
        <div class="register-form-container">
            <div class="border-sign-up mt-3"> 
                <center>
                    <img src="./img/site_logo.png" alt="reserba_logo">
                </center>
                <br>
                <h2>Sign Up</h2>
                <p>Please fill in this form to create your account.</p>
                <form action = "../src/php/register_action.php" method="POST">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="fname" class="form-control" id="formGroupExampleInput" placeholder="First Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
                            <br>
                        </div>
                        <div class="col">
                            <input type="text" name="lname" class="form-control" id="formGroupExampleInput2" placeholder="Last Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
                            <br>
                        </div>
                    </div>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email" required>
                    <br>
                    <div class="input-group">
                    <span class="input-group-text">+63</span>
                    <input type="text" name="phone_number" class="form-control" id="formGroupExampleInput2" placeholder="Phone Number" minlength="10" maxlength="10" required>
                    </div>
                    <br>
                    <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password" minlength="6" required>
                    <br>
                    <input type="password" name="confirm_password" class="form-control" id="formGroupExampleInput2" placeholder="Confirm Password" minlength="6" required>
                    <br>
                    <center>
                        <input type="submit" name="sign_up" class="btn btn-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </center>
                </form>
                <br>
                <center>
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </center>
            </div>
        </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
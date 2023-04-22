<?php
        session_start();  
        include('./shared/user_header.php');

        if(!isset($_SESSION["email"])){
            header("location: login.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        .about-us{
            /* background-color: pink; */
            /* border: 1px solid; */
            padding: 20%;
            padding-top: 5%;
            padding-bottom: 5%;
        }
    </style>
    <link rel="stylesheet" href="stylesheets/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="about-us">
        <h1>ABOUT US</h1>
        <p>Reserba is a convenience to all users, it saves time for both the staff and the customer by reservation online. This website allows people to check the restaurant's menu, location, and even their opening hours. While they’re busy on personal business, they are served with gracious food as soon as they are seated.</p>
        <br>
        <h1>MISSION & VISION</h1>
        <p>We provide solutions to enhance the business of our customers, whilst creating better opportunities that benefit both the customer and the society. We will be the most valued business partner of all our customers.</p>
        <br>
        <h1>VALUES</h1>
            <ul>
                <li><h4>Energy</h4></li>
                <p>Capture opportunities and make things happen.</p>
                <li><h4>Excellence</h4></li>
                <p>Do things better than anyone else in the society.</p>
                <li><h4>Excitement</h4></li>
                <p>Foster openness, respect and trust to create excitement.</p>
            </ul>
        <br>
        <h2>FAQ</h2>
                <ol>
                    <li>Is there another way to access this?</li>
                    <p>-You can access this website on mobile by accessing it in browser.</p>
                    <li>I can't find the restaurant I’m looking for</li>
                    <p>-The website has no contract between the restaurant you are looking for.</p>
                    <li>What is your cancellation policy?</li>
                    <p>-Cancellation of reservation is highly encouraged be done 30 minutes before of the reservation date that has been booked.</p>
                    <li>I own a restaurant, how do i include my own restaurant in this website?</li>
                    <p>-Email us at reserba@gmail.com for more information.</p>
                </ol>
    </div>
    <?php include('./shared/footer.php') ?>  
</body>
</html>